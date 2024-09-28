<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Plan;
use App\Models\User;
use App\Models\PlanTransaction;
use App\Models\OfferRequest;
use Kreait\Firebase\Factory;
use Kreait\Firebase\Messaging\CloudMessage;
use Kreait\Firebase\Messaging\Notification;

use App\Models\Request as Req;

class PlansController extends Controller
{
    public function saveplan(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'benefits' => 'required',
            'bg_color' => 'required',
            'text_color' => 'required',
            'color' => 'required',

        ]);

        // Create the new plan
        $plan = Plan::create([
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'benefits' => $request->input('benefits'),
            'bg_color' => $request->input('bg_color'),
            'text_color' => $request->input('text_color'),
            'color' => $request->input('color'),

        ]);

        // Return a JSON response
        return response()->json([
            'message' => 'Plan created successfully!',
            'plan' => $plan,
        ], 201);
    }

    public function plans()
    {
        // Fetch all plans
        $plans = Plan::all();

        // Return plans as JSON response
        return response()->json([
            'success' => true,
            'data' => $plans
        ], 200);
    }
    
    public function showPlansByUserId($userId)
    {
        $plans = PlanTransaction::where('user_id', $userId)->get();
        foreach($plans as $item){
            $item->details = Plan::find($item->plan_id);
            if($item->plan_id == 1){
                $item->total_meals = '12';
                $item->total_weight = '100';
            }elseif($item->plan_id == 2){
                $item->total_meals = '8';
                $item->total_weight = '75';
            }else{
                $item->total_meals = '6';
                $item->total_weight = '60';
            }
        }
        return response()->json(['plans'=>$plans], 200);
        
    }
    
    public function sendMealRequest($planId, Request $request)
    {
    // Retrieve the PlanTransaction by ID
    $plan = PlanTransaction::find($planId);

    // Check if the plan exists
    if (!$plan) {
        return response()->json(['message' => 'Plan not found'], 404);
    }

    // Create a new request record
    $mealRequest = new Req();
    $mealRequest->plan_id = $planId;
    $mealRequest->user_id = $plan->user_id;
    $mealRequest->title = "Plan Transaction";
    $mealRequest->message = "Meal Request";
    $mealRequest->status = "unapproved";
    $mealRequest->quantity = (int)$request->input('quantity'); // Retrieve the quantity from the request input
    $mealRequest->save();

    return response()->json(['message' => 'Meal Request sent successfully'], 200);
    }

    public function approveMealRequest($id)
    {
    // Find the meal request by ID
    $request = Req::find($id);

    // Check if the request exists
    if (!$request) {
        return response()->json(['message' => 'Meal request not found'], 404);
    }

    // Find the associated plan by ID
    $plan = PlanTransaction::find($request->plan_id);

    // Check if the plan exists
    if (!$plan) {
        return response()->json(['message' => 'Plan not found'], 404);
    }

    // Convert the number of meals to an integer
    $meals = (int)$plan->meals;

    // Check if there are enough meals available
    if ($meals >= $request->quantity) {
        // Deduct the quantity from the available meals
        $meals -= (int)$request->quantity;
        $plan->meals = (string)$meals;
        $plan->save();

        // Update the request status to approved
        $request->status = "approved";
        $request->save();

        return response()->json(['message' => 'Meal request approved'], 200);
    } else {
        return response()->json(['message' => 'Not enough meals available'], 400);
    }
}

public function redeem_req(Request $request){
    $request->validate([
        'transaction_id' => 'required',
        'request_for' => 'required',
    ]);
    
    $plan = PlanTransaction::find($request->transaction_id);
    $req = new OfferRequest();
    $req->user_id = $plan->user_id;
    $req->transaction_id = $request->transaction_id;
    $req->request_for = $request->request_for;
    $req->save();
    $user = User::find($plan->user_id);
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
    $token2 = User::where('role', 'admin')->get()->pluck('device_token');
    foreach($token2 as $i){
        if($i){
            try{
                $message = CloudMessage::withTarget('token', $i)
                    ->withNotification(Notification::create('Request Delivered!', 'Your requested offer is delivered!'));
                $messaging->send($message);
            } catch (\Kreait\Firebase\Exception\Messaging\NotFound $e) {
                 continue;
            } catch (\Exception $e) {
                continue;
            }
        }
    }
    return response()->json(['message' => 'Request sent successfully! Someone from our operational team will connect with you regarding the offer. Thanks!'], 200);
}

public function request_history(Request $request){
    $request->validate([
        'transaction_id' => 'required',    
    ]);
    $reqs = OfferRequest::where('transaction_id', $request->transaction_id)->get();
    return response()->json([
        'message' => 'Requests fetched successfully!',
        'requests' => $reqs,
    ]);
}


    
}
