<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\CityController;
use App\Http\Controllers\API\CountryController;
use App\Http\Controllers\API\DropOfPointController;
use App\Http\Controllers\API\PromotionController;
use App\Http\Controllers\API\PlansController;
use App\Http\Controllers\API\QuoteController;
use App\Http\Controllers\API\StripePaymentController;
use App\Http\Controllers\API\ThoughtController;
use App\Http\Controllers\API\OfferRequestController;
use App\Models\DropOfPoint;
use App\Models\Quote;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('emaillogin', [AuthController::class, 'emaillogin']);
Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);



Route::post('payment', [StripePaymentController::class, 'makepayment']);
Route::get('success', [StripePaymentController::class, 'success'])->name('success');
Route::get('success2', [StripePaymentController::class, 'success2'])->name('success2');
Route::get('cancel', [StripePaymentController::class, 'cancel'])->name('cancel');

Route::get('apply-plan/{quoteid}', [QuoteController::class, 'applyPlan']);

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::post('save-token', [AuthController::class, 'save_token']);
    Route::post('savequote', [QuoteController::class, 'savequote']);
    Route::get('getorder/{id}', [QuoteController::class, 'viewOrder']);
    Route::post('updatethought', [ThoughtController::class, 'updatethought']);
    Route::get('getorderbyid/{id}', [QuoteController::class, 'vieworderbyid']);
    Route::get('call-agent-quote', [QuoteController::class, 'callagent_quote']);
    Route::post('savethought', [ThoughtController::class, 'savethought']);
    Route::get('getthought', [ThoughtController::class, 'viewthought']);
    Route::post('savepromotion', [PromotionController::class, 'savepromotion']);
    Route::get('promotion', [PromotionController::class, 'getpromotion']);
    
    Route::get('user', [AuthController::class, 'userDetails']);
    Route::get('logout', [AuthController::class, 'logout']);
    Route::post('savecountry', [CountryController::class, 'savecountry']);
    Route::post('savecity', [CityController::class, 'savecity']);
    Route::post('savedropofpoint', [DropOfPointController::class, 'savedropofpoint']);
    
    Route::post('approve_meal_request/{id}', [PlansController::class, 'approveMealRequest']);
    Route::post('send_meal_request/{id}', [PlansController::class, 'sendMealRequest']);
    Route::get('show_plans_by_userid/{id}', [PlansController::class, 'showPlansByUserId']);
    Route::post('saveplan', [PlansController::class, 'saveplan']);
    Route::get('plans', [PlansController::class, 'plans']);
    Route::post('/updateprofile', [AuthController::class, 'updateprofile']);
    Route::post('/admin/assign-dropoff', [QuoteController::class, 'assignDropOffPoint']);
    Route::get('admingetquote', [QuoteController::class, 'adminviewquote']);
    Route::get('getdropofpoints', [DropOfPointController::class, 'viewdropofpoints']);
    Route::get('usergetquote/{userId}', [QuoteController::class, 'userviewquote']);
    Route::post('/confirm-payment/{quoteId}', [QuoteController::class, 'payment']);
    Route::post('/assign-quote', [QuoteController::class, 'assign_quote']);
    Route::post('/update-quote-price/{id}', [QuoteController::class, 'update_quote_price']);
    Route::post('/update-checkpoint', [QuoteController::class, 'update_checkpoint']);
    Route::get('operation-quote', [QuoteController::class, 'operation_quote']);
    Route::get('get-checkpoint/{id}', [QuoteController::class, 'get_checkpoint']);
    Route::post('/updatequote/{id}', [QuoteController::class, 'updatequote'])->name('updatequote');
    Route::post('/makepayment', [StripePaymentController::class, 'makepayment'])->name('makepayment');
    Route::post('/purchase', [StripePaymentController::class, 'purchase'])->name('purchase');
    Route::get('cancelquote/{quoteId}', [QuoteController::class, 'cancelQuote']);
    Route::get('deletepromotion/{id}', [PromotionController::class, 'deletepromotion']);
    
    Route::post('redeem-req', [PlansController::class, 'redeem_req']);
    
    Route::get('request-history', [PlansController::class, 'request_history']);
    
    Route::get('/offer-requests', [OfferRequestController::class, 'offer_request']);
    Route::post('/approve-offer-requests/{id}', [OfferRequestController::class, 'approveOfferRequest']);    
    Route::post('/deliver-offer-requests/{id}', [OfferRequestController::class, 'markAsDelivered']);
    Route::post('/reject-offer-requests/{id}', [OfferRequestController::class, 'rejectOfferRequest']);
    
});