<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use DB;
use Auth;
use stdClass;
use App\Models\Volunteer;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Config;
use Carbon\Carbon;
use File;

class ApiController extends Controller
{
    public function login(Request $request){
        $x = new stdClass();
        $validator = Validator::make($request->all(), [            
            'username' => 'required',
            'password' => 'required',
            
        ]);
        
        if ($validator->fails()) { 
           
             return response()->json([
                'status'=>'0',
                'message'=>$validator->errors()->first(),
                'data'=>$x
            ]);           
         }
         
        $username = $request->input('username');
        // Config::set('jwt.user', 'App\Models\Volunteer'); 
        // Config::set('auth.providers.users.model', \App\Models\Volunteer::class);
        $credentials = $request->only('username', 'password');
        $data = DB::table('volunteers')->select('id','name','email','username','contact_number','aadhaar_card_front','aadhaar_card_back',DB::raw("if(vote_card!='',vote_card,'') as vote_card"),'profile_pic','village','landmark','address','active_status')->where('username',$username)->first();
        if($data){
            DB::table('volunteers')->where('id',$data->id)->update(['fcm_token'=>$request->fcm_token,'device_type'=>$request->device_type]);
        }
       
        $token = null;
       
        try {
            if (!$token = auth('api')->attempt($credentials)) {
              
                return response()->json([
                    'status'=>'0',
                    'message'=>"Invalid username or password",
                    'data'=>$x
                ]);
            }
        } catch (JWTAuthException $e) {
            return response()->json([
                'status' => '0',
                'message' => 'failed to create token',
                'data'=>$x
            ]);
        }
        if($data->active_status == 1){
       
            return response()->json([
          
                'status' => '1',            
                'message' => 'Logged in successfully',
                'token' => $token,
                'data'=>$data,
           
        ]);
      
        }else{
            return response()->json([
                'status'=>'0',
                'message'=>"Your account is not active",
                'data'=>$x
            ]);       
        }
       
    }
    
    public function logout() {
        $x = new stdClass();
        Auth::guard('api')->logout();
        return response()->json([
            'status'=>'1',
            'message' => 'Logged out successfully',
            'data'=>$x
          
        ]);
    
       
    }
    public function add_cardholder_family(Request $request)
    {
        $x = new stdClass();
        $validator = Validator::make($request->all(), [            
            'cardholder_id' => 'required',
            'fname' => 'required',
            // 'famritdhari' => 'required',
            // 'fage' => 'required',
            // 'fqualification' => 'required',
            // 'fjob' => 'required',
            // 'fsalary' => 'required',
            
        ]);
        
        if ($validator->fails()) { 
           
             return response()->json([
                'status'=>'0',
                'message'=>$validator->errors()->first(),
                'data'=>$x
            ]);           
         }
       $volunteer =  auth('api')->authenticate($request->bearerToken());
       if(!$volunteer){
        return response()->json([
            'status'=>'2',
            'message'=>"Token is mismatch",
            'data'=>$x
        ]);       
       }
       $cardholder['cardholder_id'] = $request->cardholder_id;
       $cardholder['fname'] = $request->fname;  
       $cardholder['famritdhari'] = $request->famritdhari;  
       $cardholder['fage'] = $request->fage;  
       $cardholder['fqualification'] = $request->fqualification;  
       $cardholder['fjob'] = $request->fjob;  
       $cardholder['fsalary'] = $request->fsalary;  
       $cardholder['fblood_group'] = $request->fblood_group; 
       $cardholder['faadhaar'] = $request->faadhaar; 
       $cardholder['frelation'] = $request->frelation; 
       $family_id = DB::table('cardholder_family')->insertgetId($cardholder);
       $data = DB::table('cardholder_family')->select('id','cardholder_id','fname','famritdhari','fage','fqualification','fjob','fsalary','fblood_group','faadhaar','frelation')->where('cardholder_id',$request->cardholder_id)->get();
     
       if($data)
        {
            return response()->json([
                'status'=>'1',
                'message'=>'success',
                'data'=>$data,
                // 'token' =>  $token
            ]); 
        }
        else{
            return response()->json([
                'status'=>'0',
                'message'=>'No data found',
                'data'=> [],
            ]);     
        }
       
    
    }
    public function add_cardholder(Request $request)
    {
        // dd(Carbon::now()->timestamp.'-'.'12');
        $x = new stdClass();
        $validator = Validator::make($request->all(), [            
            'name' => 'required',
            'name_punjabi' => 'required',
            'age' => 'required',
            'address' => 'required',
            'address_punjabi' => 'required',
            // 'job' => 'required',
            // 'annual_income' => 'required',
            // 'contact_number' => 'required',
            // 'qualification' => 'required',
            // 'adhaar_number' => 'required',
            // 'own_house' => 'required',
            
        ]);
        
        if ($validator->fails()) { 
           
             return response()->json([
                'status'=>'0',
                'message'=>$validator->errors()->first(),
                'data'=>$x
            ]);           
        }
        $volunteer =  auth('api')->authenticate($request->bearerToken());
        if(!$volunteer){
            return response()->json([
                'status'=>'2',
                'message'=>"Token is mismatch",
                'data'=>$x
            ]);       
        }
        $cardholder['name'] = $request->name;
        $cardholder['name_punjabi'] = $request->name_punjabi;
        $cardholder['age'] = $request->age;  
        $cardholder['address'] = $request->address;  
        $cardholder['address_punjabi'] = $request->address_punjabi;  
        $cardholder['job'] = $request->job;  
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
        if($request->blood_donor == 1){
            $cardholder['blood_donor'] = "yes";
        }
        if($request->blood_donor == 0){
            $cardholder['blood_donor'] = "no";
        }
        if($request->company_name){
            $cardholder['company_name'] = $request->company_name;
        }
        if($request->is_needy){
            $cardholder['is_needy'] = $request->is_needy;
        }
        if($request->policy_number){
            $cardholder['policy_number'] = $request->policy_number;
        }
        if($request->policy_issue_date){
            $cardholder['policy_issue_date'] = $request->policy_issue_date;
        }
        if($request->policy_expiry_date){
            $cardholder['policy_expiry_date'] = $request->policy_expiry_date;
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
      
        if($request->hasfile('image'))
        {
            $file = $request->image;
            $path = storage_path().'/cardholderimg/';
            File::makeDirectory($path, $mode = 0777, true, true);
            $imagePath = storage_path().'/cardholderimg/';         
            $post_image        = time().$file->getClientOriginalName();
            $image_url          = url('/').'/storage/cardholderimg/'.'/'. $post_image;   
            $file->move($imagePath, $post_image);

            $cardholder['cardholder_profile']= $image_url;
        }
     
        $cardholder['add_id'] = $volunteer->id;
        $cardholder['add_name'] = $volunteer->name;
        $cardholder['add_type'] = "Volunteer";
        $family_id = DB::table('cardholder')->insertgetId($cardholder);
        if( $family_id){
            if($request->is_needy && $request->is_needy != 'No'){
                $card_id = '1984-'.(1000000+$family_id);
            } else {
                $card_id = '1699-'.(1000000+$family_id);
            }

            DB::table('cardholder')->where('id',$family_id)->update(['card_id'=>$card_id]);

            $card['card_id'] = $card_id;
            $card['type'] = "Cardholder";
            DB::table('cardsdata')->insert($card);
        }
        $data = DB::table('cardholder')->select('id','card_id','name','name_punjabi','age','address','address_punjabi','job','annual_income','contact_number','qualification','adhaar_number','own_house','rent','rent_price','long_disease','disease_name','disease_details','support_organisation','joined_organisation','verify_officer','family_head','is_needy','email','whatsapp_number')->where('id',$family_id)->first();

        if($data) {
            return response()->json([
                'status'=>'1',
                'message'=>'success',
                'data'=>$data,
                // 'token' =>  $token
            ]); 
        }
        else {
            return response()->json([
                'status'=>'0',
                'message'=>'No data found',
                'data'=> $x
            ]);     
        }
       
    }
    public function add_cardholder_children(Request $request)
    {
        $x = new stdClass();
        $validator = Validator::make($request->all(), [            
            'cardholder_id' => 'required',
            'cname' => 'required',
            // 'camritdhari' => 'required',
            // 'cage' => 'required',
            // 'cqualification' => 'required',
            // 'cjob' => 'required',
            // 'csalary' => 'required',
            
        ]);
        
        if ($validator->fails()) { 
           
             return response()->json([
                'status'=>'0',
                'message'=>$validator->errors()->first(),
                'data'=>$x
            ]);           
         }
       $volunteer =  auth('api')->authenticate($request->bearerToken());
       if(!$volunteer){
        return response()->json([
            'status'=>'2',
            'message'=>"Token is mismatch",
            'data'=>$x
        ]);       
       }
       $cardholder['cardholder_id'] = $request->cardholder_id;
       $cardholder['cname'] = $request->cname;  
       $cardholder['camritdhari'] = $request->camritdhari;  
       $cardholder['cage'] = $request->cage;  
       $cardholder['cqualification'] = $request->cqualification;  
       $cardholder['cfees'] = $request->cfees;  
       $cardholder['cschool'] = $request->cschool;  
       $cardholder['caadhaar'] = $request->caadhaar;  
       $cardholder['crelation'] = $request->crelation;  
       $family_id = DB::table('cardholder_children')->insertgetId($cardholder);
       $data = DB::table('cardholder_children')->select('id','cardholder_id','cname','camritdhari','cage','cqualification','cfees','cschool','caadhaar','crelation')->where('cardholder_id',$request->cardholder_id)->get();
       if($data)
        {
            return response()->json([
                'status'=>'1',
                'message'=>'success',
                'data'=>$data,
                // 'token' =>  $token
            ]); 
        }
        else{
            return response()->json([
                'status'=>'0',
                'message'=>'No data found',
                'data'=> [],
            ]);     
        }
       
    
    }
    
    public function view_cardholder(Request $request)
    {
        $x = new stdClass();
       
        $volunteer =  auth('api')->authenticate($request->bearerToken());
        if(!$volunteer){
            return response()->json([
                'status'=>'2',
                'message'=>"Token is mismatch",
                'data'=>$x
            ]);       
        }
       
        $data = DB::table('cardholder')->select('id','name','age','address','job','annual_income','contact_number','qualification','adhaar_number','own_house','rent','rent_price','long_disease','disease_name','disease_details','support_organisation','joined_organisation','verify_officer','family_head','blood_group','is_needy')->where('add_id',$volunteer->id)->where('add_name',$volunteer->name)->get();

        foreach($data as $value){
            $value->family = DB::table('cardholder_family')->select('id','cardholder_id','fname','famritdhari','fage','fqualification','fjob','fsalary','fblood_group','faadhaar','frelation')->where('cardholder_id',$value->id)->get();
            $value->children = DB::table('cardholder_children')->select('id','cardholder_id','cname','camritdhari','cage','cqualification','cfees','cschool','caadhaar','crelation')->where('cardholder_id',$value->id)->get();

            if($value->is_needy != 'No') {
                $value->needyData = DB::table('cardholders')
                ->select('id','cardholder_id','name','disease_time','own_house','rent_price','annual_income','medical_detail','foundation_detail','foundation_help','foundation_member','govthelp','help_amount','agriculture','cattle','social_media','gurudwara','gurudwara_mgmt','gurudwara_contact','attesting_officer','family_head','volunteer_name','volunteer_photo','two_wheeler','four_wheeler','air_conditioner','income_source','date','blood_donor','volunteer_signature','company_name','policy_number','policy_issue_date','policy_expiry_date')
                ->orderBy('id','DESC')
                ->where('cardholder_id',$value->id)
                ->first();
            
                if($value->needyData) {
                    $value->needyData->house_photos = DB::table('carholders_images')->select('id','image')->where('cardholders_id',$value->needyData->id)->get();
        
                    $value->needyData->aadhaar_photos = DB::table('carholders_images')->select('id','aadhaar_images')->where('cardholders_id',$value->needyData->id)->get();
                }


            }
        }

        if($data) {
            return response()->json([
                'status'=>'1',
                'message'=>'success',
                'data'=>$data,
                // 'token' =>  $token
            ]); 
        }
        else {
            return response()->json([
                'status'=>'0',
                'message'=>'No data found',
                'data'=> [],
            ]);     
        }
       
    
    }
    public function verify_cardholder(Request $request)
    {
        $x = new stdClass();
       
       $volunteer =  auth('api')->authenticate($request->bearerToken());
       if(!$volunteer){
        return response()->json([
            'status'=>'2',
            'message'=>"Token is mismatch",
            'data'=>$x
        ]);       
       }
       
       $data = DB::table('cardholder')->select('id','name','age','address','job','annual_income','contact_number','qualification','adhaar_number','own_house','rent','rent_price','long_disease','disease_name','disease_details','support_organisation','joined_organisation','verify_officer','family_head')->where('add_id',$volunteer->id)->where('add_name',$volunteer->name)->where('verify_status',1)->get();
       foreach($data as $value){
        $value->family = DB::table('cardholder_family')->select('id','cardholder_id','fname','famritdhari','fage','fqualification','fjob','fsalary','fblood_group','faadhaar','frelation')->where('cardholder_id',$value->id)->get();
        $value->children = DB::table('cardholder_children')->select('id','cardholder_id','cname','camritdhari','cage','cqualification','cfees','cschool','caadhaar','crelation')->where('cardholder_id',$value->id)->get();
       }

       if($data)
        {
            return response()->json([
                'status'=>'1',
                'message'=>'success',
                'data'=>$data,
                // 'token' =>  $token
            ]); 
        }
        else{
            return response()->json([
                'status'=>'0',
                'message'=>'No data found',
                'data'=> [],
            ]);     
        }
       
    
    }
    public function unverify_cardholder(Request $request)
    {
        $x = new stdClass();
       
       $volunteer =  auth('api')->authenticate($request->bearerToken());
       if(!$volunteer){
        return response()->json([
            'status'=>'2',
            'message'=>"Token is mismatch",
            'data'=>$x
        ]);       
       }
       
       $data = DB::table('cardholder')->select('id','name','age','address','job','annual_income','contact_number','qualification','adhaar_number','own_house','rent','rent_price','long_disease','disease_name','disease_details','support_organisation','joined_organisation','verify_officer','family_head','is_needy')->where('add_id',$volunteer->id)->where('add_name',$volunteer->name)->where('verify_status',0)->get();
       foreach($data as $value){
        $value->family = DB::table('cardholder_family')->select('id','cardholder_id','fname','famritdhari','fage','fqualification','fjob','fsalary','fblood_group','faadhaar','frelation')->where('cardholder_id',$value->id)->get();
        $value->children = DB::table('cardholder_children')->select('id','cardholder_id','cname','camritdhari','cage','cqualification','cfees','cschool','caadhaar','crelation')->where('cardholder_id',$value->id)->get();
       }

       if($data)
        {
            return response()->json([
                'status'=>'1',
                'message'=>'success',
                'data'=>$data,
                // 'token' =>  $token
            ]); 
        }
        else{
            return response()->json([
                'status'=>'0',
                'message'=>'No data found',
                'data'=> [],
            ]);     
        }
       
    
    }
    public function active_cardholder(Request $request)
    {
        $x = new stdClass();
       
       $volunteer =  auth('api')->authenticate($request->bearerToken());
       if(!$volunteer){
        return response()->json([
            'status'=>'2',
            'message'=>"Token is mismatch",
            'data'=>$x
        ]);       
       }
       
       $data = DB::table('cardholder')->select('id','name','age','address','job','annual_income','contact_number','qualification','adhaar_number','own_house','rent','rent_price','long_disease','disease_name','disease_details','support_organisation','joined_organisation','verify_officer','family_head')->where('add_id',$volunteer->id)->where('add_name',$volunteer->name)->where('active_status',1)->get();
       foreach($data as $value){
        $value->family = DB::table('cardholder_family')->select('id','cardholder_id','fname','famritdhari','fage','fqualification','fjob','fsalary','fblood_group','faadhaar','frelation')->where('cardholder_id',$value->id)->get();
        $value->children = DB::table('cardholder_children')->select('id','cardholder_id','cname','camritdhari','cage','cqualification','cfees','cschool','caadhaar','crelation')->where('cardholder_id',$value->id)->get();
       }

       if($data)
        {
            return response()->json([
                'status'=>'1',
                'message'=>'success',
                'data'=>$data,
                // 'token' =>  $token
            ]); 
        }
        else{
            return response()->json([
                'status'=>'0',
                'message'=>'No data found',
                'data'=> [],
            ]);     
        }
       
    
    }
    public function view_notifications(Request $request)
    {
        $x = new stdClass();
        $validator = Validator::make($request->all(), [            
            // 'type' => 'required',
            
        ]);
        
        if ($validator->fails()) { 
           
             return response()->json([
                'status'=>'0',
                'message'=>$validator->errors()->first(),
                'data'=>$x
            ]);           
         }
       $volunteer =  auth('api')->authenticate($request->bearerToken());
       if(!$volunteer){
        return response()->json([
            'status'=>'2',
            'message'=>"Token is mismatch",
            'data'=>$x
        ]);       
       }
       
    //   if($request->type == 1)
    //   {
        $data = DB::table('notifications')->select('id','category','title','description','location',DB::raw("if(image!='',image,'') as image"),'created_at as date')->where('category','Volunteer')->get();
    //   }

       if($data)
        {
            return response()->json([
                'status'=>'1',
                'message'=>'success',
                'data'=>$data,
            ]); 
        }
        else{
            return response()->json([
                'status'=>'0',
                'message'=>'No data found',
                'data'=> [],
            ]);     
        }
       
    
    }
    public function cardholder_details(Request $request)
    {
        $x = new stdClass();
        $validator = Validator::make($request->all(), [            
            'cardholder_id' => 'required',
            
        ]);
        
        if ($validator->fails()) { 
           
             return response()->json([
                'status'=>'0',
                'message'=>$validator->errors()->first(),
                'data'=>$x
            ]);           
         }
       $volunteer =  auth('api')->authenticate($request->bearerToken());
       if(!$volunteer){
        return response()->json([
            'status'=>'2',
            'message'=>"Token is mismatch",
            'data'=>$x
        ]);       
       }
       
       $data = DB::table('cardholder')
       ->select('id','card_id','name','name_punjabi','age','address','address_punjabi','email','whatsapp_number','job','annual_income','is_needy',DB::raw("if(contact_number!='',contact_number,'') as contact_number"),DB::raw("if(qualification!='',qualification,'') as qualification"),DB::raw("if(adhaar_number!='',adhaar_number,'') as adhaar_number"),DB::raw("if(own_house!='',own_house,'') as own_house"),DB::raw("if(rent!='',rent,'') as rent"),DB::raw("if(rent_price!='',rent_price,'') as rent_price"),DB::raw("if(long_disease!='',long_disease,'') as long_disease"),DB::raw("if(disease_name!='',disease_name,'') as disease_name"),DB::raw("if(disease_details!='',disease_details,'') as disease_details"),DB::raw("if(support_organisation!='',support_organisation,'') as support_organisation"),DB::raw("if(joined_organisation!='',joined_organisation,'') as joined_organisation"),DB::raw("if(verify_officer!='',verify_officer,'') as verify_officer"),DB::raw("if(family_head!='',family_head,'') as family_head"),DB::raw("if(blood_donor!='',blood_donor,'') as blood_donor"),DB::raw("if(blood_group!='',blood_group,'') as blood_group"),DB::raw("if(company_name!='',company_name,'') as company_name"),DB::raw("if(policy_number!='',policy_number,'') as policy_number"),DB::raw("if(policy_issue_date!='',policy_issue_date,'') as policy_issue_date"),DB::raw("if(policy_expiry_date!='',policy_expiry_date,'') as policy_expiry_date"),DB::raw("if(village!='',village,'') as village"),DB::raw("if(cardholder_profile!='',cardholder_profile,'') as cardholder_profile"))
       ->where('add_id',$volunteer->id)->where('add_name',$volunteer->name)->where('id',$request->cardholder_id)->first();
       
        $data->family = DB::table('cardholder_family')->select('id','cardholder_id','fname','famritdhari','fage','fqualification','fjob','fsalary','fblood_group','faadhaar','frelation')->where('cardholder_id',$data->id)->get();
        $data->children = DB::table('cardholder_children')->select('id','cardholder_id','cname','camritdhari','cage','cqualification','cfees','cschool','caadhaar','crelation')->where('cardholder_id',$data->id)->get();
        if($data->is_needy != 'No') {
            $data->needyData = DB::table('cardholders')
            ->select('id','cardholder_id','name','disease_time','own_house','rent_price','annual_income','medical_detail','foundation_detail','foundation_help','foundation_member','govthelp','help_amount','agriculture','cattle','social_media','gurudwara','gurudwara_mgmt','gurudwara_contact','attesting_officer','family_head','volunteer_name','volunteer_photo','two_wheeler','four_wheeler','air_conditioner','income_source','date','blood_donor','volunteer_signature','company_name','policy_number','policy_issue_date','policy_expiry_date')
            ->orderBy('id','DESC')
            ->where('cardholder_id',$data->id)
            ->first();
            if($data->needyData) {

                $data->needyData->house_photos = DB::table('carholders_images')->select('id','image')->where([['cardholders_id',$data->needyData->id],['image','!=','']])->get();

                $data->needyData->aadhaar_photos = DB::table('carholders_images')->select('id','aadhaar_images')->where([['cardholders_id',$data->needyData->id],['aadhaar_images','!=','']])->get();
            }    
        }

       if($data)
        {
            return response()->json([
                'status'=>'1',
                'message'=>'success',
                'data'=>$data,
                // 'token' =>  $token
            ]); 
        }
        else{
            return response()->json([
                'status'=>'0',
                'message'=>'No data found',
                'data'=> [],
            ]);     
        }
       
    
    }
    public function get_profile(Request $request)
    {
        $x = new stdClass();
       
       $volunteer =  auth('api')->authenticate($request->bearerToken());
       if(!$volunteer){
        return response()->json([
            'status'=>'2',
            'message'=>"Token is mismatch",
            'data'=>$x
        ]);       
       }
       
       $data = DB::table('volunteers')->select('id','name','name_punjabi','username','email','contact_number','aadhaar_card_front','aadhaar_card_back','vote_card','profile_pic','address','address_punjabi','village','landmark','reference','active_status')->where('id',$volunteer->id)->first();
      
       if($data)
        {
            return response()->json([
                'status'=>'1',
                'message'=>'success',
                'data'=>$data,
                // 'token' =>  $token
            ]); 
        }
        else{
            return response()->json([
                'status'=>'0',
                'message'=>'No data found',
                'data'=> [],
            ]);     
        }
       
    
    }
    public function edit_cardholder(Request $request)
    {
        
        $x = new stdClass();
        $validator = Validator::make($request->all(), [   
            'cardholder_id' => 'required',         
            'name' => 'required',
            'age' => 'required',
            // 'address' => 'required',
            // 'job' => 'required',
            // 'annual_income' => 'required',
            // 'contact_number' => 'required',
            // 'qualification' => 'required',
            // 'adhaar_number' => 'required',
            // 'own_house' => 'required',
            
        ]);
        
        if ($validator->fails()) { 
           
             return response()->json([
                'status'=>'0',
                'message'=>$validator->errors()->first(),
                'data'=>$x
            ]);           
         }
        $volunteer =  auth('api')->authenticate($request->bearerToken());
        if(!$volunteer){
            return response()->json([
                'status'=>'2',
                'message'=>"Token is mismatch",
                'data'=>$x
            ]);       
        }
        if($request->name){
            $cardholder['name'] = $request->name;
        }
        if($request->age){
        $cardholder['age'] = $request->age;
        } 
        if($request->address){ 
        $cardholder['address'] = $request->address;
        } 
        if($request->job){  
        $cardholder['job'] = $request->job;
        } 
        if($request->annual_income){ 
        $cardholder['annual_income'] = $request->annual_income;
        }
        if($request->contact_number){  
        $cardholder['contact_number'] = $request->contact_number;
        } 
        if($request->qualification){  
        $cardholder['qualification'] = $request->qualification;
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
        if($request->company_name){
            $cardholder['company_name'] = $request->company_name;
        }
        if($request->policy_number){
            $cardholder['policy_number'] = $request->policy_number;
        }
        if($request->policy_issue_date){
            $cardholder['policy_issue_date'] = $request->policy_issue_date;
        }
        if($request->policy_expiry_date){
            $cardholder['policy_expiry_date'] = $request->policy_expiry_date;
        }
        if($request->blood_group){
            $cardholder['blood_group'] = $request->blood_group;
        }
        if($request->village){
            $cardholder['village'] = $request->village;
        }
      
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
        if($request->cardholder_profile){
            $cardholder['cardholder_profile']= $image_url;
        }
        $cardholder['add_id'] = $volunteer->id;
        $cardholder['add_name'] = $volunteer->name;
        DB::table('cardholder')->where('id',$request->cardholder_id)->update($cardholder);
        //    DB::table('cardholder')->where('id',$family_id)->update(['card_id'=>Carbon::now()->timestamp.'-'.$family_id]);
        $data = DB::table('cardholder')->select('id','card_id','name','age','address','job','annual_income','contact_number','qualification','adhaar_number','own_house','rent','rent_price','long_disease','disease_name','disease_details','support_organisation','joined_organisation','verify_officer','family_head','policy_number','policy_issue_date','policy_expiry_date','blood_group','village','cardholder_profile','company_name')->where('id',$request->cardholder_id)->first();
        if($data){
            return response()->json([
                'status'=>'1',
                'message'=>'success',
                'data'=>$data,
                // 'token' =>  $token
            ]); 
        }
        else{
            return response()->json([
                'status'=>'0',
                'message'=>'No data found',
                'data'=> $x
            ]);     
        }
       
    }
    public function delete_cardholder(Request $request)
    {
        
        $x = new stdClass();
        $validator = Validator::make($request->all(), [   
            'cardholder_id' => 'required',         
        
            
        ]);
        
        if ($validator->fails()) { 
           
             return response()->json([
                'status'=>'0',
                'message'=>$validator->errors()->first(),
                'data'=>$x
            ]);           
         }
       $volunteer =  auth('api')->authenticate($request->bearerToken());
       if(!$volunteer){
        return response()->json([
            'status'=>'2',
            'message'=>"Token is mismatch",
            'data'=>$x
        ]);       
       }
   
       try
       {
           DB::table('cardholder')->where('id',$request->cardholder_id)->delete();
          
         
           DB::commit();
           return response()->json([
               'status'=>'1',
               'message'=>'success',
               'data'=>$x,
           ]);

       }
       catch(Exception $e)
       {
           DB::rollback();
           return response()->json([
               'status'=>'0',
               'message'=>'failed',
               'data'=>$x,
           ]);  
       }
       
    }
    public function cardholder_family(Request $request)
    {
        $x = new stdClass();
        $validator = Validator::make($request->all(), [   
            'cardholder_id' => 'required',         
        
            
        ]);
        
        if ($validator->fails()) { 
           
             return response()->json([
                'status'=>'0',
                'message'=>$validator->errors()->first(),
                'data'=>$x
            ]);           
         }
       $volunteer =  auth('api')->authenticate($request->bearerToken());
       if(!$volunteer){
        return response()->json([
            'status'=>'2',
            'message'=>"Token is mismatch",
            'data'=>$x
        ]);       
       }
       
       $data = DB::table('cardholder_family')->select('id','fname','famritdhari','fage','fqualification','fjob','fsalary','fblood_group','faadhaar','frelation')->where('cardholder_id',$request->cardholder_id)->get();
     
       if($data)
        {
            return response()->json([
                'status'=>'1',
                'message'=>'success',
                'data'=>$data,
                // 'token' =>  $token
            ]); 
        }
        else{
            return response()->json([
                'status'=>'0',
                'message'=>'No data found',
                'data'=> [],
            ]);     
        }
       
    
    }
    public function cardholder_children(Request $request)
    {
        $x = new stdClass();
        $validator = Validator::make($request->all(), [   
            'cardholder_id' => 'required',         
        
            
        ]);
        
        if ($validator->fails()) { 
           
             return response()->json([
                'status'=>'0',
                'message'=>$validator->errors()->first(),
                'data'=>$x
            ]);           
         }
       $volunteer =  auth('api')->authenticate($request->bearerToken());
       if(!$volunteer){
        return response()->json([
            'status'=>'2',
            'message'=>"Token is mismatch",
            'data'=>$x
        ]);       
       }
       
       $data = DB::table('cardholder_children')->select('id','cname','camritdhari','cage','cqualification','cfees','cschool','caadhaar','crelation')->where('cardholder_id',$request->cardholder_id)->get();
      
       if($data)
        {
            return response()->json([
                'status'=>'1',
                'message'=>'success',
                'data'=>$data,
                
            ]); 
        }
        else{
            return response()->json([
                'status'=>'0',
                'message'=>'No data found',
                'data'=> [],
            ]);     
        }
       
    
    }
    public function edit_cardholderfamily(Request $request)
    {
        
        $x = new stdClass();
        $validator = Validator::make($request->all(), [   
            'cardholderfamily_id' => 'required',         
            'fname' => 'required',
            'famritdhari' => 'required',
          
            
        ]);
        
        if ($validator->fails()) { 
           
             return response()->json([
                'status'=>'0',
                'message'=>$validator->errors()->first(),
                'data'=>$x
            ]);           
        }
        $volunteer =  auth('api')->authenticate($request->bearerToken());
        if(!$volunteer){
            return response()->json([
                'status'=>'2',
                'message'=>"Token is mismatch",
                'data'=>$x
            ]);       
        }
        if($request->fname){
            $cardholder['fname'] = $request->fname;
        }
        if($request->famritdhari){
        $cardholder['famritdhari'] = $request->famritdhari;
        } 
        if($request->fage){ 
        $cardholder['fage'] = $request->fage;
        } 
        if($request->fqualification){  
        $cardholder['fqualification'] = $request->fqualification;
        } 
        if($request->fjob){ 
        $cardholder['fjob'] = $request->fjob;
        }
        if($request->fsalary){  
        $cardholder['fsalary'] = $request->fsalary;
        } 
        if($request->fblood_group){  
            $cardholder['fblood_group'] = $request->fblood_group;
        } 
        if($request->faadhaar){  
            $cardholder['faadhaar'] = $request->faadhaar;
        } 
        if($request->frelation){  
            $cardholder['frelation'] = $request->frelation;
        } 
        
       DB::table('cardholder_family')->where('id',$request->cardholderfamily_id)->update($cardholder);
   
       $data = DB::table('cardholder_family')->select('id','fname','famritdhari','fage','fqualification','fjob','fsalary','faadhaar','frelation')->where('id',$request->cardholderfamily_id)->first();
       if($data)
        {
            return response()->json([
                'status'=>'1',
                'message'=>'success',
                'data'=>$data,
                
            ]); 
        }
        else{
            return response()->json([
                'status'=>'0',
                'message'=>'No data found',
                'data'=> $x
            ]);     
        }
       
    }
    public function edit_cardholderchildren(Request $request)
    {
        
        $x = new stdClass();
        $validator = Validator::make($request->all(), [   
            'cardholderchildren_id' => 'required',         
            'cname' => 'required',
            'camritdhari' => 'required',
          
            
        ]);
        
        if ($validator->fails()) { 
           
             return response()->json([
                'status'=>'0',
                'message'=>$validator->errors()->first(),
                'data'=>$x
            ]);           
         }
       $volunteer =  auth('api')->authenticate($request->bearerToken());
       if(!$volunteer){
        return response()->json([
            'status'=>'2',
            'message'=>"Token is mismatch",
            'data'=>$x
        ]);       
       }
       if($request->cname){
        $cardholder['cname'] = $request->cname;
       }
       if($request->camritdhari){
       $cardholder['camritdhari'] = $request->camritdhari;
       } 
       if($request->cage){ 
       $cardholder['cage'] = $request->cage;
       } 
       if($request->cqualification){  
       $cardholder['cqualification'] = $request->cqualification;
       } 
       if($request->cfees){ 
       $cardholder['cfees'] = $request->cfees;
       }
       if($request->cschool){  
       $cardholder['cschool'] = $request->cschool;
       } 
       if($request->caadhaar){  
        $cardholder['caadhaar'] = $request->caadhaar;
        } 
        if($request->crelation){  
            $cardholder['crelation'] = $request->crelation;
            } 
    
       DB::table('cardholder_children')->where('id',$request->cardholderchildren_id)->update($cardholder);
   
       $data = DB::table('cardholder_children')->select('id','cname','camritdhari','cage','cqualification','cjob','csalary','caadhaar','crelation')->where('id',$request->cardholderchildren_id)->first();
       if($data)
        {
            return response()->json([
                'status'=>'1',
                'message'=>'success',
                'data'=>$data,
                
            ]); 
        }
        else{
            return response()->json([
                'status'=>'0',
                'message'=>'No data found',
                'data'=> $x
            ]);     
        }
       
    }
    public function send_feedback(Request $request)
    {
        
        $x = new stdClass();
        $validator = Validator::make($request->all(), [   
            'title' => 'required',         
            'description' => 'required',
         
          
            
        ]);
        
        if ($validator->fails()) { 
           
             return response()->json([
                'status'=>'0',
                'message'=>$validator->errors()->first(),
                'data'=>$x
            ]);           
         }
       $volunteer =  auth('api')->authenticate($request->bearerToken());
       if(!$volunteer){
        return response()->json([
            'status'=>'2',
            'message'=>"Token is mismatch",
            'data'=>$x
        ]);       
       }
     
       $feedback['title'] = $request->title; 
       $feedback['description'] = $request->description;
       if($volunteer){
        $feedback['type'] = "Volunteer";
       }
       $feedback['add_id'] = $volunteer->id;
       $feedback['add_name'] = $volunteer->name;
      
    
       $feedback_id =  DB::table('feedbacks')->insertGetId($feedback);
   
       $data = DB::table('feedbacks')->select('id','title','description','type')->where('id',$feedback_id)->first();
       if($data)
        {
            return response()->json([
                'status'=>'1',
                'message'=>'success',
                'data'=>$data,
                
            ]); 
        }
        else{
            return response()->json([
                'status'=>'0',
                'message'=>'No data found',
                'data'=> $x
            ]);     
        }
       
    }
    public function delete_cardholderfamily(Request $request)
    {
        
        $x = new stdClass();
        $validator = Validator::make($request->all(), [   
            'cardholderfamily_id' => 'required',         
        
            
        ]);
        
        if ($validator->fails()) { 
           
             return response()->json([
                'status'=>'0',
                'message'=>$validator->errors()->first(),
                'data'=>$x
            ]);           
         }
       $volunteer =  auth('api')->authenticate($request->bearerToken());
       if(!$volunteer){
        return response()->json([
            'status'=>'2',
            'message'=>"Token is mismatch",
            'data'=>$x
        ]);       
       }
   
       try
       {
           DB::table('cardholder_family')->where('id',$request->cardholderfamily_id)->delete();
          
         
           DB::commit();
           return response()->json([
               'status'=>'1',
               'message'=>'success',
               'data'=>$x,
           ]);

       }
       catch(Exception $e)
       {
           DB::rollback();
           return response()->json([
               'status'=>'0',
               'message'=>'failed',
               'data'=>$x,
           ]);  
       }
       
    }
    public function delete_cardholderchildren(Request $request)
    {
        
        $x = new stdClass();
        $validator = Validator::make($request->all(), [   
            'cardholderchildren_id' => 'required',         
        
            
        ]);
        
        if ($validator->fails()) { 
           
             return response()->json([
                'status'=>'0',
                'message'=>$validator->errors()->first(),
                'data'=>$x
            ]);           
         }
       $volunteer =  auth('api')->authenticate($request->bearerToken());
       if(!$volunteer){
        return response()->json([
            'status'=>'2',
            'message'=>"Token is mismatch",
            'data'=>$x
        ]);       
       }
   
       try
       {
           DB::table('cardholder_children')->where('id',$request->cardholderchildren_id)->delete();
          
         
           DB::commit();
           return response()->json([
               'status'=>'1',
               'message'=>'success',
               'data'=>$x,
           ]);

       }
       catch(Exception $e)
       {
           DB::rollback();
           return response()->json([
               'status'=>'0',
               'message'=>'failed',
               'data'=>$x,
           ]);  
       }
       
    }
    public function add_khalsamember(Request $request)
    {
        
        $x = new stdClass();
        $validator = Validator::make($request->all(), [            
            'patient_detail' => 'required',
            // 'age' => 'required',
            // 'address' => 'required',
            // 'job' => 'required',
            // 'annual_income' => 'required',
            // 'contact_number' => 'required',
            // 'qualification' => 'required',
            // 'adhaar_number' => 'required',
            // 'own_house' => 'required',
            
        ]);
        
        if ($validator->fails()) { 
           
             return response()->json([
                'status'=>'0',
                'message'=>$validator->errors()->first(),
                'data'=>$x
            ]);           
        }
        $volunteer =  auth('api')->authenticate($request->bearerToken());
        if(!$volunteer){
            return response()->json([
                'status'=>'2',
                'message'=>"Token is mismatch",
                'data'=>$x
            ]);       
        }
        $cardholder['name'] = $request->patient_detail;

        if($request->cardholder_id){
            $cardholder['cardholder_id'] = $request->cardholder_id;
        } 
        if($request->disease_time){
            $cardholder['disease_time'] = $request->disease_time;
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
        if($request->cattle){   
            $cardholder['cattle'] = $request->cattle;
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
        if($request->gurudwara_contact){ 
            $cardholder['gurudwara_contact'] = $request->gurudwara_contact;
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
        if($request->blood_donor){
            $cardholder['blood_donor'] = $request->blood_donor;
        }
        if($request->company_name){
            $cardholder['company_name'] = $request->company_name;
        }
        if($request->policy_number){
            $cardholder['policy_number'] = $request->policy_number;
        }
        if($request->policy_issue_date){
            $cardholder['policy_issue_date'] = $request->policy_issue_date;
        }
        if($request->policy_expiry_date){
            $cardholder['policy_expiry_date'] = $request->policy_expiry_date;
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
        //    if($request->aadhaar_card){
        //      if($request->hasfile('aadhaar_card'))
        //      {
        //          $file = $request->aadhaar_card;
        //          $path = storage_path().'/cardholderimg/';
        //          File::makeDirectory($path, $mode = 0777, true, true);
        //          $imagePath = storage_path().'/cardholderimg/';         
        //          $post_image        = time().$file->getClientOriginalName();
        //          $image_url          = url('/').'/storage/cardholderimg/'.'/'. $post_image;   
        //          $file->move($imagePath, $post_image);
        //      }
        //      $cardholder['aadhaar_card']= $image_url;
        //    }
        $cardholder['add_id']= $volunteer->id;
        $cardholder['add_name']= $volunteer->name;
        $cardholder['add_type']= "Volunteer";
    
        
       
        $family_id = DB::table('cardholders')->insertgetId($cardholder);

        if( $family_id){
            $card_id = '1984-'.(1000000+$family_id);

            DB::table('cardholders')->where('id',$family_id)->update(['card_id'=>$card_id]);

            $card['card_id'] = $card_id;
            $card['type'] = "KhalsaMember";

            DB::table('cardsdata')->insert($card);
        }
        if($family_id){

            if($request->cardholder_id){
                $cards_id = '1984-'.(1000000+$request->cardholder_id);
                $cardholders['is_needy'] = 'Yes';
                $cardholders['card_id'] = $cards_id;

                DB::table('cardholder')->where('id',$request->cardholder_id)->update($cardholders);
                
            } 
            if ($request->hasFile('house_photo')) {
            
            $files = $request->file('house_photo');
            
            foreach ($files as $file) {
                
                $path = storage_path().'/cardholderimg/';
                File::makeDirectory($path, $mode = 0777, true, true);
                $imagePath = storage_path().'/cardholderimg/';          
                $post_image        = time().$file->getClientOriginalName();
                $image_url          = url('/').'/storage/cardholderimg/'.'/'. $post_image;
                $file->move($imagePath, $post_image);
                DB::table('carholders_images')->insert([
                    'cardholders_id'  => $family_id,
                    'image'  => $image_url,
                    
                
                ]);
        
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
                        'cardholders_id'  => $family_id,
                        'aadhaar_images'  => $image_url,
                    ]);
            
                } 
            }
    
        }
        
       $data = DB::table('cardholders')
       ->select('id','cardholder_id','name','disease_time','own_house','rent_price','annual_income','medical_detail','foundation_detail','foundation_help','foundation_member','govthelp','help_amount','agriculture','cattle','social_media','gurudwara','gurudwara_mgmt','gurudwara_contact','attesting_officer','family_head','volunteer_name','volunteer_photo','two_wheeler','four_wheeler','air_conditioner','income_source','date','blood_donor','volunteer_signature','company_name','policy_number','policy_issue_date','policy_expiry_date')
       ->where('id',$family_id)
       ->first();
       $data->house_photos = DB::table('carholders_images')->select('id','image')->where('cardholders_id',$data->id)->get();
       $data->aadhaar_photos = DB::table('carholders_images')->select('id','aadhaar_images')->where('cardholders_id',$data->id)->get();
       if($data)
        {
            return response()->json([
                'status'=>'1',
                'message'=>'success',
                'data'=>$data,
                // 'token' =>  $token
            ]); 
        }
        else{
            return response()->json([
                'status'=>'0',
                'message'=>'No data found',
                'data'=> $x
            ]);     
        }
       
    }
    public function cities(Request $request)
    {
       
        $data = DB::table('cities')->select('id','city')->get();

       if($data)
        {
            return response()->json([
                'status'=>'1',
                'message'=>'success',
                'data'=>$data,
                // 'token' =>  $token
            ]); 
        }
        else{
            return response()->json([
                'status'=>'0',
                'message'=>'No data found',
                'data'=> [],
            ]);     
        }
    }
    public function view_khalsamember(Request $request)
    {
        $x = new stdClass();
       
       $volunteer =  auth('api')->authenticate($request->bearerToken());
       if(!$volunteer){
        return response()->json([
            'status'=>'2',
            'message'=>"Token is mismatch",
            'data'=>$x
        ]);       
       }
       
       $data = DB::table('cardholders')->select('id','name','disease_time','medical_detail','foundation_detail','foundation_help','foundation_member','govthelp','help_amount','agriculture','social_media','gurudwara','gurudwara_mgmt','attesting_officer','family_head','volunteer_name','volunteer_photo','aadhaar_card','two_wheeler')->where('add_id',$volunteer->id)->where('add_name',$volunteer->name)->get();
        foreach($data as $value){
            if($value) {
                $value->house_photos = DB::table('carholders_images')->select('id','image')->where('cardholders_id',$value->id)->get();
            }


        }

       if($data)
        {
            return response()->json([
                'status'=>'1',
                'message'=>'success',
                'data'=>$data,
                // 'token' =>  $token
            ]); 
        }
        else{
            return response()->json([
                'status'=>'0',
                'message'=>'No data found',
                'data'=> [],
            ]);     
        }
       
    
    }
    public function verify_khalsamember(Request $request)
    {
        $x = new stdClass();
       
       $volunteer =  auth('api')->authenticate($request->bearerToken());
       if(!$volunteer){
        return response()->json([
            'status'=>'2',
            'message'=>"Token is mismatch",
            'data'=>$x
        ]);       
       }
       
       $data = DB::table('cardholders')->select('id','name','disease_time','medical_detail','foundation_detail','foundation_help','foundation_member','govthelp','help_amount','agriculture','social_media','gurudwara','gurudwara_mgmt','attesting_officer','family_head','volunteer_name','volunteer_photo','aadhaar_card','two_wheeler')->where('add_id',$volunteer->id)->where('add_name',$volunteer->name)->where('verify_status',1)->get();
    //    foreach($data as $value){
    //     $value->family = DB::table('cardholder_family')->select('id','cardholder_id','fname','famritdhari','fage','fqualification','fjob','fsalary')->where('cardholder_id',$value->id)->get();
    //     $value->children = DB::table('cardholder_children')->select('id','cardholder_id','cname','camritdhari','cage','cqualification','cjob','csalary')->where('cardholder_id',$value->id)->get();
    //    }

       if($data)
        {
            return response()->json([
                'status'=>'1',
                'message'=>'success',
                'data'=>$data,
                // 'token' =>  $token
            ]); 
        }
        else{
            return response()->json([
                'status'=>'0',
                'message'=>'No data found',
                'data'=> [],
            ]);     
        }
       
    
    }
    public function unverify_khalsamember(Request $request)
    {
        $x = new stdClass();
       
       $volunteer =  auth('api')->authenticate($request->bearerToken());
       if(!$volunteer){
        return response()->json([
            'status'=>'2',
            'message'=>"Token is mismatch",
            'data'=>$x
        ]);       
       }
       
       $data =  DB::table('cardholders')->select('id','name','disease_time','medical_detail','foundation_detail','foundation_help','foundation_member','govthelp','help_amount','agriculture','social_media','gurudwara','gurudwara_mgmt','attesting_officer','family_head','volunteer_name','volunteer_photo','aadhaar_card','two_wheeler')->where('add_id',$volunteer->id)->where('add_name',$volunteer->name)->where('verify_status',0)->get();
    //    foreach($data as $value){
    //     $value->family = DB::table('cardholder_family')->select('id','cardholder_id','fname','famritdhari','fage','fqualification','fjob','fsalary')->where('cardholder_id',$value->id)->get();
    //     $value->children = DB::table('cardholder_children')->select('id','cardholder_id','cname','camritdhari','cage','cqualification','cjob','csalary')->where('cardholder_id',$value->id)->get();
    //    }

       if($data)
        {
            return response()->json([
                'status'=>'1',
                'message'=>'success',
                'data'=>$data,
                // 'token' =>  $token
            ]); 
        }
        else{
            return response()->json([
                'status'=>'0',
                'message'=>'No data found',
                'data'=> [],
            ]);     
        }
       
    
    }
    public function active_khalsamember(Request $request)
    {
        $x = new stdClass();
       
       $volunteer =  auth('api')->authenticate($request->bearerToken());
       if(!$volunteer){
        return response()->json([
            'status'=>'2',
            'message'=>"Token is mismatch",
            'data'=>$x
        ]);       
       }
       
       $data =  DB::table('cardholders')->select('id','name','disease_time','medical_detail','foundation_detail','foundation_help','foundation_member','govthelp','help_amount','agriculture','social_media','gurudwara','gurudwara_mgmt','attesting_officer','family_head','volunteer_name','volunteer_photo','aadhaar_card','two_wheeler')->where('add_id',$volunteer->id)->where('add_name',$volunteer->name)->where('active_status',1)->get();
    //    foreach($data as $value){
    //     $value->family = DB::table('cardholder_family')->select('id','cardholder_id','fname','famritdhari','fage','fqualification','fjob','fsalary')->where('cardholder_id',$value->id)->get();
    //     $value->children = DB::table('cardholder_children')->select('id','cardholder_id','cname','camritdhari','cage','cqualification','cjob','csalary')->where('cardholder_id',$value->id)->get();
    //    }

       if($data)
        {
            return response()->json([
                'status'=>'1',
                'message'=>'success',
                'data'=>$data,
                // 'token' =>  $token
            ]); 
        }
        else{
            return response()->json([
                'status'=>'0',
                'message'=>'No data found',
                'data'=> [],
            ]);     
        }
       
    
    }
    public function cardholder_filter(Request $request)
    {
        $x = new stdClass();
       
       $volunteer =  auth('api')->authenticate($request->bearerToken());
       if(!$volunteer){
        return response()->json([
            'status'=>'2',
            'message'=>"Token is mismatch",
            'data'=>$x
        ]);       
       }
       
       if($request->name){
        $data = DB::table('cardholder')->select('id','name','age','address','job','annual_income','contact_number','qualification','adhaar_number','own_house','rent','rent_price','long_disease','disease_name','disease_details','support_organisation','joined_organisation','verify_officer','family_head')->where('add_id',$volunteer->id)->where('add_name',$volunteer->name)->where('name', 'LIKE', "%{$request->name}%")->get();
       }
      else{
        $data = DB::table('cardholder')->select('id','name','age','address','job','annual_income','contact_number','qualification','adhaar_number','own_house','rent','rent_price','long_disease','disease_name','disease_details','support_organisation','joined_organisation','verify_officer','family_head')->where('add_id',$volunteer->id)->where('add_name',$volunteer->name)->where('address', 'LIKE', "%{$request->location}%")->orwhere('village', 'LIKE', "%{$request->location}%")->get();
      }
       foreach($data as $value){
        $value->family = DB::table('cardholder_family')->select('id','cardholder_id','fname','famritdhari','fage','fqualification','fjob','fsalary','fblood_group','faadhaar','frelation')->where('cardholder_id',$value->id)->get();
        $value->children = DB::table('cardholder_children')->select('id','cardholder_id','cname','camritdhari','cage','cqualification','cfees','cschool','caadhaar','crelation')->where('cardholder_id',$value->id)->get();
       }

       if($data)
        {
            return response()->json([
                'status'=>'1',
                'message'=>'success',
                'data'=>$data,
                // 'token' =>  $token
            ]); 
        }
        else{
            return response()->json([
                'status'=>'0',
                'message'=>'No data found',
                'data'=> [],
            ]);     
        }
       
    
    }
    public function support_number(Request $request)
    {
        $x = new stdClass();
       
       $volunteer =  auth('api')->authenticate($request->bearerToken());
       if(!$volunteer){
        return response()->json([
            'status'=>'2',
            'message'=>"Token is mismatch",
            'data'=>$x
        ]);       
       }
       
       $data =  DB::table('supports')->select('phone_number')->first();
   

       if($data)
        {
            return response()->json([
                'status'=>'1',
                'message'=>'success',
                'data'=>$data,
                // 'token' =>  $token
            ]); 
        }
        else{
            return response()->json([
                'status'=>'0',
                'message'=>'No data found',
                'data'=> [],
            ]);     
        }
       
    
    }



    public function business_type_list(Request $request)
    {
        // dd('hh');
        $x = new stdClass();
        $validator = Validator::make($request->all(), [
            // 'title' => 'required',         
            // 'description' => 'required',
            // 'address' => 'required',
            // 'business_type' => 'required',



        ]);

        if ($validator->fails()) {

            return response()->json([
                'status' => '0',
                'message' => $validator->errors()->first(),
                'data' => $x
            ]);
        }




        $data = DB::table('business_types')->select('id', 'business_type')->orderby('id', 'desc')->get();
        if ($data) {
            return response()->json([
                'status' => '1',
                'message' => 'success',
                'data' => $data,

            ]);
        } else {
            return response()->json([
                'status' => '0',
                'message' => 'No data found',
                'data' => []
            ]);
        }

    }

    public function add_business(Request $request)
    {
        // dd('hh');
        $x = new stdClass();
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required',
            'address' => 'required',
            'business_type' => 'required',
            'phone_number' => 'required',
            'city' => 'required',
           // 'user_id' => 'required',
           // 'user_type' => 'required',

        ]);

        if ($validator->fails()) {

            return response()->json([
                'status' => '0',
                'message' => $validator->errors()->first(),
                'data' => $x
            ]);
        }
        //    $cardholder =  auth('cardapi')->authenticate($request->bearerToken());
        //    if(!$cardholder){
        //     return response()->json([
        //         'status'=>'2',
        //         'message'=>"Token is mismatch",
        //         'data'=>$x
        //     ]);       
        //    }

        $business['title'] = $request->title;
        $business['description'] = $request->description;
        $business['city'] = $request->city ?? '';

        $business['address'] = $request->address;
        $business['business_type'] = $request->business_type;
        $business['phone_number'] = $request->phone_number;
        $business['user_type'] = $request->user_type ?? '';
        $business['user_id'] = $request->user_id ?? '';
        $business['created_at'] = Carbon::now();

        $business_id = DB::table('business')->insertGetId($business);

        $data = DB::table('business')->select('id', 'title', 'description', 'address', 'business_type', 'phone_number')->where('id', $business_id)->first();
        if ($data) {
            return response()->json([
                'status' => '1',
                'message' => 'success',
                'data' => $data,

            ]);
        } else {
            return response()->json([
                'status' => '0',
                'message' => 'No data found',
                'data' => $x
            ]);
        }

    }
    
    public function show_business(Request $request)
    {
        // dd('hh');
        $x = new stdClass();
        $validator = Validator::make($request->all(), [
            // 'title' => 'required',         
            // 'description' => 'required',
            // 'address' => 'required',
            // 'business_type' => 'required',



        ]);

        if ($validator->fails()) {

            return response()->json([
                'status' => '0',
                'message' => $validator->errors()->first(),
                'data' => $x
            ]);
        }




        $data = DB::table('business')->select('id', 'title', 'description','city', 'address', 'business_type', DB::raw("if(phone_number!='',phone_number,'') as phone_number"), 'created_at as date')->where('status', 1)->orderby('id', 'desc')->get();
        if ($data) {
            return response()->json([
                'status' => '1',
                'message' => 'success',
                'data' => $data,

            ]);
        } else {
            return response()->json([
                'status' => '0',
                'message' => 'No data found',
                'data' => []
            ]);
        }

    }
    
}
