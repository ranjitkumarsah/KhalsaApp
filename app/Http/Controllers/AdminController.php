<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use File;
use DB;
use Carbon\Carbon;
use Validator;
use Session;
use dcrypt;
use App\Models\SubAdmin;
use App\Models\SewaPartner;
use Redirect;
use DataTables;
use Illuminate\Support\Js;
use PDF;
use DateTime;
class AdminController extends Controller
{
    public function login_view(){
        if(Auth::user()){
            return redirect('Admin/dashboard');
        }
        return view('Admin.Auth.sign_in');        
    }
    public function Admin_login(Request $request){
        $request->validate([
           'email'          => 'required',
           'password'       => 'required',
       ]);
     
       $credentials = [
           'email' => $request['email'],
           'password' => $request['password'],
       ];        
       if(Auth::attempt($credentials)){
           return redirect('Admin/dashboard');
       }
       else{
           return back()->with('errormessage', 'Please Enter Valid Credentials!');
       }
      
      }
   public function dashboard()
   {
    $users = DB::table('cardholder')->select('id', 'created_at')->get()
     ->groupBy(function($date) {
      //return Carbon::parse($date->created_at)->format('Y'); // grouping by years
      return Carbon::parse($date->created_at)->format('m'); // grouping by months
    });
  
  
    //   $data = DB::table('cardholder')->select(DB::raw("(COUNT(*)) as count"),DB::raw("MONTHNAME(created_at) as monthname"))
    //  ->whereYear('created_at', date('Y'))
    //  ->groupBy('monthname')
    //  ->pluck('count');

    $current_year = Carbon::now()->year;
    $current_month = Carbon::now()->month;
    $data = [];
    for ($i=1; $i <=$current_month ; $i++) { 
      $dat = DB::table('cardholder')->whereMonth('created_at', '=', $i)->whereYear('created_at', '=', $current_year)->count('id');
      
      if($dat) {
        $data[] = $dat;
      } else {
        $data[]= 0;

      }
    }
    $data = json_encode($data);
    
    //  $volunt = DB::table('volunteers')->select(DB::raw("(COUNT(*)) as count"),DB::raw("MONTHNAME(created_at) as monthname"))
    //  ->whereYear('created_at', date('Y'))
    //  ->groupBy('monthname')
   
    $volunt = [];
    for ($i=1; $i <=$current_month ; $i++) { 
      $volun = DB::table('volunteers')->whereMonth('created_at', '=', $i)->whereYear('created_at', '=', $current_year)->count('id');
      
      if($volun) {
        $volunt[] = $volun;
      } else {
        $volunt[]= 0;

      }

    }

    $volunt = json_encode($volunt);

   
     
     $discount = DB::table('sewapartner_account')->select(DB::raw("(sum(discount)) as sum"),DB::raw("MONTHNAME(created_at) as monthname"))
     ->whereYear('created_at', date('Y'))
     ->groupBy('monthname')
     ->pluck('sum');
    //  dd($discount);
      $volunteers = DB::table('volunteers')->select('id')->count();
      // dd($volunteers);
      $sewapartners = DB::table('sewapartners')->select('id')->count(); 
      $subadmin = DB::table('subadmins')->select('id')->count();
      $cardholder = DB::table('cardholder')->select('id')->count();
      $doctor = DB::table('doctors')->select('id')->count();
      $hospital = DB::table('sewapartners')->where('categories','Hospital')->count();
      $clinic = DB::table('sewapartners')->where('categories','Clinic')->count();
      $laboratory = DB::table('sewapartners')->where('categories','Laboratory')->count();
      $medicalstore = DB::table('sewapartners')->where('categories','Medicalstore')->count();
      $fruit_count = 10;    	
        $veg_count = 20;
        $grains_count = 30;
      $blood =  DB::table('cardholder')->select('blood_group',DB::raw("(COUNT(*)) as count"))
      ->whereNotNull('blood_group')  
     ->groupBy('blood_group')
     ->pluck('count','blood_group');
         
      // dd($blood);
     $invoices = DB::table('sewapartner_account')->select('id')->count();
     $active_cardholder = DB::table('cardholder')->where('active_status',1)->select('id')->count();
     $deactive_cardholder = DB::table('cardholder')->where('active_status',0)->select('id')->count();
     $pending_blood = DB::table('request_blood')->where('status',0)->select('id')->count();
     $feedback = DB::table('feedbacks')->select('id')->count();
     $pending_business = DB::table('business')->where('status',0)->select('id')->count();
     $pending_notification = DB::table('sewapartner_notifications')->where('status',0)->select('id')->count();
     
         return view('Admin.dashboard1',compact('active_cardholder','deactive_cardholder','pending_blood','feedback','pending_business','pending_notification','blood','fruit_count','veg_count','grains_count','volunteers','sewapartners','subadmin','cardholder','doctor','hospital','clinic','laboratory','medicalstore','data','volunt','discount','invoices'));
   }
  public function dashboard1()
  {
    $users = DB::table('cardholder')->select('id', 'created_at')
    ->get()
    ->groupBy(function($date) {
      //return Carbon::parse($date->created_at)->format('Y'); // grouping by years
    return Carbon::parse($date->created_at)->format('m'); // grouping by months
    });


      $data = DB::table('cardholder')->select(DB::raw("(COUNT(*)) as count"),DB::raw("MONTHNAME(created_at) as monthname"))
    ->whereYear('created_at', date('Y'))
    ->groupBy('monthname')
    ->pluck('count');
   
    $volunt = DB::table('volunteers')->select(DB::raw("(COUNT(*)) as count"),DB::raw("MONTHNAME(created_at) as monthname"))
    ->whereYear('created_at', date('Y'))
    ->groupBy('monthname')
    ->pluck('count');

    $discount = DB::table('sewapartner_account')->select(DB::raw("(sum(discount)) as sum"),DB::raw("MONTHNAME(created_at) as monthname"))
    ->whereYear('created_at', date('Y'))
    ->groupBy('monthname')
    ->pluck('sum');
    //  dd($discount);
      $volunteers = DB::table('volunteers')->select('id')->count();
      // dd($volunteers);
      $sewapartners = DB::table('sewapartners')->select('id')->count(); 
      $subadmin = DB::table('subadmins')->select('id')->count();
      $cardholder = DB::table('cardholder')->select('id')->count();
      $doctor = DB::table('doctors')->select('id')->count();
      $hospital = DB::table('sewapartners')->where('categories','Hospital')->count();
      $clinic = DB::table('sewapartners')->where('categories','Clinic')->count();
      $laboratory = DB::table('sewapartners')->where('categories','Laboratory')->count();
      $medicalstore = DB::table('sewapartners')->where('categories','Medicalstore')->count();
      $fruit_count = 10;    	
        $veg_count = 20;
        $grains_count = 30;
      $blood =  DB::table('cardholder')->select(DB::raw("(COUNT(*)) as count"))
      ->whereNotNull('blood_group')  
    ->groupBy('blood_group')
    ->pluck('count');
    $invoices = DB::table('sewapartner_account')->select('id')->count();
    $active_cardholder = DB::table('cardholder')->where('active_status',1)->select('id')->count();
    $deactive_cardholder = DB::table('cardholder')->where('active_status',0)->select('id')->count();
    $pending_blood = DB::table('request_blood')->where('status',0)->select('id')->count();
    $feedback = DB::table('feedbacks')->select('id')->count();
    $pending_business = DB::table('business')->where('status',0)->select('id')->count();
    $pending_notification = DB::table('sewapartner_notifications')->where('status',0)->select('id')->count();
   
       return view('Admin.dashboard1',compact('active_cardholder','deactive_cardholder','pending_blood','feedback','pending_business','pending_notification','blood','fruit_count','veg_count','grains_count','volunteers','sewapartners','subadmin','cardholder','doctor','hospital','clinic','laboratory','medicalstore','data','volunt','discount','invoices'));
  } 
   public function cardholder()
   {
    $cities = DB::table('cities')->get();
    return view('Admin.cardholder1',compact('cities'));
   }
   public function savecardholder(Request $request)
   {
    $validator = Validator::make($request->all(), [ 
        'name'         => 'required',
        'name_punjabi'         => 'required',
        'age'         => 'required',
        'address'         => 'required',    
        'address_punjabi'         => 'required',    
        'occupation'         => 'required',    
        // 'annual_income'         => 'required',    
        'contact_number'         => 'required|max:10',    
        'qualification'         => 'required',    
        'adhaar_number'         => 'required',    
        'whatsapp_number'         => 'required',    
        // 'own_house'         => 'required',  
        // 'rent'         => 'required', 
        // 'rent_price'         => 'required',          
        ]);  
        if ( $validator->fails()) { 
          return response()->json([
              'status'=>'0',
              'message'=>$validator->errors()->first(),
          ]);          
      } 
      $cardholder['name'] = $request->name;
      $cardholder['name_punjabi'] = $request->name_punjabi;
      $cardholder['age'] = $request->age;  
      $cardholder['address'] = $request->address; 
      $cardholder['address_punjabi'] = $request->address_punjabi; 
      if($request->cardholder_profile) {
      if($request->hasfile('cardholder_profile'))
      {
          $file = $request->cardholder_profile;
          $path = storage_path().'/cardholderimg/';
          File::makeDirectory($path, $mode = 0777, true, true);
          $imagePath = storage_path().'/cardholderimg/';         
          $post_image        = time().$file->getClientOriginalName();
          $image_url          = url('/').'/storage/cardholderimg/'.'/'. $post_image;   
          $file->move($imagePath, $post_image);
      }
      $cardholder['cardholder_profile']= $image_url;
    }
      $cardholder['job'] = $request->occupation;  
      $cardholder['annual_income'] = $request->annual_income;  
      $cardholder['contact_number'] = $request->contact_number; 
      $cardholder['password'] = bcrypt($request->contact_number); 
      $cardholder['qualification'] = $request->qualification;  
      $cardholder['adhaar_number'] = $request->adhaar_number;  
      $cardholder['own_house'] = $request->own_house;  
      $cardholder['rent'] = $request->rent;  
      $cardholder['rent_price'] = $request->rent_price;  
      if($request->long_disease){
        $cardholder['long_disease'] = $request->long_disease;
      }
      
      if($request->disease_name){
        $cardholder['disease_name'] = $request->disease_name;
      }
      if($request->disease_details){
        $cardholder['disease_details'] = $request->disease_details; 
      }
      if($request->support_organisation){
        $cardholder['support_organisation'] = $request->support_organisation; 
      }
      if($request->joined_organisation){
        $cardholder['joined_organisation'] = $request->joined_organisation;
      }
      if($request->verify_officer){
        $cardholder['verify_officer'] = $request->verify_officer;
      }
      if($request->family_head){
        $cardholder['family_head'] = $request->family_head;
      }
      if($request->blood_donor){
        $cardholder['blood_donor'] = $request->blood_donor;
      }
      if($request->granthi){
        $cardholder['is_needy'] = $request->granthi;
      }
      if($request->company_name){
        $cardholder['company_name'] = $request->company_name;
      }
      if($request->policy_no){
        $cardholder['policy_number'] = $request->policy_no;
      }
      if($request->issue_date){  
        $cardholder['policy_issue_date'] = $request->issue_date;
      } 
      if($request->expiry_date){   
        $cardholder['policy_expiry_date'] = $request->expiry_date;
      }  
      if($request->blood_group){   
        $cardholder['blood_group'] = $request->blood_group;
      }  
      if($request->village){   
        $cardholder['village'] = $request->village;
      }  
      if($request->email){
        $cardholder['email'] = $request->email;
      }
      if($request->whatsapp_number){
        $cardholder['whatsapp_number'] = $request->whatsapp_number;
      }

      $cardholder['add_id'] = Auth::guard('web')->user()->id;
      $cardholder['add_name'] = Auth::guard('web')->user()->name;
      $cardholder['add_type'] = "Admin";
      $cardholder['created_at'] = Carbon::now();
      $family_id = DB::table('cardholder')->insertgetId($cardholder);

      if( $family_id){
        if($request->granthi){
          $card_id = '1984-'.(1000000+$family_id);
        } else {
          $card_id = '1699-'.(1000000+$family_id);
        }
        // DB::table('cardholder')->where('id',$family_id)->update(['card_id'=>Carbon::now()->timestamp.'-'.$family_id]);
                
        DB::table('cardholder')->where('id',$family_id)->update(['card_id'=>$card_id]);


        $card['card_id'] = $card_id;
        $card['type'] = "Cardholder";
        $card['created_at'] = Carbon::now();
        DB::table('cardsdata')->insert($card);

        if($request->fname) {
          for($i=0;$i<count($request->fname);$i++){
         
            DB::table('cardholder_family')->insert([
              'cardholder_id'  => $family_id,
              'fname'    => $request->fname[$i],
              'famritdhari'    => $request->famritdhari[$i],
              'fage'    => $request->fage[$i],
              'fblood_group'    => $request->fblood_group[$i],
              'fqualification'    => $request->fqualification[$i],
              'fjob'    => $request->fjob[$i],
              'fsalary'    => $request->fsalary[$i],                      
              'faadhaar'    => $request->faadhaar[$i],                      
              'frelation'    => $request->frelation[$i],  
              'created_at' => Carbon::now(),                   
            ]);  
           
          }
        }
        if($request->cname) {
          for($i=0;$i<count($request->cname);$i++){
            DB::table('cardholder_children')->insert([
              'cardholder_id'  => $family_id,
              'cname'    => $request->cname[$i],
              'camritdhari'    => $request->camritdhari[$i],
              'cage'    => $request->cage[$i],
              'cqualification'    => $request->cqualification[$i],
              'cfees'    => $request->cfees[$i],
              'cschool'    => $request->cschool[$i], 
              'caadhaar'    => $request->caadhaar[$i],                      
              'crelation'    => $request->crelation[$i],                      
              'created_at' => Carbon::now(),                   
  
            ]);  
         
          }
        }
        
      }
     
      if($request->granthi){
        $cardholders['cardholder_id'] = $family_id;
        $cardholders['name'] = $request->patient_detail;
      if($request->disease_time){
        $cardholders['disease_time'] = $request->disease_time;
      } 
      if($request->medical_detail){ 
        $cardholders['medical_detail'] = $request->medical_detail;
      }  
      if($request->foundation_detail){
        $cardholders['foundation_detail'] = $request->foundation_detail;
      }
      if($request->foundation_help){  
      $cardholders['foundation_help'] = $request->foundation_help; 
      }
      if($request->foundation_member){  
        $cardholders['foundation_member'] = $request->foundation_member;
      }
      if($request->govthelp){ 
        $cardholders['govthelp'] = $request->govthelp;
      }
      if($request->help_amount){  
        $cardholders['help_amount'] = $request->help_amount;
      }
      if($request->agriculture){   
        $cardholders['agriculture'] = $request->agriculture; 
      }
      if($request->cattle){   
        $cardholders['cattle'] = $request->cattle; 
      }
      if($request->social_media){   
        $cardholders['social_media'] = $request->social_media;
      }
      if($request->gurudwara){  
        $cardholders['gurudwara'] = $request->gurudwara;
      } 
      if($request->gurudwara_mgmt){ 
        $cardholders['gurudwara_mgmt'] = $request->gurudwara_mgmt;
      }  
      if($request->gurudwara_contact){ 
        $cardholder['gurudwara_contact'] = $request->gurudwara_contact;
    } 
      if($request->verify_officer){
        $cardholders['attesting_officer'] = $request->verify_officer;
      }
      if($request->family_head){
        $cardholders['family_head'] = $request->family_head;
      }

      if($request->volunteer_name){
        $cardholders['volunteer_name'] = $request->volunteer_name; 
      }
      if($request->two_wheeler){
        $cardholders['two_wheeler'] = $request->two_wheeler; 
      }
      if($request->four_wheeler){
        $cardholders['four_wheeler'] = $request->four_wheeler;
      }
      if($request->air_conditioner){
        $cardholders['air_conditioner'] = $request->air_conditioner;
      }
      if($request->income_source){
        $cardholders['income_source'] = $request->income_source;
      }
      if($request->company_name){
        $cardholder['company_name'] = $request->company_name;
      }
      if($request->policy_no){
        $cardholder['policy_number'] = $request->policy_no;
      }
      if($request->issue_date){  
        $cardholder['policy_issue_date'] = $request->issue_date;
      } 
      if($request->expiry_date){   
        $cardholder['policy_expiry_date'] = $request->expiry_date;
      }  
      if($request->date){
        $cardholders['date'] = $request->date;
      }
      if($request->volunteer_signature){
        $cardholders['volunteer_signature'] = $request->volunteer_signature;
      }
      if($request->volunteer_photo){
        if($request->hasfile('volunteer_photo'))
        {
            $file = $request->volunteer_photo;
            $path = storage_path().'/cardholderimg/';
            File::makeDirectory($path, $mode = 0777, true, true);
            $imagePath = storage_path().'/cardholderimg/';         
            $post_image        = time().$file->getClientOriginalName();
            $image_url          = url('/').'/storage/cardholderimg/'.'/'. $post_image;   
            $file->move($imagePath, $post_image);
        }
        $cardholders['volunteer_photo']= $image_url;
      }
      
      $cardholders['add_id'] = Auth::guard('web')->user()->id;
      $cardholders['add_name'] = Auth::guard('web')->user()->name;
      $cardholders['add_type'] = "Admin";
      $cardholders['created_at'] = Carbon::now();
      
      $family_ids = DB::table('cardholders')->insertgetId($cardholders);
      if( $family_ids){
        $card_ids = '1984-'.(1000000+$family_ids);
        // DB::table('cardholders')->where('id',$family_ids)->update(['card_id'=>Carbon::now()->timestamp.'-'.$family_ids]); 

        DB::table('cardholders')->where('id',$family_ids)->update(['card_id'=>$card_ids]);


        $card['card_id'] = $card_ids;
        $card['type'] = "KhalsaMember";
        $card['created_at'] = Carbon::now();
        DB::table('cardsdata')->insert($card);
      }
      if($family_ids){
        if ($request->hasFile('house_photo')) {
          // $allowedfileExtension = ['pdf', 'jpg', 'png', 'docx'];
          $files = $request->file('house_photo');
          // dd($files);
          foreach ($files as $file) {
            // $file = $request->image;
            $path = storage_path().'/cardholderimg/';
            File::makeDirectory($path, $mode = 0777, true, true);
            $imagePath = storage_path().'/cardholderimg/';          
            $post_image        = time().$file->getClientOriginalName();
            $image_url          = url('/').'/storage/cardholderimg/'.'/'. $post_image;
            $file->move($imagePath, $post_image);
            DB::table('carholders_images')->insert([
              'cardholders_id'  => $family_ids,
              'image'  => $image_url,
              'created_at' => Carbon::now(),                   
            ]);
              
          } 
        }  
      }
      if ($request->hasFile('aadhaar_card')) {
        // $allowedfileExtension = ['pdf', 'jpg', 'png', 'docx'];
        $files = $request->file('aadhaar_card');
        // dd($files);
        foreach ($files as $file) {
          // $file = $request->image;
          $path = storage_path().'/cardholderimg/';
          File::makeDirectory($path, $mode = 0777, true, true);
          $imagePath = storage_path().'/cardholderimg/';          
          $post_image        = time().$file->getClientOriginalName();
          $image_url          = url('/').'/storage/cardholderimg/'.'/'. $post_image;
          $file->move($imagePath, $post_image);
            DB::table('carholders_images')->insert([
              'cardholders_id'  => $family_ids,
              'aadhaar_images'  => $image_url,
              'created_at' => Carbon::now(),                   
                      
          ]);
    
        } 
      }
      
    }
  
      // dd($family_id);
      return response()->json([
        'status'=>'1',
        'message'=>'Card Holder Added',
    ]);        

   }

   
   public function logout()
   {
    Auth::guard('web')->logout();
    return redirect('Admin/login');
   }
   public function volunteer()
    {
      $volunteers = DB::table('volunteers')->orderby('id','desc')->get();
      $cities = DB::table('cities')->get();
      
      return view('Admin.volunteer',compact('volunteers','cities'));
    }
   public function savevolunteer(Request $request)
   {
   
    $validator = Validator::make($request->all(), [ 
        'name'         => 'required',
        'name_punjabi'         => 'required',
        'email'         => 'email|unique:volunteers',
        'password'         => 'required|max:9',
        'contact_number'  => 'required|max:10', 
        'aadhaar_card_front'  => 'required',
        'aadhaar_card_back'  => 'required',
        'vote_card'  => 'required',
       // 'profile_pic'  => 'required', 
        'village'         => 'required',
        'landmark'         => 'required',    
        'address'         => 'required', 
        'address_punjabi'         => 'required', 
        // 'reference'         => 'required', 
        'username'         => 'required|unique:volunteers',    
         
        ]);  
        if ( $validator->fails()) { 
          return response()->json([
              'status'=>'0',
              'message'=>$validator->errors()->first(),
          ]);          
      } 
      $volunteer['name'] = $request->name;
      $volunteer['name_punjabi'] = $request->name_punjabi;
      $volunteer['email'] = $request->email; 
      $volunteer['password'] = bcrypt($request->password); 
      $volunteer['numpassword'] = $request->password; 
      $volunteer['contact_number'] = $request->contact_number;
      if($request->hasfile('aadhaar_card_front'))
      {
          $file = $request->aadhaar_card_front;
          $path = storage_path().'/volunteer/';
          File::makeDirectory($path, $mode = 0777, true, true);
          $imagePath = storage_path().'/volunteer/';         
          $post_image        = time().$file->getClientOriginalName();
          $image_url          = url('/').'/storage/volunteer/'.'/'. $post_image;   
          $file->move($imagePath, $post_image);

          $volunteer['aadhaar_card_front']= $image_url;
      }

      if($request->hasfile('aadhaar_card_back'))
      {
          $file = $request->aadhaar_card_back;
          $path = storage_path().'/volunteer/';
          File::makeDirectory($path, $mode = 0777, true, true);
          $imagePath = storage_path().'/volunteer/';         
          $post_image        = time().$file->getClientOriginalName();
          $image_url          = url('/').'/storage/volunteer/'.'/'. $post_image;   
          $file->move($imagePath, $post_image);
          
          $volunteer['aadhaar_card_back']= $image_url;
      }

      if($request->hasfile('vote_card'))
      {
          $file = $request->vote_card;
          $path = storage_path().'/volunteer/';
          File::makeDirectory($path, $mode = 0777, true, true);
          $imagePath = storage_path().'/volunteer/';         
          $post_image        = time().$file->getClientOriginalName();
          $image_url          = url('/').'/storage/volunteer/'.'/'. $post_image;   
          $file->move($imagePath, $post_image);
      }
      $volunteer['vote_card']= $image_url;   
      if($request->hasfile('profile_pic'))
      {
          $file = $request->profile_pic;
          $path = storage_path().'/volunteer/';
          File::makeDirectory($path, $mode = 0777, true, true);
          $imagePath = storage_path().'/volunteer/';         
          $post_image        = time().$file->getClientOriginalName();
          $image_url          = url('/').'/storage/volunteer/'.'/'. $post_image;   
          $file->move($imagePath, $post_image);
      }
      else{
        $image_url = url('/public/images/building.jpg');   
      }
      $volunteer['profile_pic']= $image_url;
      $volunteer['village'] = $request->village;
      $volunteer['landmark'] = $request->landmark;      
      $volunteer['address'] = $request->address; 
      $volunteer['address_punjabi'] = $request->address_punjabi; 
      if($request->reference){
        $volunteer['reference'] = $request->reference;
      } 
      $volunteer['username'] = $request->username;
      $volunteer['created_at'] = Carbon::now();

      DB::table('volunteers')->insert($volunteer);
      return response()->json([
        'status'=>'1',
        'message'=>'Volunteer Added',
    ]);        

   }
  //  public function sewapartner()
  //  {
  //    $sewapartners = DB::table('sewapartners')->orderBy("id", 'desc')->get();
  //    foreach($sewapartners as $sewa){
  //     $sewa->service_name = DB::table('sewapartner_services')->where('sewapartner_id',$sewa->id)->pluck('service_name');
  //     $sewa->service = implode(",",$sewa->service_name->toArray());
     
  //    }   
  //    return view('Admin.sewapartner',compact('sewapartners')); 
  //  }
  public function sewapartner(Request $request)
  {
    $services = DB::table('services')->orderby('id','desc')->get();
   
    DB::statement(DB::raw('set @rownum=0'));
    if($request->category == "Hospital"){
      $sewapartners = DB::table('sewapartners')->select("sewapartners.*",DB::raw('@rownum  := @rownum  + 1 AS rownum'))->where('categories','Hospital')->orderBy("id", 'desc')->get();
      foreach($sewapartners as $sewa){
        $sewa->service_name = DB::table('sewapartner_services')->where('sewapartner_id',$sewa->id)->pluck('service_name');
        $sewa->service = implode(", "  , $sewa->service_name->toArray());
       
       }   
    }
    elseif($request->category == "Clinic"){
      $sewapartners = DB::table('sewapartners')->select("sewapartners.*",DB::raw('@rownum  := @rownum  + 1 AS rownum'))->where('categories','Clinic')->orderBy("id", 'desc')->get();
      foreach($sewapartners as $sewa){
        $sewa->service_name = DB::table('sewapartner_services')->where('sewapartner_id',$sewa->id)->pluck('service_name');
        $sewa->service = implode(", ",$sewa->service_name->toArray());
       
       }   
    }
    elseif($request->category == "Laboratory"){
      $sewapartners = DB::table('sewapartners')->select("sewapartners.*",DB::raw('@rownum  := @rownum  + 1 AS rownum'))->where('categories','Laboratory')->orderBy("id", 'desc')->get();
      foreach($sewapartners as $sewa){
        $sewa->service_name = DB::table('sewapartner_services')->where('sewapartner_id',$sewa->id)->pluck('service_name');
        $sewa->service = implode(", " , $sewa->service_name->toArray());
       
       }   
    }
    elseif($request->category == "Medicalstore"){
      $sewapartners = DB::table('sewapartners')->select("sewapartners.*",DB::raw('@rownum  := @rownum  + 1 AS rownum'))->where('categories','Medicalstore')->orderBy("id", 'desc')->get();
      foreach($sewapartners as $sewa){
        $sewa->service_name = DB::table('sewapartner_services')->where('sewapartner_id',$sewa->id)->pluck('service_name');
        $sewa->service = implode(", ",$sewa->service_name->toArray());
       
       }   
    }
    else{
      $sewapartners = DB::table('sewapartners')->select("sewapartners.*",DB::raw('@rownum  := @rownum  + 1 AS rownum'))->orderBy("id", 'desc')->get();
      foreach($sewapartners as $sewa){
       $sewa->service_name = DB::table('sewapartner_services')->where('sewapartner_id',$sewa->id)->pluck('service_name');
       $sewa->service = implode(", " , $sewa->service_name->toArray());
      
      }   
    }
    if($request->service){
      $data = DB::table('sewapartner_services')->whereIn('service_name',$request->service)-get();
      
    }
 
   
    if ($request->ajax()) {
      // dd($data);
            return Datatables::of($sewapartners)
                ->addIndexColumn()
                ->addColumn('id', function($row){
                  $id='SW'.$row->id;
                  return $id;
              })
              ->addColumn('name', function($row){
                $name='<a href="'.url("Admin/sewadetails").'/'.$row->id.'">'.$row->name.'</a>';
                return $name;
            })
                ->addColumn('profile', function($row){
                  $profile='<img src=" '.$row->profile.' "/ style="height:50px;width:50px">';
                  return $profile;
              })
                 ->addColumn('active', function($row){
                  $active = $row->active_status == 1 ? "<button class='on' id='active' onclick='show($row->id)'><i class='fa-solid fa-toggle-on' ></i></button>":
                  "<button class='on' id='inactive' onclick='show($row->id)'><i class='fa-solid fa-toggle-off' ></i></button>";
                  return $active;
              })
              ->addColumn('badge', function($row){
                $badge = $row->badge_status == 1 ? "<button class='on' id='active' onclick='badge($row->id)'><i class='fa-solid fa-toggle-on' ></i></button>":
                "<button class='on' id='inactive' onclick='badge($row->id)'><i class='fa-solid fa-toggle-off' ></i></button>";
                return $badge;
            })
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="'.url("Admin/editsewapartner").'/'.$row->id.'"><i class="fa-solid fa-square-pen" style="font-size:25px;margin-right: 3px;"></i></a>';
                    $actionBtn .= '<a href="'.url("Admin/deletesewapartner").'/'.$row->id.'"><i class="fa-solid fa-trash-can" style="color:red; font-size:23px;margin-left: 4px;" onclick="return confirm(`Are you sure to delete this?`)"></i></a>'; 
                    
                    return $actionBtn;
                    // return $action;
                })
             
             
            
               
            
           
              
           
           
        
        
                ->rawColumns(['id','name','profile','action','status','active','badge'])
                ->make(true);
        }
      
          return view('Admin.sewapartner',compact('services'));
      
       
  }
  public function sewapartner1(Request $request)
  {
    $services = DB::table('services')->orderby('id','desc')->get();
   
    DB::statement(DB::raw('set @rownum=0'));
    if($request->category == "Hospital"){
      $sewapartners = DB::table('sewapartners')->select("sewapartners.*",DB::raw('@rownum  := @rownum  + 1 AS rownum'))->where('categories','Hospital')->orderBy("id", 'desc')->where('is_deleted','0')->get();
      foreach($sewapartners as $sewa){
        $sewa->service_name = DB::table('sewapartner_services')->where('sewapartner_id',$sewa->id)->pluck('service_name');
        $sewa->service = implode(", "  , $sewa->service_name->toArray());
       
       }   
    }
    elseif($request->category == "Clinic"){
      $sewapartners = DB::table('sewapartners')->select("sewapartners.*",DB::raw('@rownum  := @rownum  + 1 AS rownum'))->where('categories','Clinic')->orderBy("id", 'desc')->where('is_deleted','0')->get();
      foreach($sewapartners as $sewa){
        $sewa->service_name = DB::table('sewapartner_services')->where('sewapartner_id',$sewa->id)->pluck('service_name');
        $sewa->service = implode(", ",$sewa->service_name->toArray());
       
       }   
    }
    elseif($request->category == "Laboratory"){
      $sewapartners = DB::table('sewapartners')->select("sewapartners.*",DB::raw('@rownum  := @rownum  + 1 AS rownum'))->where('categories','Laboratory')->orderBy("id", 'desc')->where('is_deleted','0')->get();
      foreach($sewapartners as $sewa){
        $sewa->service_name = DB::table('sewapartner_services')->where('sewapartner_id',$sewa->id)->pluck('service_name');
        $sewa->service = implode(", " , $sewa->service_name->toArray());
       
       }   
    }
    elseif($request->category == "Medicalstore"){
      $sewapartners = DB::table('sewapartners')->select("sewapartners.*",DB::raw('@rownum  := @rownum  + 1 AS rownum'))->where('categories','Medicalstore')->where('is_deleted','0')->orderBy("id", 'desc')->get();
      foreach($sewapartners as $sewa){
        $sewa->service_name = DB::table('sewapartner_services')->where('sewapartner_id',$sewa->id)->pluck('service_name');
        $sewa->service = implode(", ",$sewa->service_name->toArray());
       
       }   
    }
    else{
      $sewapartners = DB::table('sewapartners')->select("sewapartners.*",DB::raw('@rownum  := @rownum  + 1 AS rownum'))->where('is_deleted','0')->orderBy("id", 'desc')->get();
      foreach($sewapartners as $sewa){
       $sewa->service_name = DB::table('sewapartner_services')->where('sewapartner_id',$sewa->id)->pluck('service_name');
       $sewa->service = implode(", " , $sewa->service_name->toArray());
      
      }   
    }
    if($request->service){
      $data = DB::table('sewapartner_services')->whereIn('service_name',$request->service)-get();
      
    }
 
   
      if ($request->ajax()) {
      // dd($data);
            return Datatables::of($sewapartners)
              ->addIndexColumn()
              ->addColumn('id', function($row){
                  $id='SW'.$row->id;
                  return $id;
              })
              ->addColumn('name', function($row){
                $name='<a href="'.url("Admin/sewadetails1").'/'.$row->id.'">'.$row->name.'</a>';
                return $name;
            })
                ->addColumn('profile', function($row){
                  $profile='<img src=" '.$row->profile.' "/ style="height:50px;width:50px">';
                  return $profile;
              })
                 ->addColumn('active', function($row){
                  $active = $row->active_status == 1 ? "<button class='on' id='active' onclick='show($row->id)'><i class='fa-solid fa-toggle-on' ></i></button>":
                  "<button class='on' id='inactive' onclick='show($row->id)'><i class='fa-solid fa-toggle-off' ></i></button>";
                  return $active;
              })
              ->addColumn('badge', function($row){
                $badge = $row->badge_status == 1 ? "<button class='on' id='active' onclick='badge($row->id)'><i class='fa-solid fa-toggle-on' ></i></button>":
                "<button class='on' id='inactive' onclick='badge($row->id)'><i class='fa-solid fa-toggle-off' ></i></button>";
                return $badge;
            })
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="'.url("Admin/editsewapartner").'/'.$row->id.'"><i class="fa-solid fa-square-pen" style="font-size:25px;margin-right: 3px;"></i></a>';
                    $actionBtn .= '<a href="'.url("Admin/deletesewapartner").'/'.$row->id.'"><i class="fa-solid fa-trash-can" style="color:red; font-size:23px;margin-left: 4px;" onclick="return confirm(`Are you sure to delete this?`)"></i></a>'; 
                    
                    return $actionBtn;
                    // return $action;
                })
        
                ->rawColumns(['id','name','profile','action','status','active','badge'])
                ->make(true);
        }
      
    return view('Admin.sewapartner1',compact('services'));
      
       
  }
  //  public function subadmin()
  //  {
  //   $subadmins = DB::table('subadmins')->orderby('id','desc')->get();
  //   // dd($subadmins);
  //   return view('Admin.subadmin',compact('subadmins'));
  //  }
   public function subadmin(Request $request)
   {
     DB::statement(DB::raw('set @rownum=0'));
    
     $subadmins = DB::table('subadmins')->orderby('id','desc')->get();
   
     if ($request->ajax()) {
       // dd($order_details);
             return Datatables::of($subadmins)
                 ->addIndexColumn()
               
                 ->addColumn('id', function($row){
                  $id="SB".$row->id;
                  return $id;
              })

               ->addColumn('name', function($row){
                 $name='<a href="'.url("Admin/viewdata").'/'.$row->id.'">'.$row->name.'</a>';
                 return $name;
             })
                
                  ->addColumn('active', function($row){
                  
                    $active = $row->active_status == 1 ? "<button class='on' id='active' onclick='show($row->id)' ><i class='fa-solid fa-toggle-on'  ></i></button>":
                    "<button class='on' id='inactive' onclick='show($row->id)' ><i class='fa-solid fa-toggle-off'  ></i></button>";
                    return $active;
                
                  
               })
           
                 ->addColumn('action', function($row){
                     $actionBtn = '<a href="'.url("Admin/editsubadmin").'/'.$row->id.'"><i class="fa-solid fa-square-pen" style="font-size:25px;"></i></a>';
                     $actionBtn .= '<a href="'.url("Admin/deletesubadmin").'/'.$row->id.'"><i class="fa-solid fa-trash-can" style="color:red; font-size:23px;margin-left: 6px;" onclick="return confirm(`Are you sure to delete this?`)" ></i></a>';
                     
                     return $actionBtn;
                     // return $action;
                 })
             
              
              
             
                
             
            
               
            
            
         
         
                 ->rawColumns(['id','name','active','action'])
                 ->make(true);
         }
       
           return view('Admin.subadmin');
       
        
   }
  //  public function viewcardholder(){
  //   $cardholderdata = DB::table('cardholder')->orderBy("id", 'desc')->get();
  //   return view('Admin.view_cardhholder',compact('cardholderdata'));     
  //  }
   public function viewcardholder(Request $request)
   {

    DB::statement(DB::raw('set @rownum=0'));
    $now = Carbon::now();       
    $yesterday = Carbon::yesterday();
    $date = Carbon::now()->subDays(7);
    
    if($request->get('range')  && $request->get('from_date') && $request->get('to_date') ) {
      $from_date = $request->get('from_date');
      $to_date = $request->get('to_date');

      if($request->get('range')=='today'){
        $cardholder = DB::table('cardholder')->select("cardholder.*",DB::raw('@rownum  := @rownum  + 1 AS rownum'))
        ->whereDate('created_at',$now)
        ->whereBetween('cardholder.created_at', array($from_date, $to_date))
        ->orderBy("id", 'desc')->get();
      }
      elseif($request->get('range')=='yesterday'){
        $cardholder = DB::table('cardholder')->select("cardholder.*",DB::raw('@rownum  := @rownum  + 1 AS rownum'))
        ->whereDate('created_at',$yesterday)
        ->whereBetween('cardholder.created_at', array($from_date, $to_date))
        ->orderBy("id", 'desc')->get();
      }
      elseif($request->get('range')=='weekly'){
        $cardholder = DB::table('cardholder')->select("cardholder.*",DB::raw('@rownum  := @rownum  + 1 AS rownum'))
        ->whereDate('created_at','>=',$date)
        ->whereBetween('cardholder.created_at', array($from_date, $to_date))
        ->orderBy("id", 'desc')->get();
      } 
      elseif($request->get('range')=='monthly'){
        $cardholder = DB::table('cardholder')->select("cardholder.*",DB::raw('@rownum  := @rownum  + 1 AS rownum'))
        ->whereMonth('created_at',Carbon::now()->month)
        ->whereBetween('cardholder.created_at', array($from_date, $to_date))
        ->orderBy("id", 'desc')->get();
      } 
      else{
        $cardholder = DB::table('cardholder')->select("cardholder.*",DB::raw('@rownum  := @rownum  + 1 AS rownum'))
        
        ->whereBetween('cardholder.created_at', array($from_date, $to_date))
        ->orderBy("id", 'desc')->get();
      }      

    }
    elseif($request->get('range') && $request->get('isNeedy')){
      $is_needy = $request->get('isNeedy');
      if($request->get('range')=='today'){
        $cardholder = DB::table('cardholder')->select("cardholder.*",DB::raw('@rownum  := @rownum  + 1 AS rownum'))
        ->whereDate('created_at',$now)
        ->where('is_needy',$is_needy)
        ->orderBy("id", 'desc')->get();
      }
      elseif($request->get('range')=='yesterday'){
        $cardholder = DB::table('cardholder')->select("cardholder.*",DB::raw('@rownum  := @rownum  + 1 AS rownum'))
        ->whereDate('created_at',$yesterday)
        ->where('is_needy',$is_needy)
        ->orderBy("id", 'desc')->get();
      }
      elseif($request->get('range')=='weekly'){
        $cardholder = DB::table('cardholder')->select("cardholder.*",DB::raw('@rownum  := @rownum  + 1 AS rownum'))
        ->whereDate('created_at','>=',$date)
        ->where('is_needy',$is_needy)
        ->orderBy("id", 'desc')->get();
      } 
      elseif($request->get('range')=='monthly'){
        $cardholder = DB::table('cardholder')->select("cardholder.*",DB::raw('@rownum  := @rownum  + 1 AS rownum'))
        ->whereMonth('created_at',Carbon::now()->month)
        ->where('is_needy',$is_needy)
        ->orderBy("id", 'desc')->get();
      } 
      else{
        $cardholder = DB::table('cardholder')->select("cardholder.*",DB::raw('@rownum  := @rownum  + 1 AS rownum'))
        ->where('is_needy',$is_needy)
        ->orderBy("id", 'desc')->get();
      }      
    }
    elseif($request->get('range')){
      if($request->get('range')=='today'){
        $cardholder = DB::table('cardholder')->select("cardholder.*",DB::raw('@rownum  := @rownum  + 1 AS rownum'))
        ->whereDate('created_at',$now)
        
        ->orderBy("id", 'desc')->get();
      }
      elseif($request->get('range')=='yesterday'){
        $cardholder = DB::table('cardholder')->select("cardholder.*",DB::raw('@rownum  := @rownum  + 1 AS rownum'))
        ->whereDate('created_at',$yesterday)
      
        ->orderBy("id", 'desc')->get();
      }
      elseif($request->get('range')=='weekly'){
        $cardholder = DB::table('cardholder')->select("cardholder.*",DB::raw('@rownum  := @rownum  + 1 AS rownum'))
        ->whereDate('created_at','>=',$date)
        
        ->orderBy("id", 'desc')->get();
      } 
      elseif($request->get('range')=='monthly'){
        $cardholder = DB::table('cardholder')->select("cardholder.*",DB::raw('@rownum  := @rownum  + 1 AS rownum'))
        ->whereMonth('created_at',Carbon::now()->month)
        
        ->orderBy("id", 'desc')->get();
      } 
      else{
        $cardholder = DB::table('cardholder')->select("cardholder.*",DB::raw('@rownum  := @rownum  + 1 AS rownum'))
        
        
        ->orderBy("id", 'desc')->get();
      }      
    }
    elseif($request->get('from_date') && $request->get('to_date')) {
      $from_date = $request->get('from_date');
      $to_date = $request->get('to_date');
      $cardholder = DB::table('cardholder')->select("cardholder.*",DB::raw('@rownum  := @rownum  + 1 AS rownum'))
      ->whereBetween('cardholder.created_at', array($from_date, $to_date))
      ->orderBy("id", 'desc')->get();  
    }
    elseif($request->get('from_date') && $request->get('to_date') && $request->get('isNeedy') ) {

      $is_needy = $request->get('isNeedy');

      $from_date = $request->get('from_date');
      $to_date = $request->get('to_date');

      $cardholder = DB::table('cardholder')->select("cardholder.*",DB::raw('@rownum  := @rownum  + 1 AS rownum'))
      ->where('cardholder.is_needy',$is_needy)
      ->whereBetween('cardholder.created_at', array($from_date, $to_date))
      ->orderBy("id", 'desc')->get(); 

    }
    elseif($request->get('isNeedy') ) {
      $is_needy = $request->get('isNeedy');

      $cardholder = DB::table('cardholder')->select("cardholder.*",DB::raw('@rownum  := @rownum  + 1 AS rownum'))
      ->where('cardholder.is_needy',$is_needy)
      ->orderBy("id", 'desc')->get(); 

    }
    else {
      $cardholder = DB::table('cardholder')->select("cardholder.*",DB::raw('@rownum  := @rownum  + 1 AS rownum'))->orderBy("id", 'desc')->get();
    }   

    if ($request->ajax()) {
      // dd($order_details);
      return Datatables::of($cardholder)
      ->addIndexColumn()
      
      ->addColumn('name', function($row){
        $name='<a href="'.url("Admin/carddata").'/'.$row->id.'">'.$row->name."($row->age yrs)".'</a>';
        return $name;
      })

              
      ->addColumn('active', function($row){
        if($row->verify_status == 0){
          $active = $row->active_status == 1 ? "<button class='on' id='active' onclick='show($row->id)' ><i class='fa-solid fa-toggle-on'  ></i></button>":
          "<button class='on' id='inactive' onclick='show($row->id)' disabled><i class='fa-solid fa-toggle-off'  ></i></button>";
          return $active;
        } 
        else{
          $active = $row->active_status == 1 ? "<button class='on' id='active' onclick='show($row->id)' ><i class='fa-solid fa-toggle-on'  ></i></button>":
          "<button class='on' id='inactive' onclick='show($row->id)' ><i class='fa-solid fa-toggle-off'  ></i></button>";
          return $active;
        }
                
      })
      ->addColumn('verify', function($row){
        $verify = $row->verify_status == 1 ? "<button class='on' id='active' onclick='verify($row->id)'><i class='fa-solid fa-toggle-on' ></i></button>":
        "<button class='on' id='inactive' onclick='verify($row->id)'><i class='fa-solid fa-toggle-off' ></i></button>";
        return $verify;
      })
      ->addColumn('action', function($row){
        $actionBtn = '<a href="'.url("Admin/editcardholder").'/'.$row->id.'"><i class="fa-solid fa-square-pen" style="font-size:25px;"></i></a>';
        $actionBtn .= '<a href="'.url("Admin/deletecardholder").'/'.$row->id.'"><i class="fa-solid fa-trash-can" style="color:red; font-size:23px;margin-left: 6px;" onclick="return confirm(`Are you sure to delete this?`)" ></i></a>';
        
        return $actionBtn;
            
      })
      ->addColumn('family', function($row){
        $family ='<a href="'.url("Admin/family_details").'/'.$row->id.'">Family Details</a>';
        return $family;
      })
      ->addColumn('children', function($row){               
        $children ='<a href="'.url("Admin/children_details").'/'.$row->id.'">Children Details</a>';
        return $children;
      })
      ->addColumn('download_pdf', function($row){  
        if($row->is_needy == 'No') {
          $download_pdf ='<a href="'.url("Admin/khalsaformdata").'/'.$row->id.'">Download Card</a>';
        } else {
          $download_pdf ='<a href="'.url("Admin/khalsamemberformdata").'/'.$row->id.'">Download Card</a>';
        }              
        return $download_pdf;  
      })
      ->rawColumns(['name','active','verify','family','action','children','download_pdf'])
      ->make(true);
    }
    return view('Admin.view_cardhholder');
        
   }

  public function view_active_cardholder(Request $request){

    DB::statement(DB::raw('set @rownum=0'));
    $now = Carbon::now();       
    $yesterday = Carbon::yesterday();
    $date = Carbon::now()->subDays(7);


    if($request->get('range')  && $request->get('from_date') && $request->get('to_date') ) {
      $from_date = $request->get('from_date');
      $to_date = $request->get('to_date');

      if($request->get('range')=='today'){
        $cardholder = DB::table('cardholder')->select("cardholder.*",DB::raw('@rownum  := @rownum  + 1 AS rownum'))
        ->where('active_status',0)
        ->whereDate('created_at',$now)
        ->whereBetween('cardholder.created_at', array($from_date, $to_date))
        ->orderBy("id", 'desc')->get();
      }
      elseif($request->get('range')=='yesterday'){
        $cardholder = DB::table('cardholder')->select("cardholder.*",DB::raw('@rownum  := @rownum  + 1 AS rownum'))
        ->where('active_status',0)
        ->whereDate('created_at',$yesterday)
        ->whereBetween('cardholder.created_at', array($from_date, $to_date))
        ->orderBy("id", 'desc')->get();
      }
      elseif($request->get('range')=='weekly'){
        $cardholder = DB::table('cardholder')->select("cardholder.*",DB::raw('@rownum  := @rownum  + 1 AS rownum'))
        ->where('active_status',1)
        ->whereDate('created_at','>=',$date)
        ->whereBetween('cardholder.created_at', array($from_date, $to_date))
        ->orderBy("id", 'desc')->get();
      } 
      elseif($request->get('range')=='monthly'){
        $cardholder = DB::table('cardholder')->select("cardholder.*",DB::raw('@rownum  := @rownum  + 1 AS rownum'))
        ->where('active_status',1)
        ->whereMonth('created_at',Carbon::now()->month)
        ->whereBetween('cardholder.created_at', array($from_date, $to_date))
        ->orderBy("id", 'desc')->get();
      } 
      else{
        $cardholder = DB::table('cardholder')->select("cardholder.*",DB::raw('@rownum  := @rownum  + 1 AS rownum'))
        ->where('active_status',1)
        ->whereBetween('cardholder.created_at', array($from_date, $to_date))
        ->orderBy("id", 'desc')->get();
      }      

    }
    elseif($request->get('range')){
      if($request->get('range')=='today'){
        $cardholder = DB::table('cardholder')->select("cardholder.*",DB::raw('@rownum  := @rownum  + 1 AS rownum'))
        ->where('active_status',1)
        ->whereDate('created_at',$now)          
        ->orderBy("id", 'desc')->get();
      }
      elseif($request->get('range')=='yesterday'){
        $cardholder = DB::table('cardholder')->select("cardholder.*",DB::raw('@rownum  := @rownum  + 1 AS rownum'))
        ->where('active_status',1)
        ->whereDate('created_at',$yesterday)
        ->orderBy("id", 'desc')->get();
      }
      elseif($request->get('range')=='weekly'){
        $cardholder = DB::table('cardholder')->select("cardholder.*",DB::raw('@rownum  := @rownum  + 1 AS rownum'))
        ->where('active_status',1)
        ->whereDate('created_at','>=',$date)   
        ->orderBy("id", 'desc')->get();
      } 
      elseif($request->get('range')=='monthly'){
        $cardholder = DB::table('cardholder')->select("cardholder.*",DB::raw('@rownum  := @rownum  + 1 AS rownum'))
        ->where('active_status',1)
        ->whereMonth('created_at',Carbon::now()->month)
        ->orderBy("id", 'desc')->get();
      } 
      else{
        $cardholder = DB::table('cardholder')->select("cardholder.*",DB::raw('@rownum  := @rownum  + 1 AS rownum'))
        ->where('active_status',1)
        ->orderBy("id", 'desc')->get();
      }      
    }
    elseif($request->get('from_date') && $request->get('to_date')) {
      $from_date = $request->get('from_date');
      $to_date = $request->get('to_date');
      $cardholder = DB::table('cardholder')->select("cardholder.*",DB::raw('@rownum  := @rownum  + 1 AS rownum'))
        ->where('active_status',1)
        ->whereBetween('cardholder.created_at', array($from_date, $to_date))
      ->orderBy("id", 'desc')->get();  
    }
    else {
      $cardholder = DB::table('cardholder')->select("cardholder.*",DB::raw('@rownum  := @rownum  + 1 AS rownum'))->where('active_status',1)->orderBy("id", 'desc')->get();
    } 


    if ($request->ajax()) {
      // dd($order_details);
      return Datatables::of($cardholder)
      ->addIndexColumn()
      
      ->addColumn('name', function($row){
        $name='<a href="'.url("Admin/carddata").'/'.$row->id.'">'.$row->name."($row->age yrs)".'</a>';
        return $name;
      })
              
      ->addColumn('active', function($row){
        if($row->verify_status == 0){
          $active = $row->active_status == 1 ? "<button class='on' id='active' onclick='show($row->id)' ><i class='fa-solid fa-toggle-on'  ></i></button>":
          "<button class='on' id='inactive' onclick='show($row->id)' disabled><i class='fa-solid fa-toggle-off'  ></i></button>";
          return $active;
        } 
        else{
          $active = $row->active_status == 1 ? "<button class='on' id='active' onclick='show($row->id)' ><i class='fa-solid fa-toggle-on'  ></i></button>":
          "<button class='on' id='inactive' onclick='show($row->id)' ><i class='fa-solid fa-toggle-off'  ></i></button>";
          return $active;
        }
                
      })
      ->addColumn('verify', function($row){
        $verify = $row->verify_status == 1 ? "<button class='on' id='active' onclick='verify($row->id)'><i class='fa-solid fa-toggle-on' ></i></button>":
        "<button class='on' id='inactive' onclick='verify($row->id)'><i class='fa-solid fa-toggle-off' ></i></button>";
        return $verify;
      })
      ->addColumn('action', function($row){
        $actionBtn = '<a href="'.url("Admin/editcardholder").'/'.$row->id.'"><i class="fa-solid fa-square-pen" style="font-size:25px;"></i></a>';
        $actionBtn .= '<a href="'.url("Admin/deletecardholder").'/'.$row->id.'"><i class="fa-solid fa-trash-can" style="color:red; font-size:23px;margin-left: 6px;" onclick="return confirm(`Are you sure to delete this?`)" ></i></a>';
        
        return $actionBtn;
            
      })
      ->addColumn('family', function($row){
        $family ='<a href="'.url("Admin/family_details").'/'.$row->id.'">Family Details</a>';
        return $family;
      })
      ->addColumn('children', function($row){               
        $children ='<a href="'.url("Admin/children_details").'/'.$row->id.'">Children Details</a>';
        return $children;
      })
      ->addColumn('download_pdf', function($row){               
        if($row->is_needy == 'No') {
          $download_pdf ='<a href="'.url("Admin/khalsaformdata").'/'.$row->id.'">Download Card</a>';
        } else {
          $download_pdf ='<a href="'.url("Admin/khalsamemberformdata").'/'.$row->id.'">Download Card</a>';
        }
        return $download_pdf;  
      })
      ->rawColumns(['name','active','verify','family','action','children','download_pdf'])
      ->make(true);
    }

    return view('Admin.view_cardhholder');
  }

  public function view_deactive_cardholder(Request $request){

    DB::statement(DB::raw('set @rownum=0'));
    $now = Carbon::now();       
    $yesterday = Carbon::yesterday();
    $date = Carbon::now()->subDays(7);

    
    if($request->get('range')  && $request->get('from_date') && $request->get('to_date') ) {
      $from_date = $request->get('from_date');
      $to_date = $request->get('to_date');

      if($request->get('range')=='today'){
        $cardholder = DB::table('cardholder')->select("cardholder.*",DB::raw('@rownum  := @rownum  + 1 AS rownum'))
        ->where('active_status',0)
        ->whereDate('created_at',$now)
        ->whereBetween('cardholder.created_at', array($from_date, $to_date))
        ->orderBy("id", 'desc')->get();
      }
      elseif($request->get('range')=='yesterday'){
        $cardholder = DB::table('cardholder')->select("cardholder.*",DB::raw('@rownum  := @rownum  + 1 AS rownum'))
        ->where('active_status',0)
        ->whereDate('created_at',$yesterday)
        ->whereBetween('cardholder.created_at', array($from_date, $to_date))
        ->orderBy("id", 'desc')->get();
      }
      elseif($request->get('range')=='weekly'){
        $cardholder = DB::table('cardholder')->select("cardholder.*",DB::raw('@rownum  := @rownum  + 1 AS rownum'))
        ->where('active_status',0)
        ->whereDate('created_at','>=',$date)
        ->whereBetween('cardholder.created_at', array($from_date, $to_date))
        ->orderBy("id", 'desc')->get();
      } 
      elseif($request->get('range')=='monthly'){
        $cardholder = DB::table('cardholder')->select("cardholder.*",DB::raw('@rownum  := @rownum  + 1 AS rownum'))
        ->where('active_status',0)
        ->whereMonth('created_at',Carbon::now()->month)
        ->whereBetween('cardholder.created_at', array($from_date, $to_date))
        ->orderBy("id", 'desc')->get();
      } 
      else{
        $cardholder = DB::table('cardholder')->select("cardholder.*",DB::raw('@rownum  := @rownum  + 1 AS rownum'))
        ->where('active_status',0)
        ->whereBetween('cardholder.created_at', array($from_date, $to_date))
        ->orderBy("id", 'desc')->get();
      }      

    }
    elseif($request->get('range')){
      if($request->get('range')=='today'){
        $cardholder = DB::table('cardholder')->select("cardholder.*",DB::raw('@rownum  := @rownum  + 1 AS rownum'))
        ->where('active_status',0)
        ->whereDate('created_at',$now)          
        ->orderBy("id", 'desc')->get();
      }
      elseif($request->get('range')=='yesterday'){
        $cardholder = DB::table('cardholder')->select("cardholder.*",DB::raw('@rownum  := @rownum  + 1 AS rownum'))
        ->where('active_status',0)
        ->whereDate('created_at',$yesterday)
        ->orderBy("id", 'desc')->get();
      }
      elseif($request->get('range')=='weekly'){
        $cardholder = DB::table('cardholder')->select("cardholder.*",DB::raw('@rownum  := @rownum  + 1 AS rownum'))
        ->where('active_status',0)
        ->whereDate('created_at','>=',$date)   
        ->orderBy("id", 'desc')->get();
      } 
      elseif($request->get('range')=='monthly'){
        $cardholder = DB::table('cardholder')->select("cardholder.*",DB::raw('@rownum  := @rownum  + 1 AS rownum'))
        ->where('active_status',0)
        ->whereMonth('created_at',Carbon::now()->month)
        ->orderBy("id", 'desc')->get();
      } 
      else{
        $cardholder = DB::table('cardholder')->select("cardholder.*",DB::raw('@rownum  := @rownum  + 1 AS rownum'))
        ->where('active_status',0)
        ->orderBy("id", 'desc')->get();
      }      
    }
    elseif($request->get('from_date') && $request->get('to_date')) {
      $from_date = $request->get('from_date');
      $to_date = $request->get('to_date');
      $cardholder = DB::table('cardholder')->select("cardholder.*",DB::raw('@rownum  := @rownum  + 1 AS rownum'))
        ->where('active_status',0)
        ->whereBetween('cardholder.created_at', array($from_date, $to_date))
      ->orderBy("id", 'desc')->get();  
    }
    else {
      $cardholder = DB::table('cardholder')->select("cardholder.*",DB::raw('@rownum  := @rownum  + 1 AS rownum'))->where('active_status',0)->orderBy("id", 'desc')->get();
    } 


    if ($request->ajax()) {
      // dd($order_details);
      return Datatables::of($cardholder)
      ->addIndexColumn()
      
      ->addColumn('name', function($row){
        $name='<a href="'.url("Admin/carddata").'/'.$row->id.'">'.$row->name."($row->age yrs)".'</a>';
        return $name;
      })
              
      ->addColumn('active', function($row){
        if($row->verify_status == 0){
          $active = $row->active_status == 1 ? "<button class='on' id='active' onclick='show($row->id)' ><i class='fa-solid fa-toggle-on'  ></i></button>":
          "<button class='on' id='inactive' onclick='show($row->id)' disabled><i class='fa-solid fa-toggle-off'  ></i></button>";
          return $active;
        } 
        else{
          $active = $row->active_status == 1 ? "<button class='on' id='active' onclick='show($row->id)' ><i class='fa-solid fa-toggle-on'  ></i></button>":
          "<button class='on' id='inactive' onclick='show($row->id)' ><i class='fa-solid fa-toggle-off'  ></i></button>";
          return $active;
        }
                
      })
      ->addColumn('verify', function($row){
        $verify = $row->verify_status == 1 ? "<button class='on' id='active' onclick='verify($row->id)'><i class='fa-solid fa-toggle-on' ></i></button>":
        "<button class='on' id='inactive' onclick='verify($row->id)'><i class='fa-solid fa-toggle-off' ></i></button>";
        return $verify;
      })
      ->addColumn('action', function($row){
        $actionBtn = '<a href="'.url("Admin/editcardholder").'/'.$row->id.'"><i class="fa-solid fa-square-pen" style="font-size:25px;"></i></a>';
        $actionBtn .= '<a href="'.url("Admin/deletecardholder").'/'.$row->id.'"><i class="fa-solid fa-trash-can" style="color:red; font-size:23px;margin-left: 6px;" onclick="return confirm(`Are you sure to delete this?`)" ></i></a>';
        
        return $actionBtn;
            
      })
      ->addColumn('family', function($row){
        $family ='<a href="'.url("Admin/family_details").'/'.$row->id.'">Family Details</a>';
        return $family;
      })
      ->addColumn('children', function($row){               
        $children ='<a href="'.url("Admin/children_details").'/'.$row->id.'">Children Details</a>';
        return $children;
      })
      ->addColumn('download_pdf', function($row){               
        if($row->is_needy == 'No') {
          $download_pdf ='<a href="'.url("Admin/khalsaformdata").'/'.$row->id.'">Download Card</a>';
        } else {
          $download_pdf ='<a href="'.url("Admin/khalsamemberformdata").'/'.$row->id.'">Download Card</a>';
        }
        return $download_pdf;  
      })
      ->rawColumns(['name','active','verify','family','action','children','download_pdf'])
      ->make(true);
    }

    return view('Admin.view_cardhholder');
  }


   public function family_details($id){

    $familydata = DB::table('cardholder_family')->join('cardholder','cardholder.id','=','cardholder_family.cardholder_id')->where('cardholder_family.cardholder_id',$id)->select('cardholder_family.*','cardholder.card_id')->get();   

    return view('Admin.view_familydetails',compact('familydata','id'));  

   }

   public function children_details($id){

    $childrendata = DB::table('cardholder_children')->join('cardholder','cardholder.id','=','cardholder_children.cardholder_id')->where('cardholder_children.cardholder_id',$id)->select('cardholder_children.*','cardholder.card_id')->get();
    
    return view('Admin.view_childrendetails',compact('childrendata','id'));     
   }
   public function addsubadmin(){
    $cities = DB::table('cities')->get();
    return view('Admin.addsubadmin',compact('cities'));
   }

    public  function addsubadmindata(Request $request){
         $validator = Validator::make($request->all(), [
            'name'              =>     'required|',
            'email'             =>     'email|unique:subadmins',
            'username'              =>     'required|unique:subadmins',
            'password'          =>     'required|max:9|min:6',
            'contact_number'    =>     'required|max:10',
            'village'              =>     'required',
            // 'landmark'              =>     'required',
            'address'           =>     'required',
          ]);
          if ( $validator->fails()) { 
            return response()->json([
                'status'=>'0',
                'message'=>$validator->errors()->first(),
            ]);          
        } 
         $subadmin = new SubAdmin();
         $subadmin->name = $request->get('name');
         $subadmin->email = $request->get('email');
         $subadmin->username = $request->get('username');
         $subadmin->password = bcrypt($request->get('password'));
         $subadmin->numpassword = $request->get('password');
         $subadmin->contact_number = $request->get('contact_number');
         $subadmin->village = $request->get('village');
         if( $request->get('landmark')){
          $subadmin->landmark = $request->get('landmark');
         }
         
         $subadmin->address = $request->get('address');
         $subadmin->created_at = Carbon::now();
         if($subadmin->save()){       
          return response()->json([
            'status'=>'1',
            'message'=>'Subadmin Added',
        ]);        
         }else{
          return response()->json([
            'status'=>'0',
            'message'=>'Subadmin not Added',
        ]);        
        }
    }
    public function addsewapartner(){
      $services = DB::table('services')->get();
      $doctors = DB::table('doctors')->get();
      $cities = DB::table('cities')->get();
      return view('Admin.addsewapartners',compact('doctors','services','cities'));
  }

  public  function addsewapartnersdata(Request $request)
  {
      $validator = Validator::make($request->all(), [
              'name'               =>     'required',
              'email'              =>     'email|unique:sewapartners',
              'username'           =>     'required',
              'contact_number'      =>     'required|max:11',
              'password'           =>     'required|max:9',
              'village'            =>     'required',
              'sewa_address'       =>     'required',
              'categories'         =>     'required',
              // 'timings'            =>     'required',
              // 'services'           =>     'required',
          ]);
          if ( $validator->fails()) { 
            return response()->json([
                'status'=>'0',
                'message'=>$validator->errors()->first(),
            ]);          
        } 
      // $sewapartner = new SewaPartner();
      $sewapartner['name'] = $request->get('name');
      $sewapartner['email'] = $request->get('email');
      $sewapartner['username'] = $request->get('username');
      if($request->hasfile('profile'))
      {
          $file = $request->profile;
          $path = storage_path().'/sewapartnerimg/';
          File::makeDirectory($path, $mode = 0777, true, true);
          $imagePath = storage_path().'/sewapartnerimg/';
          $post_image        = time().$file->getClientOriginalExtension();
          $image_url          = url('/').'/storage/sewapartnerimg/'.'/'. $post_image;   
          $file->move($imagePath, $post_image);
      }
      if($request->profile){
        $sewapartner['profile']= $image_url;
      }
      
      $sewapartner['password'] = bcrypt($request->get('password'));
      $sewapartner['numpassword'] = $request->get('password');
      $sewapartner['contactnumber'] = $request->get('contact_number');
      $sewapartner['village'] = $request->get('village');
      $sewapartner['sewa_address'] = $request->get('sewa_address');
      $sewapartner['categories'] = $request->get('categories');
     
      if($request->get('timings') > $request->get('timings2')){
        return response()->json([
          'status'=>'0',
          'message'=>'Please enter valid time',
      ]);          
        // return Redirect::back()->withErrors(['msg' => 'Please enter valid time']);
      }
      $sewapartner['timings'] = $request->get('timings');
         
      $sewapartner['timings2'] = $request->get('timings2');
      
      if($request->get('clinictimings')){
        $sewapartner['timings'] = $request->get('clinictimings');
      }
      $sewapartner['created_at'] = Carbon::now();
      $sewa_id = DB::table('sewapartners')->insertGetId($sewapartner);
     
      if($request->doctors){
        foreach($request->doctors as $doctor)
        {
           
            DB::table('sewapartner_doctors')->insert([
              'sewapartner_id'    => $sewa_id,                      
              'doctor_id'       => $doctor,
              'created_at' => Carbon::now(),                   
                
            ]);  
                 
        } 
      }
      if($request->services){
        
        foreach($request->services as $service)
        {
           
            DB::table('sewapartner_services')->insert([
              'sewapartner_id'    => $sewa_id,                      
              'service_name'       => $service,
              'created_at' => Carbon::now(),                   
            ]);  
                 
        } 
      }
      if($sewa_id){       
        return response()->json([
          'status'=>'1',
          'message'=>'Sewapartner Added',
      ]);                  
      }else{
        return response()->json([
          'status'=>'0',
          'message'=>'Sewapartner not Added',
      ]);          
      }
  }
  public function deletesubadmin($id)
  {
    DB::table('subadmins')->where('id',$id)->delete();
    return redirect()->back();
  }
  public function editsubadmin($id)
  {
    $subadmin = DB::table('subadmins')->where('id',$id)->first();
    // dd(dcrypt($subadmin->password));
    $cities = DB::table('cities')->get();
    return view('Admin.editsubadmin',compact('subadmin','cities'));
  }
  public function updatesubadmin(Request $request, $id)
  {
    // dd($id);
    $validator = Validator::make($request->all(), [
      'name'              =>     'required|',
      'email'             =>     'email',
      'username'              =>     'required',
      'password'          =>     'required|max:9:min:6',
      'contact_number'    =>     'required|max:13',
      'village'    =>     'required',
      // 'landmark'    =>     'required',
      'address'           =>     'required',
    ]);
    if ( $validator->fails()) { 
      return response()->json([
          'status'=>'0',
          'message'=>$validator->errors()->first(),
      ]);          
  } 
  //  $subadmin = new SubAdmin();
   $subadmin['name'] = $request->get('name');
   $subadmin['email'] = $request->get('email');
   $subadmin['username'] = $request->get('username');
   $subadmin['password'] = bcrypt($request->get('password'));
   $subadmin['numpassword'] = $request->get('password');
   $subadmin['contact_number'] = $request->get('contact_number');
   $subadmin['village'] = $request->get('village');
   $subadmin['landmark'] = $request->get('landmark');
   $subadmin['address'] = $request->get('address');
   $data = DB::table('subadmins')->where('id',$id)->update($subadmin);
   if($data){       
    return response()->json([
      'status'=>'1',
      'message'=>'Subadmin Updated',
  ]);        
   }else{
    return response()->json([
      'status'=>'0',
      'message'=>'Subadmin not Updated',
  ]);        
  }
  }
  // public function view_volunteer()
  // {
  //   $volunteers = DB::table('volunteers')->orderBy("id", 'desc')->get();
  //   return view('Admin.viewvolunteer',compact('volunteers'));
  // }
  public function view_volunteer(Request $request)
  {
    DB::statement(DB::raw('set @rownum=0'));
    $now = Carbon::now();       
    $yesterday = Carbon::yesterday();
    $date = Carbon::now()->subDays(7);
    if($request->get('range')  && $request->get('from_date') && $request->get('to_date') ) {
     $from_date = $request->get('from_date');
     $to_date = $request->get('to_date');

     if($request->get('range')=='today'){
     $volunteers = DB::table('volunteers')->select("volunteers.*",DB::raw('@rownum  := @rownum  + 1 AS rownum'))
     ->whereDate('created_at',$now)
     ->whereBetween('volunteers.created_at', array($from_date, $to_date))
     ->orderBy("id", 'desc')->get();
     }
     elseif($request->get('range')=='yesterday'){
       $volunteers = DB::table('volunteers')->select("volunteers.*",DB::raw('@rownum  := @rownum  + 1 AS rownum'))
       ->whereDate('created_at',$yesterday)
       ->whereBetween('volunteers.created_at', array($from_date, $to_date))
       ->orderBy("id", 'desc')->get();
       }
     elseif($request->get('range')=='weekly'){
       $volunteers = DB::table('volunteers')->select("volunteers.*",DB::raw('@rownum  := @rownum  + 1 AS rownum'))
       ->whereDate('created_at','>=',$date)
       ->whereBetween('volunteers.created_at', array($from_date, $to_date))
       ->orderBy("id", 'desc')->get();
       } 
     elseif($request->get('range')=='monthly'){
       $volunteers = DB::table('volunteers')->select("volunteers.*",DB::raw('@rownum  := @rownum  + 1 AS rownum'))
       ->whereMonth('created_at',Carbon::now()->month)
       ->whereBetween('volunteers.created_at', array($from_date, $to_date))
       ->orderBy("id", 'desc')->get();
       } 
     else{
       $volunteers = DB::table('volunteers')->select("volunteers.*",DB::raw('@rownum  := @rownum  + 1 AS rownum'))
      
       ->whereBetween('volunteers.created_at', array($from_date, $to_date))
       ->orderBy("id", 'desc')->get();
     }      

    
   }
   elseif($request->get('range'))
   {
     if($request->get('range')=='today'){
       $volunteers = DB::table('volunteers')->select("volunteers.*",DB::raw('@rownum  := @rownum  + 1 AS rownum'))
       ->whereDate('created_at',$now)
       
       ->orderBy("id", 'desc')->get();
       }
       elseif($request->get('range')=='yesterday'){
         $volunteers = DB::table('volunteers')->select("volunteers.*",DB::raw('@rownum  := @rownum  + 1 AS rownum'))
         ->whereDate('created_at',$yesterday)
       
         ->orderBy("id", 'desc')->get();
         }
       elseif($request->get('range')=='weekly'){
         $volunteers = DB::table('volunteers')->select("volunteers.*",DB::raw('@rownum  := @rownum  + 1 AS rownum'))
         ->whereDate('created_at','>=',$date)
        
         ->orderBy("id", 'desc')->get();
         } 
       elseif($request->get('range')=='monthly'){
         $volunteers = DB::table('volunteers')->select("volunteers.*",DB::raw('@rownum  := @rownum  + 1 AS rownum'))
         ->whereMonth('created_at',Carbon::now()->month)
         
         ->orderBy("id", 'desc')->get();
         } 
       else{
         $volunteers = DB::table('volunteers')->select("volunteers.*",DB::raw('@rownum  := @rownum  + 1 AS rownum'))
        
         
         ->orderBy("id", 'desc')->get();
       }      
   }
   elseif($request->get('from_date') && $request->get('to_date'))
   {
     $from_date = $request->get('from_date');
     $to_date = $request->get('to_date');
     $volunteers = DB::table('volunteers')->select("volunteers.*",DB::raw('@rownum  := @rownum  + 1 AS rownum'))
   
     ->whereBetween('volunteers.created_at', array($from_date, $to_date))
     ->orderBy("id", 'desc')->get();
     
   }
    else{
     $volunteers = DB::table('volunteers')->select("volunteers.*",DB::raw('@rownum  := @rownum  + 1 AS rownum'))
   
     ->orderBy("id", 'desc')->get();
    
      
      }   
    
   
    if ($request->ajax()) {
      // dd($order_details);
            return Datatables::of($volunteers)
                ->addIndexColumn()

                // ->addColumn('id', function($row){
                //   $id= 'VL'.$row->id;
                //   return $id;
                // })
                ->addColumn('id', function($row){
                  $id= '1469-'.(1000000+$row->id);
                  return $id;
                })

              ->addColumn('name', function($row){
                $name='<a href="'.url("Admin/volunteerdata").'/'.$row->id.'">'.$row->name.'</a>';
                return $name;
            })
            
              ->addColumn('profile_pic', function($row){
                if($row->profile_pic){
                  $profile_pic='<img src="'.$row->profile_pic.'" style="height: 50px;width:50px;">';
                  return $profile_pic;
                }else{
                  $profile_pic='';
                  return $profile_pic;
                }
                
            })
          
        
               
                 ->addColumn('active', function($row){
                 
                   $active = $row->active_status == 1 ? "<button class='on' id='active' onclick='show($row->id)' ><i class='fa-solid fa-toggle-on'  ></i></button>":
                   "<button class='on' id='inactive' onclick='show($row->id)'><i class='fa-solid fa-toggle-off'  ></i></button>";
                   return $active;
                 
                 
              })
              ->addColumn('download_pdf', function($row){               
                $download_pdf ='<a href="'.url("Admin/khalsacarddata").'/'.$row->id.'">Download Card</a>';
                return $download_pdf;
               
            })
          
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="'.url("Admin/editvolunteer").'/'.$row->id.'"><i class="fa-solid fa-square-pen" style="font-size:25px;"></i></a>';
                    $actionBtn .= '<a href="'.url("Admin/deletevolunteer").'/'.$row->id.'"><i class="fa-solid fa-trash-can" style="color:red; font-size:23px;margin-left: 6px;" onclick="return confirm(`Are you sure to delete this?`)" ></i></a>';
                    
                    return $actionBtn;
                    // return $action;
                })
          
      
             
             
            
               
            
           
              
           
           
        
        
                ->rawColumns(['id','name','profile_pic','active','download_pdf','action'])
                ->make(true);
        }
      
          return view('Admin.viewvolunteer');
      
       
  }
  public function editvolunteer($id)
  {
    $volunteer = DB::table('volunteers')->where('id',$id)->first();
    $cities = DB::table('cities')->get();
    return view('Admin.editvolunteer',compact('volunteer','cities'));
  }
  public function updatevolunteer(Request $request,$id)
   {
    $validator = Validator::make($request->all(), [ 
        'name'         => 'required',
        'name_punjabi'         => 'required',
        'email'         => 'email',
        'password'         => 'required|max:9',
        'contact_number'  => 'required|max:13',    
        'address'         => 'required',    
        'address_punjabi'         => 'required',    
         
        ]);  
        if ( $validator->fails()) { 
          return response()->json([
              'status'=>'0',
              'message'=>$validator->errors()->first(),
          ]);          
      } 
      $volunteer['name'] = $request->name;
      $volunteer['name_punjabi'] = $request->name_punjabi;
      $volunteer['email'] = $request->email; 
      $volunteer['password'] = bcrypt($request->password); 
      $volunteer['numpassword'] = $request->password; 
      $volunteer['contact_number'] = $request->contact_number; 

      $image_url_front = $request->oldaadhaar_card_front;
      $image_url_back = $request->oldaadhaar_card_back;

      if($request->hasfile('newaadhaar_card_front'))
      {
          $file = $request->newaadhaar_card_front;
          $path = storage_path().'/volunteer/';
          File::makeDirectory($path, $mode = 0777, true, true);
          $imagePath = storage_path().'/volunteer/';         
          $post_image        = time().$file->getClientOriginalName();
          $image_url_front          = url('/').'/storage/volunteer/'.'/'. $post_image;   
          $file->move($imagePath, $post_image);

          $volunteer['aadhaar_card_front']= $image_url_front;
      }

      if($request->hasfile('newaadhaar_card_back'))
      {
          $file = $request->newaadhaar_card_back;
          $path = storage_path().'/volunteer/';
          File::makeDirectory($path, $mode = 0777, true, true);
          $imagePath = storage_path().'/volunteer/';         
          $post_image        = time().$file->getClientOriginalName();
          $image_url_back          = url('/').'/storage/volunteer/'.'/'. $post_image;   
          $file->move($imagePath, $post_image);
          
          $volunteer['aadhaar_card_back']= $image_url_back;
      }


      $image_url = $request->oldvote_card;
      if($request->hasfile('newvote_card'))
      {
          $file = $request->newvote_card;
          $path = storage_path().'/volunteer/';
          File::makeDirectory($path, $mode = 0777, true, true);
          $imagePath = storage_path().'/volunteer/';         
          $post_image        = time().$file->getClientOriginalName();
          $image_url          = url('/').'/storage/volunteer/'.'/'. $post_image;   
          $file->move($imagePath, $post_image);
      }
      $volunteer['vote_card']= $image_url;
      $image_url = $request->oldprofile_pic;   
      if($request->hasfile('newprofile_pic'))
      {
          $file = $request->newprofile_pic;
          $path = storage_path().'/volunteer/';
          File::makeDirectory($path, $mode = 0777, true, true);
          $imagePath = storage_path().'/volunteer/';         
          $post_image        = time().$file->getClientOriginalName();
          $image_url          = url('/').'/storage/volunteer/'.'/'. $post_image;   
          $file->move($imagePath, $post_image);
      }
      $volunteer['profile_pic']= $image_url; 
      $volunteer['village'] = $request->village;
      $volunteer['landmark'] = $request->landmark;    
      $volunteer['address'] = $request->address;  
      $volunteer['address_punjabi'] = $request->address_punjabi;  
      $data = DB::table('volunteers')->where('id',$id)->update($volunteer);
      if($data){
        return response()->json([
          'status'=>'1',
          'message'=>'Volunteer Updated',
        ]);    
      }else{
        return response()->json([
          'status'=>'0',
          'message'=>'Volunteer not Updated',
        ]); 
      }
          

   }

   public function deletevolunteer($id)
   {
    DB::table('volunteers')->where('id',$id)->delete();
    return redirect()->back();
   }
   public function doctor()
   {
    return view('Admin.doctor');
   }
   public function savedoctor(Request $request)
   {
    
    $validator = Validator::make($request->all(), [
      'name'              =>     'required|',
      'qualification'             => 'required',
      // 'opd_timing'          =>     'required',
      'specialization'    =>     'required',
     
    ]);
    if ( $validator->fails()) { 
      return response()->json([
          'status'=>'0',
          'message'=>$validator->errors()->first(),
      ]);          
  } 
  $doctor['name'] = $request->get('name');
   $doctor['qualification'] = $request->get('qualification');
  //  $doctor['opd_timing'] = $request->get('opd_timing');
  //  $doctor['opd_timing2'] = $request->get('opd_timing2');
   $doctor['specialization'] = $request->get('specialization');
   $doctor['created_at'] = Carbon::now();
  //  $doctor['days'] = implode(',',$request->get('days'));
   
   
   $data_id = DB::table('doctors')->insertGetId($doctor);
  //  $data = explode(',',$request->days);
   
    // for($i=0;$i<sizeof($data);$i++){
    //  if($data[$i] == 'Monday'){
    //   $timm['doctor_id'] = $data_id;
    //   $timm['day'] = $data[$i];
    //   $timm['timing'] = $request->mondaytime;
    //   $timm['timing1'] = $request->mondaytime1;
    //   // DB::table('doctor_timing')->insert($timm);
    //  }
    //  if($data[$i] == 'Tuesday'){
    //   $timm['doctor_id'] = $data_id;
    //   $timm['day'] = $data[$i];
    //   $timm['timing'] = $request->tuesdaytime;
    //   $timm['timing1'] = $request->tuesdaytime1;
    //   // DB::table('doctor_timing')->insert($timm);
    //  }
    //  if($data[$i] == 'Wednesday'){
    //   $timm['doctor_id'] = $data_id;
    //   $timm['day'] = $data[$i];
    //   $timm['timing'] = $request->wednesdaytime;
    //   $timm['timing1'] = $request->wednesdaytime1;
    //   // DB::table('doctor_timing')->insert($timm);
    //  }
    //  if($data[$i] == 'Thursday'){
    //   $timm['doctor_id'] = $data_id;
    //   $timm['day'] = $data[$i];
    //   $timm['timing'] = $request->thursdaytime;
    //   $timm['timing1'] = $request->thursdaytime1;
    //   // DB::table('doctor_timing')->insert($timm);
    //  }
    //  if($data[$i] == 'Friday'){
    //   $timm['doctor_id'] = $data_id;
    //   $timm['day'] = $data[$i];
    //   $timm['timing'] = $request->fridaytime;
    //   $timm['timing1'] = $request->fridaytime1;
    //   // DB::table('doctor_timing')->insert($timm);
    //  }
    //  if($data[$i] == 'Saturday'){
    //   $timm['doctor_id'] = $data_id;
    //   $timm['day'] = $data[$i];
    //   $timm['timing'] = $request->saturdaytime;
    //   $timm['timing1'] = $request->saturdaytime1;
    //   // DB::table('doctor_timing')->insert($timm);
    //  }
    //  if($data[$i] == 'Sunday'){
    //   $timm['doctor_id'] = $data_id;
    //   $timm['day'] = $data[$i];
    //   $timm['timing'] = $request->sundaytime;
    //   $timm['timing1'] = $request->sundaytime1;
    //   // DB::table('doctor_timing')->insert($timm);
    //  }
    //  DB::table('doctor_timing')->insert($timm);
    
    // }
   if($data_id){       
    return response()->json([
      'status'=>'1',
      'message'=>'Doctor Added',
   ]);        
   }else{
    return response()->json([
      'status'=>'0',
      'message'=>'Doctor not Added',
  ]);        
  }
   }
   public function view_doctor()
   {
    $doctors = DB::table('doctors')->orderBy("id", 'desc')->get();
    return view('Admin.viewdoctor',compact('doctors'));
   }
   public function editdoctor($id)
   {
      $doctor = DB::table('doctors')->where('id',$id)->first();
      $doctor->days = explode(',',$doctor->days);
      return view('Admin.editdoctor',compact('doctor'));
   }
   public function updatedoctor(Request $request, $id)
   {
    $validator = Validator::make($request->all(), [
      'name'              =>     'required|',
      'qualification'             =>     'required',
      // 'opd_timing'          =>     'required',
      'specialization'    =>     'required',
     
    ]);
    if ( $validator->fails()) { 
      return response()->json([
          'status'=>'0',
          'message'=>$validator->errors()->first(),
      ]);          
  } 
  $doctor['name'] = $request->get('name');
  $doctor['qualification'] = $request->get('qualification');
  // $doctor['opd_timing'] = $request->get('opd_timing');
  // $doctor['opd_timing2'] = $request->get('opd_timing2');
  $doctor['specialization'] = $request->get('specialization');
  // $doctor['days'] = implode(',',$request->get('days'));
  $data = DB::table('doctors')->where('id',$id)->update($doctor);
   if($data){       
    return response()->json([
      'status'=>'1',
      'message'=>'Doctor Updated',
   ]);        
   }else{
    return response()->json([
      'status'=>'0',
      'message'=>'Doctor not Updated',
  ]);        
  }
   }
   public function deletedoctor($id)
   {
      DB::table('doctors')->where('id',$id)->delete();
      DB::table('sewapartner_doctors')->where('doctor_id',$id)->delete();
      
      return redirect()->back();
   }

    public function viewsubadminsdata($id){
    $datas = DB::table('subadmins')->where('id',$id)->first();
    $id = $datas->id;
    $name = $datas->name;
    $username = $datas->username;
    $village = $datas->village;
    $landmark = $datas->landmark;
    $email = $datas->email;
    $contact_number = $datas->contact_number;
    $address = $datas->address;
    $village = $datas->village;
    $landmark = $datas->landmark;
    return view('Admin.viewsubadminsdata',compact('id','datas','name','email','contact_number','address','username','village','landmark'));
   }

   public function viewsewapartnersdatas($id){
    $data = DB::table('sewapartners')->where('id',$id)->first();
    $get_profile = $data->profile;
    $doctors = DB::table('sewapartner_doctors')->where('sewapartner_id',$id)->get();
    $services = DB::table('sewapartner_services')->where('sewapartner_id',$id)->get();
    // dd($doctors);
    foreach($services as $service){
      $service->name =  DB::table('services')->where('id',$service->service_id)->value('service');
    }
    
    foreach($doctors as $doctor){
      $doctor->doctor_name = DB::table('doctors')->where('id',$doctor->doctor_id)->value('name');
      $doctor->doctor_qualification = DB::table('doctors')->where('id',$doctor->doctor_id)->value('qualification');
      $doctor->doctor_specialization = DB::table('doctors')->where('id',$doctor->doctor_id)->value('specialization');
    }
    $idCats = array_column($services->toArray(), 'service_name');
    $content = implode(', ',$idCats);
    // dd(implode(',',$services->toArray()));
   
   
    return view('Admin.sewapartnerpage',compact('data','doctors','services','get_profile','content'));
   }
   public function viewsewapartnersdatas1($id){
    $data = DB::table('sewapartners')->where('id',$id)->first();
    $get_profile = $data->profile;
    $doctors = DB::table('sewapartner_doctors')->where('sewapartner_id',$id)->get();
    $services = DB::table('sewapartner_services')->where('sewapartner_id',$id)->get();
    // dd($services);

    $service_names = [];
    foreach($services as $service){
      $service->name =  DB::table('services')->where('id',$service->service_id)->value('service');
      if($service->service_name) {
        $service_names[] = $service->service_name;
      }
    }
    

    foreach($doctors as $doctor){
      $doctor->doctor_name = DB::table('doctors')->where('id',$doctor->doctor_id)->value('name');
      $doctor->doctor_qualification = DB::table('doctors')->where('id',$doctor->doctor_id)->value('qualification');
      $doctor->doctor_specialization = DB::table('doctors')->where('id',$doctor->doctor_id)->value('specialization');
    }
    $idCats = array_column($services->toArray(), 'service_name');
    $content = implode(', ',$idCats);
    // dd(implode(',',$services->toArray()));
   
   
    return view('Admin.sewapartnerpage1',compact('data','doctors','services','get_profile','content','service_names'));
   }

   
   public function viewvolunteerdatas($id){
    $datas = DB::table('volunteers')->where('id',$id)->first();
    // dd($datas);
    $name = $datas->name;
    $email = $datas->email;
    $contact_number = $datas->contact_number;
    $address = $datas->address;
    $profile = $datas->profile_pic;
    $aadhaar_card_front = $datas->aadhaar_card_front;
    $aadhaar_card_back = $datas->aadhaar_card_back;
    $voter_card = $datas->vote_card;
    return view('Admin.volunteerpage',compact('datas','name','email','contact_number','address','profile','aadhaar_card_front','aadhaar_card_back','voter_card'));
  }

  public function cardholderdatas($id){
    $datas = DB::table('cardholder')->where('id',$id)->first();
    if($datas->add_type == 'Volunteer') {
      $datas->add_card_id = ' - 1469-'.(1000000+$datas->add_id);
    } else {
      $datas->add_card_id = '';
    }

    $house_images = [];
    $aadhaar_images = [];

    $is_needy_data = DB::table('cardholders')
    ->join('cardholder', 'cardholder.id', '=', 'cardholders.cardholder_id')
    ->where('cardholders.cardholder_id', $id)
    ->select('cardholders.*', 'cardholder.verify_officer as attesting_officer', 'cardholder.family_head')
    ->first();

    if($is_needy_data) {
      $house_images = DB::table('carholders_images')->where('cardholders_id',$is_needy_data->id)->select('id','image')->get();

      $aadhaar_images = DB::table('carholders_images')->where('cardholders_id',$is_needy_data->id)->select('id','aadhaar_images')->get();
    }


    $datasss = DB::table('cardholder_family')->join('cardholder','cardholder.id','=','cardholder_family.cardholder_id')->where('cardholder_family.cardholder_id',$id)->select('cardholder_family.*','cardholder.card_id')->get();

    $children = DB::table('cardholder_children')->join('cardholder','cardholder.id','=','cardholder_children.cardholder_id')->where('cardholder_children.cardholder_id',$id)->select('cardholder_children.*','cardholder.card_id')->get();

    return view('Admin.cardholderpage',compact('datas','datasss','children','is_needy_data','house_images','aadhaar_images'));
  }
   

   public function services()
   {
    $services = DB::table('services')->orderby('id','desc')->get();
    return view('Admin.services',compact('services'));
   }
   public function saveservices(Request $request)
   {
    $validator = Validator::make($request->all(), [
      'service'              =>     'required',
     
    ]);
    if ( $validator->fails()) { 
      return response()->json([
          'status'=>'0',
          'message'=>$validator->errors()->first(),
      ]);          
  } 
   $service['service'] = $request->get('service');
   $service['created_at'] = Carbon::now();
   $data = DB::table('services')->insert($service);
   if($data){       
    return response()->json([
      'status'=>'1',
      'message'=>'Service Added',
   ]);        
   }else{
    return response()->json([
      'status'=>'0',
      'message'=>'Service not Added',
  ]);        
  }
   }
   public function editservice($id)
   {
    $service = DB::table('services')->where('id',$id)->first();
    return view('Admin.editservice',compact('service'));
   }
   public function updateservice(Request $request, $id)
   {
    $validator = Validator::make($request->all(), [
      'service'              =>     'required',
     
    ]);
    if ( $validator->fails()) { 
      return response()->json([
          'status'=>'0',
          'message'=>$validator->errors()->first(),
      ]);          
  } 
   $service['service'] = $request->get('service');
   $data = DB::table('services')->where('id',$id)->update($service);
   if($service){       
    return response()->json([
      'status'=>'1',
      'message'=>'Service Updated',
   ]);        
   }else{
    return response()->json([
      'status'=>'0',
      'message'=>'Service not Updated',
  ]);        
  }
   }
   public function deleteservice($id)
   {
     DB::table('services')->where('id',$id)->delete();
     return redirect()->back();
   }
   public function change_active_status(Request $request)
   {
    // dd($request->all());
    $validator = Validator::make($request->all(), [ 
      'cardholder_id'  => 'required',
    ]);
    if ($validator->fails()) { 
      return response()->json([
        'status'=>'0',
        'message'=>$validator->errors(),
      ]);          
    }
    try{
        DB::beginTransaction();          
        $result = DB::table('cardholder')->where('id',$request->cardholder_id)->first();
        // dd($result);
        if($result->active_status == 1){
            $cardholder['active_status'] = 0;
        }else{
            $cardholder['active_status'] = 1;
        }
        DB::table('cardholder')->where('id',$request->cardholder_id)->update($cardholder);
        DB::commit();
        return response()->json([
            'status'=>'1',
            'message'=>'done',
        ]);

    }
    catch(Exception $e){
        DB::rollback();
        return response()->json([
            'status'=>'0',
            'message'=>$e->getMessage(),
        ]);
    }
   }
   public function change_verify_status(Request $request)
   {
    // dd($request->all());
    $validator = Validator::make($request->all(), [ 
      'cardholder_id'  => 'required',
    ]);
    if ($validator->fails()) { 
      return response()->json([
        'status'=>'0',
        'message'=>$validator->errors(),
      ]);          
    }
    try{
        DB::beginTransaction();          
        $result = DB::table('cardholder')->where('id',$request->cardholder_id)->first();
        // dd($result);
        if($result->verify_status == 1){
            $cardholder['verify_status'] = 0;
        }else{
            $cardholder['verify_status'] = 1;
        }
        DB::table('cardholder')->where('id',$request->cardholder_id)->update($cardholder);
        DB::commit();
        return response()->json([
            'status'=>'1',
            'message'=>'done',
        ]);

    }
    catch(Exception $e){
        DB::rollback();
        return response()->json([
            'status'=>'0',
            'message'=>$e->getMessage(),
        ]);
    }
   }
   public function change_volunteer_status(Request $request)
   {
    // dd($request->all());
    $validator = Validator::make($request->all(), [ 
      'volunteer_id'  => 'required',
    ]);
    if ($validator->fails()) { 
      return response()->json([
        'status'=>'0',
        'message'=>$validator->errors(),
      ]);          
    }
    try{
        DB::beginTransaction();          
        $result = DB::table('volunteers')->where('id',$request->volunteer_id)->first();
        // dd($result);
        if($result->active_status == 1){
            $volunteer['active_status'] = 0;
        }else{
            $volunteer['active_status'] = 1;
        }
        DB::table('volunteers')->where('id',$request->volunteer_id)->update($volunteer);
        DB::commit();
        return response()->json([
            'status'=>'1',
            'message'=>'done',
        ]);

    }
    catch(Exception $e){
        DB::rollback();
        return response()->json([
            'status'=>'0',
            'message'=>$e->getMessage(),
        ]);
    }
   }
   public function change_sewapartner_status(Request $request)
   {
    // dd($request->all());
    $validator = Validator::make($request->all(), [ 
      'sewapartner_id'  => 'required',
    ]);
    if ($validator->fails()) { 
      return response()->json([
        'status'=>'0',
        'message'=>$validator->errors(),
      ]);          
    }
    try{
        DB::beginTransaction();          
        $result = DB::table('sewapartners')->where('id',$request->sewapartner_id)->first();
        // dd($result);
        if($result->active_status == 1){
            $sewapartner['active_status'] = 0;
        }else{
            $sewapartner['active_status'] = 1;
        }
        DB::table('sewapartners')->where('id',$request->sewapartner_id)->update($sewapartner);
        DB::commit();
        return response()->json([
            'status'=>'1',
            'message'=>'done',
        ]);

    }
    catch(Exception $e){
        DB::rollback();
        return response()->json([
            'status'=>'0',
            'message'=>$e->getMessage(),
        ]);
    }
   }
   public function deletesewapartner($id)
   {
    DB::table('sewapartners')->where('id',$id)->delete();
    DB::table('sewapartner_doctors')->where('sewapartner_id',$id)->delete();
    DB::table('sewapartner_services')->where('sewapartner_id',$id)->delete();
     return redirect()->back();
   }
   public function editsewapartner($id)
   {
    $sewapartner = DB::table('sewapartners')->where('id',$id)->first();
    $doctors = DB::table('sewapartner_doctors')->where('sewapartner_id',$id)->pluck('doctor_id');  
    $alldoctors = DB::table('doctors')->get();
    
    $services = DB::table('sewapartner_services')->where('sewapartner_id',$id)->pluck('service_name');
    $allservices = DB::table('services')->get();
    // dd($sewapartner);
    $cities = DB::table('cities')->get();
    return view('Admin.editsewapartner',compact('doctors','alldoctors','services','allservices','sewapartner','cities'));
   }
   public  function updatesewapartner(Request $request,$id){
    // dd($request->all());
      $validator = Validator::make($request->all(), [
              'name'               =>     'required',
              'username'           =>     'required',
              'contact_number'      =>     'required|max:13',
              'password'           =>     'required|max:9',
              'sewa_address'       =>     'required',
              // 'categories'         =>     'required',
              'village'            =>     'required',
              // 'timings'            =>     'required',
              // 'services'           =>     'required',
          ]);
          if ( $validator->fails()) { 
            return response()->json([
                'status'=>'0',
                'message'=>$validator->errors()->first(),
            ]);          
        } 
      // $sewapartner = new SewaPartner();
      $sewapartner['name'] = $request->get('name');
      $sewapartner['email'] = $request->get('email');
      $sewapartner['username'] = $request->get('username');
      $sewapartner['village'] = $request->get('village');
      $sewapartner['password'] = bcrypt($request->get('password'));
      $sewapartner['numpassword'] = $request->get('password');
      $sewapartner['contactnumber'] = $request->get('contact_number');
      $sewapartner['sewa_address'] = $request->get('sewa_address');
      // $sewapartner['categories'] = $request->get('categories');
      if($request->get('timings')){
        $sewapartner['timings'] = $request->get('timings');
      }
      $sewapartner['timings2'] = $request->get('timings2');
      if($request->get('clinictimings')){
        $sewapartner['timings'] = $request->get('clinictimings');
      }
      $image_url = $request->profile;
      if($request->hasfile('newprofile'))
      {
          $file = $request->newprofile;
          $path = storage_path().'/sewapartnerimg/';
          File::makeDirectory($path, $mode = 0777, true, true);
          $imagePath = storage_path().'/sewapartnerimg/';         
          $post_image        = time().$file->getClientOriginalExtension();
          $image_url          = url('/').'/storage/sewapartnerimg/'.'/'. $post_image;   
          $file->move($imagePath, $post_image);
      }
      
        $sewapartner['profile']= $image_url;
      
      
      $sewa_id = DB::table('sewapartners')->where('id',$id)->update($sewapartner);
     
      $doctor_exists = DB::table('sewapartner_doctors')->where('sewapartner_id',$id)->exists();
      $service_exists = DB::table('sewapartner_services')->where('sewapartner_id',$id)->exists();

      
      if($request->doctors){
        DB::table('sewapartner_doctors')->where('sewapartner_id',$id)->delete();
        foreach($request->doctors as $doctor)
        {
           
            DB::table('sewapartner_doctors')->insert([
              'sewapartner_id'    => $id,                      
              'doctor_id'       => $doctor,
              'created_at' => Carbon::now(),                   

                
            ]);  
                 
        } 
      }
      if($request->services){
        DB::table('sewapartner_services')->where('sewapartner_id',$id)->delete();
        foreach($request->services as $service)
        {
           
            DB::table('sewapartner_services')->insert([
              'sewapartner_id'    => $id,                      
              'service_name'       => $service,
              'created_at' => Carbon::now(),                   

                
            ]);  
                 
        } 
      }
      if($sewa_id){       
        return response()->json([
          'status'=>'1',
          'message'=>'Sewapartner Added',
      ]);                  
      }else{
        return response()->json([
          'status'=>'0',
          'message'=>'Sewapartner not Added',
      ]);          
      }
  }
  public function notifications()
  {
    $cities = DB::table('cities')->get();
    return view('Admin.notification',compact('cities'));
  }
  public function push_notification($device_token,$devtype,$req_status,$badge,$title,$description,$location)
  {
      // echo $device_id.' # '.$devicetype.' # '.$mymessage.' # '.$title.' # '.$rid.' # '.$req_status.' # '.$ncount;exit();
      // $url = 'https://fcm.googleapis.com/fcm/send';
      // $api_key = 'AAAAv8OtDio:APA91bHFDffZ-g1fEJXS4AtG6tr-6TdJaGyj3hnqv7TvLyo0CPAMS9pBGbnW7TIJnza1rcWz0NquOv2zGDnT8y3IV0RKuaTUjXLO1UMr3974tk5x8KPGatOGsFkjmPzW_M0vz-dgbqDB';

      $url = 'https://fcm.googleapis.com/fcm/send';
      $api_key = 'AAAAnUmdglM:APA91bE95GmlTcBRK74vRT7oj12yGfVi6ADjGEyDc3av5oT6mKiBpm3MOBNaOOyW9QeTqcOviFm682HHZl736a1uT3dxevtpNjPLzuDnU3re7R6NFDf95Jv9F7ZH3mxNdqiIqnxveMd_';

      if($devtype ==1){
        $fields = (object) [
              "to" =>$device_token,
               "notification" => (object) [
                  "title"     => $title,             
                  "body"        => $description,
                  "location"        => $location,
                  // "description" => $description,               
                  "requestStatus" => $req_status,
                  "vibrate"   => "default",
                  "sound"     => "default",
                  "badge"     =>  $badge
                ],
              "data" => (object) [
                // "requestID"   => $rid,
                "title"     => $title,
                "body"        => $description,
                "location"        => $location,
                // "description" => $description,
                "vibrate"   => "default",
                "sound"     => "default",
                "requestStatus" => $req_status,
                "badge"     => $badge
              ]
        ];
      }else{
        $fields = (object) [
              "to" =>$device_token,
               "notification" => (object) [
                "title"     => $title,
              "body"        => $description,
                "location"        => $location,
                // "description" => $description,
                "requestStatus" => $req_status,
                "vibrate"   => "default",
                "sound"     => "default",
                "badge"     =>  $badge
               ],
              "data" => (object) [
                "title"     => $title,
                "body"        => $description,
                "location"        => $location,
                // "description" => $description,
                "requestStatus" => $req_status,
                "vibrate"   => "default",
                "sound"     => "default",
                "badge"     =>  $badge
              ]
        ];
      } 
      // dd($fields);
      $headers = array(
          'Content-Type:application/json',
          'Authorization:key='.$api_key
      );              
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, $url);
      curl_setopt($ch, CURLOPT_POST, true);
      curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
      curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
      $result = curl_exec($ch);
      if ($result === FALSE) {
          die('FCM Send Error: ' . curl_error($ch));
      }
      curl_close($ch);
      //  dd($result);
      return $result;
  }
  public  function savenotifications(Request $request)
  {
      // dd(in_array( "Card_Holder" ,$request->category));
      $validator = Validator::make($request->all(), [
              'category'               =>     'required',
              'title'           =>     'required',
              'description'      =>     'required',
              'image'           =>     'dimensions:max_width=1000,max_height=1000|file|max:1000',
    
          ]);
          if ( $validator->fails()) { 
            return response()->json([
                'status'=>'0',
                'message'=>$validator->errors()->first(),
            ]);          
        } 
      // $sewapartner = new SewaPartner();
      $notification['category'] = $request->get('category');
      $notification['title'] = $request->get('title');
      $notification['description'] = $request->get('description');
      $notification['location'] = $request->get('location');
      if($request->hasfile('image'))
      {
          $file = $request->image;
          $path = storage_path().'/volunteer/';
          File::makeDirectory($path, $mode = 0777, true, true);
          $imagePath = storage_path().'/volunteer/';         
          $post_image        = time().$file->getClientOriginalName();
          $image_url          = url('/').'/storage/volunteer/'.'/'. $post_image;   
          $file->move($imagePath, $post_image);
      }
      if($request->image){
        $notification['image']= $image_url; 
      }
      if($request->category){
        
        foreach($request->category as $category)
        {
          if($request->image){
            $notification_id =  DB::table('notifications')->insertGetId([
              'category'    => $category,                      
              'title'       => $request->get('title'),
              'description'       => $request->get('description'),           
              'location'       => $request->get('location'),           
                'image'       => $image_url, 
                'created_at' => Carbon::now(),                   
               
            ]);  
          }else{
            $notification_id =  DB::table('notifications')->insertGetId([
              'category'    => $category,                      
              'title'       => $request->get('title'),
              'description'       => $request->get('description'),
              'location'       => $request->get('location'),           
              'image'       => url('/').'/public/images/bell.jpg',  
              'created_at' => Carbon::now(),                   
                         
            ]);  
          } 
        
                 
        } 
      }
      
      if($notification_id){
        if(in_array( "Volunteer" ,$request->category)){
          $volunteers = DB::table('volunteers')->where('fcm_token','!=','')->where('device_type','!=','')->get();
        foreach($volunteers as $volunteer){
          $device_token = $volunteer->fcm_token ?? '';
          $devtype   = $volunteer->device_type ?? '';
          $badge = '0';
          $title = $request->get('title');
          // $mymessage =$request->get('title');
          $req_status="1";
          $description = $request->description;
          $location = $request->location;
         
        
          $result = $this->push_notification($device_token,$devtype,$badge,$req_status,$title,$description,$location);   
          // dd($result);
        }
        
       
        }
        elseif(in_array( "Card_Holder" ,$request->category)){
          $cardholders = DB::table('cardholder')->where('fcm_token','!=','')->where('device_type','!=','')->get();
        foreach($cardholders as $cardholder){
          $device_token = $cardholder->fcm_token ?? '';
          $devtype   = $cardholder->device_type ?? '';
          $badge = '0';
          // $title = "New Notification";
          // $mymessage =$request->get('title');
          $title =$request->get('title');
          $req_status="1";
          $description = $request->description;
          $location = $request->location;
         
        
          $result = $this->push_notification($device_token,$devtype,$badge,$req_status,$title,$description,$location);   
          // dd($result);
        }
        
       
        }
        else{
          //do nothing
        }
    }
     
    
      if($notification_id){       
        return response()->json([
          'status'=>'1',
          'message'=>'Notification Added',
      ]);                  
      }else{
        return response()->json([
          'status'=>'0',
          'message'=>'Notification not Added',
      ]);          
      }
  }
  public function view_notifications()
  {
    $notifications = DB::table('notifications')->get()->sortByDesc('id');
    return view('Admin.view_notification',compact('notifications'));
  }
  public function view_sewanotifications()
  {
    $segment =request()->segment(count(request()->segments()));
    if($segment == 'pending_notifications') {
      $notifications = DB::table('sewapartner_notifications')->where('status',0)->get();
    } else {
      $notifications = DB::table('sewapartner_notifications')->get();
    }
    return view('Admin.view_sewanotification',compact('notifications'));
  }
  public function editnotification($id)
  {
    $notification = DB::table('notifications')->where('id',$id)->first();
    $cities = DB::table('cities')->get();
    return view('Admin.editnotification',compact('notification','cities'));
  }
  public  function updatenotification(Request $request,$id){
    // dd($request->all());
      $validator = Validator::make($request->all(), [
              'category'               =>     'required',
              'title'           =>     'required',
              'description'      =>     'required',
              // 'image'           =>     'required',
    
          ]);
          if ( $validator->fails()) { 
            return response()->json([
                'status'=>'0',
                'message'=>$validator->errors()->first(),
            ]);          
        } 
      // $sewapartner = new SewaPartner();
      $notification['category'] = $request->get('category');
      $notification['title'] = $request->get('title');
      $notification['description'] = $request->get('description');
      $notification['location'] = $request->get('location');
      $image_url = $request->get('oldimage');
      if($request->hasfile('newimage'))
      {
          $file = $request->newimage;
          $path = storage_path().'/volunteer/';
          File::makeDirectory($path, $mode = 0777, true, true);
          $imagePath = storage_path().'/volunteer/';         
          $post_image        = time().$file->getClientOriginalName();
          $image_url          = url('/').'/storage/volunteer/'.'/'. $post_image;   
          $file->move($imagePath, $post_image);
      }
      $notification['image']= $image_url; 
      
      
      $notification_id = DB::table('notifications')->where('id',$id)->update($notification);
     
    
      if($notification_id){       
        return response()->json([
          'status'=>'1',
          'message'=>'Notification Updated',
      ]);                  
      }else{
        return response()->json([
          'status'=>'0',
          'message'=>'Notification not Updated',
      ]);          
      }
  }
  public function deletenotification($id){
    DB::table('notifications')->where('id',$id)->delete();
    return redirect()->back();
  }
  public function doctordata()
  {
    $sewapartner = DB::table('sewapartners')->where('categories','Hospital')->get();
    $doctors = DB::table('doctors')->get();
    return view('Admin.doctordata',compact('sewapartner','doctors'));
  }
  public function savedoctordata(Request $request)
  {
   
    $validator = Validator::make($request->all(), [
     'sewapartner'              =>     'required',
     'doctor'             => 'required'
    
    
    ]);
    if ( $validator->fails()) { 
     return response()->json([
         'status'=>'0',
         'message'=>$validator->errors()->first(),
     ]);          
    } 
    $data = explode(',',$request->days);
   // dd($data[2]);
   for($i=0;$i<sizeof($data);$i++){
    if($data[$i] == 'Monday'){
     $timm['doctor_id'] = $request->doctor;
     $timm['sewapartner_id'] = $request->sewapartner;
     $timm['day'] = $data[$i];
     $timm['timing'] = $request->mondaytime;
     $timm['timing1'] = $request->mondaytime1;
     // DB::table('doctor_timing')->insert($timm);
    }
    if($data[$i] == 'Tuesday'){
      $timm['doctor_id'] = $request->doctor;
      $timm['sewapartner_id'] = $request->sewapartner;
     $timm['day'] = $data[$i];
     $timm['timing'] = $request->tuesdaytime;
     $timm['timing1'] = $request->tuesdaytime1;
     // DB::table('doctor_timing')->insert($timm);
    }
    if($data[$i] == 'Wednesday'){
      $timm['doctor_id'] = $request->doctor;
     $timm['sewapartner_id'] = $request->sewapartner;
     $timm['day'] = $data[$i];
     $timm['timing'] = $request->wednesdaytime;
     $timm['timing1'] = $request->wednesdaytime1;
     // DB::table('doctor_timing')->insert($timm);
    }
    if($data[$i] == 'Thursday'){
      $timm['doctor_id'] = $request->doctor;
     $timm['sewapartner_id'] = $request->sewapartner;
     $timm['day'] = $data[$i];
     $timm['timing'] = $request->thursdaytime;
     $timm['timing1'] = $request->thursdaytime1;
     // DB::table('doctor_timing')->insert($timm);
    }
    if($data[$i] == 'Friday'){
      $timm['doctor_id'] = $request->doctor;
     $timm['sewapartner_id'] = $request->sewapartner;
     $timm['day'] = $data[$i];
     $timm['timing'] = $request->fridaytime;
     $timm['timing1'] = $request->fridaytime1;
     // DB::table('doctor_timing')->insert($timm);
    }
    if($data[$i] == 'Saturday'){
      $timm['doctor_id'] = $request->doctor;
     $timm['sewapartner_id'] = $request->sewapartner;
     $timm['day'] = $data[$i];
     $timm['timing'] = $request->saturdaytime;
     $timm['timing1'] = $request->saturdaytime1;
     // DB::table('doctor_timing')->insert($timm);
    }
    if($data[$i] == 'Sunday'){
      $timm['doctor_id'] = $request->doctor;
     $timm['sewapartner_id'] = $request->sewapartner;
     $timm['day'] = $data[$i];
     $timm['timing'] = $request->sundaytime;
     $timm['timing1'] = $request->sundaytime1;
     // DB::table('doctor_timing')->insert($timm);
    }

    // DB::table('sewapartner_doctors')->insert($timm);
   
    }
      if($data){       
      return response()->json([
        'status'=>'1',
        'message'=>'Doctor Added',
      ]);        
      }else{
      return response()->json([
        'status'=>'0',
        'message'=>'Doctor not Added',
    ]);        
    }
  }


  public function add_doctor($id)
  {
    $doctors = DB::table('doctors')->orderby('id','desc')->where('status',1)->get();
    $doctor_name = DB::table('sewapartners')->select('name')->where('id',$id)->first();
    $get_name = $doctor_name->name;
    // dd($doctor_name->name);
    return view('Admin.add_doctor',compact('id','doctors','get_name'));
  }
  public function saveadd_doctor(Request $request,$id)
   {
    // dd($id);
    
    $validator = Validator::make($request->all(), [
      'name'              =>     'required|',
      // 'qualification'             => 'required',
      // 'specialization'    =>     'required',
     
    ]);
    if ( $validator->fails()) { 
      return response()->json([
        'status'=>'0',
        'message'=>$validator->errors()->first(),
      ]);          
    } 
    if($request->get('mondaytime') >= $request->get('mondaytime1')){
      return response()->json([
        'status'=>'0',
        'message'=>'Please enter valid time',
      ]); 
             
    }
    if($request->get('tuesdaytime') >= $request->get('tuesdaytime1')){
      return response()->json([
        'status'=>'0',
        'message'=>'Please enter valid time',
    ]);          
    }
    if($request->get('wednesdaytime') >= $request->get('wednesdaytime1')){
      return response()->json([
        'status'=>'0',
        'message'=>'Please enter valid time',
    ]);          
    }
    if($request->get('thursdaytime') >= $request->get('thursdaytime1')){
      return response()->json([
        'status'=>'0',
        'message'=>'Please enter valid time',
    ]);          
    }
    if($request->get('fridaytime') >= $request->get('fridaytime1')){
      return response()->json([
        'status'=>'0',
        'message'=>'Please enter valid time',
    ]);          
    }
    if($request->get('saturdaytime') >= $request->get('saturdaytime1')){
      return response()->json([
        'status'=>'0',
        'message'=>'Please enter valid time',
    ]);          
    }
    if($request->get('sundaytime') >= $request->get('sundaytime')){
      return response()->json([
        'status'=>'0',
        'message'=>'Please enter valid time',
      ]);          
    }
    //  $doctor['name'] = $request->get('name');
    //  $doctor['qualification'] = $request->get('qualification');
    //  $doctor['specialization'] = $request->get('specialization');
    

    //  $data_id = DB::table('doctors')->insertGetId($doctor);
   $data = explode(',',$request->days);
   if($data){
    $timm =[];
    for($i=0;$i<sizeof($data);$i++){
      if($data[$i] == 'Monday'){


        $validator = Validator::make($request->all(), [
          'mondaytime'              =>     'required',
          'mondaytime1'              =>     'required',
 
        ]);
        if ( $validator->fails()) { 
          return response()->json([
            'status'=>'0',
            'message'=>$validator->errors()->first(),
          ]);          
        } 
        $doctor_id = $request->get('name');



        $startTime = Carbon::createFromFormat('H:i', $request->mondaytime);
        $endTime = Carbon::createFromFormat('H:i', $request->mondaytime1);
        $timeDifference = $startTime->diffInMinutes($endTime);

        if ($timeDifference < 30) {
          return response()->json([
            'status'=>'0',
            'message'=>'Difference between Monday timings at least 30 min',
          ]);
        } 

        $check_day = DB::table('sewapartner_doctors')->where([['doctor_id',$doctor_id],['day','Monday']])->select('timing','timing1')->get();
        foreach ($check_day as $value) {
          
          $givenTime = $request->mondaytime;
          $start = Carbon::createFromFormat('H:i', $value->timing);
          $end = Carbon::createFromFormat('H:i', $value->timing1);
          $given = Carbon::createFromFormat('H:i', $givenTime);

          if ($given->between($start, $end)) {
            return response()->json([
              'status'=>'0',
              'message'=>'Doctor is not available on Monday between given time range.',
            ]); 
          }

          $givenTime2 = $request->mondaytime1;
          $start2 = Carbon::createFromFormat('H:i', $value->timing);
          $end2 = Carbon::createFromFormat('H:i', $value->timing1);
          $given2 = Carbon::createFromFormat('H:i', $givenTime2);

          if ($given2->between($start2, $end2)) {
            return response()->json([
              'status'=>'0',
              'message'=>'Doctor is not available on Monday between given time range.',
            ]); 
          }

        }

        $timm['sewapartner_id'] = $id;
        $timm['doctor_id'] = $request->get('name');
        $timm['day'] = $data[$i];
        $timm['timing'] = $request->mondaytime;
        $timm['timing1'] = $request->mondaytime1;
        // DB::table('doctor_timing')->insert($timm);


      }
      if($data[$i] == 'Tuesday'){

        $validator = Validator::make($request->all(), [
          'tuesdaytime'              =>     'required',
          'tuesdaytime1'              =>     'required',

         
        ]);
        if ( $validator->fails()) { 
          return response()->json([
            'status'=>'0',
            'message'=>$validator->errors()->first(),
          ]);          
        }

        $doctor_id = $request->get('name');

        $startTime = Carbon::createFromFormat('H:i', $request->tuesdaytime);
        $endTime = Carbon::createFromFormat('H:i', $request->tuesdaytime1);
        $timeDifference = $startTime->diffInMinutes($endTime);
        
        if ($timeDifference < 30) {
          return response()->json([
            'status'=>'0',
            'message'=>'Difference between Tuesday timings at least 30 min',
          ]);
        } 

        $check_day = DB::table('sewapartner_doctors')->where([['doctor_id',$doctor_id],['day','Tuesday']])->select('timing','timing1')->get();
        foreach ($check_day as $value) {
          
          $givenTime = $request->tuesdaytime;
          $start = Carbon::createFromFormat('H:i', $value->timing);
          $end = Carbon::createFromFormat('H:i', $value->timing1);
          $given = Carbon::createFromFormat('H:i', $givenTime);

          if ($given->between($start, $end)) {
            return response()->json([
              'status'=>'0',
              'message'=>'Doctor is not available on Tuesday between given time range.',
            ]);          
          }

          $givenTime2 = $request->tuesdaytime1;
          $start2 = Carbon::createFromFormat('H:i', $value->timing);
          $end2 = Carbon::createFromFormat('H:i', $value->timing1);
          $given2 = Carbon::createFromFormat('H:i', $givenTime2);

          if ($given2->between($start2, $end2)) {
            return response()->json([
              'status'=>'0',
              'message'=>'Doctor is not available on Tuesday between given time range.',
            ]); 
          }

        }

        $timm['sewapartner_id'] = $id;
        $timm['doctor_id'] = $request->get('name');
        $timm['day'] = $data[$i];
        $timm['timing'] = $request->tuesdaytime;
        $timm['timing1'] = $request->tuesdaytime1;
        // DB::table('doctor_timing')->insert($timm);
      }
      if($data[$i] == 'Wednesday'){

        $validator = Validator::make($request->all(), [
          'wednesdaytime'              =>     'required',
          'wednesdaytime1'              =>     'required',

        ]);
        if ( $validator->fails()) { 
          return response()->json([
            'status'=>'0',
            'message'=>$validator->errors()->first(),
          ]);          
        }

        $doctor_id = $request->get('name');

        $startTime = Carbon::createFromFormat('H:i', $request->wednesdaytime);
        $endTime = Carbon::createFromFormat('H:i', $request->wednesdaytime1);
        $timeDifference = $startTime->diffInMinutes($endTime);
        
        if ($timeDifference < 30) {
          return response()->json([
            'status'=>'0',
            'message'=>'Difference between Wednesday timings at least 30 min',
          ]);
        } 

        $check_day = DB::table('sewapartner_doctors')->where([['doctor_id',$doctor_id],['day','Wednesday']])->select('timing','timing1')->get();
        foreach ($check_day as $value) {
          
          $givenTime = $request->wednesdaytime;
          $start = Carbon::createFromFormat('H:i', $value->timing);
          $end = Carbon::createFromFormat('H:i', $value->timing1);
          $given = Carbon::createFromFormat('H:i', $givenTime);

          if ($given->between($start, $end)) {
            return response()->json([
              'status'=>'0',
              'message'=>'Doctor is not available on Wednesday between given time range.',
            ]);          
          }

          $givenTime2 = $request->wednesdaytime1;
          $start2 = Carbon::createFromFormat('H:i', $value->timing);
          $end2 = Carbon::createFromFormat('H:i', $value->timing1);
          $given2 = Carbon::createFromFormat('H:i', $givenTime2);

          if ($given2->between($start2, $end2)) {
            return response()->json([
              'status'=>'0',
              'message'=>'Doctor is not available on Wednesday between given time range.',
            ]); 
          }

        }

        $timm['sewapartner_id'] = $id;
        $timm['doctor_id'] = $request->get('name');
        $timm['day'] = $data[$i];
        $timm['timing'] = $request->wednesdaytime;
        $timm['timing1'] = $request->wednesdaytime1;
        // DB::table('doctor_timing')->insert($timm);
      }
      if($data[$i] == 'Thursday'){

        $validator = Validator::make($request->all(), [
          'thursdaytime'              =>     'required',
          'thursdaytime1'              =>     'required',

         
        ]);
        if ( $validator->fails()) { 
          return response()->json([
            'status'=>'0',
            'message'=>$validator->errors()->first(),
          ]);          
        }

        $doctor_id = $request->get('name');

        $startTime = Carbon::createFromFormat('H:i', $request->thursdaytime);
        $endTime = Carbon::createFromFormat('H:i', $request->thursdaytime1);
        $timeDifference = $startTime->diffInMinutes($endTime);
        
        if ($timeDifference < 30) {
          return response()->json([
            'status'=>'0',
            'message'=>'Difference between Thursday timings at least 30 min',
          ]);
        } 

        $check_day = DB::table('sewapartner_doctors')->where([['doctor_id',$doctor_id],['day','Thursday']])->select('timing','timing1')->get();
        foreach ($check_day as $value) {
          
          $givenTime = $request->thursdaytime;
          $start = Carbon::createFromFormat('H:i', $value->timing);
          $end = Carbon::createFromFormat('H:i', $value->timing1);
          $given = Carbon::createFromFormat('H:i', $givenTime);

          if ($given->between($start, $end)) {
            return response()->json([
              'status'=>'0',
              'message'=>'Doctor is not available on Thursday between given time range.',
            ]);          
          }

          $givenTime2 = $request->thursdaytime1;
          $start2 = Carbon::createFromFormat('H:i', $value->timing);
          $end2 = Carbon::createFromFormat('H:i', $value->timing1);
          $given2 = Carbon::createFromFormat('H:i', $givenTime2);

          if ($given2->between($start2, $end2)) {
            return response()->json([
              'status'=>'0',
              'message'=>'Doctor is not available on Thursday between given time range.',
            ]); 
          }

        }


        $timm['sewapartner_id'] = $id;
        $timm['doctor_id'] = $request->get('name');
        $timm['day'] = $data[$i];
        $timm['timing'] = $request->thursdaytime;
        $timm['timing1'] = $request->thursdaytime1;
        // DB::table('doctor_timing')->insert($timm);
      }
      if($data[$i] == 'Friday'){

        $validator = Validator::make($request->all(), [
          'fridaytime'              =>     'required',
          'fridaytime1'              =>     'required',
         
        ]);
        if ( $validator->fails()) { 
          return response()->json([
            'status'=>'0',
            'message'=>$validator->errors()->first(),
          ]);          
        }

        $doctor_id = $request->get('name');

        $startTime = Carbon::createFromFormat('H:i', $request->fridaytime);
        $endTime = Carbon::createFromFormat('H:i', $request->fridaytime1);
        $timeDifference = $startTime->diffInMinutes($endTime);
        
        if ($timeDifference < 30) {
          return response()->json([
            'status'=>'0',
            'message'=>'Difference between Friday timings at least 30 min',
          ]);
        } 

        $check_day = DB::table('sewapartner_doctors')->where([['doctor_id',$doctor_id],['day','Friday']])->select('timing','timing1')->get();
        foreach ($check_day as $value) {
          
          $givenTime = $request->fridaytime;
          $start = Carbon::createFromFormat('H:i', $value->timing);
          $end = Carbon::createFromFormat('H:i', $value->timing1);
          $given = Carbon::createFromFormat('H:i', $givenTime);

          if ($given->between($start, $end)) {
            return response()->json([
              'status'=>'0',
              'message'=>'Doctor is not available on Friday between given time range.',
            ]);          
          }

          $givenTime2 = $request->fridaytime1;
          $start2 = Carbon::createFromFormat('H:i', $value->timing);
          $end2 = Carbon::createFromFormat('H:i', $value->timing1);
          $given2 = Carbon::createFromFormat('H:i', $givenTime2);

          if ($given2->between($start2, $end2)) {
            return response()->json([
              'status'=>'0',
              'message'=>'Doctor is not available on Friday between given time range.',
            ]); 
          }

        }

        $timm['sewapartner_id'] = $id;
        $timm['doctor_id'] = $request->get('name');
        $timm['day'] = $data[$i];
        $timm['timing'] = $request->fridaytime;
        $timm['timing1'] = $request->fridaytime1;
        // DB::table('doctor_timing')->insert($timm);
      }
      if($data[$i] == 'Saturday'){

        $validator = Validator::make($request->all(), [
          'saturdaytime'              =>     'required',
          'saturdaytime1'              =>     'required',

         
        ]);
        if ( $validator->fails()) { 
          return response()->json([
            'status'=>'0',
            'message'=>$validator->errors()->first(),
          ]);          
        }

        $doctor_id = $request->get('name');

        $startTime = Carbon::createFromFormat('H:i', $request->saturdaytime);
        $endTime = Carbon::createFromFormat('H:i', $request->saturdaytime1);
        $timeDifference = $startTime->diffInMinutes($endTime);
        
        if ($timeDifference < 30) {
          return response()->json([
            'status'=>'0',
            'message'=>'Difference between Saturday timings at least 30 min',
          ]);
        } 

        $check_day = DB::table('sewapartner_doctors')->where([['doctor_id',$doctor_id],['day','Saturday']])->select('timing','timing1')->get();
        foreach ($check_day as $value) {
          
          $givenTime = $request->saturdaytime;
          $start = Carbon::createFromFormat('H:i', $value->timing);
          $end = Carbon::createFromFormat('H:i', $value->timing1);
          $given = Carbon::createFromFormat('H:i', $givenTime);

          if ($given->between($start, $end)) {
            return response()->json([
              'status'=>'0',
              'message'=>'Doctor is not available on Saturday between given time range.',
            ]);          
          }

          $givenTime2 = $request->saturdaytime1;
          $start2 = Carbon::createFromFormat('H:i', $value->timing);
          $end2 = Carbon::createFromFormat('H:i', $value->timing1);
          $given2 = Carbon::createFromFormat('H:i', $givenTime2);

          if ($given2->between($start2, $end2)) {
            return response()->json([
              'status'=>'0',
              'message'=>'Doctor is not available on Saturday between given time range.',
            ]); 
          }

        }

        $timm['sewapartner_id'] = $id;
        $timm['doctor_id'] = $request->get('name');
        $timm['day'] = $data[$i];
        $timm['timing'] = $request->saturdaytime;
        $timm['timing1'] = $request->saturdaytime1;
        // DB::table('doctor_timing')->insert($timm);
      }
      if($data[$i] == 'Sunday'){

        $validator = Validator::make($request->all(), [
          'sundaytime'              =>     'required',
          'sundaytime1'              =>     'required',
        
        ]);
        if ( $validator->fails()) { 
          return response()->json([
            'status'=>'0',
            'message'=>$validator->errors()->first(),
          ]);          
        }

        $doctor_id = $request->get('name');

        $startTime = Carbon::createFromFormat('H:i', $request->sundaytime);
        $endTime = Carbon::createFromFormat('H:i', $request->sundaytime1);
        $timeDifference = $startTime->diffInMinutes($endTime);
        
        if ($timeDifference < 30) {
          return response()->json([
            'status'=>'0',
            'message'=>'Difference between Sunday timings at least 30 min',
          ]);
        } 

        $check_day = DB::table('sewapartner_doctors')->where([['doctor_id',$doctor_id],['day','Sunday']])->select('timing','timing1')->get();
        foreach ($check_day as $value) {
          
          $givenTime = $request->sundaytime;
          $start = Carbon::createFromFormat('H:i', $value->timing);
          $end = Carbon::createFromFormat('H:i', $value->timing1);
          $given = Carbon::createFromFormat('H:i', $givenTime);

          if ($given->between($start, $end)) {
            return response()->json([
              'status'=>'0',
              'message'=>'Doctor is not available on Sunday between given time range.',
            ]);          
          }

          $givenTime2 = $request->sundaytime1;
          $start2 = Carbon::createFromFormat('H:i', $value->timing);
          $end2 = Carbon::createFromFormat('H:i', $value->timing1);
          $given2 = Carbon::createFromFormat('H:i', $givenTime2);

          if ($given2->between($start2, $end2)) {
            return response()->json([
              'status'=>'0',
              'message'=>'Doctor is not available on Sunday between given time range.',
            ]); 
          }

        }

        $timm['sewapartner_id'] = $id;
        $timm['doctor_id'] = $request->get('name');
        $timm['day'] = $data[$i];
        $timm['timing'] = $request->sundaytime;
        $timm['timing1'] = $request->sundaytime1;
        // DB::table('doctor_timing')->insert($timm);
      }
      


      if($timm) {
        $timm['created_at'] = Carbon::now();
        DB::table('sewapartner_doctors')->insert($timm);

      } else {
        return response()->json([
          'status'=>'0',
          'message'=>'Please select atleast one day.',
        ]); 
      }
    
    
    }
    }
   if($data){       
    return response()->json([
      'status'=>'1',
      'message'=>'Doctor Added',
   ]);        
   }else{
    return response()->json([
      'status'=>'0',
      'message'=>'Doctor not Added',
    ]);        
    }
  }

  public function check_time_schedule($doctor_id) {
    
    $data = DB::table('sewapartner_doctors')
    ->join('doctors','doctors.id','=','sewapartner_doctors.doctor_id')
    ->join('sewapartners','sewapartners.id','=','sewapartner_doctors.sewapartner_id')
    ->where('sewapartner_doctors.doctor_id',$doctor_id)
    ->select('doctors.name as doctor_name','sewapartners.name AS sewapartner_name','sewapartner_doctors.day','sewapartner_doctors.timing','sewapartner_doctors.timing1')
    ->get();
    
    if(count($data)>0){       
      return response()->json([
        'status'=>'1',
        'data' => $data,
      ]);        
    }
    else {
      return response()->json([
        'status'=>'0',
        'message'=>'Time schedule list not found',
      ]);  
    }

  }
   public function deletesewa_doctor($id)
   {
     DB::table('sewapartner_doctors')->where('id',$id)->delete();
     return redirect()->back();
   }
   public function editcardholder($id)
   {
    $cardholder = DB::table('cardholder')->where('id',$id)->first();
    $cities = DB::table('cities')->get();
    // dd($cardholder);
    // $is_needy = DB::table('cardholders')->where('cardholder_id',$id)->first();
    return view('Admin.editcardholder',compact('cardholder','cities'));
   }
  public function updatecardholder(Request $request,$id)
  {
    // dd($request->all());
    $validator = Validator::make($request->all(), [ 
        'name'            => 'required',
        'name_punjabi'    => 'required',
        'age'             => 'required',
        'address'         => 'required',    
        'address_punjabi' => 'required',    
        'occupation'      => 'required',    
        // 'annual_income' => 'required',    
        'contact_number'  => 'required|max:10',    
        'qualification'   => 'required',    
        'adhaar_number'   => 'required',    
        // 'own_house'    => 'required',  
        // 'rent'         => 'required', 
        // 'rent_price'   => 'required',          
        ]);  
        if ( $validator->fails()) { 
          return response()->json([
              'status'=>'0',
              'message'=>$validator->errors()->first(),
          ]);          
      } 
      $cardholder['name'] = $request->name;
      $cardholder['name_punjabi'] = $request->name_punjabi;
      $cardholder['age'] = $request->age;  
      $cardholder['address'] = $request->address;  
      $cardholder['address_punjabi'] = $request->address_punjabi;  
      $cardholder['village'] = $request->village;  
      $cardholder['blood_group'] = $request->blood_group;  
      $cardholder['blood_donor'] = $request->blood_donor;  
      $cardholder['job'] = $request->occupation;  
      $cardholder['annual_income'] = $request->annual_income;  
      $cardholder['contact_number'] = $request->contact_number;  

      $cardholder['qualification'] = $request->qualification;
      if($request->email){
        $cardholder['email'] = $request->email;
      }
      if($request->whatsapp_number){
        $cardholder['whatsapp_number'] = $request->whatsapp_number;
      }
      if($request->adhaar_number){    
      $cardholder['adhaar_number'] = $request->adhaar_number;
      }
      if($request->own_house){   
      $cardholder['own_house'] = $request->own_house;
      } 
      if($request->rent){ 
      $cardholder['rent'] = $request->rent;
      } 
      if($request->rent_price){
        $cardholder['rent_price'] = $request->rent_price;  
      }      
      if($request->long_disease){
        $cardholder['long_disease'] = $request->long_disease;
      }
      if($request->disease_name){
        $cardholder['disease_name'] = $request->disease_name;
      }
      if($request->disease_details){
        $cardholder['disease_details'] = $request->disease_details; 
      }
      if($request->support_organisation){
        $cardholder['support_organisation'] = $request->support_organisation; 
      }
      if($request->joined_organisation){
        $cardholder['joined_organisation'] = $request->joined_organisation;
      }
      if($request->verify_officer){
        $cardholder['verify_officer'] = $request->verify_officer;
      }
      if($request->family_head){
        $cardholder['family_head'] = $request->family_head;
      }

      if($request->cardholder_profile){
        if($request->hasfile('cardholder_profile'))
        {
            $file = $request->cardholder_profile;
            $path = storage_path().'/cardholderimg/';
            File::makeDirectory($path, $mode = 0777, true, true);
            $imagePath = storage_path().'/cardholderimg/';         
            $post_image        = time().$file->getClientOriginalName();
            $image_url          = url('/').'/storage/cardholderimg/'.'/'. $post_image;   
            $file->move($imagePath, $post_image);
        }
        $cardholder['cardholder_profile']= $image_url;
      }
      
     DB::table('cardholder')->where("id",$id)->update($cardholder);
  
      return response()->json([
        'status'=>'1',
        'message'=>'Card Holder Updated',
      ]);        

  }
  public function deletecardholder($id)
  {
  DB::table('cardholder')->where('id',$id)->delete();
  DB::table('cardholder_children')->where('cardholder_id',$id)->delete();
  DB::table('cardholder_family')->where('cardholder_id',$id)->delete();
  return redirect()->back();
  }


  public function edit_is_needy($id)
  {
    $data = DB::table('cardholders')->where('cardholder_id',$id)->first(); 
    $cardholder_id = $id;
    $house_images =[];
    $aadhaar_images =[];
    if($data) {
      $house_images = DB::table('carholders_images')->where('cardholders_id',$data->id)->select('image')->get();
      $aadhaar_images = DB::table('carholders_images')->where('cardholders_id',$data->id)->select('aadhaar_images')->get();
    }
    return view('Admin.edit_is_needy',compact('data','cardholder_id','house_images','aadhaar_images'));
  }

  public function update_is_needy(Request $request, $id)
  {

    if($request->name){   
      $cardholders['name'] = $request->name;
    }
    if($request->disease_time){   
      $cardholders['disease_time'] = $request->disease_time;
    }


    if($request->own_house){   
      $cardholders['own_house'] = $request->own_house;
      $cardholder['own_house'] = $request->own_house;

    }
    if($request->rent_price){
      $cardholders['rent_price'] = $request->rent_price;  
      $cardholder['rent_price'] = $request->rent_price;  
    }      
    if($request->annual_income){   
      $cardholders['annual_income'] = $request->annual_income;
      $cardholder['annual_income'] = $request->annual_income;
    }


    if($request->medical_detail){
      $cardholders['medical_detail'] = $request->medical_detail;
    }
    if($request->foundation_detail){
      $cardholders['foundation_detail'] = $request->foundation_detail;
    }
    if($request->foundation_help){
      $cardholders['foundation_help'] = $request->foundation_help; 
    }
    if($request->foundation_member){
      $cardholders['foundation_member'] = $request->foundation_member; 
    }
    if($request->govthelp){
      $cardholders['govthelp'] = $request->govthelp;
    }
    if($request->help_amount){
      $cardholders['help_amount'] = $request->help_amount;
    }
    if($request->agriculture){
      $cardholders['agriculture'] = $request->agriculture;
    }
    if($request->cattle){
      $cardholders['cattle'] = $request->cattle;
    }
    if($request->social_media){
      $cardholders['social_media'] = $request->social_media;
    }
    if($request->gurudwara){
      $cardholders['gurudwara'] = $request->gurudwara;
    }
    if($request->gurudwara_mgmt){
      $cardholders['gurudwara_mgmt'] = $request->gurudwara_mgmt; 
    }
    if($request->gurudwara_contact){
      $cardholders['gurudwara_contact'] = $request->gurudwara_contact; 
    }
    if($request->attesting_officer){
      $cardholders['attesting_officer'] = $request->attesting_officer; 
    }
    if($request->family_heads){
      $cardholders['family_head'] = $request->family_heads;
    }
    if($request->volunteer_name){
      $cardholders['volunteer_name'] = $request->volunteer_name;
    }
    if($request->two_wheeler){
      $cardholders['two_wheeler'] = $request->two_wheeler;
    }
    if($request->four_wheeler){
      $cardholders['four_wheeler'] = $request->four_wheeler;
    }
    if($request->air_conditioner){
      $cardholders['air_conditioner'] = $request->air_conditioner;
    }
    if($request->income_source){
      $cardholders['income_source'] = $request->income_source;
    }
    if($request->date){
      $cardholders['date'] = $request->date;
    }
    if($request->volunteer_signature){
      $cardholders['volunteer_signature'] = $request->volunteer_signature;
    }
    if($request->policy_checkbox) {
      if($request->policy_checkbox == 'yes') {
        if($request->company_name){
          $cardholders['company_name'] = $request->company_name;
        }
        if($request->policy_no){
          $cardholders['policy_number'] = $request->policy_no;
        }
        if($request->issue_date){
          $cardholders['policy_issue_date'] = $request->issue_date;
        }
        if($request->expiry_date){
          $cardholders['policy_expiry_date'] = $request->expiry_date;
        }
      } 
    } else {
      if($request->company_name){
        $cardholders['company_name'] = '';
      }
      if($request->policy_no){
        $cardholders['policy_number'] = '';
      }
      if($request->issue_date){
        $cardholders['policy_issue_date'] = '';
      }
      if($request->expiry_date){
        $cardholders['policy_expiry_date'] = '';
      }
    }

    if($request->volunteer_photo){
      if($request->hasfile('volunteer_photo'))
      {
          $file = $request->volunteer_photo;
          $path = storage_path().'/cardholderimg/';
          File::makeDirectory($path, $mode = 0777, true, true);
          $imagePath = storage_path().'/cardholderimg/';         
          $post_image        = time().$file->getClientOriginalName();
          $image_url          = url('/').'/storage/cardholderimg/'.'/'. $post_image;   
          $file->move($imagePath, $post_image);
      }
      $cardholders['volunteer_photo']= $image_url;
    }




    if($request->cardholders_id) {
      $cardholders_id = $request->cardholders_id;

      DB::table('cardholders')->where('id',$cardholders_id)->update($cardholders);

      $cardholder['is_needy'] = 'Yes';
      DB::table('cardholder')->where('id',$id)->update($cardholder);

      if ($request->hasFile('house_photo')) {
        $files = $request->file('house_photo');
        foreach ($files as $file) {
          $path = storage_path().'/cardholderimg/';
          File::makeDirectory($path, $mode = 0777, true, true);
          $imagePath = storage_path().'/cardholderimg/';          
          $post_image = time().$file->getClientOriginalName();
          $image_url = url('/').'/storage/cardholderimg/'.'/'. $post_image;
          $file->move($imagePath, $post_image);
          DB::table('carholders_images')->insert([
            'cardholders_id'  => $cardholders_id,
            'image'  => $image_url,
            'created_at' => Carbon::now(),                   

          ]);
    
        } 
      }

      if ($request->hasFile('aadhaar_card')) {
        $files = $request->file('aadhaar_card');
        foreach ($files as $file) {
          $path = storage_path().'/cardholderimg/';
          File::makeDirectory($path, $mode = 0777, true, true);
          $imagePath = storage_path().'/cardholderimg/';          
          $post_image = time().$file->getClientOriginalName();
          $image_url = url('/').'/storage/cardholderimg/'.'/'. $post_image;
          $file->move($imagePath, $post_image);
          DB::table('carholders_images')->insert([
            'cardholders_id'  => $cardholders_id,
            'aadhaar_images'  => $image_url,
            'created_at' => Carbon::now(),                   

          ]);
    
        } 
      }


      return response()->json([
        'status'=>'1',
        'message'=>'Is needy data Updated',
      ]); 

    }

    else {
      $validator = Validator::make($request->all(), [            
        
        'name' => 'required',
        'disease_time' => 'required',
      ]);
      


      if ($validator->fails()) { 
        
        return response()->json([
          'status'=>'0',
          'message'=>$validator->errors()->first(),
        ]);           
      }



      $cardholders['cardholder_id'] = $request->cardholder_id;
      $cardholders['add_id'] = Auth::guard('web')->user()->id;
      $cardholders['add_name'] = Auth::guard('web')->user()->name;
      $cardholders['add_type'] = "Admin";
      $cardholders['created_at'] = Carbon::now();

      $family_id = DB::table('cardholders')->insertgetId($cardholders);

      DB::table('cardholders')->where('id',$family_id)->update(['card_id'=>Carbon::now()->timestamp.'-'.$family_id]);

      if( $family_id){
        $card['card_id'] = Carbon::now()->timestamp.'-'.$family_id;
        $card['type'] = "KhalsaMember";
        $card['created_at'] = Carbon::now();
        DB::table('cardsdata')->insert($card);

        $cardholder['is_needy'] = 'Yes';
        if($cardholder) {
          DB::table('cardholder')->where('id',$id)->update($cardholder);
        }

        if ($request->hasFile('house_photo')) {
          $files = $request->file('house_photo');
          foreach ($files as $file) {
            $path = storage_path().'/cardholderimg/';
            File::makeDirectory($path, $mode = 0777, true, true);
            $imagePath = storage_path().'/cardholderimg/';          
            $post_image = time().$file->getClientOriginalName();
            $image_url = url('/').'/storage/cardholderimg/'.'/'. $post_image;
            $file->move($imagePath, $post_image);
            DB::table('carholders_images')->insert([
              'cardholders_id'  => $family_id,
              'image'  => $image_url,
              'created_at' => Carbon::now(),                   

            ]);
      
          } 
        }
  
        if ($request->hasFile('aadhaar_card')) {
          $files = $request->file('aadhaar_card');
          foreach ($files as $file) {
            $path = storage_path().'/cardholderimg/';
            File::makeDirectory($path, $mode = 0777, true, true);
            $imagePath = storage_path().'/cardholderimg/';          
            $post_image = time().$file->getClientOriginalName();
            $image_url = url('/').'/storage/cardholderimg/'.'/'. $post_image;
            $file->move($imagePath, $post_image);
            DB::table('carholders_images')->insert([
              'cardholders_id'  => $family_id,
              'aadhaar_images'  => $image_url,
              'created_at' => Carbon::now(),                   

            ]);
      
          } 
        }
      }



      return response()->json([
        'status'=>'1',
        'message'=>'Is needy data Updated',
      ]); 

    }

  }



   public function editcardholderfamily($id)
   {
    $card_family = DB::table('cardholder_family')->where('id',$id)->first();
    return view('Admin.editcardholderfamily',compact('card_family'));
   }
   public function updatecardholderfamily(Request $request,$id)
  {
        
        $validator = Validator::make($request->all(), [            
            
            'fname' => 'required',
          
            
        ]);
        
        if ($validator->fails()) { 
           
             return response()->json([
                'status'=>'0',
                'message'=>$validator->errors()->first(),
                'data'=>$x
            ]);           
         }
       $cardholder['fname'] = $request->fname;  
       $cardholder['famritdhari'] = $request->famritdhari;  
       $cardholder['fage'] = $request->fage;  
       $cardholder['fqualification'] = $request->fqualification;  
       $cardholder['fjob'] = $request->fjob;  
       $cardholder['fsalary'] = $request->fsalary;  
       $cardholder['faadhaar'] = $request->faadhaar;  
       $cardholder['frelation'] = $request->frelation;  
       DB::table('cardholder_family')->where('id',$id)->update($cardholder);
      
       return response()->json([
        'status'=>'1',
        'message'=>'Card Holder Updated',
       ]);        
       
    
  }
    public function deletecardholderfamily($id)
    {
      DB::table('cardholder_family')->where('id',$id)->delete();
      return redirect()->back();
    }
    public function editcardholderchild($id)
    {
     $card_child = DB::table('cardholder_children')->where('id',$id)->first();
     return view('Admin.editcardholderchild',compact('card_child'));
    }
    public function updatecardholderchild(Request $request,$id)
    {
        
        $validator = Validator::make($request->all(), [            
            
            'cname' => 'required',
          
            
        ]);
        
        if ($validator->fails()) { 
           
             return response()->json([
                'status'=>'0',
                'message'=>$validator->errors()->first(),
                'data'=>$x
            ]);           
         }
       $cardholder['cname'] = $request->cname;  
       $cardholder['camritdhari'] = $request->camritdhari;  
       $cardholder['cage'] = $request->cage;  
       $cardholder['cqualification'] = $request->cqualification;  
       $cardholder['cschool'] = $request->cschool;  
       $cardholder['cfees'] = $request->cfees;  
       $cardholder['caadhaar'] = $request->caadhaar;  
       $cardholder['crelation'] = $request->crelation;  
       DB::table('cardholder_children')->where('id',$id)->update($cardholder);
      
       return response()->json([
        'status'=>'1',
        'message'=>'Card Holder Updated',
       ]);        
       
    
    }
    public function deletecardholderchild($id)
    {
      DB::table('cardholder_children')->where('id',$id)->delete();
      return redirect()->back();
    }
    public function view_business(Request $request)
    {
      $segment =request()->segment(count(request()->segments()));
      if($segment == 'pending_business') {
        $business = DB::table('business')->where('status',0)->orderby('id','desc')->get();
      } else {
        $business = DB::table('business')->orderby('id','desc')->get();
      }
      return view('Admin.view_business',compact('business'));
    }
    public function change_business_status(Request $request)
    {
     // dd($request->all());
     $validator = Validator::make($request->all(), [ 
       'business_id'  => 'required',
     ]);
     if ($validator->fails()) { 
       return response()->json([
         'status'=>'0',
         'message'=>$validator->errors(),
       ]);          
     }
     try{
         DB::beginTransaction();          
         $result = DB::table('business')->where('id',$request->business_id)->first();
         // dd($result);
         if($result->status == 1){
             $business['status'] = 0;
         }else{
             $business['status'] = 1;
         }
         DB::table('business')->where('id',$request->business_id)->update($business);
         DB::commit();
         return response()->json([
             'status'=>'1',
             'message'=>'done',
         ]);
 
     }
     catch(Exception $e){
         DB::rollback();
         return response()->json([
             'status'=>'0',
             'message'=>$e->getMessage(),
         ]);
     }
  }
    public function change_notification_status(Request $request)
    {
     // dd($request->all());
     $validator = Validator::make($request->all(), [ 
       'notification_id'  => 'required',
     ]);
     if ($validator->fails()) { 
       return response()->json([
         'status'=>'0',
         'message'=>$validator->errors(),
       ]);          
     }
     try{
         DB::beginTransaction();          
         $result = DB::table('sewapartner_notifications')->where('id',$request->notification_id)->first();
         // dd($result);
         if($result->status == 1){
             $business['status'] = 0;
         }else{
             $business['status'] = 1;
         }
         DB::table('sewapartner_notifications')->where('id',$request->notification_id)->update($business);
         $data = DB::table('sewapartner_notifications')->where('id',$request->notification_id)->where('status',1)->first();
         if($data){      
       
          $cardholders = DB::table('cardholder')->where('fcm_token','!=','')->where('device_type','!=','')->get();
          foreach($cardholders as $cardholder){
            $device_token = $cardholder->fcm_token ?? '';
            $devtype   = $cardholder->device_type ?? '';
            $badge = '0';
            $title = $data->title;
            // $mymessage =$data->title;
            $req_status="1";
            $description = $data->description;
            $location = $data->location;
     
           
          
            $result = $this->push_notification($device_token,$devtype,$req_status,$badge,$title,$description,$location);   
            // dd($result);
          }
          
        
      }
         DB::commit();
         return response()->json([
             'status'=>'1',
             'message'=>'done',
         ]);
 
     }
     catch(Exception $e){
         DB::rollback();
         return response()->json([
             'status'=>'0',
             'message'=>$e->getMessage(),
         ]);
     }
    }
    public function changedoctor_status(Request $request)
    {
     // dd($request->all());
     $validator = Validator::make($request->all(), [ 
       'doctor_id'  => 'required',
     ]);
     if ($validator->fails()) { 
       return response()->json([
         'status'=>'0',
         'message'=>$validator->errors(),
       ]);          
     }
     try{
         DB::beginTransaction();          
         $result = DB::table('doctors')->where('id',$request->doctor_id)->first();
         // dd($result);
         if($result->status == 1){
             $doctors['status'] = 0;
         }else{
             $doctors['status'] = 1;
         }
         DB::table('doctors')->where('id',$request->doctor_id)->update($doctors);
         DB::commit();
         return response()->json([
             'status'=>'1',
             'message'=>'done',
         ]);
 
     }
     catch(Exception $e){
         DB::rollback();
         return response()->json([
             'status'=>'0',
             'message'=>$e->getMessage(),
         ]);
     }
    }
    public function view_feedback()
    {
      $feedback = DB::table('feedbacks')->orderby('id','desc')->get();
      return view('Admin.view_feedback',compact('feedback'));
    }
    public function deletefeedback($id)
    {
      DB::table('feedbacks')->where('id',$id)->delete();
      return redirect()->back();
    
    }
    // public function blood_donor()
    // {
    //   $carholders = DB::table('cardholder')->where('blood_donor','yes')->orderby('id','desc')->get();
    //   return view('Admin.blood_donor',compact('carholders'));
    // }
    public function blood_donor(Request $request)
  {
    DB::statement(DB::raw('set @rownum=0'));
    if($request->blood_group == "A+"){
      $carholders = DB::table('cardholder')->where('blood_donor','yes')->where('blood_group','A+')->orderby('id','desc')->get();
    }
    elseif($request->blood_group == "A-"){
      $carholders = DB::table('cardholder')->where('blood_donor','yes')->where('blood_group','A-')->orderby('id','desc')->get();
    }
    elseif($request->blood_group == "O+"){
      $carholders = DB::table('cardholder')->where('blood_donor','yes')->where('blood_group','O+')->orderby('id','desc')->get();
    }
    elseif($request->blood_group == "O-"){
      $carholders = DB::table('cardholder')->where('blood_donor','yes')->where('blood_group','O-')->orderby('id','desc')->get();
    }
    elseif($request->blood_group == "B-"){
      $carholders = DB::table('cardholder')->where('blood_donor','yes')->where('blood_group','B-')->orderby('id','desc')->get();
    }
    elseif($request->blood_group == "B+"){
      $carholders = DB::table('cardholder')->where('blood_donor','yes')->where('blood_group','B+')->orderby('id','desc')->get();
    }
    elseif($request->blood_group == "AB+"){
      $carholders = DB::table('cardholder')->where('blood_donor','yes')->where('blood_group','AB+')->orderby('id','desc')->get();
    }
    elseif($request->blood_group == "AB-"){
      $carholders = DB::table('cardholder')->where('blood_donor','yes')->where('blood_group','AB-')->orderby('id','desc')->get();
    }
    else{
      $carholders = DB::table('cardholder')->where('blood_donor','yes')->orderby('id','desc')->get();
    } 
    
    if ($request->ajax()) {
      // dd($carholders);
            return Datatables::of($carholders)
                ->addIndexColumn()
             
              ->addColumn('name', function($row){
                $name=$row->name.' ('.($row->age. 'yrs'.')');
                return $name;
            })
              
             
             
            
               
            
           
              
           
           
        
        
                ->rawColumns(['name'])
                ->make(true);
        }
      
          return view('Admin.blood_donor');
      
       
  }
    public function add_cardfamily($id)
    {     
      return view('Admin.add_cardfamily',compact('id'));
    }
    public function saveadd_cardfamily(Request $request,$id)
   {
    // dd($request->all());
    $validator = Validator::make($request->all(), [ 
        // 'name'         => 'required',
      
        ]);  
        if ( $validator->fails()) { 
          return response()->json([
              'status'=>'0',
              'message'=>$validator->errors()->first(),
          ]);          
      } 
      $family_id = $id;
      if($family_id){
        for($i=0;$i<count($request->fname);$i++){
         
          DB::table('cardholder_family')->insert([
            'cardholder_id'  => $family_id,
            'fname'    => $request->fname[$i],
            'famritdhari'    => $request->famritdhari[$i],
            'fage'    => $request->fage[$i],
            'fblood_group'    => $request->fblood_group[$i],
            'fqualification'    => $request->fqualification[$i],
            'fjob'    => $request->fjob[$i],
            'fsalary'    => $request->fsalary[$i],                      
            'faadhaar'    => $request->faadhaar[$i],                      
            'frelation'    => $request->frelation[$i], 
            'created_at' => Carbon::now(),                   
                     
          ]);  
         
      }
    //   for($i=0;$i<count($request->cname);$i++){
       
    //     DB::table('cardholder_children')->insert([
    //       'cardholder_id'  => $family_id,
    //       'cname'    => $request->cname[$i],
    //       'camritdhari'    => $request->camritdhari[$i],
    //       'cage'    => $request->cage[$i],
    //       'cqualification'    => $request->cqualification[$i],
    //       'cjob'    => $request->cjob[$i],
    //       'csalary'    => $request->csalary[$i],                      
    //     ]);  
       
    // }
    

      }
      
  
      // dd($family_id);
      return response()->json([
        'status'=>'1',
        'message'=>'Card Holder Family Added',
    ]);        

   }
   public function add_cardchildren($id)
   {     
     return view('Admin.add_cardchildren',compact('id'));
   }
   public function saveadd_cardchildren(Request $request,$id)
  {
    //  dd($request->all());
   $validator = Validator::make($request->all(), [ 
       // 'name'         => 'required',
     
       ]);  
       if ( $validator->fails()) { 
         return response()->json([
             'status'=>'0',
             'message'=>$validator->errors()->first(),
         ]);          
     } 
     $family_id = $id;
     if($family_id){
    //    for($i=0;$i<count($request->fname);$i++){
        
    //      DB::table('cardholder_family')->insert([
    //        'cardholder_id'  => $family_id,
    //        'fname'    => $request->fname[$i],
    //        'famritdhari'    => $request->famritdhari[$i],
    //        'fage'    => $request->fage[$i],
    //        'fqualification'    => $request->fqualification[$i],
    //        'fjob'    => $request->fjob[$i],
    //        'fsalary'    => $request->fsalary[$i],                      
    //      ]);  
        
    //  }
     for($i=0;$i<count($request->cname);$i++){
      
       DB::table('cardholder_children')->insert([
         'cardholder_id'  => $family_id,
         'cname'    => $request->cname[$i],
         'camritdhari'    => $request->camritdhari[$i],
         'cage'    => $request->cage[$i],
         'cqualification'    => $request->cqualification[$i],
         'cfees'    => $request->cfees[$i],
         'cschool'    => $request->cschool[$i],                      
         'caadhaar'    => $request->caadhaar[$i],                      
         'crelation'    => $request->crelation[$i], 
         'created_at' => Carbon::now(),                   
                     
       ]);  
      
   }
   

     }
     
 
     // dd($family_id);
     return response()->json([
       'status'=>'1',
       'message'=>'Card Holder Family Added',
   ]);        

  }
  public function newcardholder()
  {
    return view('Admin.newcardholder');
  }
  public function savenewcardholder(Request $request)
   {
    // dd($request->all());
    $validator = Validator::make($request->all(), [ 
        'patient_detail'         => 'required',
        'disease_time'         => 'required',
        'medical_detail'         => 'required',    
        // 'job'         => 'required',    
          
        ]);  
        if ( $validator->fails()) { 
          return response()->json([
              'status'=>'0',
              'message'=>$validator->errors()->first(),
          ]);          
      } 
      $cardholder['name'] = $request->patient_detail;
      if($request->disease_time){
      $cardholder['disease_time'] = $request->disease_time;
      } 
      if($request->medical_detail){ 
      $cardholder['medical_detail'] = $request->medical_detail;
      }  
      if($request->foundation_detail){
      $cardholder['foundation_detail'] = $request->foundation_detail;
      }
      if($request->foundation_help){  
      $cardholder['foundation_help'] = $request->foundation_help; 
      }
      if($request->foundation_member){  
      $cardholder['foundation_member'] = $request->foundation_member;
      }
      if($request->govthelp){ 
      $cardholder['govthelp'] = $request->govthelp;
      }
      if($request->help_amount){  
      $cardholder['help_amount'] = $request->help_amount;
      }
      if($request->agriculture){   
      $cardholder['agriculture'] = $request->agriculture;
      }
      if($request->social_media){   
      $cardholder['social_media'] = $request->social_media;
      }
      if($request->gurudwara){  
      $cardholder['gurudwara'] = $request->gurudwara;
      } 
      if($request->gurudwara_mgmt){ 
      $cardholder['gurudwara_mgmt'] = $request->gurudwara_mgmt;
      }  
      if($request->attesting_officer){
        $cardholder['attesting_officer'] = $request->attesting_officer;
      }
      if($request->family_head){
        $cardholder['family_head'] = $request->family_head;
      }
      if($request->volunteer_name){
        $cardholder['volunteer_name'] = $request->volunteer_name; 
      }
      if($request->two_wheeler){
        $cardholder['two_wheeler'] = $request->two_wheeler; 
      }
      if($request->four_wheeler){
        $cardholder['four_wheeler'] = $request->four_wheeler;
      }
      if($request->air_conditioner){
        $cardholder['air_conditioner'] = $request->air_conditioner;
      }
      if($request->income_source){
        $cardholder['income_source'] = $request->income_source;
      }
      if($request->date){
        $cardholder['date'] = $request->date;
      }
      if($request->volunteer_signature){
        $cardholder['volunteer_signature'] = $request->volunteer_signature;
      }
      if($request->volunteer_photo){
        if($request->hasfile('volunteer_photo'))
        {
            $file = $request->volunteer_photo;
            $path = storage_path().'/cardholderimg/';
            File::makeDirectory($path, $mode = 0777, true, true);
            $imagePath = storage_path().'/cardholderimg/';         
            $post_image        = time().$file->getClientOriginalName();
            $image_url          = url('/').'/storage/cardholderimg/'.'/'. $post_image;   
            $file->move($imagePath, $post_image);
        }
        $cardholder['volunteer_photo']= $image_url;
      }
      if($request->aadhaar_card){
        if($request->hasfile('aadhaar_card'))
        {
            $file = $request->aadhaar_card;
            $path = storage_path().'/cardholderimg/';
            File::makeDirectory($path, $mode = 0777, true, true);
            $imagePath = storage_path().'/cardholderimg/';         
            $post_image        = time().$file->getClientOriginalName();
            $image_url          = url('/').'/storage/cardholderimg/'.'/'. $post_image;   
            $file->move($imagePath, $post_image);
        }
        $cardholder['aadhaar_card']= $image_url;
      }
   
      $cardholder['add_id'] = Auth::guard('web')->user()->id;
      $cardholder['add_name'] = Auth::guard('web')->user()->name;
      $cardholder['add_type'] = "Admin";
      $cardholder['created_at'] = Carbon::now();

      $family_id = DB::table('cardholders')->insertgetId($cardholder);
      DB::table('cardholders')->where('id',$family_id)->update(['card_id'=>Carbon::now()->timestamp.'-'.$family_id]);
      if( $family_id){
        $card['card_id'] = Carbon::now()->timestamp.'-'.$family_id;
        $card['type'] = "KhalsaMember";
        $card['created_at'] = Carbon::now();
        
        DB::table('cardsdata')->insert($card);
      }
      if($family_id){
        if ($request->hasFile('house_photo')) {
          // $allowedfileExtension = ['pdf', 'jpg', 'png', 'docx'];
          $files = $request->file('house_photo');
          // dd($files);
          foreach ($files as $file) {
            // $file = $request->image;
            $path = storage_path().'/cardholderimg/';
            File::makeDirectory($path, $mode = 0777, true, true);
            $imagePath = storage_path().'/cardholderimg/';          
            $post_image        = time().$file->getClientOriginalName();
            $image_url          = url('/').'/storage/cardholderimg/'.'/'. $post_image;
            $file->move($imagePath, $post_image);
              DB::table('carholders_images')->insert([
                'cardholders_id'  => $family_id,
                'image'  => $image_url,
                'created_at' => Carbon::now(),                   

              
            ]);
      
              } 
          }
    

      }
      
  
      // dd($family_id);
      return response()->json([
        'status'=>'1',
        'message'=>'Card Holder Added',
    ]);        

   }
   public function viewkhalsamember()
   {
    $members = DB::table('cardholders')->orderby('id','desc')->get();
    return view('Admin.viewkhalsamember',compact('members'));
   }
   public function youtube_channel()
   {
    $youtube = DB::table('youtube_channel')->first();
    return view('Admin.youtube_channel',compact('youtube'));
   }
  public  function saveyoutube_channel(Request $request){
    // dd($request->all());
      $validator = Validator::make($request->all(), [
              'link'               =>     'required',
            
              'image'           =>     'dimensions:max_width=512,max_height=512|file|max:500',
    
          ]);
          if ( $validator->fails()) { 
            return response()->json([
                'status'=>'0',
                'message'=>$validator->errors()->first(),
            ]);          
        } 
      // $sewapartner = new SewaPartner();
      $youtube['youtube_link'] = $request->get('link');
     
      if($request->hasfile('image'))
      {
          $file = $request->image;
          $path = storage_path().'/volunteer/';
          File::makeDirectory($path, $mode = 0777, true, true);
          $imagePath = storage_path().'/volunteer/';         
          $post_image        = time().$file->getClientOriginalName();
          $image_url          = url('/').'/storage/volunteer/'.'/'. $post_image;   
          $file->move($imagePath, $post_image);
      }
      if($request->image){
        $youtube['image']= $image_url;
        $youtube['image_name']= $file->getClientOriginalName(); 

      }
      

        $exists = DB::table('youtube_channel')->first();

      // dd($exists);
      if($exists){
        $update = DB::table('youtube_channel')->where('id',$exists->id)->update($youtube);
        
      }else{
        $youtube['created_at'] = Carbon::now();
        $update = DB::table('youtube_channel')->insert($youtube);
      }
      
      // $youtube_id = DB::table('youtube_channel')->insertGetId($youtube);
     
    
      if($update){       
        return response()->json([
          'status'=>'1',
          'message'=>'link Added',
      ]);                  
      }else{
        return response()->json([
          'status'=>'0',
          'message'=>'link not Added',
      ]);          
      }
  }
  // public function blood_request()
  // {
  //   $data = DB::table('request_blood')->orderby('id','desc')->get();
  //   return view('Admin.blood_request',compact('data'));
  // }
  public function blood_request(Request $request)
  {
    DB::statement(DB::raw('set @rownum=0'));
    if($request->status == "Pending"){
      $data = DB::table('request_blood')->select("request_blood.*",DB::raw('@rownum  := @rownum  + 1 AS rownum'))->where('status',0)->orderby('id','desc')->get();
    }
    elseif($request->status == "Fulfilled"){
      $data = DB::table('request_blood')->select("request_blood.*",DB::raw('@rownum  := @rownum  + 1 AS rownum'))->where('status',1)->orderby('id','desc')->get();
    }
   
    else{
      $data = DB::table('request_blood')->select("request_blood.*",DB::raw('@rownum  := @rownum  + 1 AS rownum'))->orderby('id','desc')->get();
    }
    
    // dd($data);
    if ($request->ajax()) {
      // dd($data);
      return Datatables::of($data)
          ->addIndexColumn()
        
    
            ->addColumn('active', function($row){
            $active = $row->status == 1 ? "<button class='on' id='active' onclick='show($row->id)'><i class='fa-solid fa-toggle-on' ></i></button>":
            "<button class='on' id='inactive' onclick='show($row->id)'><i class='fa-solid fa-toggle-off' ></i></button>";
            return $active;
        })
        ->addColumn('status', function($row){
          $status=$row->status == 1 ? "Fulfilled" : "Pending";
          return $status;
      })
      // ->addColumn('action', function($row){
      //     $actionBtn = '<a href="'.url("Admin/editsewapartner").'/'.$row->id.'"><i class="fa-solid fa-square-pen" style="font-size:25px;"></i></a>';
      //     $actionBtn .= '<a href="'.url("Admin/deletesewapartner").'/'.$row->id.'"><i class="material-icons" onclick="return confirm("Are you sure to delete this?")" style="position: relative;">delete</i></a>';
          
      //     return $actionBtn;
          
      // })

      ->rawColumns(['status','active'])
      ->make(true);
    }
      
    return view('Admin.blood_request');
      
       
  }


  public function khalsa_active_status(Request $request)
   {
    // dd($request->all());
    $validator = Validator::make($request->all(), [ 
      'member_id'  => 'required',
    ]);
    if ($validator->fails()) { 
      return response()->json([
        'status'=>'0',
        'message'=>$validator->errors(),
      ]);          
    }
    try{
        DB::beginTransaction();          
        $result = DB::table('cardholders')->where('id',$request->member_id)->first();
        // dd($result);
        if($result->active_status == 1){
            $member['active_status'] = 0;
        }else{
            $member['active_status'] = 1;
        }
        DB::table('cardholders')->where('id',$request->member_id)->update($member);
        DB::commit();
        return response()->json([
            'status'=>'1',
            'message'=>'done',
        ]);

    }
    catch(Exception $e){
        DB::rollback();
        return response()->json([
            'status'=>'0',
            'message'=>$e->getMessage(),
        ]);
    }
   }
   public function khalsa_verify_status(Request $request)
   {
    // dd($request->all());
    $validator = Validator::make($request->all(), [ 
      'member_id'  => 'required',
    ]);
    if ($validator->fails()) { 
      return response()->json([
        'status'=>'0',
        'message'=>$validator->errors(),
      ]);          
    }
    try{
        DB::beginTransaction();          
        $result = DB::table('cardholders')->where('id',$request->member_id)->first();
        // dd($result);
        if($result->verify_status == 1){
            $member['verify_status'] = 0;
        }else{
            $member['verify_status'] = 1;
        }
        DB::table('cardholders')->where('id',$request->member_id)->update($member);
        DB::commit();
        return response()->json([
            'status'=>'1',
            'message'=>'done',
        ]);

    }
    catch(Exception $e){
        DB::rollback();
        return response()->json([
            'status'=>'0',
            'message'=>$e->getMessage(),
        ]);
    }
   }
   public function deletemember($id)
   {
     DB::table('cardholders')->where('id',$id)->delete();
     return redirect()->back();
   }
   public function blood_status(Request $request)
   {
    // dd($request->all());
    $validator = Validator::make($request->all(), [ 
      'blood_id'  => 'required',
    ]);
    if ($validator->fails()) { 
      return response()->json([
        'status'=>'0',
        'message'=>$validator->errors(),
      ]);          
    }
    try{
        DB::beginTransaction();          
        $result = DB::table('request_blood')->where('id',$request->blood_id)->first();
        // dd($result);
        if($result->status == 1){
            $blood['status'] = 0;
        }else{
            $blood['status'] = 1;
        }
        DB::table('request_blood')->where('id',$request->blood_id)->update($blood);
        DB::commit();
        return response()->json([
            'status'=>'1',
            'message'=>'done',
        ]);

    }
    catch(Exception $e){
        DB::rollback();
        return response()->json([
            'status'=>'0',
            'message'=>$e->getMessage(),
        ]);
    }
   }
    public function business()
    {
      
      $business_type = DB::table('business_types')->orderby('id','desc')->get();
      $cities = DB::table('cities')->select('id','city')->get();

      return view('Admin.business',compact('business_type','cities'));
    }
   public  function savebusiness(Request $request){
     // dd($request->all());
       $validator = Validator::make($request->all(), [
               'business_type'               =>     'required',
               'title'           =>     'required',
               'description'      =>     'required',
               'address'           =>     'required',
     
           ]);
           if ( $validator->fails()) { 
             return response()->json([
                 'status'=>'0',
                 'message'=>$validator->errors()->first(),
             ]);          
         } 
       // $sewapartner = new SewaPartner();
       $business['business_type'] = $request->get('business_type');
       $business['title'] = $request->get('title');
       $business['description'] = $request->get('description');
       $business['address'] = $request->get('address');
       $business['city'] = $request->get('city');
       $business['phone_number'] = $request->get('phone_number');
       $business['user_id'] = Auth::guard('web')->user()->id;
       $business['user_type'] = Auth::guard('web')->user()->name;
       $business['created_at'] = Carbon::now();
     
       
       
       
       $business_id = DB::table('business')->insertGetId($business);
      
     
       if($business_id){       
         return response()->json([
           'status'=>'1',
           'message'=>'Business Added',
       ]);                  
       }else{
         return response()->json([
           'status'=>'0',
           'message'=>'Business not Added',
       ]);          
       }
   }
   public function business_type()
   {
    $business = DB::table('business_types')->orderby('id','desc')->get();
    return view('Admin.business_type',compact('business'));
   }
   public function savebusiness_type(Request $request)
   {
    $validator = Validator::make($request->all(), [
      'business_type'              =>     'required',
     
    ]);
    if ( $validator->fails()) { 
      return response()->json([
          'status'=>'0',
          'message'=>$validator->errors()->first(),
      ]);          
  } 
   $business_type['business_type'] = $request->get('business_type');
   $business_type['created_at'] = Carbon::now();
   $data = DB::table('business_types')->insert($business_type);
   if($data){       
    return response()->json([
      'status'=>'1',
      'message'=>'Business Type Added',
   ]);        
   }else{
    return response()->json([
      'status'=>'0',
      'message'=>'Business Type not Added',
  ]);        
  }
   }

   public function deletebusiness_type($id)
   {
    DB::table('business_types')->where('id',$id)->delete();
    return redirect()->back();
   }
   public function support_number()
   {
    $support = DB::table('supports')->first();
    return view('Admin.support_number',compact('support'));
   }

  public  function savesupport_number(Request $request){
    // dd($request->all());
      $validator = Validator::make($request->all(), [
              'phone_number'               =>     'required',
            
             
    
          ]);
          if ( $validator->fails()) { 
            return response()->json([
                'status'=>'0',
                'message'=>$validator->errors()->first(),
            ]);          
        } 
      // $sewapartner = new SewaPartner();
      $support['phone_number'] = $request->get('phone_number');
     
        $exists =  DB::table('supports')->first();

      // dd($exists);
      if($exists){
        $update =  DB::table('supports')->where('id',$exists->id)->update($support);
                 
      }else{
        $support['created_at'] = Carbon::now();
        $update = DB::table('supports')->insert($support);
      }
      
      // $support_id = DB::table('supports')->insertGetId($support);
     
    
      if($update){       
        return response()->json([
          'status'=>'1',
          'message'=>'support Added',
      ]);                  
      }else{
        return response()->json([
          'status'=>'0',
          'message'=>'support not Added',
      ]);          
      }
  }

   public function khalsa_pariwar_link()
   {
    $khalsa_pariwar_link = DB::table('khalsa_pariwar_link')->first();
    return view('Admin.khalsa_pariwar_link',compact('khalsa_pariwar_link'));
   }

  public  function savekhalsa_pariwar_link(Request $request){
    // dd($request->all());
      $validator = Validator::make($request->all(), [
              'link'               =>     'required',

          ]);
          if ( $validator->fails()) { 
            return response()->json([
                'status'=>'0',
                'message'=>$validator->errors()->first(),
            ]);          
        } 
      // $sewapartner = new SewaPartner();
      $khalsa_pariwar_link['link'] = $request->get('link');
     
        $exists = DB::table('khalsa_pariwar_link')->first();;
    
        
      // dd($exists);
      if($exists){
       
        $update =  DB::table('khalsa_pariwar_link')->where('id',$exists->id)->update($khalsa_pariwar_link);
      }else{
        $khalsa_pariwar_link['created_at'] = Carbon::now();
        $update =  DB::table('khalsa_pariwar_link')->insert($khalsa_pariwar_link);
 
      }
      

     
    
      if($update){       
        return response()->json([
          'status'=>'1',
          'message'=>'Khalsa Pariwar Link Added',
      ]);                  
      }else{
        return response()->json([
          'status'=>'0',
          'message'=>'Khalsa Pariwar Link not Added',
      ]);          
      }
  }
  public function badge_status(Request $request)
  {
   // dd($request->all());
   $validator = Validator::make($request->all(), [ 
     'sewapartner_id'  => 'required',
   ]);
   if ($validator->fails()) { 
     return response()->json([
       'status'=>'0',
       'message'=>$validator->errors(),
     ]);          
   }
   try{
       DB::beginTransaction();          
       $result = DB::table('sewapartners')->where('id',$request->sewapartner_id)->first();
       // dd($result);
       if($result->badge_status == 1){
           $sewapartner['badge_status'] = 0;
       }else{
           $sewapartner['badge_status'] = 1;
       }
       DB::table('sewapartners')->where('id',$request->sewapartner_id)->update($sewapartner);
       DB::commit();
       return response()->json([
           'status'=>'1',
           'message'=>'done',
       ]);

   }
   catch(Exception $e){
       DB::rollback();
       return response()->json([
           'status'=>'0',
           'message'=>$e->getMessage(),
       ]);
   }
  }
  // public function reports()
  // {
  //   return view('Admin.reports');
  // }
  public function reports(Request $request)
  {
    // dd($request->get('category'));
    DB::statement(DB::raw('set @rownum=0'));
    $now = Carbon::now();       
    $yesterday = Carbon::yesterday();
    $date = Carbon::now()->subDays(7);
    if($request->get('range')  && $request->get('from_date') && $request->get('to_date') ) {
     $from_date = $request->get('from_date');
     $to_date = $request->get('to_date');

     if($request->get('range')=='today'){
      
     $sewapartner = DB::table('sewapartner_account')->select("sewapartner_account.*",DB::raw('@rownum  := @rownum  + 1 AS rownum'))
     ->whereDate('created_at',$now)
     ->whereBetween('sewapartner_account.created_at', array($from_date, $to_date))
     ->orderBy("id", 'desc')->get();
     }
     elseif($request->get('range')=='yesterday'){
       $sewapartner = DB::table('sewapartner_account')->select("sewapartner_account.*",DB::raw('@rownum  := @rownum  + 1 AS rownum'))
       ->whereDate('created_at',$yesterday)
       ->whereBetween('sewapartner_account.created_at', array($from_date, $to_date))
       ->orderBy("id", 'desc')->get();
       }
     elseif($request->get('range')=='weekly'){
       $sewapartner = DB::table('sewapartner_account')->select("sewapartner_account.*",DB::raw('@rownum  := @rownum  + 1 AS rownum'))
       ->whereDate('created_at','>=',$date)
       ->whereBetween('sewapartner_account.created_at', array($from_date, $to_date))
       ->orderBy("id", 'desc')->get();
       } 
     elseif($request->get('range')=='monthly'){
       $sewapartner = DB::table('sewapartner_account')->select("sewapartner_account.*",DB::raw('@rownum  := @rownum  + 1 AS rownum'))
       ->whereMonth('created_at',Carbon::now()->month)
       ->whereBetween('sewapartner_account.created_at', array($from_date, $to_date))
       ->orderBy("id", 'desc')->get();
       } 
     else{
       $sewapartner = DB::table('sewapartner_account')->select("sewapartner_account.*",DB::raw('@rownum  := @rownum  + 1 AS rownum'))
      
       ->whereBetween('sewapartner_account.created_at', array($from_date, $to_date))
       ->orderBy("id", 'desc')->get();
     }      

    
   }
   elseif($request->get('range'))
   {
    // dd('hh');
     if($request->get('range')=='today'){
       $sewapartner = DB::table('sewapartner_account')->select("sewapartner_account.*",DB::raw('@rownum  := @rownum  + 1 AS rownum'))
       ->whereDate('created_at',$now)
       
       ->orderBy("id", 'desc')->get();
       }
       elseif($request->get('range')=='yesterday'){
         $sewapartner = DB::table('sewapartner_account')->select("sewapartner_account.*",DB::raw('@rownum  := @rownum  + 1 AS rownum'))
         ->whereDate('created_at',$yesterday)
       
         ->orderBy("id", 'desc')->get();
         }
       elseif($request->get('range')=='weekly'){
         $sewapartner = DB::table('sewapartner_account')->select("sewapartner_account.*",DB::raw('@rownum  := @rownum  + 1 AS rownum'))
         ->whereDate('created_at','>=',$date)
        
         ->orderBy("id", 'desc')->get();
         } 
       elseif($request->get('range')=='monthly'){
         $sewapartner = DB::table('sewapartner_account')->select("sewapartner_account.*",DB::raw('@rownum  := @rownum  + 1 AS rownum'))
         ->whereMonth('created_at',Carbon::now()->month)
         
         ->orderBy("id", 'desc')->get();
         } 
       else{
         $sewapartner = DB::table('sewapartner_account')->select("sewapartner_account.*",DB::raw('@rownum  := @rownum  + 1 AS rownum'))
        
         
         ->orderBy("id", 'desc')->get();
       }      
   }
   elseif($request->get('from_date') && $request->get('to_date'))
   {
     $from_date = $request->get('from_date');
     $to_date = $request->get('to_date');
     $sewapartner = DB::table('sewapartner_account')->select("sewapartner_account.*",DB::raw('@rownum  := @rownum  + 1 AS rownum'))
   
     ->whereBetween('sewapartner_account.created_at', array($from_date, $to_date))
     ->orderBy("id", 'desc')->get();
     
   }
   elseif($request->get('category'))
   {
    // dd('hh');
     if($request->get('category')=='Hospital'){
       $sewapartner = DB::table('sewapartner_account')->select("sewapartner_account.*",DB::raw('@rownum  := @rownum  + 1 AS rownum'))
       ->where('sewapartner_category','Hospital')
       
       ->orderBy("id", 'desc')->get();
       }
       elseif($request->get('category')=='Clinic'){
         $sewapartner = DB::table('sewapartner_account')->select("sewapartner_account.*",DB::raw('@rownum  := @rownum  + 1 AS rownum'))
         ->where('sewapartner_category','Clinic')
       
         ->orderBy("id", 'desc')->get();
         }
       elseif($request->get('category')=='Laboratory'){
         $sewapartner = DB::table('sewapartner_account')->select("sewapartner_account.*",DB::raw('@rownum  := @rownum  + 1 AS rownum'))
         ->where('sewapartner_category','Laboratory')
        
         ->orderBy("id", 'desc')->get();
         } 
       elseif($request->get('category')=='Medicalstore'){
         $sewapartner = DB::table('sewapartner_account')->select("sewapartner_account.*",DB::raw('@rownum  := @rownum  + 1 AS rownum'))
         ->where('sewapartner_category','Medicalstore')
         
         ->orderBy("id", 'desc')->get();
         } 
       else{
         $sewapartner = DB::table('sewapartner_account')->select("sewapartner_account.*",DB::raw('@rownum  := @rownum  + 1 AS rownum'))
        
         
         ->orderBy("id", 'desc')->get();
       }      
   }
    else{
     $sewapartner = DB::table('sewapartner_account')->select("sewapartner_account.*",DB::raw('@rownum  := @rownum  + 1 AS rownum'))
   
     ->orderBy("id", 'desc')->get(); 
    
      
      }   
    
  
    if ($request->ajax()) {
      // dd($order_details);
            return Datatables::of($sewapartner)
                ->addIndexColumn()
              
                ->addColumn('sewapartner_id', function($row){
                  $sewapartner_id= "SW".$row->sewapartner_id;
                  return $sewapartner_id;
              })
              ->addColumn('name', function($row){
                $name=DB::table('sewapartners')->where('id',$row->sewapartner_id)->value('name');
                return $name;
            })
          //   ->addColumn('category', function($row){
          //     $category=DB::table('sewapartners')->where('id',$row->sewapartner_id)->value('categories');
          //     return $category;
          // })
               
              
           
              
           
           
        
        
                ->rawColumns(['sewapartner_id','name'])
                ->make(true);
        }
      
          return view('Admin.reports');
      
       
  }
  public function invoices(Request $request)
  {
    // dd($request->get('category'));
    DB::statement(DB::raw('set @rownum=0'));
    $now = Carbon::now();       
    $yesterday = Carbon::yesterday();
    $date = Carbon::now()->subDays(7);
 
   if($request->get('category'))
   {
    // dd('hh');
     if($request->get('category')=='Hospital'){

      $sewapartner = DB::table('sewapartner_account')->select("sewapartner_account.*",DB::raw('@rownum  := @rownum  + 1 AS rownum'),DB::raw('SUM(discount) as value'))
       ->where('sewapartner_category','Hospital')
       ->groupby('sewapartner_id')
       ->orderBy('value','desc')->get(); 
       }
       elseif($request->get('category')=='Clinic'){
        $sewapartner = DB::table('sewapartner_account')->select("sewapartner_account.*",DB::raw('@rownum  := @rownum  + 1 AS rownum'),DB::raw('SUM(discount) as value'))
         ->where('sewapartner_category','Clinic')
         ->groupby('sewapartner_id')
         ->orderBy('value','desc')->get(); 
         }
       elseif($request->get('category')=='Laboratory'){
        $sewapartner = DB::table('sewapartner_account')->select("sewapartner_account.*",DB::raw('@rownum  := @rownum  + 1 AS rownum'),DB::raw('SUM(discount) as value'))
         ->where('sewapartner_category','Laboratory')
         ->groupby('sewapartner_id')
        ->orderBy('value','desc')->get(); 
         } 
       elseif($request->get('category')=='Medicalstore'){
        $sewapartner = DB::table('sewapartner_account')->select("sewapartner_account.*",DB::raw('@rownum  := @rownum  + 1 AS rownum'),DB::raw('SUM(discount) as value'))
         ->where('sewapartner_category','Medicalstore')
         ->groupby('sewapartner_id')
         ->orderBy('value','desc')->get(); 
         } 
       else{
        $sewapartner = DB::table('sewapartner_account')->select("sewapartner_account.*",DB::raw('@rownum  := @rownum  + 1 AS rownum'),DB::raw('SUM(discount) as value'))
         ->groupby('sewapartner_id')
         ->orderBy('value','desc')->get(); 
       }      
   }
    else{
      $sewapartner = DB::table('sewapartner_account')->select("sewapartner_account.*",DB::raw('@rownum  := @rownum  + 1 AS rownum'),DB::raw('SUM(discount) as value'))
      ->groupby('sewapartner_id')
      ->orderBy('value','desc')->get(); 
    
      
      }   
  // $sewapartner = DB::table('sewapartner_account')->select("sewapartner_account.*",DB::raw('@rownum  := @rownum  + 1 AS rownum'),DB::raw('SUM(discount) as value'))
  //  ->groupby('sewapartner_id')
  //   ->orderBy('value','desc')->get(); 
  // dd($sewapartner);
 
    if ($request->ajax()) {
      // dd($order_details);
            return Datatables::of($sewapartner)
                ->addIndexColumn()
              
                ->addColumn('sewapartner_id', function($row){
                  $sewapartner_id= "SW".$row->sewapartner_id;
                  return $sewapartner_id;
                })
              ->addColumn('name', function($row){
                $name=DB::table('sewapartners')->where('id',$row->sewapartner_id)->value('name');
                return $name;
              })
            ->addColumn('charges', function($row){
              $charges=DB::table('sewapartner_account')->where('sewapartner_id',$row->sewapartner_id)->sum('charges');
              return $charges;
             })
             ->addColumn('discount', function($row){
              $discount=DB::table('sewapartner_account')->where('sewapartner_id',$row->sewapartner_id)->sum('discount');
              return $discount;
             })
             ->addColumn('balance', function($row){
              $balance=DB::table('sewapartner_account')->where('sewapartner_id',$row->sewapartner_id)->sum('balance');
              return $balance;
             })
             ->addColumn('details', function($row){
              $details = '<a href="'.url("Admin/invoice_details").'/'.$row->sewapartner_id.'">Details';
             
              
              return $details;
            })
              
           
              
           
           
        
        
                ->rawColumns(['sewapartner_id','name','charges','discount','balance','details'])
                ->make(true);
        }
      
          return view('Admin.invoices');
      
       
  }
  public function invoice_details($id)
  {
    $invoices = DB::table('sewapartner_account')->where('sewapartner_id',$id)->get();
    $data = DB::table('sewapartner_account')->where('sewapartner_id',$id)->first();
    $data->sewapartner_name = DB::table('sewapartners')->where('id',$id)->value('name');
    return view('Admin.invoice_details',compact('invoices','data'));
  }
  public function doctor_invoice()
  {
    $invoices = DB::table('sewapartner_account')->where('sewapartner_category','Hospital')->groupby('doctor_name')->get();
    // dd($invoices);
    foreach($invoices as $value){
      $value->sewapartner_name = DB::table('sewapartners')->where('id',$value->sewapartner_id)->value('name');
      $value->charges = DB::table('sewapartner_account')->where('id',$value->id)->sum('charges');
      $value->discount = DB::table('sewapartner_account')->where('id',$value->id)->sum('discount');
      $value->balance = DB::table('sewapartner_account')->where('id',$value->id)->sum('balance');
    }
    // dd($invoices);
    // $data = DB::table('sewapartner_account')->where('sewapartner_id',$id)->first();
    // $data->sewapartner_name = DB::table('sewapartners')->where('id',$id)->value('name');
    return view('Admin.invoice_doctor',compact('invoices'));
  }
  public function doctorinvoice_details($id,$name)
  {
    $invoices = DB::table('sewapartner_account')->where('sewapartner_id',$id)->get();
    $data = DB::table('sewapartner_account')->where('sewapartner_id',$id)->where('doctor_name',$name)->get();
    foreach($data as $value){
      $value->sewapartner_name = DB::table('sewapartners')->where('id',$value->sewapartner_id)->value('name');
    }
   
    // dd($data);
    return view('Admin.doctorinvoice_details',compact('data','name'));
  }
  public function viewkhalsadatas($id){
    $cardholderdetails = DB::table('cardholder')->where('id',$id)->first();
    if($cardholderdetails->blood_group) {
      $cardholderdetails->blood_group_punjabi = DB::table('blood_group')->where('english', $cardholderdetails->blood_group)->value('punjabi');
    } else {
      $cardholderdetails->blood_group_punjabi = '';
    }
    // $pdf = PDF::loadView('Admin.khalsacard', ['cardholderdetails' => $cardholderdetails]);
    // $pdf->getDomPDF()->set_option('defaultFont', 'ArivMdr');
    // $pdf->getDomPDF()->set_option('isFontSubsettingEnabled', true);
    // $pdf->getDomPDF()->set_option('isRemoteEnabled', true);
    // Set the content-type and encoding headers
    // $response = $pdf->download('khalsacard.pdf');
    // $response->header('Content-Type', 'application/pdf; charset=UTF-8');
    // $response->header('Content-Disposition', 'attachment; filename="khalsacard.pdf"');
     // return $response;
    return view('Admin.khalsacard',compact('cardholderdetails'));
   
  }
  public function viewkhalsamemberdatas($id){
    $cardholderdetails = DB::table('cardholder')->where('id',$id)->first();
    if($cardholderdetails->blood_group) {
      $cardholderdetails->blood_group_punjabi = DB::table('blood_group')->where('english', $cardholderdetails->blood_group)->value('punjabi');
    } else {
      $cardholderdetails->blood_group_punjabi = '';
    }
    // $pdf = PDF::loadView('Admin.khalsamembercard', ['cardholderdetails' => $cardholderdetails]);
    // return $pdf->download('khalsacard.pdf');
    return view('Admin.khalsamembercard',compact('cardholderdetails'));
  }
   public function volunteerkhalsacard($id){
    $cardholderdetails = DB::table('volunteers')->where('id',$id)->first();

    // $pdf = PDF::loadView('Admin.volunteerkhalsacard', ['cardholderdetails' => $cardholderdetails]);
    // return $pdf->download('khalsacard.pdf');
    return view('Admin.volunteerkhalsacard',compact('cardholderdetails'));

   }
   public function editbusiness($id)
   {
    $business = DB::table('business')->where('id',$id)->first();
    $business_type = DB::table('business_types')->orderby('id','desc')->get();
    $cities = DB::table('cities')->select('id','city')->get();
    return view('Admin.editbusiness',compact('business','cities','business_type'));
   }
   public  function updatebusiness(Request $request,$id){
   
      $validator = Validator::make($request->all(), [
              // 'business_type'   =>     'required',
              // 'title'           =>     'required',
              // 'description'      =>     'required',
              // 'address'           =>     'required',
    
          ]);
          if ( $validator->fails()) { 
            return response()->json([
                'status'=>'0',
                'message'=>$validator->errors()->first(),
            ]);          
        } 
     
      $business['title'] = $request->get('title');
      $business['description'] = $request->get('description');
      $business['address'] = $request->get('address');
      $business['business_type'] = $request->get('business_type');
      $business['city'] = $request->get('city');
      $business['phone_number'] = $request->get('phone_number');
    
      
      
      
      DB::table('business')->where('id',$id)->update($business);
     
    
      if($business){       
        return response()->json([
          'status'=>'1',
          'message'=>'Business Updated',
      ]);                  
      }else{
        return response()->json([
          'status'=>'0',
          'message'=>'Business not Updated',
      ]);          
      }
  }
  public function deletebusiness($id)
  {
    DB::table('business')->where('id',$id)->delete();
    return redirect()->back();
  }
  public function change_subadmin_status(Request $request)
   {
    // dd($request->all());
    $validator = Validator::make($request->all(), [ 
      'subadmin_id'  => 'required',
    ]);
    if ($validator->fails()) { 
      return response()->json([
        'status'=>'0',
        'message'=>$validator->errors(),
      ]);          
    }
    try{
        DB::beginTransaction();          
        $result = DB::table('subadmins')->where('id',$request->subadmin_id)->first();
        // dd($result);
        if($result->active_status == 1){
            $subadmins['active_status'] = 0;
        }else{
            $subadmins['active_status'] = 1;
        }
        DB::table('subadmins')->where('id',$request->subadmin_id)->update($subadmins);
        DB::commit();
        return response()->json([
            'status'=>'1',
            'message'=>'done',
        ]);

    }
    catch(Exception $e){
        DB::rollback();
        return response()->json([
            'status'=>'0',
            'message'=>$e->getMessage(),
        ]);
    }
  }


  //Vacnacies Functions
  public function vacancies(Request $request) {
    $vacancies = DB::table('vacancies')->orderby('id','desc')->get();

    return view('Admin.vacancies',compact('vacancies'));
  }

  public function add_vacancy(Request $request) {
    $cities = DB::table('cities')->get();
    return view('Admin.add_vacancy',compact('cities'));
  }

  public function save_vacancy(Request $request) {
    $validator = Validator::make($request->all(), [
      'title'               =>     'required',
      'description'      =>     'required',
      'eligibility'           =>     'required',
      'location'           =>     'required',
      'salary'           =>     'required',
    ]);
    if ( $validator->fails()) { 
      return response()->json([
        'status'=>'0',
        'message'=>$validator->errors()->first(),
      ]);          
    } 
    $vacancy['title'] = $request->get('title');
    $vacancy['description'] = $request->get('description');
    $vacancy['eligibility'] = $request->get('eligibility');
    $vacancy['location'] = $request->get('location');
    $vacancy['salary'] = $request->get('salary');
    $vacancy['created_at'] = Carbon::now();
    $vacancy_id = DB::table('vacancies')->insertGetId($vacancy);

    if($vacancy_id) {       
      return response()->json([
        'status'=>'1',
        'message'=>'Vacancy Added',
      ]);                  
    } 
    else {
      return response()->json([
        'status'=>'0',
        'message'=>'Vacancy not Added',
      ]);          
    }
  }

  public function edit_vacancy($id) {

    $vacancy = DB::table('vacancies')->where('id',$id)->first();
    $cities = DB::table('cities')->get();
    return view('Admin.edit_vacancy',compact('vacancy','cities'));
  }

  public function update_vacancy(Request $request, $id) {

    $validator = Validator::make($request->all(), [
      'title'               =>     'required',
      'description'      =>     'required',
      'eligibility'           =>     'required',
      'location'           =>     'required',
      'salary'           =>     'required',
    ]);
    if ( $validator->fails()) { 
      return response()->json([
        'status'=>'0',
        'message'=>$validator->errors()->first(),
      ]);          
    } 

    $vacancy['title'] = $request->get('title');
    $vacancy['description'] = $request->get('description');
    $vacancy['eligibility'] = $request->get('eligibility');
    $vacancy['location'] = $request->get('location');
    $vacancy['salary'] = $request->get('salary');

    $update = DB::table('vacancies')->where('id',$id)->update($vacancy);

    if($update) {       
      return response()->json([
        'status'=>'1',
        'message'=>'Vacancy Updated',
      ]);                  
    } 
    else {
      return response()->json([
        'status'=>'0',
        'message'=>'Vacancy not Updated',
      ]);          
    }
  }

  public function delete_vacancy($id)
  {
    DB::table('vacancies')->where('id',$id)->delete();
    return redirect()->back();
  }

  public function about()
  {
    $about = DB::table('about_page')->where('id',1)->first();
   return view('Admin.about',compact('about'));
  }
  public function about_us()
  {
    $about = DB::table('about_page')->where('id',1)->first();
   return view('Admin.about_us',compact('about'));
  }

  public function about_save(Request $request)
  {
    $validator = Validator::make($request->all(), [
      'about'           =>     'required',
    ]);
    if ( $validator->fails()) { 
      return response()->json([
        'status'=>'0',
        'message'=>$validator->errors()->first(),
      ]);          
    }
    $exists = DB::table('about_page')->first();
    if($exists) {
      $update = DB::table('about_page')->where('id',$exists->id)->update(['about'=>$request->about]);

    } else {

      $update = DB::table('about_page')->insert([
        'about'=>$request->about,
        'created_at' => Carbon::now(),                   

      ]);

    }

    if($update) {       
      return response()->json([
        'status'=>'1',
        'message'=>'About page Saved',
      ]);                  
    } 
    else {
      return response()->json([
        'status'=>'0',
        'message'=>'About page not Saved',
      ]);          
    }
  }
}