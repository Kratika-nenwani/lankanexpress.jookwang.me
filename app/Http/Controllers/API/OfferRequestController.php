<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;

use App\Models\OfferRequest;
use App\Models\User;
use App\Models\PlanTransaction;

use App\Models\Plan;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Kreait\Firebase\Factory;
use Kreait\Firebase\Messaging\CloudMessage;
use Kreait\Firebase\Messaging\Notification;

class OfferRequestController extends Controller
{
public function offer_request()
{
    $statuses = ['pending', 'delivered', 'approved','rejected'];

    $offerRequests = OfferRequest::all()->groupBy('status');

    $result = [];
    foreach ($statuses as $status) {
        $result[$status] = $offerRequests->has($status) ? $offerRequests[$status] : [];
        
        // Fetch user details for each offer request
        foreach ($result[$status] as $offerRequest) {
            $user = User::find($offerRequest->user_id);
            $planTransaction = PlanTransaction::find($offerRequest->transaction_id); 
    
        $currentDate = Carbon::now();
            $planTransaction = PlanTransaction::where('user_id', $user->id)
        ->where('expiry_date', '>', $currentDate->toDateString())
        ->where('count', '>', 0)
        ->orderBy('plan_id', 'asc')
        ->first();
         if (!$planTransaction) {
                return response()->json(['status' => 'false',
            'data' => $data], 200);
            }
            
        $plan=Plan::find($planTransaction->plan_id);
        $planTransaction->name=$plan->name;
        if($planTransaction->name == "GOLD")
        {
            
            $planTransaction->total_meals = '12';
        }
        else if($planTransaction->name == "SILVER")
        {
            $planTransaction->total_meals = '8';
        }
        else
        {
            $planTransaction->total_meals = '6';
        }
        $offerRequest->user = $user; 
        $offerRequest->active_plan=$planTransaction;
            
         
        }
        
    }

    return response()->json([
        'message' => 'Offer requests grouped by their status.',
        'data' => $result
    ], 200);
}


    
     public function approveOfferRequest(Request $request,$id)
    {
        $request->validate([
            'count_offered' => 'required',
        ]);
        
    
        $offerRequest = OfferRequest::find($id);
        if ($offerRequest->status == 'delivered') {
        return response()->json([
            'message' => 'Offer Request Delivered.',
        ], 200);}
        if(!$offerRequest)
        {
            return response()->json([
                'message' => 'Offer request not found.',
            ], 200);
        }
        $user = User::find($offerRequest->user_id);
        $offerRequest->count_offered=$request->count_offered;
        if($offerRequest->status=='approved')
        {
            $firebase_credential = (new Factory)->withServiceAccount(base_path('chatapp-notification-46f60-firebase-adminsdk-9b07x-04662b6b28.json'));
            $messaging = $firebase_credential->createMessaging();
            $token = $user->device_token;
            if($token){
                try{
                    $message = CloudMessage::withTarget('token', $token)
                        ->withNotification(Notification::create('Request Approved!', 'Your benefit will be delivered soon!'));
                    $messaging->send($message);
                } catch (\Kreait\Firebase\Exception\Messaging\NotFound $e) {
                     
                } catch (\Exception $e) {
                    
                }
            }
             return response()->json([
                'message' => 'Offer request already approved.',
            ], 200);
        }
        
         $planTransaction = PlanTransaction::find($offerRequest->transaction_id); 
    if (!$planTransaction) { 
        return response()->json([ 
            'message' => 'Plan transaction not found for the user.', 
        ], 200); // Return 404 if not found
    } 

    // Validate based on the request type
    switch ($offerRequest->request_for) { 
        case "Meal": 
            if ((int)$planTransaction->meals < (int)$request->count_offered) { 
                return response()->json([ 
                    'message' => 'Not enough meals in the plan to fulfill the offer request.', 
                ], 200); // Return 400 for insufficient meals
            } 
            break; 

        case "Tea": 
            if ((int)$planTransaction->tea < (int)$request->count_offered) { 
                return response()->json([ 
                    'message' => 'Not enough tea in the plan to fulfill the offer request.', 
                ], 200); // Return 400 for insufficient tea
            } 
            break; 

        case "Package": 
            if ((int)$planTransaction->package < (int)$request->count_offered) { 
                return response()->json([ 
                    'message' => 'Not enough packages in the plan to fulfill the offer request.', 
                ], 200); // Return 400 for insufficient packages
            } 
            break; 

        default: 
            return response()->json([ 
                'message' => 'Invalid request type.', 
            ], 200); // Return 400 for invalid request type
    } 

        $offerRequest->status = 'approved';
        $offerRequest->save();

        return response()->json([
            'message' => 'Offer request status updated to approved.',
            'data' => $offerRequest
        ], 200);
    }
    
    public function markAsDelivered($id)
{
    $offerRequest = OfferRequest::find($id);
    $user = User::find($offerRequest->user_id);
    if (!$offerRequest) {
        return response()->json([
            'message' => 'Offer request not found.',
        ], 200);
    }
    if ($offerRequest->status == 'delivered') {
        return response()->json([
            'message' => 'Offer Request Already Delivered.',
        ], 200);}
    if ($offerRequest->status != 'approved') {
        return response()->json([
            'message' => 'Cannot mark delivered until approved.',
        ], 200);
    }
    
    $planTransaction = PlanTransaction::where('id', $offerRequest->transaction_id)->first();
    if (!$planTransaction) {
        return response()->json([
            'message' => 'Plan transaction not found for the user.',
        ], 200);
    }

    // Cast count_offered to an integer
    $countOffered = (int) $offerRequest->count_offered;

    switch ($offerRequest->request_for) {
        case "Meal":
            // Cast meal to an integer and calculate remaining meals
            $remainingMeals = (int) $planTransaction->meals - $countOffered;
            if ($remainingMeals < 0) {
                return response()->json([
                    'message' => 'Not enough meals in the plan to fulfill the offer request.',
                ], 200);
            }
            // Update the remaining meals count and mark the request as delivered
            $planTransaction->meals = (string) $remainingMeals; // Save as string to match the varchar field
            break;

        case "Tea":
            // Cast tea to an integer and ensure there's at least 1 tea remaining
            if ((int) $planTransaction->tea == 0) {
                return response()->json([
                    'message' => 'Not enough tea in the plan to fulfill the offer request.',
                ], 200);
            }
            // Set tea count to 0 and mark the request as delivered
            $planTransaction->tea = '0'; // Save as string to match the varchar field
            break;

        case "Package":
            // Cast package to an integer and ensure there's at least 1 package remaining
            if ((int) $planTransaction->package == 0) {
                return response()->json([
                    'message' => 'Not enough packages in the plan to fulfill the offer request.',
                ], 200);
            }
            // Set package count to 0 and mark the request as delivered
            $planTransaction->package = '0'; // Save as string to match the varchar field
            break;

        default:
            return response()->json([
                'message' => 'Invalid request type.',
            ], 200);
    }

    // Save the transaction changes
    $planTransaction->save();

    // Mark the offer request as delivered
    $offerRequest->status = 'delivered';
    $offerRequest->save();

    // Prepare remaining count based on request type
    if ($offerRequest->request_for === 'Meal') {
        $remainingCount = $planTransaction->meals;
    } elseif ($offerRequest->request_for === 'Tea') {
        $remainingCount = '0'; // Since tea is reduced to 0
    } elseif ($offerRequest->request_for === 'Package') {
        $remainingCount = '0'; // Since package is reduced to 0
    } else {
        $remainingCount = null;
    }
    
    $firebase_credential = (new Factory)->withServiceAccount(base_path('chatapp-notification-46f60-firebase-adminsdk-9b07x-04662b6b28.json'));
    $messaging = $firebase_credential->createMessaging();
    $token = $user->device_token;
    if($token){
        try{
            $message = CloudMessage::withTarget('token', $token)
                ->withNotification(Notification::create('Request Delivered!', 'Your requested offer is delivered!'));
            $messaging->send($message);
        } catch (\Kreait\Firebase\Exception\Messaging\NotFound $e) {
             
        } catch (\Exception $e) {
            
        }
    }

    return response()->json([
        'message' => 'Offer request marked as delivered and count updated.',
        'data' => [
            'offer_request' => $offerRequest,
            'remaining_count' => $remainingCount
        ]
    ], 200);
}

  public function rejectOfferRequest(Request $request, $id)  
{  
    // Find the offer request 
    $offerRequest = OfferRequest::find($id);  
    if (!$offerRequest) {  
        return response()->json([  
            'message' => 'Offer request not found.',  
        ], 404); 
    } 

    // Check if the request is already approved or delivered 
    if ($offerRequest->status === 'delivered') {  
        return response()->json([  
            'message' => 'Offer Request Delivered.',  
        ], 400); 
    }  

    if ($offerRequest->status === 'rejected') {  
        return response()->json([  
            'message' => 'Offer request already rejected.',  
        ], 400); 
    }  

    // Update the offer request status 
    $offerRequest->status = 'rejected';  
    $offerRequest->save();  
    $user = User::find($offerRequest->user_id);
    
    $firebase_credential = (new Factory)->withServiceAccount(base_path('chatapp-notification-46f60-firebase-adminsdk-9b07x-04662b6b28.json'));
    $messaging = $firebase_credential->createMessaging();
    $token = $user->device_token;
    if($token){
        try{
            $message = CloudMessage::withTarget('token', $token)
                ->withNotification(Notification::create('Request Rejected!', 'Your requested offer is rejected!'));
            $messaging->send($message);
        } catch (\Kreait\Firebase\Exception\Messaging\NotFound $e) {
             
        } catch (\Exception $e) {
            
        }
    }
    
    return response()->json([  
        'message' => 'Offer request status updated to rejected.',  
        'data' => $offerRequest  
    ], 200); 
}

}
