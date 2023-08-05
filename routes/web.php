<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubAdminController;
use App\Http\Controllers\SewaPartnerController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('about-us',[AdminController::class,'about_us']); 
    Route::group(['prefix' => 'Admin'], function () {

        Route::get('login',[AdminController::class,'login_view'])->name('admin_login');
        Route::post('login',[AdminController::class,'Admin_login']);
 
    });
    Route::group(['prefix' => 'Admin','middleware'=> ['auth:web']], function () {
   
        // Route::get('/cards', function () {
        //     return view('Admin.khalsamembercard');
        // });

    Route::get('dashboard',[AdminController::class,'dashboard']); 
    Route::get('dashboard1',[AdminController::class,'dashboard1']); 
    Route::get('cardholder',[AdminController::class,'cardholder']); 
    Route::post('savecardholder',[AdminController::class,'savecardholder']);
    Route::get('volunteer',[AdminController::class,'volunteer']); 
    Route::post('savevolunteer',[AdminController::class,'savevolunteer']);
    Route::get('view_volunteer',[AdminController::class,'view_volunteer']);
    Route::get('about',[AdminController::class,'about']);      
        
   
    Route::post('about_save',[AdminController::class,'about_save']);  
 
    Route::get('logout',[AdminController::class,'logout']);  
    Route::get('sewapartner',[AdminController::class,'sewapartner']); 
    Route::get('sewapartner1',[AdminController::class,'sewapartner1']); 
    Route::get('subadmin',[AdminController::class,'subadmin']);

    Route::get('viewcardholder',[AdminController::class,'viewcardholder']);
    Route::get('view_active_cardholder',[AdminController::class,'view_active_cardholder']);
    Route::get('view_deactive_cardholder',[AdminController::class,'view_deactive_cardholder']);

    Route::get('family_details/{id}',[AdminController::class,'family_details']); 
    Route::get('children_details/{id}',[AdminController::class,'children_details']);
    Route::get('subadmin_register', [AdminController::class, 'addsubadmin']);
    Route::post('addsubadminform',[AdminController::class,'addsubadmindata']);
    Route::get('register', [AdminController::class, 'addsewapartner']);
    Route::post('addsewapartnersform',[AdminController::class,'addsewapartnersdata']);
    Route::get('editsubadmin/{id}', [AdminController::class, 'editsubadmin']);
    Route::post('updatesubadmin/{id}', [AdminController::class, 'updatesubadmin']);
    Route::get('deletesubadmin/{id}', [AdminController::class, 'deletesubadmin']); 
    Route::get('editvolunteer/{id}', [AdminController::class, 'editvolunteer']);
    Route::post('updatevolunteer/{id}', [AdminController::class, 'updatevolunteer']);
    Route::get('deletevolunteer/{id}', [AdminController::class, 'deletevolunteer']);
    Route::get('doctor',[AdminController::class,'doctor']); 
    Route::post('savedoctor',[AdminController::class,'savedoctor']);
    Route::get('view_doctor',[AdminController::class,'view_doctor']); 
    Route::get('editdoctor/{id}',[AdminController::class,'editdoctor']);
    Route::post('updatedoctor/{id}',[AdminController::class,'updatedoctor']);
    Route::get('deletedoctor/{id}',[AdminController::class,'deletedoctor']); 
    Route::get('services',[AdminController::class,'services']); 
    Route::post('saveservices',[AdminController::class,'saveservices']);
    Route::get('editservice/{id}',[AdminController::class,'editservice']);
    Route::post('updateservice/{id}',[AdminController::class,'updateservice']);
    Route::get('deleteservice/{id}',[AdminController::class,'deleteservice']);
    Route::get('change_active_status',[AdminController::class,'change_active_status']);
    Route::get('change_verify_status',[AdminController::class,'change_verify_status']); 
    Route::get('change_volunteer_status',[AdminController::class,'change_volunteer_status']);
    Route::get('change_sewapartner_status',[AdminController::class,'change_sewapartner_status']);
    Route::get('deletesewapartner/{id}',[AdminController::class,'deletesewapartner']);
    Route::get('editsewapartner/{id}',[AdminController::class,'editsewapartner']);
    Route::post('updatesewapartner/{id}',[AdminController::class,'updatesewapartner']);
    Route::get('viewdata/{id}', [AdminController::class, 'viewsubadminsdata']);
    Route::get('sewadetails/{id}', [AdminController::class, 'viewsewapartnersdatas']);
    Route::get('sewadetails1/{id}', [AdminController::class, 'viewsewapartnersdatas1']);
    Route::get('volunteerdata/{id}', [AdminController::class, 'viewvolunteerdatas']);
    Route::get('carddata/{id}', [AdminController::class, 'cardholderdatas']);
    Route::get('notifications', [AdminController::class, 'notifications']);
    Route::post('savenotifications', [AdminController::class, 'savenotifications']);
    Route::get('view_notifications', [AdminController::class, 'view_notifications']);
    Route::get('editnotification/{id}', [AdminController::class, 'editnotification']);
    Route::post('updatenotification/{id}', [AdminController::class, 'updatenotification']);
    Route::get('deletenotification/{id}', [AdminController::class, 'deletenotification']);
    Route::get('doctordata', [AdminController::class, 'doctordata']);
    Route::post('savedoctordata', [AdminController::class, 'savedoctordata']);
    Route::get('add_doctor/{id}', [AdminController::class, 'add_doctor']);
    Route::post('saveadd_doctor/{id}', [AdminController::class, 'saveadd_doctor']);
    Route::get('check_time_schedule/{id}', [AdminController::class, 'check_time_schedule']);
    Route::get('deletesewa_doctor/{id}', [AdminController::class, 'deletesewa_doctor']);
    
    Route::get('edit_is_needy/{id}', [AdminController::class, 'edit_is_needy']);
    Route::post('update_is_needy/{id}', [AdminController::class, 'update_is_needy']);

    Route::get('editcardholder/{id}', [AdminController::class, 'editcardholder']);
    Route::post('updatecardholder/{id}', [AdminController::class, 'updatecardholder']);
    Route::get('deletecardholder/{id}', [AdminController::class, 'deletecardholder']);
    Route::get('editcardholderfamily/{id}', [AdminController::class, 'editcardholderfamily']);
    Route::post('updatecardholderfamily/{id}', [AdminController::class, 'updatecardholderfamily']);
    Route::get('deletecardholderfamily/{id}', [AdminController::class, 'deletecardholderfamily']);
    Route::get('editcardholderchild/{id}', [AdminController::class, 'editcardholderchild']);
    Route::post('updatecardholderchild/{id}', [AdminController::class, 'updatecardholderchild']);
    Route::get('deletecardholderchild/{id}', [AdminController::class, 'deletecardholderchild']);

    Route::get('view_business', [AdminController::class, 'view_business']);
    Route::get('pending_business', [AdminController::class, 'view_business']);

    Route::get('change_business_status', [AdminController::class, 'change_business_status']);
    Route::get('view_feedback', [AdminController::class, 'view_feedback']);
    Route::get('blood_donor', [AdminController::class, 'blood_donor']);
    Route::get('add_cardfamily/{id}', [AdminController::class, 'add_cardfamily']);
    Route::post('saveadd_cardfamily/{id}', [AdminController::class, 'saveadd_cardfamily']);
    Route::get('add_cardchildren/{id}', [AdminController::class, 'add_cardchildren']);
    Route::post('saveadd_cardchildren/{id}', [AdminController::class, 'saveadd_cardchildren']);
    Route::get('newcardholder',[AdminController::class,'newcardholder']);
    Route::post('savenewcardholder',[AdminController::class,'savenewcardholder']);
    Route::get('viewkhalsamember',[AdminController::class,'viewkhalsamember']);
    Route::get('youtube_channel',[AdminController::class,'youtube_channel']);
    Route::post('saveyoutube_channel',[AdminController::class,'saveyoutube_channel']);

    Route::get('blood_request',[AdminController::class,'blood_request']);
    Route::get('pending_blood_request',[AdminController::class,'blood_request']);

    Route::get('khalsa_active_status',[AdminController::class,'khalsa_active_status']);
    Route::get('khalsa_verify_status',[AdminController::class,'khalsa_verify_status']);
    Route::get('deletemember/{id}',[AdminController::class,'deletemember']);
    Route::get('blood_status',[AdminController::class,'blood_status']);
    Route::get('business',[AdminController::class,'business']);
    Route::post('savebusiness',[AdminController::class,'savebusiness']);
    Route::get('business_type',[AdminController::class,'business_type']);
    Route::post('savebusiness_type',[AdminController::class,'savebusiness_type']);
    Route::get('deletebusiness_type/{id}',[AdminController::class,'deletebusiness_type']);
    Route::get('support_number',[AdminController::class,'support_number']);
    Route::post('savesupport_number',[AdminController::class,'savesupport_number']);

    Route::get('khalsa_pariwar_link',[AdminController::class,'khalsa_pariwar_link']);
    Route::post('savekhalsa_pariwar_link',[AdminController::class,'savekhalsa_pariwar_link']);

    Route::get('badge_status',[AdminController::class,'badge_status']);
    Route::get('reports',[AdminController::class,'reports']);
    Route::get('invoices',[AdminController::class,'invoices']);
    Route::get('invoice_details/{id}',[AdminController::class,'invoice_details']);
    Route::get('doctor_invoice',[AdminController::class,'doctor_invoice']);
    Route::get('doctorinvoice_details/{id}/{name}',[AdminController::class,'doctorinvoice_details']);
    Route::get('khalsaformdata/{id}', [AdminController::class, 'viewkhalsadatas']);
    Route::get('khalsamemberformdata/{id}', [AdminController::class, 'viewkhalsamemberdatas']);
    Route::get('khalsacarddata/{id}', [AdminController::class, 'volunteerkhalsacard']);
    Route::get('editbusiness/{id}', [AdminController::class, 'editbusiness']);
    Route::post('updatebusiness/{id}', [AdminController::class, 'updatebusiness']);
    Route::get('deletebusiness/{id}', [AdminController::class, 'deletebusiness']);
    Route::get('change_subadmin_status', [AdminController::class, 'change_subadmin_status']);
    Route::get('deletefeedback/{id}', [AdminController::class, 'deletefeedback']);
    Route::get('changedoctor_status', [AdminController::class, 'changedoctor_status']);

    Route::get('view_sewanotifications', [AdminController::class, 'view_sewanotifications']);
    Route::get('pending_notifications', [AdminController::class, 'view_sewanotifications']);

    Route::get('change_notification_status', [AdminController::class, 'change_notification_status']);

    //Vacancies GET/POST Routes
    Route::get('vacancies', [AdminController::class, 'vacancies']);
    Route::get('add_vacancy', [AdminController::class, 'add_vacancy']);
    Route::post('save_vacancy', [AdminController::class, 'save_vacancy']);
    Route::get('edit_vacancy/{id}', [AdminController::class, 'edit_vacancy']);
    Route::post('update_vacancy/{id}', [AdminController::class, 'update_vacancy']);
    Route::get('delete_vacancy/{id}', [AdminController::class, 'delete_vacancy']);
    


    
    
});
    
    Route::group(['prefix' => 'Subadmin'], function () {
    // Route::get('register', [SubAdminController::class, 'addsubadmin']);
    // Route::post('addsubadminform',[SubAdminController::class,'addsubadmindata']);
    Route::get('login', [SubAdminController::class, 'subadmin_login'])->name('subadmin_login');
    Route::post('subadmindata',[SubAdminController::class,'subadminlogincheck']);
});

    Route::group(['prefix'=>'Subadmin','middleware'=>['auth:subadmin']],function(){
    Route::get('dashboard', [SubAdminController::class, 'subadmin_dashboard']);
    Route::get('cardholder',[SubAdminController::class,'cardholder']); 
    Route::post('savecardholder',[SubAdminController::class,'savecardholder']);
    Route::get('volunteer',[SubAdminController::class,'volunteer']); 
    Route::post('savevolunteer',[SubAdminController::class,'savevolunteer']);
    Route::get('view_volunteer',[SubAdminController::class,'view_volunteer']);
    Route::get('logout', [SubAdminController::class, 'logout']);
    Route::get('sewapartner',[SubAdminController::class,'sewapartner']); 
    Route::get('about',[SubAdminController::class,'about']); 
    Route::post('about_save',[SubAdminController::class,'about_save']); 
    Route::get('viewcardholder',[SubAdminController::class,'viewcardholder']);
    Route::get('viewkhalsamember',[SubAdminController::class,'viewkhalsamember']);
    Route::get('view_active_cardholder',[SubAdminController::class,'view_active_cardholder']);
    Route::get('view_deactive_cardholder',[SubAdminController::class,'view_deactive_cardholder']);

    Route::get('edit_is_needy/{id}', [SubAdminController::class, 'edit_is_needy']);
    Route::post('update_is_needy/{id}', [SubAdminController::class, 'update_is_needy']);

    Route::get('changedoctor_status', [SubAdminController::class, 'changedoctor_status']);

    Route::get('deletefeedback/{id}', [SubAdminController::class, 'deletefeedback']);

    //Vacancies GET/POST Routes
    Route::get('vacancies', [SubAdminController::class, 'vacancies']);
    Route::get('add_vacancy', [SubAdminController::class, 'add_vacancy']);
    Route::post('save_vacancy', [SubAdminController::class, 'save_vacancy']);
    Route::get('edit_vacancy/{id}', [SubAdminController::class, 'edit_vacancy']);
    Route::post('update_vacancy/{id}', [SubAdminController::class, 'update_vacancy']);
    Route::get('delete_vacancy/{id}', [SubAdminController::class, 'delete_vacancy']);


    Route::get('family_details/{id}',[SubAdminController::class,'family_details']); 
    Route::get('children_details/{id}',[SubAdminController::class,'children_details']);
    Route::get('khalsa_pariwar_link',[SubAdminController::class,'khalsa_pariwar_link']);
    Route::post('savekhalsa_pariwar_link',[AdminController::class,'savekhalsa_pariwar_link']);
    Route::get('register', [SubAdminController::class, 'addsewapartner']);
    Route::post('addsewapartnersform',[SubAdminController::class,'addsewapartnersdata']);
    Route::get('editsubadmin/{id}', [SubAdminController::class, 'editsubadmin']);
    Route::post('updatesubadmin/{id}', [SubAdminController::class, 'updatesubadmin']);
    Route::get('deletesubadmin/{id}', [SubAdminController::class, 'deletesubadmin']); 
    Route::get('editvolunteer/{id}', [SubAdminController::class, 'editvolunteer']);
    Route::post('updatevolunteer/{id}', [SubAdminController::class, 'updatevolunteer']);
    Route::get('deletevolunteer/{id}', [SubAdminController::class, 'deletevolunteer']);
    Route::get('doctor',[SubAdminController::class,'doctor']); 
    Route::post('savedoctor',[SubAdminController::class,'savedoctor']);
    Route::get('view_doctor',[SubAdminController::class,'view_doctor']); 
    Route::get('editdoctor/{id}',[SubAdminController::class,'editdoctor']);
    Route::post('updatedoctor/{id}',[SubAdminController::class,'updatedoctor']);
    Route::get('deletedoctor/{id}',[SubAdminController::class,'deletedoctor']); 
    Route::get('services',[SubAdminController::class,'services']); 
    Route::post('saveservices',[SubAdminController::class,'saveservices']);
    Route::get('editservice/{id}',[SubAdminController::class,'editservice']);
    Route::post('updateservice/{id}',[SubAdminController::class,'updateservice']);
    Route::get('deleteservice/{id}',[SubAdminController::class,'deleteservice']);
    Route::get('change_active_status',[SubAdminController::class,'change_active_status']);
    Route::get('change_verify_status',[SubAdminController::class,'change_verify_status']); 
    Route::get('change_volunteer_status',[SubAdminController::class,'change_volunteer_status']);
    Route::get('change_sewapartner_status',[SubAdminController::class,'change_sewapartner_status']);
    Route::get('deletesewapartner/{id}',[SubAdminController::class,'deletesewapartner']);
    Route::get('editsewapartner/{id}',[SubAdminController::class,'editsewapartner']);
    Route::post('updatesewapartner/{id}',[SubAdminController::class,'updatesewapartner']);
    Route::get('sewadetails/{id}', [SubAdminController::class, 'viewsewapartnersdatas']);
    Route::get('add_doctor/{id}', [SubAdminController::class, 'add_doctor']);
    Route::post('saveadd_doctor/{id}', [SubAdminController::class, 'saveadd_doctor']);
    Route::get('deletesewa_doctor/{id}', [SubAdminController::class, 'deletesewa_doctor']);
    Route::get('check_time_schedule/{id}', [SubAdminController::class, 'check_time_schedule']);
    Route::get('volunteerdata/{id}', [SubAdminController::class, 'viewvolunteerdatas']);
    Route::get('notifications', [SubAdminController::class, 'notifications']);
    Route::post('savenotifications', [SubAdminController::class, 'savenotifications']);
    Route::get('view_notifications', [SubAdminController::class, 'view_notifications']);
    Route::get('change_notification_status', [SubAdminController::class, 'change_notification_status']);

    Route::get('editbusiness/{id}', [SubAdminController::class, 'editbusiness']);
    Route::post('updatebusiness/{id}', [SubAdminController::class, 'updatebusiness']);
    Route::get('deletebusiness/{id}', [SubAdminController::class, 'deletebusiness']);

    Route::get('editnotification/{id}', [SubAdminController::class, 'editnotification']);
    Route::post('updatenotification/{id}', [SubAdminController::class, 'updatenotification']);
    Route::get('deletenotification/{id}', [SubAdminController::class, 'deletenotification']);
    Route::get('carddata/{id}', [SubAdminController::class, 'cardholderdatas']);
    Route::get('editcardholder/{id}', [SubAdminController::class, 'editcardholder']);
    Route::post('updatecardholder/{id}', [SubAdminController::class, 'updatecardholder']);
    Route::get('deletecardholder/{id}', [SubAdminController::class, 'deletecardholder']);
    Route::get('editcardholderfamily/{id}', [SubAdminController::class, 'editcardholderfamily']);
    Route::post('updatecardholderfamily/{id}', [SubAdminController::class, 'updatecardholderfamily']);
    Route::get('deletecardholderfamily/{id}', [SubAdminController::class, 'deletecardholderfamily']);
    Route::get('editcardholderchild/{id}', [SubAdminController::class, 'editcardholderchild']);
    Route::post('updatecardholderchild/{id}', [SubAdminController::class, 'updatecardholderchild']);
    Route::get('deletecardholderchild/{id}', [SubAdminController::class, 'deletecardholderchild']);
    Route::get('add_cardfamily/{id}', [SubAdminController::class, 'add_cardfamily']);
    Route::post('saveadd_cardfamily/{id}', [SubAdminController::class, 'saveadd_cardfamily']);
    Route::get('add_cardchildren/{id}', [SubAdminController::class, 'add_cardchildren']);
    Route::post('saveadd_cardchildren/{id}', [SubAdminController::class, 'saveadd_cardchildren']);


    Route::get('view_sewanotifications', [SubAdminController::class, 'view_sewanotifications']);
    Route::get('pending_notifications', [SubAdminController::class, 'view_sewanotifications']);

    Route::get('view_business', [SubAdminController::class, 'view_business']);
    Route::get('pending_business', [SubAdminController::class, 'view_business']);

    Route::get('change_business_status', [SubAdminController::class, 'change_business_status']);
    Route::get('business',[SubAdminController::class,'business']);
    Route::post('savebusiness',[SubAdminController::class,'savebusiness']);
    Route::get('business_type',[SubAdminController::class,'business_type']);
    Route::post('savebusiness_type',[SubAdminController::class,'savebusiness_type']);
    Route::get('deletebusiness_type/{id}',[SubAdminController::class,'deletebusiness_type']);
    Route::get('view_feedback', [SubAdminController::class, 'view_feedback']);
    Route::get('blood_donor', [SubAdminController::class, 'blood_donor']);
    Route::get('blood_request',[SubAdminController::class,'blood_request']);
    Route::get('pending_blood_request',[SubAdminController::class,'blood_request']);
    Route::get('blood_status',[SubAdminController::class,'blood_status']);
    Route::get('youtube_channel',[SubAdminController::class,'youtube_channel']);
    Route::post('saveyoutube_channel',[SubAdminController::class,'saveyoutube_channel']);
    Route::get('reports',[SubAdminController::class,'reports']);
    Route::get('invoices',[SubAdminController::class,'invoices']);
    Route::get('invoice_details/{id}',[SubAdminController::class,'invoice_details']);
    Route::get('badge_status',[SubAdminController::class,'badge_status']);
    Route::get('doctor_invoice',[SubAdminController::class,'doctor_invoice']);
    Route::get('doctorinvoice_details/{id}/{name}',[SubAdminController::class,'doctorinvoice_details']);
    Route::get('khalsacarddata/{id}', [SubAdminController::class, 'volunteerkhalsacard']);
    Route::get('khalsaformdata/{id}', [SubAdminController::class, 'viewkhalsadatas']);
    Route::get('khalsamemberformdata/{id}', [SubAdminController::class, 'viewkhalsamemberdatas']);
    Route::get('support_number',[SubAdminController::class,'support_number']);
    Route::post('savesupport_number',[SubAdminController::class,'savesupport_number']);
   
    Route::post('store.subtoken',[SubAdminController::class,'substoreToken'])->name('store.subtoken');
});


 

Route::group(['prefix' => 'Sewapartner'], function () {
    Route::get('register', [SewaPartnerController::class, 'addsewapartner']);
    Route::post('addsewapartnersform',[SewaPartnerController::class,'addsewapartnersdata']);
    Route::get('login', [SewaPartnerController::class, 'sewapartner_login'])->name('sewapartner_login');
    Route::post('sewapartnerdata',[SewaPartnerController::class,'sewapartnerlogincheck']);
   
});


Route::group(['prefix'=>'Sewapartner','middleware'=>['auth:sewa']],function(){

    
    Route::get('dashboard', [SewaPartnerController::class, 'dashboard']);
    Route::get('logout', [SewaPartnerController::class, 'logout']);
    Route::get('viewcardholder',[SewaPartnerController::class,'viewcardholder']);
    Route::get('family_details/{id}',[SewaPartnerController::class,'family_details']); 
    Route::get('children_details/{id}',[SewaPartnerController::class,'children_details']);
    Route::post('addcardholderid',[SewaPartnerController::class,'addcardholderdatas']);
    Route::get('viewformdata',[SewaPartnerController::class,'view_account_details']);
    Route::get('editaccountdetail/{id}',[SewaPartnerController::class,'editaccountdetail']);
    Route::get('deleteaccountdetail/{id}',[SewaPartnerController::class,'deleteaccountdetail']);
    Route::post('updateaccountdetail/{id}',[SewaPartnerController::class,'updateaccountdetail'])->name('accountdetail.update');
    Route::get('viewconsultation',[SewaPartnerController::class,'consultation_details']);
    Route::get('viewinvoicedetails',[SewaPartnerController::class,'view_invoice_details']);
    Route::get('addaccountdetails',[SewaPartnerController::class,'add_account_details']);
    Route::post('saveaccountdata',[SewaPartnerController::class,'saveaccount']);
    Route::get('cardholderssdata/{id}', [SewaPartnerController::class, 'viewcarddatass']);
    Route::get('carddata/{id}', [SewaPartnerController::class, 'cardholderdatas']);
    Route::get('generateinvoice',[SewaPartnerController::class,'generate_invoice_details']);

    Route::get('view_notification',[SewaPartnerController::class,'view_notification']);
    Route::get('feedbacks',[SewaPartnerController::class,'feedbacks']);
    Route::post('savefeedbacks',[SewaPartnerController::class,'savefeedbacks']);
    Route::get('blood_request',[SewaPartnerController::class,'blood_request']);
    Route::post('saveblood_request',[SewaPartnerController::class,'saveblood_request']);
    Route::get('customer_support',[SewaPartnerController::class,'customer_support']);
    Route::get('profile',[SewaPartnerController::class,'profile']);
    Route::get('generateinvoice',[SewaPartnerController::class,'generate_invoice_details']);
    Route::get('reprint/{id}',[SewaPartnerController::class,'reprint']);
    Route::get('addnotifications',[SewaPartnerController::class,'addnotifications']);
    Route::post('saveaddnotifications',[SewaPartnerController::class,'saveaddnotifications']);
    Route::get('notification_request',[SewaPartnerController::class,'notification_request']);
    Route::get('pending_notification',[SewaPartnerController::class,'notification_request']);
    Route::post('store.token',[SewaPartnerController::class,'storeToken'])->name('store.token');
    
    Route::get('invoice_download/{id}',[SewaPartnerController::class,'invoice_download']);
  
    
   
});
