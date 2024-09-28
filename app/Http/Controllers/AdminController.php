<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Country;
use App\Models\DropOfPoint;
use App\Models\Order;
use App\Models\Plan;
use App\Models\PlanTransaction;
use App\Models\User;
use App\Models\Promotion;
use App\Models\Quote;
use App\Models\Thought;
use App\Models\OfferRequest;
use App\Models\Checkpoint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Yajra\Datatables\Datatables;
use Carbon\Carbon;

use Illuminate\Support\Facades\Mail;
use App\Mail\QuoteAdded;
use App\Mail\CallAgentAssigned;
use App\Mail\AmountUpdated;
use App\Mail\CheckpointMarked;
use App\Mail\Delivered;
use App\Mail\DropOffPointAssigned;
use App\Mail\NewQuote;
use App\Mail\QuoteAssigned;
use Kreait\Firebase\Factory;
use Kreait\Firebase\Messaging\CloudMessage;
use Kreait\Firebase\Messaging\Notification;


use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    
     public function __construct()
    {
        $this->middleware('auth');
    }

      public function index_main()
    {
        return view('index');
    }
 public function quote_form()
    {
        return view('quote_form');
    }
    public function account_billing()
    {
        return view('account-billing');

    }
    public function send_notification()
    {
        $user=User::all();
        return view('send_notificaion',compact('user'));
    }
    public function save_notification(Request $request)
    {
        $request->validate([
            'users' => 'required',
            'title' => 'required',
            'message' => 'required'
        ]);
        $firebase_credential = (new Factory)->withServiceAccount(base_path('chatapp-notification-46f60-firebase-adminsdk-9b07x-04662b6b28.json'));
        $messaging = $firebase_credential->createMessaging();
        foreach($request->users as $i){
            $user = User::find($i);
            $token = $user->device_token;
            if ($token) {
                try {
                    $message = CloudMessage::withTarget('token', $token)
                        ->withNotification(Notification::create($request->title, $request->message));
                    $messaging->send($message);
                } catch (\Kreait\Firebase\Exception\Messaging\NotFound $e) {
                    continue; 
                } catch (\Exception $e) {
                    continue;
                }
            }
        }
        return redirect()->back()->with('success', 'Notification sended successfully!');
    }
    public function companies()
    {
        return view('companies');

    }

    public function contacts()
    {
        return view('contacts');

    }

    public function dashboard_ecommerce()
    {
        return view('dashboard-ecommerce');

    }

    public function dashboard_project_managment()
    {
        return view('dashboard-project-managment');

    }

    public function deals()
    {
        return view('deals');

    }

    public function error()
    {
        return view('error');

    }

    public function feed()
    {
        return view('feed');

    }
    
  public function offer_request(Request $request) 
{ 
    $data = OfferRequest::all();
        if ($request->ajax()) {
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('user_id', function ($row) {
                    $user = User::find($row->user_id);
                    return $user ? $user->name : 'N/A';
                })
                ->addColumn('plan', function ($row) { 
                $planTransaction = PlanTransaction::find($row->transaction_id); 
                if ($planTransaction) {
                    $plan = Plan::find($planTransaction->plan_id); 
                    return $plan ? $plan->name : 'N/A'; 
                }
                return 'N/A';
            }) 
                ->addColumn('buy', function ($row) {
                    $drop_of_points = PlanTransaction::find($row->transaction_id);
                    return $drop_of_points ? $drop_of_points->buy_date : 'N/A';
                })
                ->addColumn('expiry', function ($row) {
                    $drop_of_points = PlanTransaction::find($row->transaction_id);
                    return $drop_of_points ? $drop_of_points->expiry_date : 'N/A';
                })
                ->addColumn('meals', function ($row) {
                    $drop_of_points = PlanTransaction::find($row->transaction_id);
                    return $drop_of_points ? $drop_of_points->meals : 'N/A';
                })
                ->addColumn('tea', function ($row) {
                    $drop_of_points = PlanTransaction::find($row->transaction_id);
                    return $drop_of_points ? $drop_of_points->tea : 'N/A';
                })
                ->addColumn('package', function ($row) {
                    $drop_of_points = PlanTransaction::find($row->transaction_id);
                    return $drop_of_points ? $drop_of_points->package : 'N/A';
                })
                ->addColumn('action', function ($row) { 
                    $btn = ' &nbsp;&nbsp;<a href="javascript:void(0);" id="' . $row->id . '" class="mark-approved">✅ Mark Approved</a>';  
                    $btn .= ' &nbsp;&nbsp;<a href="javascript:void(0);" id="' . $row->id . '" class="mark-delivered">📦 Mark Delivered</a>';  
                    $btn .= ' &nbsp;&nbsp;<a href="javascript:void(0);" id="' . $row->id . '" class="mark-rejected">❌ Mark Rejected</a>';  
                    return $btn; 
                })

                ->rawColumns(['action'])
                ->make(true);
        }
        // dd($data);
    return view('offerR', compact('data')); 
}
 public function approveOfferRequest(Request $request, $id) 
{ 
    // Validate the incoming request
    $request->validate([ 
        'count_offered' => 'required|integer|min:1', // Ensure count offered is a positive integer
    ]); 

    // Find the offer request
    $offerRequest = OfferRequest::find($id); 
    if (!$offerRequest) { 
        return response()->json([ 
            'message' => 'Offer request not found.', 
        ], 404); // Return 404 if not found
    }

    // Check if the request is already approved or delivered
    if ($offerRequest->status === 'delivered') { 
        return response()->json([ 
            'message' => 'Offer Request Delivered.', 
        ], 400); // Return 400 if already delivered
    } 

    if ($offerRequest->status === 'approved') { 
        return response()->json([ 
            'message' => 'Offer request already approved.', 
        ], 400); // Return 400 if already approved
    } 

    // Get the related plan transaction
    $planTransaction = PlanTransaction::find($offerRequest->transaction_id); 
    if (!$planTransaction) { 
        return response()->json([ 
            'message' => 'Plan transaction not found for the user.', 
        ], 404); // Return 404 if not found
    } 

    // Validate based on the request type
    switch ($offerRequest->request_for) { 
        case "Meal": 
            if ((int)$planTransaction->meals < (int)$request->count_offered) { 
                return response()->json([ 
                    'message' => 'Not enough meals in the plan to fulfill the offer request.', 
                ], 400); // Return 400 for insufficient meals
            } 
            break; 

        case "Tea": 
            if ((int)$planTransaction->tea < (int)$request->count_offered) { 
                return response()->json([ 
                    'message' => 'Not enough tea in the plan to fulfill the offer request.', 
                ], 400); // Return 400 for insufficient tea
            } 
            break; 

        case "Package": 
            if ((int)$planTransaction->package < (int)$request->count_offered) { 
                return response()->json([ 
                    'message' => 'Not enough packages in the plan to fulfill the offer request.', 
                ], 400); // Return 400 for insufficient packages
            } 
            break; 

        default: 
            return response()->json([ 
                'message' => 'Invalid request type.', 
            ], 400); // Return 400 for invalid request type
    } 

    // Update the offer request details
    $offerRequest->count_offered = $request->count_offered; 
    $offerRequest->status = 'approved'; 
    $offerRequest->save(); 

    return response()->json([ 
        'message' => 'Offer request status updated to approved.', 
        'data' => $offerRequest 
    ], 200); // Return success response
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
  
   public function markAsDelivered($id) 
{ 
    // Find the offer request
    $offerRequest = OfferRequest::find($id); 
    if (!$offerRequest) { 
        return response()->json([ 
            'message' => 'Offer request not found.', 
        ], 404); // Return 404 if not found
    } 

    // Check if the request is already delivered
    if ($offerRequest->status === 'delivered') { 
        return response()->json([ 
            'message' => 'Offer Request Already Delivered.', 
        ], 400); // Return 400 if already delivered
    } 

    // Check if the request is approved
    if ($offerRequest->status !== 'approved') { 
        return response()->json([ 
            'message' => 'Cannot mark delivered until approved.', 
        ], 400); // Return 400 if not approved
    } 

    // Get the related plan transaction
    $planTransaction = PlanTransaction::find($offerRequest->transaction_id); 
    if (!$planTransaction) { 
        return response()->json([ 
            'message' => 'Plan transaction not found for the user.', 
        ], 404); // Return 404 if not found
    } 

    // Cast count_offered to an integer 
    $countOffered = (int) $offerRequest->count_offered; 

    // Validate based on the request type
    switch ($offerRequest->request_for) { 
        case "Meal": 
            $remainingMeals = (int) $planTransaction->meals - $countOffered; 
            if ($remainingMeals < 0) { 
                return response()->json([ 
                    'message' => 'Not enough meals in the plan to fulfill the offer request.', 
                ], 400); // Return 400 for insufficient meals
            } 
            $planTransaction->meals = (string) $remainingMeals; // Save as string
            break; 

        case "Tea": 
            if ((int) $planTransaction->tea < $countOffered) { 
                return response()->json([ 
                    'message' => 'Not enough tea in the plan to fulfill the offer request.', 
                ], 400); // Return 400 for insufficient tea
            } 
            $planTransaction->tea = (string) ((int) $planTransaction->tea - $countOffered); // Reduce tea count
            break; 

        case "Package": 
            if ((int) $planTransaction->package < $countOffered) { 
                return response()->json([ 
                    'message' => 'Not enough packages in the plan to fulfill the offer request.', 
                ], 400); // Return 400 for insufficient packages
            } 
            $planTransaction->package = (string) ((int) $planTransaction->package - $countOffered); // Reduce package count
            break; 

        default: 
            return response()->json([ 
                'message' => 'Invalid request type.', 
            ], 400); // Return 400 for invalid request type
    } 

    // Save the transaction changes
    $planTransaction->save(); 

    // Mark the offer request as delivered
    $offerRequest->status = 'delivered'; 
    $offerRequest->save(); 

    // Prepare remaining count based on request type
    $remainingCount = null; 
    if ($offerRequest->request_for === 'Meal') { 
        $remainingCount = $planTransaction->meals; 
    } elseif ($offerRequest->request_for === 'Tea' || $offerRequest->request_for === 'Package') { 
        $remainingCount = '0'; // Since both are reduced to 0
    } 

    return response()->json([ 
        'message' => 'Offer request marked as delivered and count updated.', 
        'data' => [ 
            'offer_request' => $offerRequest, 
            'remaining_count' => $remainingCount 
        ] 
    ], 200); // Return success response
}


    
    public function add_checkpoints()
    {
        
        $dop=Quote::all();
        return view('add_checkpoints',compact('dop'));

    }
    public function new_checkpoints(Request $request)
    {
    // Validate the incoming request
    $request->validate([
        'quote' => 'required|array',
        'title' => 'required|string|max:255',
        'address' => 'required|string|max:255',
        'date' => 'required|date',
        'time' => 'required',
        'country' => 'required|string|max:100',
    ]);

    // Loop through each quote ID in the 'quote' array
    foreach ($request->quote as $quoteId) {
        // Find the Quote model for the given quote ID
        $quote = Quote::find($quoteId);
        $user=User::find($quote->user_id);
        if ($quote) {
            // Create a new Checkpoint instance
            $checkpoint = new Checkpoint();
            $checkpoint->quote_id = $quoteId;
            $checkpoint->title = $request->title;
            $checkpoint->address = $request->address;
            $checkpoint->date = $request->date;
            $checkpoint->time = $request->time;
            $checkpoint->country = $request->country;

            // Save the checkpoint to the database
            $checkpoint->save();
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
        }
    }

    // Redirect back with a success message
    return redirect()->back()->with('success', 'Checkpoints added successfully.');
}

    public function orders(Request $request)
    {
        $data = Order::all();
        if ($request->ajax()) {
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    $btn = ' <a data-bs-toggle="modal" href="#editModal' . $row->id . '">✏️</a>';
                    $btn = $btn . ' &nbsp;&nbsp;<a href="javascript:void(0);" id="' . $row->id . '" class="delete">🗑️</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('orders', compact('data'));


    }

    public function quote(Request $request)
    {
        $dropofPoints = DropofPoint::all();
        $data = Quote::all();
        
        if ($request->ajax()) {
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('user_id', function ($row) {
                    $user = User::find($row->user_id);
                    return $user ? $user->name : 'N/A';
                })
                ->addColumn('drop_of_points', function ($row) {
                    $drop_of_points = DropOfPoint::find($row->drop_of_points);
                    return $drop_of_points ? $drop_of_points->name : 'N/A';
                })
                ->addColumn('action', function ($row) {
                    $btn = '<a data-bs-toggle="modal" href="#editModal' . $row->id . '">✏️</a>';
                    $btn .= ' &nbsp;&nbsp;<a href="javascript:void(0);" id="' . $row->id . '" class="delete">🗑️</a>';
                    $btn .= ' &nbsp;&nbsp;<a href="' . route('view-quote', $row->id) . '" class="view"> 🧿 </a>';
                
                    return $btn;
                })

                ->rawColumns(['action'])
                ->make(true);
        }
        return view('quote', compact('data', 'dropofPoints'));


    }
    public function save_quote(Request $request)
{
    // Validation
    // dd($request->all());
    $validator = Validator::make($request->all(), [
        'service_type' => 'required',
        'additional_services' => 'nullable',
        'sender_name' => 'required',
        'sender_phone' => 'required',
        'sender_email' => 'required',
        'sender_id' => 'required',
        'sender_pickup_address' => 'required',
        'sender_street_address' => 'nullable',
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
        'sender_image' => 'required',
    ]);

    // Handle file upload
    $filename = null;
    if ($request->hasFile('sender_image')) {
        $file = $request->file('sender_image');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('QuoteImages'), $filename);
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
    $userId = auth()->user()->id;
        $quote = new Quote();
        $quote->user_id = $userId;
        $quote->track_id = $transactionId;
        $quote->service_type = $request->service_type;
        $quote->additional_services = $request->input('additional_services');
        $quote->sender_name = $request->input('sender_name');
        $quote->sender_phone = $request->input('sender_phone');
        $quote->sender_email = $request->input('sender_email');
        $quote->sender_id = $request->input('sender_id');
        $quote->sender_image = $filename;
        $quote->sender_pickup_address = $request->input('sender_pickup_address');
        $quote->sender_street_address = $request->input('sender_street_address');
        $quote->sender_city = $request->input('receiver_city');
        $quote->sender_state = $request->input('receiver_state');
        $quote->sender_country = $request->input('receiver_country');
        $quote->receiver_delivery_address = "dummy";
        $quote->receiver_street_address = "dummy";
        $quote->receiver_city = $request->input('receiver_city');
        $quote->receiver_state = $request->input('receiver_state');
        $quote->receiver_pin_code= $request->input('postal_code');
        $quote->sender_pin_code= $request->input('postal_code');
        $quote->receiver_country = $request->input('receiver_country');
        $quote->number_of_parcels = $request->input('number_of_parcels');
        $quote->weight = $request->input('weight');
        $quote->length = $request->input('length');
        $quote->height = $request->input('height');
        $quote->width = $request->input('width');
        $quote->content = $request->input('content');
        $quote->item_value = $request->input('item_value');
        $quote->insurance_level = $request->input('insurance_level');
        // dd($quote);
        // Finally, save the quote
       

// dd("ih");
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

    // Set the initial status
    $quote->status = 'Pending';
    $quote->is_assigned=true;
    $quote->drop_of_points=DropOfPoint::where('assigned_callagent',$userId)->value('id');
    
    // $quote->checkpoint = 'Pending';
 $quote->save();
    return redirect()->back()->with('success', 'Quote Added successfully.');
}

    public function delete_quote(Request $request)
    {
        $quote = Quote::find($request->id);
        $quote->delete();
        return response()->json(['success', true]);
    }

    public function assignpoints(Request $request)
    {
        $request->validate([
            'quote_id' => 'required',
            'drop_of_points' => 'required',
        ]);

        $quote = Quote::find($request->quote_id);
        $quote->drop_of_points = $request->drop_of_points;
        $quote->save();

        return redirect()->route('quote')->with('success', 'Drop-off point assigned successfully.');
    }


    public function invoice()
    {
        return view('invoice');

    }
    public function view_quote($id)
    {
        $quote=Quote::find($id);
        return view('view_quote',compact('quote'));

    }
    public function checkpoints(Request $request, $id)
    {
        $quotes = Quote::all();
        $data = CheckPoint::where('quote_id', $id)->get();
        $name = Quote::find($id);
        if ($request->ajax()) {
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    $btn = ' <a data-bs-toggle="modal" href="#editModal' . $row->id . '">✏️</a>';
                    $btn = $btn . ' &nbsp;&nbsp;<a href="javascript:void(0);" id="' . $row->id . '" class="delete">🗑️</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('checkpoints', compact('data', 'quotes', 'id', 'name'));
    }

    public function country(Request $request)
    {
        $data = Country::all();
        if ($request->ajax()) {
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    // $btn = ' <a data-bs-toggle="modal" href="#editModal' . $row->id . '">✏️</a>';
                    // $btn = $btn . ' &nbsp;&nbsp;<a href="javascript:void(0);" id="' . $row->id . '" class="delete">🗑️</a>';
                    $btn = '<a class="btn btn-primary text-black" href="' . route('city', ['id' => $row->id]) . '">City</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('country', compact('data'));

    }

    public function save_country(Request $request)
    {
        $request->validate([
            'name' => 'required',

        ]);


        $country = new Country();
        $country->name = $request->input('name');

        $country->save();

        return redirect()->back()->with('success', 'Country submitted successfully.');
    }

    public function update_country(Request $request, $id)
    {

        $request->validate([
            'name' => 'required',

        ]);
        $country = Country::find($id);
        $country->name = $request->input('name');

        $country->save();

        return redirect()->back()->with('success', 'Country updated successfully.');
    }

    public function delete_country(Request $request)
    {
        $country = Country::find($request->id);
        $country->delete();
        return response()->json(['success', true]);
    }



    public function city(
        Request $request,
        $id

    ) {
        $data = City::where('country_id', $id)->get();
        $name = Country::find($id);
        // $cities = City::all();
        if ($request->ajax()) {
            return DataTables::of($data)
                ->addIndexColumn()

                ->addColumn('country_id', function ($row) {
                    $country = Country::find($row->country_id);
                    return $country ? $country->name : 'N/A';
                })

                ->addColumn('action', function ($row) {

                    $btn = ' <a data-bs-toggle="modal" href="#editModal' . $row->id . '">✏️</a>';
                    $btn = $btn . ' &nbsp;&nbsp;<a href="javascript:void(0);" id="' . $row->id . '" class="delete">🗑️</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('city', compact('data', 'id', 'name'));

    }

    public function save_city(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',

        ]);

        $city = new City();
        $city->country_id = $id;
        $city->name = $request->input('name');

        $city->save();

        return redirect()->back()->with('success', 'Country submitted successfully.');
    }

    public function update_city(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',

        ]);

        $city = City::find($id);
        $city->country_id = $id;
        $city->name = $request->input('name');

        $city->save();

        return redirect()->back()->with('success', 'Country submitted successfully.');
    }

    public function delete_city(Request $request)
    {
        $city = City::find($request->id);
        $city->delete();
        return response()->json(['success', true]);
    }


    public function drop_of_points(Request $request)
    {
        $callAgents = User::where('role', 'call agent')->get(); // Adjust the query based on your schema
        $data = DropOfPoint::all();
        if ($request->ajax()) {
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    $btn = ' <a data-bs-toggle="modal" href="#editModal' . $row->id . '">✏️</a>';
                    $btn = $btn . ' &nbsp;&nbsp;<a href="javascript:void(0);" id="' . $row->id . '" class="delete">🗑️</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('drop-of-points', compact('data', 'callAgents'));

    }

    public function savepoints(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'number' => 'required',
            'longitude' => 'required',
            'latitude' => 'required',

        ]);

        $points = new DropOfPoint();
        $points->name = $request->input('name');
        $points->address = $request->input('address');
        $points->number = $request->input('number');
        $points->longitude = $request->input('longitude');
        $points->latitude = $request->input('latitude');


        $points->save();

        return redirect()->back()->with('success', 'dropofpoints submitted successfully.');
    }

     public function updatepoints(Request $request, $id)
    {
        $request->validate([
            // 'name' => 'required',
            // 'address' => 'required',
            // 'number' => 'required',
            // 'longitude' => 'required',
            // 'latitude' => 'required',

        ]);

        $points = DropOfPoint::find($id);
        $points->name = $request->input('name');
        $points->address = $request->input('address');
        $points->number = $request->input('number');
        $points->longitude = $request->input('longitude');
        $points->latitude = $request->input('latitude');
        $points->assigned_callagent = $request->input('assigned_callagent');


        $points->save();

        return redirect()->back()->with('success', 'dropofpoints submitted successfully.');

    }

    public function deletepoints(Request $request)
    {
        $points = DropOfPoint::find($request->id);
        $points->delete();
        return response()->json(['success', true]);
    }

     public function savecallagent(Request $request)
    {
        // Validate the request
        $request->validate([
            'dropofpoints_id' => 'required',
            'assigned_callagent' => 'required',
        ]);

        // Retrieve the drop-off point by ID
        $dropofpoints = DropOfPoint::find($request->dropofpoints_id);

        // Check if the drop-off point exists
        if (!$dropofpoints) {
            return redirect()->back()->with('error', 'Drop Off Point not found.');
        }

        // Assign the selected call agent to the drop-off point
        $dropofpoints->assigned_callagent = $request->assigned_callagent;
        $callagent=User::where('id',$request->assigned_callagent)->first();
        // Save the changes
        $dropofpoints->save();
        $dropofpoints->user=$callagent->name;
        
        Mail::to($callagent->email)->send(new CallAgentAssigned($dropofpoints));
        // Mail::to($callagent->email)->send(new QuoteAdded($quote));
        return redirect()->back()->with('success', 'Call Agent assigned successfully.');
    }

    public function plan(Request $request)
    {
        $data = Plan::all();
        if ($request->ajax()) {
            return DataTables::of($data)
                ->addIndexColumn()
                // ->addColumn('action', function ($row) {

                //     $btn = ' <a data-bs-toggle="modal" href="#editModal' . $row->id . '">✏️</a>';
                //     $btn = $btn . ' &nbsp;&nbsp;<a href="javascript:void(0);" id="' . $row->id . '" class="delete">🗑️</a>';
                //     return $btn;
                // })
                // ->rawColumns(['action'])
                ->make(true);
        }
        return view('plan', compact('data'));

    }

    public function save_plan(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'benefits' => 'required',
            'bg_color' => 'required',
            'text_color' => 'required',
            'color' => 'required',

        ]);

        $plan = new Plan();
        $plan->name = $request->input('name');
        $plan->price = $request->input('price');
        $plan->benefits = $request->input('benefits');
        $plan->bg_color = $request->input('bg_color');
        $plan->text_color = $request->input('text_color');
        $plan->color = $request->input('color');


        $plan->save();

        return redirect()->back()->with('success', 'plans submitted successfully.');
    }

    public function update_plan(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'benefits' => 'required',
            'bg_color' => 'required',
            'text_color' => 'required',
            'color' => 'required',

        ]);

        $plan = Plan::find($id);
        $plan->name = $request->input('name');
        $plan->price = $request->input('price');
        $plan->benefits = json_decode($request->input('benefits'));
        $plan->bg_color = $request->input('bg_color');
        $plan->text_color = $request->input('text_color');
        $plan->color = $request->input('color');


        $plan->save();

        return redirect()->back()->with('success', 'plans submitted successfully.');
    }

    public function delete_plan(Request $request)
    {
        $plan = Plan::find($request->id);
        $plan->delete();
        return response()->json(['success', true]);
    }

    public function thought(Request $request)
    {
        $data = Thought::all();
        if ($request->ajax()) {
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    $btn = ' <a data-bs-toggle="modal" href="#editModal' . $row->id . '">✏️</a>';
                    $btn = $btn . ' &nbsp;&nbsp;<a href="javascript:void(0);" id="' . $row->id . '" class="delete">🗑️</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('thought', compact('data'));

    }

    public function save_thought(Request $request)
    {
        $request->validate([
            // 'quote' => 'required',
            'thought' => 'required',

        ]);

        $thoughts = new Thought();
        // $thoughts->quote = $request->input('quote');
        $thoughts->thought = $request->input('thought');
        $thoughts->save();

        return redirect()->back()->with('success', 'thought submitted successfully.');
    }

    public function update_thought(Request $request, $id)
    {

        $request->validate([
            // 'quote' => 'required',
            'thought' => 'required',
        ]);


        $thoughts = Thought::find($id);


        // $thoughts->quote = $request->input('quote');
        $thoughts->thought = $request->input('thought');


        $thoughts->save();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Thought updated successfully.');

    }



    public function delete_thought(Request $request)
    {
        $thought = Thought::find($request->id);
        $thought->delete();
        return response()->json(['success', true]);
    }


    public function promotions(Request $request)
    {
        $data = Promotion::all();
        if ($request->ajax()) {
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    $btn = ' <a data-bs-toggle="modal" href="#editModal' . $row->id . '">✏️</a>';
                    $btn = $btn . ' &nbsp;&nbsp;<a href="javascript:void(0);" id="' . $row->id . '" class="delete">🗑️</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('promotions', compact('data'));

    }

    public function save_promotion(Request $request)
    {
        $request->validate([
            // 'type' => 'required',
            // 'images.*' => 'required',
            // 'caption' => 'required',
            // 'video_link' => 'required',
            // 'shorts_link' => 'required',

        ]);

       

        $promotion = new Promotion();
        $promotion->type = $request->input('type');
        $promotion->caption = $request->input('caption');
        $promotion->video_link = $request->input('video_link');
        $promotion->shorts_link = $request->input('shorts_link');
        // Initialize an array to store the paths of uploaded images
        $imagePaths = [];

        // Check if images are uploaded
        if ($request->hasFile('images')) {
            $count = 1;
            foreach ($request->file('images') as $image) {
                if ($image->isValid()) {
                    $filename = time() . '_' . $count . $image->getClientOriginalName();
                    $image->move('PromotionImages/', $filename);
                    $imagePaths[] = $filename;
                    $count++;
                }
            }

            // If images were uploaded, encode the paths and update the promotion
            if (!empty($imagePaths)) {
                $jsonImages = json_encode($imagePaths);
                $promotion->images = $jsonImages; // Store JSON string of image paths
            }
        }


        $promotion->save();

        return redirect()->back()->with('success', 'promotion created successfully.');
    }

   public function update_promotion(Request $request, $id)
    {
        // Validate the other required fields, but do not make images required
        $request->validate([
            // 'type' => 'required',
            // 'caption' => 'required',
            // 'video_link' => 'required',
            // 'shorts_link' => 'required',
        ]);

        $promotion = Promotion::find($id);

       

        // Update the other fields
        $promotion->type = $request->input('type');
        $promotion->caption = $request->input('caption');
        $promotion->video_link = $request->input('video_link');
        $promotion->shorts_link = $request->input('shorts_link');

        // Save the promotion
        $promotion->save();

        return redirect()->back()->with('success', 'Promotion updated successfully.');
    }

    public function delete_promotion(Request $request)
    {
        $promotion = Promotion::find($request->id);
        $promotion->delete();
        return response()->json(['success', true]);
    }

    public function assign(Request $request)
    {
        // $data = Quote::where('is_assigned', true)->get();
          $data = Quote::where('is_assigned', true)
           ->where('status', ['Pending', 'Processing'])
           ->get();
        if ($request->ajax()) {
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = ' <a data-bs-toggle="modal" href="#editModal' . $row->id . '">✏️</a>';
                    $btn = $btn . ' &nbsp;&nbsp;<a href="javascript:void(0);" id="' . $row->id . '" class="delete">🗑️</a>';
                    $btn .= ' &nbsp;&nbsp;<a href="' . route('view-quote', $row->id) . '" class="view">🔍 </a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('assign', compact('data'));
    }

   public function saveamount(Request $request)
    {
        // dd("hi");
        $request->validate([
            'quote_id' => 'required',
            'total' => 'required',
        ]);

        $quote = Quote::find($request->quote_id);
        $quote->total = $request->total;
        $quote->due = $request->total;
        $amount = (int) $quote->total;
        $x = floor($amount / 100);
        $quote->loyality_points = 5 * $x;
        $quote->save();
        $user=User::where('id',$quote->user_id)->first();
        $quote->user=$user->name;
        Mail::to($user->email)->send(new AmountUpdated($quote));
        
        $firebase_credential = (new Factory)->withServiceAccount(base_path('chatapp-notification-46f60-firebase-adminsdk-9b07x-04662b6b28.json'));
        $messaging = $firebase_credential->createMessaging();
        $token = $user->device_token;
        if($token){
            try{
                $message = CloudMessage::withTarget('token', $token)
                    ->withNotification(Notification::create('Amount updated!', 'Hello, Please check the quotation amount!'));
                $messaging->send($message);
            } catch (\Kreait\Firebase\Exception\Messaging\NotFound $e) {
                
            } catch (\Exception $e) {
                
            }
        }
        return redirect()->route('assign')->with('Quotation amount updated successfully!');
    }

    public function dashboard()
    {
        return view('dashboard');
    }

    public function role(Request $request)
    {
        $data = User::where('role', '!=', 'admin')->get();
        if ($request->ajax()) {
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('membership', function ($row){
                    if($row->membership){
                        $plan = Plan::find($row->membership);
                        return $plan->name;
                    }else{
                        return 'None';
                    }
                })
                ->addColumn('action', function ($row) {
                    // Define the buttons with IDs and classes
                    $operationBtn = '<button class="btn btn-outline-info operation_btn_ajax" data-id="' . $row->id . '" title="Assign operation">Operation</button>';
                    $callagentBtn = '<button class="btn btn-outline-info callagent_btn_ajax" data-id="' . $row->id . '" title="Assign callagent">Callagent</button>';
                    $deleteBtn = '<a href="javascript:void(0);" id="' . $row->id . '" class="delete btn btn-outline-danger" title="Delete">🗑️</a>';
                    // Combine all buttons into one column
                    $btn = $operationBtn . ' ' . $callagentBtn . ' ' . $deleteBtn;
                    return $btn;
                })
                ->rawColumns(['membership', 'action'])
                ->make(true);
        }
        return view('role', compact('data'));
    }

    public function assignOperation(Request $request)
    {
        $user = User::find($request->user_id);
        // Logic to assign operation role
        $user->role = 'operation'; // Example
        $user->save();

        return response()->json(['success' => true]);
    }

    public function assignCallagent(Request $request)
    {
        $user = User::find($request->user_id);
        // Logic to assign callagent role
        $user->role = 'call agent'; // Example
        $user->save();

        return response()->json(['success' => true]);
    }

    public function delete_role(Request $request)
    {
        $user = User::find($request->id);
        $user->delete();

        return response()->json(['success' => true]);
    }

    public function operation_dashboard()
    {
        return view('operation-dashboard');
    }

    public function assignquotes(Request $request)
    {
        $quotes = Quote::where('is_assigned', true)->where('status','Transit')->get();
        $quotes2 = Quote::where('is_assigned', false)->get();
        $quotes3 = Quote::where('is_assigned', true)
               ->where('status', '!=', 'Transit')
               ->get();

        $data= DropOfPoint::all();
       

        if ($request->ajax()) {
            return DataTables::of($quotes)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
    // Button to open the modal for adding checkpoints
    $addCheckpointBtn = '<a data-bs-toggle="modal" href="#editModal' . $row->id . '" class="btn btn-outline-info assign-checkpoints-btn">Add Checkpoint</a>';
    
    // Button to view checkpoints
    $viewCheckpointsBtn = '<a href="' . route('checkpoints', ['id' => $row->id]) . '" class="btn btn-outline-success" title="View Checkpoints">👁️ View Checkpoints</a>';
    
    // Button to add shipping date
    $assignQuote = '<a href="javascript:void(0);" id="' . $row->id . '" class="assign btn btn-outline-danger" title="Assign Shipping Date">Add Shipping Date️</a>';
    
    // Button to modify status
    $modifyStatusBtn = '<a href="javascript:void(0);" id="' . $row->id . '" class="modify btn btn-outline-warning" title="Modify Status">✏️ Mark Delivered</a>';

    // Combine all buttons
    return $addCheckpointBtn . ' ' . $viewCheckpointsBtn . ' ' . $assignQuote . ' ' . $modifyStatusBtn;
})

                ->rawColumns(['action'])
                ->make(true);
        }

        return view('assignquotes', compact( 'quotes', 'quotes2','quotes3','data'));
    }
    
  public function modifyStatus(Request $request)
{
    $request->validate([
        'id' => 'required|integer',
    ]);

    $id = $request->input('id');

    try {
        // Assuming you have a model called Quote and a field named status
        $quote = Quote::find($id); // Ensure you are referencing the correct model
        if ($quote) {
            $quote->status = "Delivered"; // Update status to 'Delivered'
            $quote->save();

            // Create new Checkpoint record
            $checkpoint = new Checkpoint();
            $checkpoint->quote_id = $quote->id; // Use $quote->id instead of $request->input('id')
            $checkpoint->title = "Delivered";
            
            // Concatenate the address fields correctly
            $checkpoint->address = $quote->receiver_delivery_address . " " .
                                   $quote->receiver_street_address . " " .
                                   $quote->receiver_city . " " .
                                   $quote->receiver_state . " " .
                                   $quote->receiver_country;
            
            // Set the current date and time
            $checkpoint->date = Carbon::now()->toDateString(); // Sets current date (Y-m-d)
            $checkpoint->time = Carbon::now()->toTimeString(); // Sets current time (H:i:s)
            $checkpoint->country = $quote->receiver_country;
            $checkpoint->save();
            $checkpoint->quote=$quote;
            $user=User::find($quote->user_id);
            Mail::to($user->email)->send(new Delivered($checkpoint));
            $firebase_credential = (new Factory)->withServiceAccount(base_path('chatapp-notification-46f60-firebase-adminsdk-9b07x-04662b6b28.json'));
            $messaging = $firebase_credential->createMessaging();
            $token = $user->device_token;
            if($token){
                try{
                    $message = CloudMessage::withTarget('token', $token)
                        ->withNotification(Notification::create('Checkpoint updated!', 'Hello, Your parcel is delivered successfully!'));
                    $messaging->send($message);
                } catch (\Kreait\Firebase\Exception\Messaging\NotFound $e) {
                     
                } catch (\Exception $e) {
                    
                }
            }
            return response()->json(['success' => true, 'message' => 'Status updated successfully.']);
        } else {
            return response()->json(['success' => false, 'message' => 'Order not found.']);
        }
    } catch (\Exception $e) {
        return response()->json(['success' => false, 'message' => 'An error occurred while updating the status.']);
    }
}


     public function assignquotes2(Request $request)
{
    $quotes = Quote::where('is_assigned', false)->get();
  
    if ($request->ajax()) {
        return DataTables::of($quotes)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                // Create a button with data attribute containing the quote ID
                $btn = '<a data-bs-toggle="modal" href="#editModal2' . $row->id . '" class="btn btn-outline-info assign-dropoff-btn">Assign</a>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }
}
public function assignquotes3(Request $request)
{$quotes3 = Quote::where('is_assigned', true)
               ->where('status', '!=', 'Transit')
               ->get();

  
    if ($request->ajax()) {
        return DataTables::of($quotes3)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                // Create a button with data attribute containing the quote ID
                 $addCheckpointBtn = '<a data-bs-toggle="modal" href="#editModal' . $row->id . '" class="btn btn-outline-info assign-checkpoints-btn">Add Checkpoint</a>';
    
    // Button to view checkpoints
    $viewCheckpointsBtn = '<a href="' . route('checkpoints', ['id' => $row->id]) . '" class="btn btn-outline-success" title="View Checkpoints">👁️ View Checkpoints</a>';
    
    // Button to add shipping date
    $assignQuote = '<a href="javascript:void(0);" id="' . $row->id . '" class="assign btn btn-outline-danger" title="Assign Shipping Date">Add Shipping Date️</a>';
    
    // Button to modify status
    

    // Combine all buttons
    return  $viewCheckpointsBtn ;
            })
            ->rawColumns(['action'])
            ->make(true);
    }
}


  public function save_dropofpoint($id, Request $request)
  {  
        $quotes = Quote::find($id);
        $quotes->drop_of_points = $request->input('drop_of_points');
        $quotes->is_assigned= 1;
        $dop=DropOfPoint::find($quotes->drop_of_points);
        
        $ca=User::find($dop->assigned_callagent);
        $quotes->save();
        $quotes->dop=$dop;
        $quotes->ca=$ca;
        
        $quotes->user=User::find($quotes->user_id);
        Mail::to($quotes->user->email)->send(new DropOffPointAssigned($quotes));
        Mail::to($ca->email)->send(new QuoteAssigned($quotes));
        
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
        
        
       return redirect()->back()->with('success', 'Dropofpoints assigned successfully');
    }

     public function save_shipping_date(Request $request)
    {
       $request->validate([
            'id' => 'required|integer|exists:quotes,id',
            'shipping_date' => 'nullable|date' // Allow null or date
        ]);

        $quote = Quote::find($request->input('id'));
        if ($quote) {
            $quote->shipping_date = $request->input('shipping_date') ?: null;
            $quote->save();

            return response()->json(['success' => true, 'message' => 'Shipping date updated successfully.']);
        } else {
            return response()->json(['success' => false, 'message' => 'Quote not found.']);
        }
    }

    public function save_checkpoints(Request $request)
    {
        if($request->title){
            $request->validate([
                'quote_id' => 'required',
                'title' => 'required',
                'address' => 'required',
                'date' => 'required',
                'time' => 'required',
                'country' => 'required',
            ]);
    
            $checkpoint = new Checkpoint();
            $checkpoint->quote_id = $request->input('quote_id');
            $checkpoint->title = $request->input('title');
            $checkpoint->address = $request->input('address');
            $checkpoint->date = $request->input('date');
            $checkpoint->time = $request->input('time');
            $checkpoint->country = $request->input('country');
            $checkpoint->save();
            $quote = Quote::find($checkpoint->quote_id);
            $user=User::find($quote->user_id);
            $checkpoint->user=$user;
            $checkpoint->quote=$quote;
            
            Mail::to($user->email)->send(new CheckpointMarked($checkpoint));
            // $quote = Quote::find($request->quote_id);
            // $quote->status = 'delivered';
            // $quote->save();
            
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
    
            return redirect()->back()->with('success', 'Checkpoint saved successfully');
        }
        else{
           $quote = Quote::find($request->quote_id);
           $quote->drop_of_points = $request->drop_of_points;
           $quote->save();
           return redirect()->back()->with('success', 'Drop Off Point updated successfully');
        }
    }

    public function update_checkpoints(Request $request, $id)
    {
        //dd($request->all());
        $request->validate([
            'quote_id' => 'required',
            'title' => 'required',
            'address' => 'required',
            'date' => 'required',
            'time' => 'required',
            'country' => 'required',
        ]);

        $checkpoint = Checkpoint::find($id);
        $checkpoint->quote_id = $request->input('quote_id');
        $checkpoint->title = $request->input('title');
        $checkpoint->address = $request->input('address');
        $checkpoint->date = $request->input('date');
        $checkpoint->time = $request->input('time');
        $checkpoint->country = $request->input('country');
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
        
        if($request->status !== "Placed" && $request->status !== "Delivered" ){
            $quote = Quote::find($request->quote_id);
            $quote->status = 'Transit';
            $quote->save();
        }
        $checkpoint->save();


        return redirect()->back()->with('success', 'Checkpoint saved successfully');
    }

    public function delete_checkpoints(Request $request)
    {
        $checkpoint = CheckPoint::find($request->id);
        $checkpoint->delete();

        return response()->json(['success' => true]);
    }
    
      public function update_assign(Request $request, $id)
    {

        // Validate the request
        $request->validate([
            // 'user_id' => 'required',
            // 'track_id' => 'required',
            // 'service_type' => 'required',
            // 'container_transport' => 'required',
            // 'parcel_deliveries' => 'required',
            // 'additional_services' => 'required',
            // 'sender_name' => 'required',
            // 'sender_phone' => 'required',
           
        ]);

        // Find the quote by ID
        $quote = Quote::findOrFail($id);

        // Update the quote with the request data
        $quote->user_id = $request->input('user_id');
        $quote->track_id = $request->input('track_id');
        $quote->service_type = $request->input('service_type');
        $quote->container_transportation = $request->input('container_transportation') ? 1 : 0;
        $quote->parcel_deliveries = $request->input('parcel_deliveries') ? 1 : 0;
        $quote->additional_services = $request->input('additional_services');
        $quote->sender_name = $request->input('sender_name');
        $quote->sender_phone = $request->input('sender_phone');
        $quote->sender_email = $request->input('sender_email');
        $quote->sender_id = $request->input('sender_id');
        $quote->sender_pickup_address = $request->input('sender_pickup_address');
        $quote->sender_street_address = $request->input('sender_street_address');
        $quote->sender_city = $request->input('sender_city');
        $quote->sender_state = $request->input('sender_state');
        $quote->sender_country = $request->input('sender_country');
        $quote->receiver_delivery_address = $request->input('receiver_delivery_address');
        $quote->receiver_street_address = $request->input('receiver_street_address');
        $quote->receiver_city = $request->input('receiver_city');
        $quote->receiver_state = $request->input('receiver_state');
        $quote->receiver_country = $request->input('receiver_country');
        $quote->number_of_parcels = $request->input('number_of_parcels');
        $quote->weight = $request->input('weight');
        $quote->length = $request->input('length');
        $quote->height = $request->input('height');
        $quote->width = $request->input('width');
        $quote->content = $request->input('content');
        $quote->item_value = $request->input('item_value');
        $quote->insurance_level = $request->input('insurance_level');
        $quote->total = $request->input('total');

        // Handle file upload if present
        if ($request->hasFile('sender_image')) {
            $image = $request->file('sender_image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $quote->sender_image = $imageName;
        }

        // Save the updated quote
        $quote->save();

        // Redirect or respond as necessary
        return redirect()->route('assign')->with('success', 'Quote updated successfully!');
    }
    
    
    public function update_quote(Request $request, $id)
    {
        // Log::info($request->all());
        // dd($request->all());
        // Validate the request
        $request->validate([
            'service_type' => 'required|string',
            'container_transportation' => 'required|string',
            'parcel_deliveries' => 'required|string',
            'sender_name' => 'required|string',
            'sender_phone' => 'required|string',
            'sender_email' => 'required|string',
            'sender_id' => 'required|string',
            'sender_city' => 'required|string',
            'sender_state' => 'required|string',
            'sender_country' => 'required|string',
            'total' => 'required|string',
            // 'drop_of_points' => 'required|string',
            'insurance_level' => 'required|string',
            'content' => 'required|string',
            'width' => 'required|string',
            'height' => 'required|string',
            'length' => 'required|string',
            'weight' => 'required|string',
            'number_of_parcels' => 'required|string',
            'receiver_country' => 'required|string',
            'receiver_state' => 'required|string',
            'receiver_city' => 'required|string',
            'receiver_street_address' => 'required|string',
            'receiver_delivery_address' => 'required|string',
            'sender_street_address' => 'required|string',
            'sender_pickup_address' => 'required|string',
            // 'business_name' => 'required|string',
            'item_value' => 'required|string',
        ]);
        
        // Find the quote by ID
        $quote = Quote::findOrFail($id);
    
        // Update the quote with the request data
        $quote->user_id = $request->input('user_id');
        $quote->container_transportation = $request->input('container_transportation') ? 1 : 0;
        $quote->parcel_deliveries = $request->input('parcel_deliveries') ? 1 : 0;
        if($request->service_type=="3PL SERVICES")
        {
        $quote->additional_services = $request->input('additional_services');
        }
        if($quote->service_type != $request->input('service_type'))
        {
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
            $quote->track_id=$transactionId;
        }
            
        $quote->service_type = $request->input('service_type');
        $quote->sender_name = $request->input('sender_name');
        $quote->sender_phone = $request->input('sender_phone');
        $quote->sender_email = $request->input('sender_email');
        $quote->sender_id = $request->input('sender_id');
        $quote->sender_pickup_address = $request->input('sender_pickup_address');
        $quote->sender_street_address = $request->input('sender_street_address');
        $quote->sender_city = $request->input('sender_city');
        $quote->sender_state = $request->input('sender_state');
        $quote->sender_country = $request->input('sender_country');
        $quote->receiver_delivery_address = $request->input('receiver_delivery_address');
        $quote->receiver_street_address = $request->input('receiver_street_address');
        $quote->receiver_city = $request->input('receiver_city');
        $quote->receiver_state = $request->input('receiver_state');
        $quote->receiver_country = $request->input('receiver_country');
        $quote->number_of_parcels = $request->input('number_of_parcels');
        $quote->weight = $request->input('weight');
        $quote->length = $request->input('length');
        $quote->height = $request->input('height');
        $quote->width = $request->input('width');
        $quote->content = $request->input('content');
        $quote->item_value = $request->input('item_value');
        $quote->insurance_level = $request->input('insurance_level');
        $quote->total = $request->input('total');
        $prev_loyality_points = $quote->loyality_points;
        $amount = (int) $quote->total;
        $x = floor($amount / 100);
        $quote->loyality_points = 5 * $x;
        // $user = User::find($request->input('user_id'));
        // if ($quote->loyality_points > $prev_loyality_points) {
        //     $user->loyality_points += $quote->loyality_points - $prev_loyality_points;
        // } else {
        //     $user->loyality_points -= $prev_loyality_points - $quote->loyality_points;
        // }

        // $user->save();

        // Handle file upload if present

        if ($request->hasFile('sender_image')) {
            $image = $request->file('sender_image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $quote->sender_image = $imageName;
        }

        // Save the updated quote
        $quote->save();


        // Redirect or respond as necessary
        return redirect()->back()->with('success', 'Quote updated successfully!');
    }



}
