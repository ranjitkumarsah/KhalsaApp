<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\ApiCardController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(['prefix' => 'Volunteer'], function () {

    
    Route::post('login',[ApiController::class,'login']);   
});

Route::get('cities',[ApiController::class,'cities']);

Route::group(['prefix' => 'Volunteer','middleware' => ['jwt.verify']], function () {

    
    // Route::post('login',[ApiController::class,'login']);
    Route::post('logout',[ApiController::class,'logout']);
    Route::post('add_cardholder',[ApiController::class,'add_cardholder']);
    Route::post('add_cardholder_family',[ApiController::class,'add_cardholder_family']);
    Route::post('add_cardholder_children',[ApiController::class,'add_cardholder_children']);
    Route::post('view_cardholder',[ApiController::class,'view_cardholder']);
    Route::post('verify_cardholder',[ApiController::class,'verify_cardholder']);
    Route::post('unverify_cardholder',[ApiController::class,'unverify_cardholder']);
    Route::post('active_cardholder',[ApiController::class,'active_cardholder']);
    Route::post('view_notifications',[ApiController::class,'view_notifications']);
    Route::post('cardholder_details',[ApiController::class,'cardholder_details']);
    Route::post('get_profile',[ApiController::class,'get_profile']);
    Route::post('edit_cardholder',[ApiController::class,'edit_cardholder']);
    Route::post('delete_cardholder',[ApiController::class,'delete_cardholder']);
    Route::post('cardholder_family',[ApiController::class,'cardholder_family']);
    Route::post('cardholder_children',[ApiController::class,'cardholder_children']);
    Route::post('edit_cardholderfamily',[ApiController::class,'edit_cardholderfamily']);
    Route::post('edit_cardholderchildren',[ApiController::class,'edit_cardholderchildren']);
    Route::post('send_feedback',[ApiController::class,'send_feedback']);
    Route::post('delete_cardholderfamily',[ApiController::class,'delete_cardholderfamily']);
    Route::post('delete_cardholderchildren',[ApiController::class,'delete_cardholderchildren']);
    Route::post('add_khalsamember',[ApiController::class,'add_khalsamember']);
    Route::post('view_khalsamember',[ApiController::class,'view_khalsamember']);
    Route::post('verify_khalsamember',[ApiController::class,'verify_khalsamember']);
    Route::post('unverify_khalsamember',[ApiController::class,'unverify_khalsamember']);
    Route::post('active_khalsamember',[ApiController::class,'active_khalsamember']);
    Route::post('cardholder_filter',[ApiController::class,'cardholder_filter']);
    Route::post('support_number',[ApiController::class,'support_number']);
   
    Route::post('view_member',[ApiController::class,'view_member']);
   // Route::post('business_type_list',[ApiController::class,'business_type_list']);
    
    
});

Route::group(['prefix' => 'Volunteer'], function () {

    Route::post('business_type_list',[ApiController::class,'business_type_list']);
    Route::post('show_business',[ApiController::class,'show_business']);
    Route::post('add_business',[ApiController::class,'add_business']);
});


Route::group(['prefix' => 'Cardholder'], function () {

    Route::post('login',[ApiCardController::class,'login']); 
    Route::post('hospital_list',[ApiCardController::class,'hospital_list']);
    Route::post('doctor_list',[ApiCardController::class,'doctor_list']);
    Route::post('hospital_details',[ApiCardController::class,'hospital_details']);
    Route::post('doctor_details',[ApiCardController::class,'doctor_details']);
    Route::post('add_business',[ApiCardController::class,'add_business']);
    Route::post('show_business',[ApiCardController::class,'show_business']);
    Route::post('youtube_link',[ApiCardController::class,'youtube_link']);  
    Route::post('request_blood_donor',[ApiCardController::class,'request_blood_donor']);  
    Route::post('business_type_list',[ApiCardController::class,'business_type_list']);
    Route::post('filters',[ApiCardController::class,'filters']);
    Route::post('get_profile',[ApiCardController::class,'get_profile']);
    // Route::post('khalsa_pariwar_link',[ApiCardController::class,'khalsa_pariwar_link']);
});

Route::group(['prefix' => 'Cardholder','middleware' => ['jwt.verify']], function () {

    Route::post('logout',[ApiCardController::class,'logout']);
    Route::post('viewnotification',[ApiCardController::class,'viewnotification']);
    Route::post('send_feedback',[ApiCardController::class,'send_feedback']);
  
    
    
    
});