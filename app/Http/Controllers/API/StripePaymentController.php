<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\PlanTransaction;
use Date;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use App\Models\Quote;
use App\Models\Plan;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Stripe\StripeClient;
use Kreait\Firebase\Factory;
use Kreait\Firebase\Messaging\CloudMessage;
use Kreait\Firebase\Messaging\Notification;
use Illuminate\Support\Facades\Mail;
use App\Mail\PlanAdded;

use Carbon\Carbon;


class StripePaymentController extends Controller
{

    public function makepayment(Request $request)
    {

        // Retrieve the Stripe secret key from configuration
        $stripeSecretKey = config('services.stripe.secret');

        // Ensure the StripeClient is initialized with the correct secret key
        $stripe = new StripeClient($stripeSecretKey);

        // Retrieve the quote by ID
        $quote = Quote::find($request->quote_id);

        if (!$quote) {
            return response()->json([
                'success' => false,
                'message' => 'Quote not found'
            ]);
        }
       // Create the Checkout Session 
        $redirectUrl = route('success') . '?session_id={CHECKOUT_SESSION_ID}&discount=' . $request->total;

        $response = $stripe->checkout->sessions->create([
            'success_url' => $redirectUrl,
            'cancel_url' => route('cancel'),
            'payment_method_types' => ['card'],
            'line_items' => [
                [
                    'price_data' => [
                        'product_data' => [
                            'name' => 'Quote ID ' . $quote->id,
                        ],
                        'unit_amount' => 100 * $request->total, // Convert to the smallest currency unit (e.g., cents for USD)
                        'currency' => 'eur',
                    ],
                    'quantity' => 1
                ],
            ],
            'mode' => 'payment',
            'allow_promotion_codes' => false
        ]);

        // Update the quote with Stripe session_id
        $quote->session_id = $response->id;
        // $quote->total = $request->total; // Initialize total to the amount expected
        $quote->paid = 0; // Initialize total to the amount expected
        $quote->due = $request->total; // Initialize total to the amount expected
        $quote->save();

        return response()->json([
            'success' => true,
            'url' => $response->url
        ]);
    }


    public function success(Request $request)
    {
        // dd($request->all());
        $sessionId = $request->query('session_id');
        $discount = $request->query('discount');
        // Retrieve the Stripe secret key from configuration
        $stripeSecretKey = config('services.stripe.secret');
        $stripe = new StripeClient($stripeSecretKey);

        // Retrieve the session details from Stripe
        $session = $stripe->checkout->sessions->retrieve($sessionId);

        // Find the quote using the session ID and update its status
        $quote = Quote::where('session_id', $session->id)->first();
        if($discount<$quote->total)
        {
            $user_id = $quote->user_id;
    
            $currentDate = Carbon::now();
            
            $planTransaction = PlanTransaction::where('user_id', $user_id)
            ->where('expiry_date', '>', $currentDate->toDateString())
            ->first();
            
            $planTransaction->count-=1;
            $planTransaction->save();
        }
        // dd($planTransaction);
        if ($quote) {
            $quote->status = 'Processing';
            $quote->due = 0; // Due amount should be 0 after payment
            $quote->paid = $discount; // Assuming 'paid' is the total amount collected
            $quote->save();
        }
        $user = User::find($quote->user_id);
        $firebase_credential = (new Factory)->withServiceAccount(base_path('chatapp-notification-46f60-firebase-adminsdk-9b07x-04662b6b28.json'));
        $messaging = $firebase_credential->createMessaging();
        $token = $user->device_token;
        if($token){
            try{
                $message = CloudMessage::withTarget('token', $token)
                    ->withNotification(Notification::create('Payment successfull!', 'Thank you, Your payment is done successfully, You can seat back and track the delivery on our app.'));
                $messaging->send($message);
            }catch (\Kreait\Firebase\Exception\Messaging\NotFound $e) {
                
            } catch (\Exception $e) {
                
            }
        }
        // Optionally, you can return a view or redirect as needed
        return view('success');
    }

    public function cancel()
    {
        return 'Payment Failed';
    }

    public function purchase(Request $request)
    {
        $stripeSecretKey = config('services.stripe.secret');
        $stripe = new StripeClient($stripeSecretKey);
        $plan = Plan::find($request->id);
        $user = Auth::user();
        if ($user) {
            $redirectUrl = route('success2') . '?session_id={CHECKOUT_SESSION_ID}&plan_id=' . $plan->id;
            $response = $stripe->checkout->sessions->create([
                'success_url' => $redirectUrl,
                'cancel_url' => route('cancel'),
                'payment_method_types' => ['card'],
                'line_items' => [
                    [
                        'price_data' => [
                            'product_data' => [
                                'name' => 'Purchase Plan: ' . $plan->name,
                            ],
                            'unit_amount' => 100 * $plan->price,
                            'currency' => 'eur',
                        ],
                        'quantity' => 1
                    ],
                ],
                'mode' => 'payment',
                'allow_promotion_codes' => false
            ]);
            $user->session_id = $response->id;
            $user->save();

            return response()->json([
                'success' => true,
                'url' => $response->url
            ]);
        } else {
            return response()->json([
                'message' => 'something went wrong'
            ], 200);
        }
    }

    public function success2(Request $request)
    {
        $sessionId = $request->query('session_id');
        $planId = $request->query('plan_id');
        $plan = Plan::find($planId);
        // Retrieve the Stripe secret key from configuration
        $stripeSecretKey = config('services.stripe.secret');
        $stripe = new StripeClient($stripeSecretKey);

        // Retrieve the session details from Stripe
        $session = $stripe->checkout->sessions->retrieve($sessionId);

        // Find the quote using the session ID and update its status
        $user = User::where('session_id', $session->id)->first();
        if ($user) {
            $user->membership = $planId;
            $user->save();
        }
        $transaction = new PlanTransaction();
        $transaction->user_id = $user->id;
        $transaction->plan_id = $planId;
        $transaction->buy_date = date('Y-m-d');
        $transaction->expiry_date = date('Y-m-d', strtotime('+1 year'));
        $transaction->amount = $plan->price;
        if ($planId == 1) {
            $transaction->weight = '100';
            $transaction->count = '20';
            $transaction->meals = '12';
            $transaction->tea = '1';
            $transaction->package = '1';
        } elseif ($planId == 2) {
            $transaction->weight = '75';
            $transaction->count = '15';
            $transaction->meals = '8';
            $transaction->tea = '0';
            $transaction->package = '0';
        } else {
            $transaction->weight = '60';
            $transaction->count = '12';
            $transaction->meals = '6';
            $transaction->tea = '0';
            $transaction->package = '0';
        }
        $transaction->save();
        $transaction->plan=$plan;
        $transaction->user=$user->name;
        Mail::to($user->email)->send(new PlanAdded($transaction));
        
        $firebase_credential = (new Factory)->withServiceAccount(base_path('chatapp-notification-46f60-firebase-adminsdk-9b07x-04662b6b28.json'));
        $messaging = $firebase_credential->createMessaging();
        $token = $user->device_token;
        if($token){
            try{
                $message = CloudMessage::withTarget('token', $token)
                    ->withNotification(Notification::create('Plan upgraded!', 'Hello, Your plan is upgraded now you can enjoy the benefits.'));
                $messaging->send($message);
            } catch (\Kreait\Firebase\Exception\Messaging\NotFound $e) {
              
            } catch (\Exception $e) {
                
            }
        }
        
        return view('success');
    }



}
