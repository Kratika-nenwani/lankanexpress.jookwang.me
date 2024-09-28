<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\API\QuoteController;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/deeplink', function () { return 'yes'; });
Route::get('thank-you', function(){return view('thankyou');})->name('thank-you');

Route::get("/", [AdminController::class, "index_main"])->name('index_main');
Route::get("/account-billing", [AdminController::class, "account_billing"])->name('account-billing');
Route::get("/companies", [AdminController::class, "companies"])->name('companies');
Route::get("/contacts", [AdminController::class, "contacts"])->name('contacts');
Route::get("/dashboard-ecommerce", [AdminController::class, "dashboard_ecommerce"])->name('dashboard-ecommerce');
Route::get("/dashboard-project-managment", [AdminController::class, "dashboard_project_managment"])->name('dashboard-project-managment');
Route::get("/deals", [AdminController::class, "deals"])->name('deals');
Route::get("/error", [AdminController::class, "error"])->name('error');
Route::get("/feed", [AdminController::class, "feed"])->name('feed');
Route::get("/invoice", [AdminController::class, "invoice"])->name('invoice');
Route::get("/orders", [AdminController::class, "orders"])->name('orders');
Route::get("/role", [AdminController::class, "role"])->name('role');


Route::get("/quote", [AdminController::class, "quote"])->name('quote');
Route::post('/modify-status', [AdminController::class, 'modifyStatus'])->name('modify-status');
Route::get("/delete-quote", [AdminController::class, "delete_quote"])->name('delete-quote');
Route::post('/assignpoints', [AdminController::class, 'assignpoints'])->name('assignpoints');


Route::get("/country", [AdminController::class, "country"])->name('country');
Route::post("/save-country", [AdminController::class, "save_country"])->name('save-country');
Route::post("/update-country/{id}", [AdminController::class, "update_country"])->name('update-country');
Route::get("/delete-country", [AdminController::class, "delete_country"])->name('delete-country');

Route::get("/city/{id}", [AdminController::class, "city"])->name('city');
Route::post("/save-city/{id}", [AdminController::class, "save_city"])->name('save-city');
Route::post("/update-city/{id}", [AdminController::class, "update_city"])->name('update-city');
Route::get("/delete-city", [AdminController::class, "delete_city"])->name('delete-city');

Route::post("/save-shipping-date", [AdminController::class, "save_shipping_date"])->name('save-shipping-date');
Route::get("/drop-of-points", [AdminController::class, "drop_of_points"])->name('drop-of-points');
Route::post("/savepoints", [AdminController::class, "savepoints"])->name('savepoints');
Route::post("/updatepoints/{id}", [AdminController::class, "updatepoints"])->name('updatepoints');
Route::get("/deletepoints", [AdminController::class, "deletepoints"])->name('deletepoints');

Route::get("/plan", [AdminController::class, "plan"])->name('plan');
Route::post("/save-plan", [AdminController::class, "save_plan"])->name('save-plan');
Route::post("/update-plan/{id}", [AdminController::class, "update_plan"])->name('update-plan');
Route::get("/delete-plan", [AdminController::class, "delete_plan"])->name('delete-plan');

Route::get("/thought", [AdminController::class, "thought"])->name('thought');
Route::post("/save-thought", [AdminController::class, "save_thought"])->name('save-thought');
Route::post("/update-thought/{id}", [AdminController::class, "update_thought"])->name('update-thought');
Route::get("/delete-thought", [AdminController::class, "delete_thought"])->name('delete-thought');


Route::post("/save-promotion", [AdminController::class, "save_promotion"])->name('save-promotion');
Route::post("/update-promotion/{id}", [AdminController::class, "update_promotion"])->name('update-promotion');
Route::get("/delete-promotion", [AdminController::class, "delete_promotion"])->name('delete-promotion');
Route::get("/promotions", [AdminController::class, "promotions"])->name('promotions');


Route::get("/send-notification", [AdminController::class, "send_notification"])->name('send-notification');
Route::post("/save-notification", [AdminController::class, "save_notification"])->name('save-notification');


Route::get("/offer-requests", [AdminController::class, "offer_request"])->name('offer-requests');
Route::post('/approve-offer-request/{id}', [AdminController::class, 'approveOfferRequest']);
Route::post('/mark-delivered/{id}', [AdminController::class, 'markAsDelivered']);
Route::post('/reject-offer-request/{id}', [AdminController::class, 'rejectOfferRequest'])->name('reject-offer-request');


Route::post('/assign-operation', [AdminController::class, 'assignOperation'])->name('assign-operation');
Route::post('/assign-callagent', [AdminController::class, 'assignCallagent'])->name('assign-callagent');
Route::get('/delete-role', [AdminController::class, 'delete_role'])->name('delete-role');
Route::post("/update-quote/{id}", [AdminController::class, "update_quote"])->name('update-quote');
Route::get("/view-quote/{id}", [AdminController::class, "view_quote"])->name('view-quote');

Route::middleware('operation')->group(function () {
    Route::get('/operation-dashboard', [AdminController::class, 'operation_dashboard'])->name('operation-dashboard');
    Route::get('/assignquotes', [AdminController::class, 'assignquotes'])->name('assignquotes');
    Route::get('/assignquotes2', [AdminController::class, 'assignquotes2'])->name('assignquotes2');
    Route::get('/assignquotes3', [AdminController::class, 'assignquotes3'])->name('assignquotes3');
    Route::get("/checkpoints/{id}", [AdminController::class, "checkpoints"])->name('checkpoints');
    Route::post("/save-checkpoints", [AdminController::class, "save_checkpoints"])->name('save-checkpoints');
    Route::post("/update-checkpoints/{id}", [AdminController::class, "update_checkpoints"])->name('update-checkpoints');
    Route::get("/add-checkpoints", [AdminController::class, "add_checkpoints"])->name('add-checkpoints');
    Route::post("/new-checkpoints", [AdminController::class, "new_checkpoints"])->name('new-checkpoints');
    
   
});
Route::post('save-dropofpoint/{id}', [AdminController::class, 'save_dropofpoint'])->name('save-dropofpoint');
 Route::get("/delete-checkpoints", [AdminController::class, "delete_checkpoints"])->name('delete-checkpoints');


Route::middleware('callagent')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/assign', [AdminController::class, 'assign'])->name('assign');
    Route::get('/quote_form', [AdminController::class, 'quote_form'])->name('quote_form');
    Route::post('/savecallagent', [AdminController::class, 'savecallagent'])->name('savecallagent');
    Route::post('/save_quote', [AdminController::class, 'save_quote'])->name('save_quote');
    Route::post('/saveamount', [AdminController::class, 'saveamount'])->name('saveamount');
    Route::post("/update-assign/{id}", [AdminController::class, "update_assign"])->name('update-assign');


});
Route::get('/get-dropoff-points/{quoteId}', [QuoteController::class, 'getDropoffPoints']);



  

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');