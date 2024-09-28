<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Quote;
use App\Models\User;
use App\Models\Order;
use App\Models\DropOfPoint;
use App\Models\Checkpoint;
use App\Models\PlanTransaction;
use App\Models\Plan;

use Illuminate\Support\Facades\Mail;
use App\Mail\QuoteAdded;
use App\Mail\AmountUpdated;
use App\Mail\CheckpointMarked;
use App\Mail\DropOffPointAssigned;
use App\Mail\NewQuote;
use App\Mail\QuoteAssigned;

use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Kreait\Firebase\Factory;
use Kreait\Firebase\Messaging\CloudMessage;
use Kreait\Firebase\Messaging\Notification;

class QuoteController extends Controller
{

 public function savequote(Request $request)
{
    // Validation
    $validator = Validator::make($request->all(), [
        
        'service_type' => 'required',
        'additional_services' => 'nullable',
        'sender_name' => 'required',
        'sender_phone' => 'required',
        'sender_email' => 'required',
        'sender_id' => 'required',
        'sender_pickup_address' => 'required',
        'sender_street_address' => 'nullable',
        'sender_city' => 'required',
        'sender_state' => 'required',
        'sender_country' => 'required',
        'receiver_delivery_address' => 'nullable',
        'receiver_street_address' => 'nullable',
        'receiver_city' => 'required',
        'receiver_state' => 'required',
        'receiver_country' => 'required',
        'number_of_parcels' => 'required',
        'weight' => 'required',
        'length' => 'required',
        'height' => 'required',
        'width' => 'required',
        'content' => 'required',
        'item_value' => 'required',
        'insurance_level' => 'required',
        'sender_image' => 'required|image', // Ensure it's an image file
    ]);
    
    if ($validator->fails()) {
        return response()->json(['message' => $validator->errors()], 401);
    }

    // Handle file upload
    $filename = null;
    if ($request->hasFile('sender_image')) {
        $file = $request->file('sender_image');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('QuoteImages'), $filename);
    } else {
        return response()->json(['error' => 'Image file is required.'], 400);
    }

    // Determine the prefix based on service_type
    $prefixMap = [
        'AIR FREIGHT' => 'MBA',
        'SEA FREIGHT' => 'MBS',
        'ROAD TRANSPORT' => 'MBL',
        '3PL SERVICES' => 'MBW',
    ];

    $serviceType = $request->input('service_type');
    $prefix = $prefixMap[$serviceType] ?? 'MBX'; // Default to 'MBX' if service_type is not found

    // Generate the track ID
    $lastQuote = Quote::where('track_id', 'LIKE', $prefix . '%')->orderBy('id', 'desc')->first();

    if ($lastQuote) {
        // Extract the numeric part of the last track ID and increment it
        $lastNumber = intval(substr($lastQuote->track_id, strlen($prefix . '-')));
        $newNumber = str_pad($lastNumber + 1, 4, '0', STR_PAD_LEFT);
    } else {
        // Start at 0001 if no previous quotes
        $newNumber = '0001';
    }

    $transactionId = $prefix . '-' . $newNumber;

    // Create a new quote
    $userId = Auth::id();
    $user=Auth::user();
    // return response()->json([
    //     'message' => 'Quote added successfully!',
    //     'quote' => $userId,
    // ], 201);
    $quote = Quote::create([
        'user_id' => $request->user_id,
        'track_id' => $transactionId,
        'service_type' => $serviceType,
        'additional_services' => $request->input('additional_services'),
        'sender_name' => $request->input('sender_name'),
        'sender_phone' => $request->input('sender_phone'),
        'sender_email' => $request->input('sender_email'),
        'sender_id' => $request->input('sender_id'),
        'sender_image' => $filename,
        'sender_pickup_address' => $request->input('sender_pickup_address'),
        'sender_street_address' => $request->input('sender_street_address'),
        'sender_city' => $request->input('sender_city'),
        'sender_state' => $request->input('sender_state'),
        'sender_country' => $request->input('sender_country'),
        'receiver_delivery_address' => $request->input('receiver_delivery_address'),
        'receiver_street_address' => $request->input('receiver_street_address'),
        'receiver_city' => $request->input('receiver_city'),
        'receiver_state' => $request->input('receiver_state'),
        'receiver_country' => $request->input('receiver_country'),
        'number_of_parcels' => $request->input('number_of_parcels'),
        'weight' => $request->input('weight'),
        'length' => $request->input('length'),
        'height' => $request->input('height'),
        'width' => $request->input('width'),
        'content' => $request->input('content'),
        'item_value' => $request->input('item_value'),
        'insurance_level' => $request->input('insurance_level'),
    ]);

    // Send the email
    Mail::to($request->sender_email)->send(new QuoteAdded($quote));
    $operations = User::where('role', 'operation')->get();
    foreach($operations as $item){
        Mail::to($item->email)->send(new NewQuote($quote));
    }
    
    $firebase_credential = (new Factory)->withServiceAccount(base_path('chatapp-notification-46f60-firebase-adminsdk-9b07x-04662b6b28.json'));
    $messaging = $firebase_credential->createMessaging();
    $token = Auth::user()->device_token;
    if($token){
        try{
            $message = CloudMessage::withTarget('token', $token)
                ->withNotification(Notification::create('Quote added successfully!', 'Hello, Our call agents will connect with you soon.'));
            $messaging->send($message);
        } catch (\Kreait\Firebase\Exception\Messaging\NotFound $e) {
             
        } catch (\Exception $e) {
            
        }
    }
    
    $token2 = User::where('role', 'operation')->get()->pluck('device_token');
    
    foreach($token2 as $i){
        if($i){
            try{
                $message = CloudMessage::withTarget('token', $i)
                    ->withNotification(Notification::create('Recieved new quote!', 'Hello, Assign quote to the drop off point.'));
                $messaging->send($message);
            } catch (\Kreait\Firebase\Exception\Messaging\NotFound $e) {
                continue; 
            } catch (\Exception $e) {
                continue;
            }
        }
    }
        
        
    $quote->status = 'Pending';
    $quote->checkpoint = 'Pending';

    return response()->json([
        'message' => 'Quote added successfully!',
        'quote' => $quote,
    ], 201);
}




     public function viewOrder($id)
    {
        $orders = Quote::where('user_id', $id)->get();
        return response()->json([
            'status' => 'success',
            'data' => $orders
        ], 200);
    }
    
    
     public function vieworderbyid($transaction_id)
    {
        // Fetch all orders for the given user_id
        $orders = Quote::where('track_id', $transaction_id)->get();

        // Check if any orders were found
        if ($orders->isEmpty()) {
            return response()->json([
                'status' => 'error',
                'message' => 'No orders found for the given track ID.'
            ], 404);
        }

        // Return orders in JSON format with success status
        return response()->json([
            'status' => 'success',
            'data' => $orders
        ], 200);
    }
    
    
      public function assignDropOffPoint(Request $request)
    {
        // Validate the incoming request
        $validator = Validator::make($request->all(), [
            'quote_id' => 'required',
            'drop_of_points' => 'required',
            'is_assigned' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()], 401);
        }

        // Get the quote_id from the request
        $quoteId = $request->input('quote_id');

        // Find the quote by ID
        $quote = Quote::find($quoteId);

        if (!$quote) {
            return response()->json(['message' => 'Quote not found'], 404);
        }

        // Update the quote with the provided data
        $quote->update([
            'drop_of_points' => $request->input('drop_of_points'),
            'is_assigned' => $request->input('is_assigned'),
        ]);
        $dop=DropOfPoint::find($quote->drop_of_points);
        
        $ca=User::find($dop->assigned_callagent);
        $quote->dop=$dop;
        $quote->ca=$ca;
        
        $quote->user=User::find($quote->user_id);
        Mail::to($quote->user->email)->send(new DropOffPointAssigned($quote));
        
        Mail::to($ca->email)->send(new QuoteAssigned($quote));
        
        $firebase_credential = (new Factory)->withServiceAccount(base_path('chatapp-notification-46f60-firebase-adminsdk-9b07x-04662b6b28.json'));
        $messaging = $firebase_credential->createMessaging();
        $token = $quote->user->device_token;
        if($token){
            try{
                $message = CloudMessage::withTarget('token', $token)
                    ->withNotification(Notification::create('Quote updated!', 'Hello, Call Agent assigned successfully!'));
                $messaging->send($message);
            } catch (\Kreait\Firebase\Exception\Messaging\NotFound $e) {
                 
            } catch (\Exception $e) {
                
            }
        }
        
        $token2 = $ca->device_token;
        if($token2){
            try{
                $message = CloudMessage::withTarget('token', $token2)
                    ->withNotification(Notification::create('Recieved new quote!', 'Hello, Please connect with customer ASAP!'));
                $messaging->send($message);
            } catch (\Kreait\Firebase\Exception\Messaging\NotFound $e) {
                
            } catch (\Exception $e) {
                
            }
        }
        
        return response()->json([
            'message' => 'Drop-off point assigned successfully!',
            'quote' => $quote,
            'quote_id' => $quoteId
        ], 200);
    }
    
    
      public function adminviewquote()
    {
        // Get all quotes where is_assigned is false
        $data = Quote::where('is_assigned', false)->get();

        return response()->json([
            'success' => true,
            'data' => $data
        ], 200);
    }
    
    
      public function userviewquote($userId)
    {
        // Get all quotes for the given user ID where is_assigned is true
        $data = Quote::where('user_id', $userId)
            ->where('is_assigned', true)
            ->get();

        return response()->json([
            'success' => true,
            'data' => $data
        ], 200);
    }
    
    public function assign_quote(Request $request){
        $validator = Validator::make($request->all(), [
            'quote_id' => 'required',
            'drop_of_point' => 'required'
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return response(['message' => $validator->errors()], 401);
        }
        $quote = Quote::find($request->quote_id);
        $quote->is_assigned = 1;
        $quote->drop_of_points = $request->drop_of_point;
        $quote->save();
        $dop=DropOfPoint::find($quote->drop_of_points);
        
        $ca=User::find($dop->assigned_callagent);
        $quote->dop=$dop;
        $quote->ca=$ca;
        
        $quote->user=User::find($quote->user_id);
        Mail::to($quote->user->email)->send(new DropOffPointAssigned($quote));
        Mail::to($ca->email)->send(new QuoteAssigned($quote));
        
        $firebase_credential = (new Factory)->withServiceAccount(base_path('chatapp-notification-46f60-firebase-adminsdk-9b07x-04662b6b28.json'));
        $messaging = $firebase_credential->createMessaging();
        $token = $quote->user->device_token;
        if($token){
            try{
                $message = CloudMessage::withTarget('token', $token)
                    ->withNotification(Notification::create('Quote updated!', 'Hello, Call Agent assigned successfully!'));
                $messaging->send($message);
            } catch (\Kreait\Firebase\Exception\Messaging\NotFound $e) {
                
            } catch (\Exception $e) {
                
            }
        }
        $token2 = $ca->device_token;
        if($token2){
            try{
                $message = CloudMessage::withTarget('token', $token2)
                    ->withNotification(Notification::create('Recieved new quote!', 'Hello, Please connect with customer ASAP!'));
                $messaging->send($message);
            } catch (\Kreait\Firebase\Exception\Messaging\NotFound $e) {
                
            } catch (\Exception $e) {
                
            }
        }
        
        
        return response([
            'message' => 'Quote assigned successfully!',
        ], 200);
        
    }
    
    public function callagent_quote(){
        $user = Auth::user();
        $droppoint = DropOfPoint::where('assigned_callagent', $user->id)->first();
        if($droppoint){
            // $quotes = Quote::where('is_assigned', true )->where('drop_of_points', $droppoint->id)->get();
            $quotes = Quote::where('is_assigned', true)
           ->where('drop_of_points', $droppoint->id)
           ->whereIn('status', ['Pending', 'Processing'])
           ->get();
            return response([
                'status' => 'success',
                'data' => $quotes
            ], 200);
        }else{
            return response([
                'message' => 'No Drop Off Point assigned!'    
            ], 200);
        }
    }
     public function update_quote_price($id, Request $request){
        $validator = Validator::make($request->all(), [
            'total' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()], 401);
        }
        $quote = Quote::find($id);
        $quote->total = $request->total;
        $quote->due = $request->total;
        if($request->remark){
            $quote->remark = $request->remark;
        }
        
        $prev_loyality_points=$quote->loyality_points;
        $amount = (int) $quote->total;
        $x = floor($amount / 100);
        $user = User::find($quote->user_id);
        if($quote->loyality_points == 0){
            $quote->loyality_points =5* $x;
            $user->loyality_points += $quote->loyality_points;
        }
        else if($quote->loyality_points>$prev_loyality_points)
        {
            $quote->loyality_points =5* $x;
            $user->loyality_points += $quote->loyality_points-$prev_loyality_points;
        }
        else
        {
            $quote->loyality_points =5* $x;
            $user->loyality_points -= $prev_loyality_points-$quote->loyality_points;
        }
        
        $user->save();
        $quote->save();
        $user_new=User::where('id',$quote->user_id)->first();
        $quote->user=$user_new->name;
        Mail::to($user_new->email)->send(new AmountUpdated($quote));
        
        $firebase_credential = (new Factory)->withServiceAccount(base_path('chatapp-notification-46f60-firebase-adminsdk-9b07x-04662b6b28.json'));
        $messaging = $firebase_credential->createMessaging();
        $token = $user_new->device_token;
        if($token){
            try{
                $message = CloudMessage::withTarget('token', $token)
                    ->withNotification(Notification::create('Amount updated!', 'Hello, Please check the quotation amount!'));
                $messaging->send($message);
            } catch (\Kreait\Firebase\Exception\Messaging\NotFound $e) {
                
            } catch (\Exception $e) {
                
            }
        }
        

        return response([
            'message' => 'Quotation amount updated successfully!'    
        ], 200); 
    }
    
    public function update_checkpoint(Request $request){
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'address' => 'required',
            'quote_id' => 'required',
            'time' => 'required',
            'date' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()], 401);
        }
        
        $checkpoint = new Checkpoint();
        $checkpoint->quote_id = $request->quote_id;
        $checkpoint->title = $request->title;
        $checkpoint->address = $request->address;
        $checkpoint->time = $request->time;
        $date = Carbon::parse($request->date)->format('Y-m-d');
        $checkpoint->date = $date;
        if($request->status){
            $quote = Quote::find($request->quote_id);
            $quote->status = 'Delivered';
            $quote->save();
        }
    
        if($request->title == "PICKED"){
            $quote = Quote::find($request->quote_id);
            $quote->status = 'Placed';
            $quote->save();
        }
        
        if($request->status != "Placed" && $request->status != "Delivered" ){
            $quote = Quote::find($request->quote_id);
            $quote->status = 'Transit';
            $quote->save();
        }
        
        if($request->country){
            $checkpoint->country = $request->country;
        }
        $checkpoint->save();
        $user=User::find($quote->user_id);
        $checkpoint->user=$user;
        $checkpoint->quote=$quote;
        
        Mail::to($user->email)->send(new CheckpointMarked($checkpoint));
        
        $firebase_credential = (new Factory)->withServiceAccount(base_path('chatapp-notification-46f60-firebase-adminsdk-9b07x-04662b6b28.json'));
        $messaging = $firebase_credential->createMessaging();
        $token = $user->device_token;
        if($token){
            try{
                $message = CloudMessage::withTarget('token', $token)
                    ->withNotification(Notification::create('Checkpoint updated!', 'Hello, Your checkpoint is updated!'));
                $messaging->send($message);
            } catch (\Kreait\Firebase\Exception\Messaging\NotFound $e) {
                 
            } catch (\Exception $e) {
                
            }
        }
        
        
        
        return response([
            'message' => 'Checkpoint updated successfully!   '    
        ]);
        
        
    }
    
    public function operation_quote(){
      
        $quotes = Quote::where('is_assigned', true)
        ->where('status', 'Transit')
        ->get();
        return response([
            'status' => 'success',
            'data' => $quotes
        ], 200);
    }
    
    public function get_checkpoint($id){
        $points = Checkpoint::where('quote_id', $id)->get();
        return response([
            'status' => 'success',
            'data' => $points
        ], 200);
    }
    
     public function cancelQuote(Request $request, $quoteId)
    {
        // Find the quote by its ID
        $quote = Quote::find($quoteId);

        // Check if the quote exists
        if (!$quote) {
            return response()->json([
                'message' => 'Quote not found.',
            ], 404);
        }

        // Update the status to 'Cancelled'
        $quote->status = 'Cancelled1';
        $quote->save();

        // Return a success response
        return response()->json([
            'message' => 'Quote status updated successfully!',
            'quote' => $quote
        ], 200);
    }
    
    
    public function updateQuote(Request $request, $id)
    {
        // Validation (if needed)
        $request->validate([
            // 'sender_name' => 'required',
            // 'sender_phone' => 'required',
            // 'sender_email' => 'required',
        ]);
    
        // Find the quote
        $quote = Quote::find($id);
     
        // Update only the fields that are present in the request
        if ($request->filled('service_type')) {
            $quote->service_type = $request->service_type;
        }
        if ($request->filled('additional_services')) {
            $quote->additional_services = $request->additional_services;
        }
        if ($request->filled('sender_name')) {
            $quote->sender_name = $request->sender_name;
        }
        if ($request->filled('sender_phone')) {
            $quote->sender_phone = $request->sender_phone;
        }
        if ($request->filled('sender_email')) {
            $quote->sender_email = $request->sender_email;
        }
        if ($request->filled('sender_id')) {
            $quote->sender_id = $request->sender_id;
        }
        
    
        if ($request->filled('sender_pickup_address')) {
            $quote->sender_pickup_address = $request->sender_pickup_address;
        }
        if ($request->filled('sender_street_address')) {
            $quote->sender_street_address = $request->sender_street_address;
        }
        if ($request->filled('sender_city')) {
            $quote->sender_city = $request->sender_city;
        }
        if ($request->filled('sender_state')) {
            $quote->sender_state = $request->sender_state;
        }
        if ($request->filled('sender_country')) {
            $quote->sender_country = $request->sender_country;
        }
        if ($request->filled('receiver_delivery_address')) {
            $quote->receiver_delivery_address = $request->receiver_delivery_address;
        }
        if ($request->filled('receiver_street_address')) {
            $quote->receiver_street_address = $request->receiver_street_address;
        }
        if ($request->filled('receiver_city')) {
            $quote->receiver_city = $request->receiver_city;
        }
        if ($request->filled('receiver_state')) {
            $quote->receiver_state = $request->receiver_state;
        }
        if ($request->filled('receiver_country')) {
            $quote->receiver_country = $request->receiver_country;
        }
        if ($request->filled('number_of_parcels')) {
            $quote->number_of_parcels = $request->number_of_parcels;
        }
        if ($request->filled('weight')) {
            $quote->weight = $request->weight;
        }
        if ($request->filled('length')) {
            $quote->length = $request->length;
        }
        if ($request->filled('height')) {
            $quote->height = $request->height;
        }
        if ($request->filled('width')) {
            $quote->width = $request->width;
        }
        if ($request->filled('content')) {
            $quote->content = $request->content;
        }
        if ($request->filled('item_value')) {
            $quote->item_value = $request->item_value;
        }
        if ($request->filled('insurance_level')) {
            $quote->insurance_level = $request->insurance_level;
        }
         if ($request->filled('status')) {
            $quote->status = $request->status;
        }
        if ($request->filled('drop_of_points')) {
            $quote->drop_of_points = $request->drop_of_points;
        }
        if ($request->filled('payment')) {
            $quote->payment = $request->payment;
        }
        if ($request->filled('pickup_date')) {
            $quote->pickup_date = $request->pickup_date;
        }
           // Handle the sender image upload (if new image is provided)
        $filename = $quote->sender_image; // Default to existing image
        if ($request->hasFile('sender_image')) {
            $file = $request->file('sender_image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('QuoteImages'), $filename); // Move file to the specified folder
            $quote->sender_image = $filename;
        }
    
    
        // Save the updated quote
        $quote->save();
    
        return response()->json(['message' => 'Quote updated successfully.']);
    }
    public function applyPlan($id)
    {
        
        $quote = Quote::find($id);
          $data = [
                'plan'=>'NA',
                'actual_amount' => 0,
                'discounted_amount' => 0,
                'discount' => 0,
            ];
          if (!$quote) {
            return response()->json(['status' => 'false',
            'data' => $data], 200); 
        }
        $data = [
                 'plan'=>'NA',
                'actual_amount' => (int)$quote->total,
                'discounted_amount' => 0,
                'discount' => 0,
            ];
        if ((int)$quote->weight<5) {
            return response()->json(['status' => 'false',
            'data' => $data], 200);
        }
        $user_id = $quote->user_id;
        $currentDate = Carbon::now();
    
        $planTransaction = PlanTransaction::where('user_id', $user_id)
        ->where('expiry_date', '>', $currentDate->toDateString())
        ->where('count', '>', 0)
        ->orderBy('plan_id', 'asc')
        ->first();
         if (!$planTransaction) {
                return response()->json(['status' => 'false',
            'data' => $data], 200);
            }
        $plan=Plan::find($planTransaction->plan_id);
            
         
           
    
            // $offer = $planTransaction->weight;
            // $freeWeight = $this->calculateFreeWeight($offer, $quote->weight);
    
            // $chargeableWeight = max($quote->weight - $freeWeight, 0);
           
            if($plan->name=="GOLD")
            {
                $amount_after_discount = $quote->total - ($quote->total * 0.25);
            }
            else if($plan->name=="SILVER")
            {
                $amount_after_discount = $quote->total - ($quote->total * 0.15);
            }
            else if($plan->name=="BRONZE")
            {
                $amount_after_discount = $quote->total - ($quote->total * 0.10);
            }
            $data = [
                'plan' => $plan->name,
                'actual_amount' => (int)$quote->total,
                'discounted_amount' => round($amount_after_discount, 2),
                'discount' => round((int)$quote->total - round($amount_after_discount, 2), 2),
            ];
            return response()->json([
                // 'planTransaction' => $planTransaction,
                // 'plan' => $plan,
                // 'quote' => $quote,
                // 'free_weight' => $freeWeight,
                // 'chargeable_weight' => $chargeableWeight,
                // 'actual_amount' =>(int) $quote->total,
                // 'discounted_amount' => round($amount_after_discount,2),
                // 'discount' => round((int)$quote->total-round($amount_after_discount,2),2)
                // 'offer_weight' => $offer
                'status'=>'true',
                'data' => $data
            ], 200);
        
            
    }  
    // private function calculateFreeWeight($free_weight, $quoteWeight)
    // {
        // $freeWeightLimit = $free_weight; 
        
    //     return $quoteWeight <= $freeWeightLimit ? 0 : $freeWeightLimit;
    // }
 
}
