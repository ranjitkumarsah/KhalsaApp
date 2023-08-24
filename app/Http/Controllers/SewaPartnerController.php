<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\SubAdmin;
use App\Models\SewaPartner;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use DB;
use Auth;
use Session;
use DataTables;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Validator;
use Toastr;
use Hash;
use PDF;
use File;

class SewaPartnerController extends Controller
{
    public function __construct(Guard $guard)
    {
        $this->middleware('guest')->except('logout');
    }

    public function addsewapartner(){
        return view('Sewapartner.Auth.addsewapartners');
    }

    public  function addsewapartnersdata(Request $request){
        $validator = Validator::make($request->all(), [
                'name'               =>     'required|',
                'email'              =>     'required|string|email|max:255|unique:subadmins',
                'contactnumber'      =>     'required',
                'password'           =>     'required',
                'sewa_address'       =>     'required',
                'categories'         =>     'required',
                'timings'            =>     'required',
                'services'           =>     'required',
            ]);
        $sewapartner = new Sewapartner();
        $sewapartner->name = $request->get('name');
        $sewapartner->email = $request->get('email');
        $sewapartner->password = bcrypt($request->get('password'));
        $sewapartner->contactnumber = $request->get('contactnumber');
        $sewapartner->sewa_address = $request->get('sewa_address');
        $sewapartner->categories = $request->get('categories');
        $sewapartner->timings = $request->get('timings');
        $sewapartner->services = $request->get('services');
        if($request->doctor_name){
        $sewapartner->doctor_name = $request->get('doctor_name');
        }
        if($request->qualification){
        $sewapartner->doctor_qualification = $request->get('qualification');
        }
        if($request->opdtiming){
        $sewapartner->opd_timing = $request->get('opdtiming');
        }
        if($sewapartner->save()){       
            return response()->json(['message' => 'Data added successfully!']);           
        }else{
            return response()->json(['message' => 'Data  not added']); 
        }
    }
    public function sewapartner_login(){
        return view('Sewapartner.Auth.sewapartnerloginfile');
    }
    public function  sewapartnerlogincheck(Request $request){
       
    $validator = Validator::make($request->all(), [
        'email'              =>     'required',
        'password'           =>     'required', 
    ]);
    if($validator->fails())
        {
       
        return redirect('Sewapartner/login')->withErrors($validator);     
        }
      $cres = $request->only('email','password');
       if(Auth::guard('sewa')->attempt($cres)){
        if(Auth::guard('sewa')->user()->active_status == 1){
        return redirect('Sewapartner/dashboard');
        }else{
          return redirect('Sewapartner/login')->with('errormessage','Your Account Is Not Active');
        }
       }
       else{
        return redirect('Sewapartner/login')->with('errormessage', 'Please Enter Valid Credentials!');
       }
   }

    public function storeToken(Request $request){
      $token = $request->token ?  $request->token : '';
      DB::table('sewapartners')->where('id',Auth::guard('sewa')->user()->id)->update(['web_token'=>$token]);

      return 1;

    }
   public function dashboard(){

    // $volunt = DB::table('sewapartner_account')->where('sewapartner_id',Auth::guard('sewa')->user()->id)->select(DB::raw("(COUNT(*)) as count"),DB::raw("MONTHNAME(created_at) as monthname"))
    // ->whereYear('created_at', date('Y'))
    // ->groupBy('monthname')
    // ->pluck('count');
    
    $current_year = Carbon::now()->year;
    $current_month = Carbon::now()->month;
    $volunt = [];
    for ($i=1; $i <=$current_month ; $i++) { 
      $volun = DB::table('sewapartner_account')->where('sewapartner_id',Auth::guard('sewa')->user()->id)->whereMonth('created_at', '=', $i)->whereYear('created_at', '=', $current_year)->count('id');
      
      if($volun) {
        $volunt[] = $volun;
      } else {
        $volunt[]= 0;

      }

    }

    $volunt = json_encode($volunt);
    $notifications = DB::table('sewapartner_notifications')->where('sewapartner_id',Auth::guard('sewa')->user()->id)->count();
    $pending_notification = DB::table('sewapartner_notifications')->where([['sewapartner_id',Auth::guard('sewa')->user()->id],['status',0]])->count();
    return view('Sewapartner.dashboard',compact('volunt','notifications','pending_notification'));
   }
   public function logout()
   {

    // DB::table('subadmins')->where('id',Auth::guard('sewa')->user()->id)->update(['web_token'=>'']);
     Auth::guard('sewa')->logout();
 
    return redirect('Sewapartner/login');
   }
   public function viewcardholder(){
    $cardholderdata = DB::table('cardholder')->orderBy('id','desc')->get();
    return view('Sewapartner.view_cardhholder',compact('cardholderdata'));     
   }

   public function family_details($id){
    $familydata = DB::table('cardholder_family')->where('cardholder_id',$id)->get();
    return view('Sewapartner.view_familydetails',compact('familydata'));     
   }

   public function children_details($id){
    $childrendata = DB::table('cardholder_children')->where('cardholder_id',$id)->get();
    return view('Sewapartner.view_childrendetails',compact('childrendata'));     
   }

  public function consultation_details(Request $request){
    $data = DB::table('sewapartner_account')->where('sewapartner_id',Auth::guard('sewa')->user()->id)->orderBy('id','desc')->get();
    $sewapartner = DB::table('sewapartners')->where('id',Auth::guard('sewa')->user()->id)->first();
    
    foreach($data as $value){
        $value->name = DB::table('cardholder')->where('card_id', $value->cardholder_id)->value('name');
     
    }
    
    return view('Sewapartner.viewinvoicedetails',compact('data','sewapartner'));     
   }

   public function addcardholderdatas(Request $request){

    $validator = Validator::make($request->all(), [            
            
      'id' => 'required',
    ]);
  
      if ($validator->fails()) { 
        
          return response()->json([
              'status'=>'0',
              'message'=>$validator->errors()->first(),
          ]);           
      }
    $send_id = $request->get('id');
    $cardholder_datas = DB::table('cardholder')->where('card_id',$send_id)->first();
    $familydata = []; 
    $childrendata = []; 
    if($cardholder_datas) {
      $familydata = DB::table('cardholder_family')->where('cardholder_id',$cardholder_datas->id)->get();

      $childrendata = DB::table('cardholder_children')->where('cardholder_id',$cardholder_datas->id)->get();
    }
    

    $datas = DB::table('cardholders')->where('card_id',$send_id)->first();

    if($cardholder_datas || $datas){
      $exists = DB::table('cardholder_data')->first();

      if($exists) {
        $update =  DB::table('cardholder_data')->update([
          'cardholder_id'  => $request->get('id')                  
        ]); 
      } else {
        $update =  DB::table('cardholder_data')->insert([
          'cardholder_id'  => $request->get('id')                  
        ]); 
      }

      return response()->json([
        'status'=>1,
        'message' => 'Data added successfully!',
        'cardholder_data' => $cardholder_datas,
        'family_data' =>$familydata,
        'child_data' =>$childrendata,
      ]); 
    }
    else{
      return response()->json([
        'status'=>0,
        'message' => 'Please check id does not exists!']
    );  
    }
    
   }

public function view_invoice_details(Request $request){
    $cardholders = DB::table('cardholder')->get();
    $get_consulted = DB::table('sewapartners')->select('categories')->where('id',Auth::guard('sewa')->user()->id)->first();
    $get_consulted_by =  $get_consulted->categories;

  
       $data = DB::table('sewapartner_doctors')->select('sewapartner_id','doctor_id')->where('sewapartner_id',Auth::guard('sewa')->user()->id)->pluck('doctor_id');
    //    $get_data = explode(" ",$data);
      //  dd($data);
       $ids = $data->toArray() ;
       $get_doctor_name =   DB::table('doctors')->select('name')->where('status',1)->whereIn('id', $ids)->get();
       $show_names = $get_doctor_name->toArray();
    //    dd($show_names);
    //    $sewapartner_id = $data->sewapartner_id;
      $cardholderid = DB::table('cardholder_data')->select('cardholder_id')->first();
      if($cardholderid) {
        $getcardholderid = $cardholderid->cardholder_id;
        //  dd($getcardholderid);
         $data = DB::table('cardsdata')->where('card_id',$getcardholderid)->value('type');
         if($data == "Cardholder"){
          // dd('hh');
          $cardholdersdatas = DB::table('cardholder')->select('id','name','age','address')->where('card_id',$cardholderid->cardholder_id)->first();
          // dd($cardholdersdatas);
         }else{
          $cardholdersdatas = DB::table('cardholders')->select('id','name','age','address')->where('card_id',$cardholderid->cardholder_id)->first();
          // dd($cardholdersdatas);
        }
      } else {
        $cardholdersdatas = [];
      }
      
      
      //  dd($cardholdersdatas);
       $chargedata = DB::table('sewapartner_account')->select('id','cardholder_id','doctor_name','description','charges','discount','balance','created_at')->where('sewapartner_id',Auth::guard('sewa')->user()->id)->orderby('id','desc')->get();
      // echo Auth::guard('sewa')->user()->id;
      //  dd($chargedata);
      // dd($show_names);
    if($request->ajax()){
      return response()->json([
        'data' => $chargedata,
      ]);
    }
      return view('Sewapartner.view_consultdetails',compact('cardholdersdatas','cardholders','chargedata','show_names','get_consulted_by')); 
    }
      

    public function saveaccount(Request $request){
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            // 'doctor_name'               =>      'required',
            'description'               =>      'required',
            'charges'                        =>      'required',
            // 'discount'                     =>      'required',
        ]);
        if ( $validator->fails()) { 
          return response()->json([
              'status'=>0,
              'message'=>$validator->errors()->first(),
          ]);          
      } 
        $cardholderid = DB::table('cardholder_data')->select('cardholder_id')->value('cardholder_id');
       
        if($cardholderid){
           
              $account_id =  DB::table('sewapartner_account')->insertGetId([
                  'sewapartner_id'    =>  Auth::guard('sewa')->user()->id,
                  'sewapartner_category'    =>  Auth::guard('sewa')->user()->categories,
                  'doctor_name'    =>  $request->doctor_name,
                  'cardholder_id'  => $cardholderid,
                  'description'    => $request->description,
                  'charges'    => $request->charges,
                  'discount'    => $request->discount,
                  'balance'    => $request->charges- $request->discount,                    
                ]);  
          // $data = DB::table('sewapartner_account')->where('id',$account_id)->first();
          // //  dd( $data);
          // $cardholder =  DB::table('cardholder')->where('card_id',$data->cardholder_id)->first();
          // $sewapartner =  DB::table('sewapartners')->where('id',$data->sewapartner_id)->first();
          // $pdf = PDF::loadView('Sewapartner.generateinvoice', ['data' => $data,'cardholder'=> $cardholder,'sewapartner'=> $sewapartner]);
          // return $pdf->download($cardholderid . '_' . $cardholder->name . '.pdf');
          // return 'fdfgdsg';
          //  return $pdf->download('invoice.pdf');   
 
        }
                return response()->json([
                    'status'=>1,
                    'message' => 'Data Added',
                    'account_id' =>$account_id,
                    ]);  
        // return redirect('Sewapartner/viewinvoicedetails');
    
       
    
       }
       public function invoice_download(Request $request, $account_id)
       {
          $cardholderid = DB::table('cardholder_data')->select('cardholder_id')->value('cardholder_id');
          $data = DB::table('sewapartner_account')->where('id',$account_id)->first();
          //  dd( $data);
          $cardholder =  DB::table('cardholder')->where('card_id',$data->cardholder_id)->first();
          $sewapartner =  DB::table('sewapartners')->where('id',$data->sewapartner_id)->first();
          $pdf = PDF::loadView('Sewapartner.generateinvoice1', ['data' => $data,'cardholder'=> $cardholder,'sewapartner'=> $sewapartner]);

          return $pdf->download($cardholderid . '_' . $cardholder->name . '.pdf');
       }
   public function view_description_details(){
        $sewapartner = DB::table('sewapartner_account')->get();
        return view('Sewapartner.view_accountdetails',compact('sewapartner'));     
   }
   public function edit_description_details($id)
   {
     $editdata = DB::table('sewapartner_account')->where('id',$id)->first();
     // dd(dcrypt($subadmin->password));
     return view('Sewapartner.editaccount',compact('editdata'));
   }

   public function view_account_details(){
    $sewapartner = DB::table('sewapartner_account')->get();

    foreach($sewapartner as $data){
        $data->name = DB::table('cardholder')->where('id',$data->cardholder_id)->value('name');
        $data->address = DB::table('cardholder')->where('id',$data->cardholder_id)->value('address');

      }
   return view('Sewapartner.view_accountdetails',compact('sewapartner'));       
}

public function editaccountdetail($id)
   {
     $editdata = DB::table('sewapartner_account')->where('id',$id)->first();
     // dd(dcrypt($subadmin->password));
     return view('Sewapartner.editaccountdetail',compact('editdata'));
   }

   
   public function deleteaccountdetail($id)
   {
    DB::table('sewapartner_account')->where('id',$id)->delete();
    return redirect()->back();
   }
   public function updateaccountdetail(Request $request, $id)
   {
    //  dd($request->all());
     $validator = Validator::make($request->all(), [
    //    'name'              =>     'required|',
    //    'email'             =>     'email',
    //    'username'              =>     'required',
    //    'password'          =>     'required|max:9',
    //    'contact_number'    =>     'required|max:13',
    //    'village'    =>     'required',
    //    'landmark'    =>     'required',
    //    'address'           =>     'required',
     ]);
     if ( $validator->fails()) { 
       return response()->json([
           'status'=>'0',
           'message'=>$validator->errors()->first(),
       ]);          
   } 
   //  $subadmin = new SubAdmin();
    $sewapartneraccount['description'] = $request->get('description');
    $sewapartneraccount['charges'] = $request->get('charges');
    $sewapartneraccount['discount'] = $request->get('discount');
    $sewapartneraccount['balance'] = $sewapartneraccount['charges']- $sewapartneraccount['discount'];

    // $sewapartneraccount['password'] = bcrypt($request->get('password'));

    $data = DB::table('sewapartner_account')->where('id',$id)->update($sewapartneraccount);
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

   public function viewcarddatass($id)
   {
     $carddetails = DB::table('cardholder')->where('id',$id)->first();
     return view('Sewapartner.viewcarddetails',compact('carddetails'));
   }
   public function cardholderdatas($id){
    $datas = DB::table('cardholder')->where('id',$id)->first();
  //  dd($datas);
    $datasss = DB::table('cardholder_family')->where('cardholder_id',$id)->get();
    // dd($datasss);
    $children = DB::table('cardholder_children')->where('cardholder_id',$id)->get();
    
   
    return view('Sewapartner.cardholderpage',compact('datas','datasss','children'));
  }
  public function view_notification()
  {
    $sewapartnerCreateDate = Auth::guard('sewa')->user()->created_at;
    $notifications = DB::table('notifications')->where([['category','Sewapartner'],['created_at','>=',$sewapartnerCreateDate]])->orderby('id','desc')->get();

    return view('Sewapartner.view_notification',compact('notifications'));
  }
  public function feedbacks()
  {
    return view('Sewapartner.feedbacks');
  }
  public  function savefeedbacks(Request $request){
  
      $validator = Validator::make($request->all(), [
              
              'title'           =>     'required',
              'description'      =>     'required',
            
    
          ]);
          if ( $validator->fails()) { 
            return response()->json([
                'status'=>'0',
                'message'=>$validator->errors()->first(),
            ]);          
        } 
      // $sewapartner = new SewaPartner();
      $feedback['title'] = $request->title; 
       $feedback['description'] = $request->description;
       
        $feedback['type'] = "Sewapartner";
      
       $feedback['add_id'] = Auth::guard('sewa')->user()->id;
       $feedback['add_name'] =  Auth::guard('sewa')->user()->name;
       $feedback['created_at'] =  Carbon::now();
      
    
       $feedback_id =  DB::table('feedbacks')->insertGetId($feedback);
     
    
      if($feedback_id){       
        return response()->json([
          'status'=>'1',
          'message'=>'Feedback Added',
      ]);                  
      }else{
        return response()->json([
          'status'=>'0',
          'message'=>'Feedback not Added',
      ]);          
      }
  }
  public function add_blood_request() {
    
    return view('Sewapartner.blood_request');
  }
  public function blood_request(Request $request)
  {
    DB::statement(DB::raw('set @rownum=0'));
    if($request->status == "Pending"){
      $data = DB::table('request_blood')->select("request_blood.*",DB::raw('@rownum  := @rownum  + 1 AS rownum'))->where([['status',0],['added_by',Auth::user()->id],['add_type','Sewapartner']])->orderby('id','desc')->get();
    }
    elseif($request->status == "Fulfilled"){
      $data = DB::table('request_blood')->select("request_blood.*",DB::raw('@rownum  := @rownum  + 1 AS rownum'))->where([['status',1],['added_by',Auth::user()->id],['add_type','Sewapartner']])->orderby('id','desc')->get();
    }
   
    else{
      $data = DB::table('request_blood')->select("request_blood.*",DB::raw('@rownum  := @rownum  + 1 AS rownum'))->where([['added_by',Auth::user()->id],['add_type','Sewapartner']])->orderby('id','desc')->get();
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


      ->rawColumns(['status','active'])
      ->make(true);
    }
      
    return view('Sewapartner.view_blood_request');
      
       
  }
  public  function saveblood_request(Request $request){
  
    $validator = Validator::make($request->all(), [
            
      'name' => 'required',         
      'address' => 'required',
      'hospital_name' => 'required',         
      'blood_group' => 'required',
      'contact_number' => 'required',
      'requirement_details' => 'required'
          
  
        ]);
        if ( $validator->fails()) { 
          return response()->json([
              'status'=>'0',
              'message'=>$validator->errors()->first(),
          ]);          
      } 
    // $sewapartner = new SewaPartner();
       $blood['name'] = $request->name; 
       $blood['address'] = $request->address;
     
       $blood['hospital_name'] = $request->hospital_name;
       $blood['blood_group'] = $request->blood_group;
       $blood['contact_number'] = $request->contact_number;
       $blood['requirement_details'] = $request->requirement_details;

       $blood['added_by'] = Auth::user()->id;
       $blood['add_type'] = 'Sewapartner';
       $blood['created_at'] = Carbon::now();
      
    
       $blood_id =  DB::table('request_blood')->insertGetId($blood);
   
  
    if($blood_id){       
      return response()->json([
        'status'=>'1',
        'message'=>'Blood Request Added',
    ]);                  
    }else{
      return response()->json([
        'status'=>'0',
        'message'=>'Blood Request not Added',
    ]);          
    }
}
public function customer_support()
{
  $support = DB::table('supports')->first();
  return view('Sewapartner.customer_support',compact('support'));
}
public function profile(){
  $data = DB::table('sewapartners')->where('id',Auth::guard('sewa')->user()->id)->first();
  $get_profile = $data->profile;
  $doctors = DB::table('sewapartner_doctors')->where('sewapartner_id',Auth::guard('sewa')->user()->id)->get();
  $services = DB::table('sewapartner_services')->where('sewapartner_id',Auth::guard('sewa')->user()->id)->get();
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
 
  return view('Sewapartner.profile',compact('data','doctors','services','get_profile','service_names'));
 }
 public function generate_invoice_details(){
  $cardholderid = DB::table('cardholder_data')->select('cardholder_id')->value('cardholder_id');
//    dd($cardholderid);
 $get_consulted = DB::table('sewapartners')->select('categories','name','sewa_address','email','contactnumber')->where('id',Auth::guard('sewa')->user()->id)->first();
  //  dd($get_consulted);
 $getcategory = $get_consulted->categories;
 
 $gethospname = $get_consulted->name;
 
 $gethospaddress = $get_consulted->sewa_address;
 
 $gethosemail = $get_consulted->email;
 $gethoscontact = $get_consulted->contactnumber;
//  dd($gethosemail);
 $data = DB::table('sewapartner_doctors')->select('sewapartner_id','doctor_id')->where('sewapartner_id',Auth::guard('sewa')->user()->id)->pluck('doctor_id');
//    dd($data);
 $ids = $data->toArray() ;
 $getdoctorname =   DB::table('doctors')->select('name')->whereIn('id', $ids)->get();
 $getname = $getdoctorname['0']->name;

  //  dd($getdoctorname );


  
  $cardholderdetails = DB::table('sewapartner_account')->select('description','charges','discount','balance','doctor_name')->where('cardholder_id',$cardholderid)->latest('id')->first();
    //  dd($cardholderdetails);
      $cardholderdetails->name = DB::table('cardholder')->where('card_id',$cardholderid)->value('name');
      $cardholderdetails->address = DB::table('cardholder')->where('card_id',$cardholderid)->value('address');
      $cardholderdetails->age = DB::table('cardholder')->where('card_id',$cardholderid)->value('age');
      $cardholderdetails->contact = DB::table('cardholder')->where('card_id',$cardholderid)->value('contact_number');
      $cardholderdetails->created_at = DB::table('sewapartner_account')->where('cardholder_id',$cardholderid)->value('created_at');
  
  $pdf = PDF::loadView('Sewapartner.generateinvoice', ['cardholderdetails' => $cardholderdetails,'getname'=> $getname,'getcategory'=> $getcategory,'gethospname'=> $gethospname,'gethospaddress'=> $gethospaddress,'gethosemail'=>$gethosemail,'gethoscontact'=>$gethoscontact]);
  return $pdf->download('cardholder.pdf');
  
 }
 public function reprint($id){
  $data = DB::table('sewapartner_account')->where('id',$id)->first();
 
  $cardholder =  DB::table('cardholder')->where('card_id',$data->cardholder_id)->first();
  $sewapartner =  DB::table('sewapartners')->where('id',$data->sewapartner_id)->first();
  
  $pdf = PDF::loadView('Sewapartner.generateinvoice1', ['data' => $data,'cardholder'=> $cardholder,'sewapartner'=> $sewapartner]);
  return $pdf->download('invoice.pdf');
  
 }
 public function addnotifications()
 {
  $cities=DB::table('cities')->get();
  return view('Sewapartner.addnotification',compact('cities'));
 }
 public  function saveaddnotifications(Request $request)
 {
     // dd(in_array( "Card_Holder" ,$request->category));
     $validator = Validator::make($request->all(), [
          
             'title'           =>     'required',
             'description'      =>     'required',
             'image'           =>     'dimensions:max_width=1000,max_height=1000|file|max:1000',
             'location'               =>     'required',
   
         ]);
         if ( $validator->fails()) { 
           return response()->json([
               'status'=>'0',
               'message'=>$validator->errors()->first(),
           ]);          
       } 
     // $sewapartner = new SewaPartner();
     $location = DB::table('cities')->where('id',$request->get('location'))->value('city');
     $notification['location'] = $location;
     $notification['title'] = $request->get('title');
     $notification['description'] = $request->get('description');
     $notification['sewapartner_id'] = Auth::guard('sewa')->user()->id;
     $notification['sewapartner_name'] = Auth::guard('sewa')->user()->name;
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
     }else{
      $notification['image']= url('/').'/public/images/bell.jpg'; 
     }
   
      $notification_id =  DB::table('sewapartner_notifications')->insertGetId($notification);
          
     
      // if($notification_id){
      //   $volunteers = DB::table('volunteers')->where('fcm_token','!=','')->where('device_type','!=','')->where('village','=',$location)->get();
      //   foreach($volunteers as $volunteer){
      //     $device_token = $volunteer->fcm_token ?? '';
      //     $devtype   = $volunteer->device_type ?? '';
      //     $badge = '0';
      //     $title = "New Notification";
      //     $mymessage =$request->get('title');
      //     $req_status="1";
      //     $description = $request->description;
      //     $result = $this->push_notification($device_token,$devtype,$badge,$title,$mymessage,$req_status,$description);   
      //     // dd($result);
      //   }
      // }
    
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






 
 public function notification_request(Request $request)
 {
  if( request()->segment(2) == 'pending_notification') {
    $notifications = DB::table('sewapartner_notifications')->where([['sewapartner_id',Auth::guard('sewa')->user()->id],['status',0]])->get()->sortByDesc('id');
  } else {
    $notifications = DB::table('sewapartner_notifications')->where('sewapartner_id',Auth::guard('sewa')->user()->id)->get()->sortByDesc('id');
  }


   return view('Sewapartner.notification_request',compact('notifications'));
 }


   

}


    

