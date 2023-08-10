<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use DB;
use Auth;
use stdClass;
use App\Models\Volunteer;
use App\Models\Cardholder;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Config;
use Carbon\Carbon;

class ApiCardController extends Controller
{
    public function login(Request $request)
    {
        $x = new stdClass();
        $validator = Validator::make($request->all(), [
            'card_id' => 'required',
            'password' => 'required',

        ]);

        if ($validator->fails()) {

            return response()->json([
                'status' => '0',
                'message' => $validator->errors()->first(),
                'data' => $x
            ]);
        }

        $username = $request->input('card_id');
        // Config::set('jwt.user', 'App\Models\Volunteer'); 
        // Config::set('auth.providers.users.model', \App\Models\Volunteer::class);
        $credentials = $request->only('card_id', 'password');
        $data = DB::table('cardholder')->select('id', 'name', 'age', 'address', DB::raw("if(cardholder_profile!='',cardholder_profile,'') as cardholder_profile"), 'job', 'annual_income', 'contact_number', 'adhaar_number', 'active_status', 'verify_status')->where('card_id', $username)->first();
        DB::table('cardholder')->where('id', $data->id)->update(['fcm_token' => $request->fcm_token, 'device_type' => $request->device_type]);
        $token = null;
        // dd(auth('cardapi')->attempt($credentials));
        try {
            if (!$token = auth('cardapi')->attempt($credentials)) {

                return response()->json([
                    'status' => '0',
                    'message' => "Invalid Card id and mobile number",
                    'data' => $x
                ]);
            }
        } catch (JWTAuthException $e) {
            return response()->json([
                'status' => '0',
                'message' => 'failed to create token',
                'data' => $x
            ]);
        }
        if ($data->active_status == 1) {
            if ($data->verify_status == 1) {
                return response()->json([

                    'status' => '1',
                    'message' => 'Logged in successfully',
                    'token' => $token,
                    'data' => $data,

                ]);
            } else {
                return response()->json([
                    'status' => '0',
                    'message' => "Your account is not verified",
                    'data' => $x
                ]);
            }
        } else {
            return response()->json([
                'status' => '0',
                'message' => "Your account is not active",
                'data' => $x
            ]);
        }

    }
    public function viewnotification(Request $request)
    {
        $x = new stdClass();
        $validator = Validator::make($request->all(), [
            // 'type' => 'required',

        ]);

        if ($validator->fails()) {

            return response()->json([
                'status' => '0',
                'message' => $validator->errors()->first(),
                'data' => $x
            ]);
        }
        $cardholder = auth('cardapi')->authenticate($request->bearerToken());
        //    dd($cardholder);
        if (!$cardholder) {
            return response()->json([
                'status' => '2',
                'message' => "Token is mismatch",
                'data' => $x
            ]);
        }


        $data = DB::table('notifications')->select('id', 'category', 'title', 'description', 'location', DB::raw("if(image!='',image,'') as image"), 'created_at as date')->where('category', 'Card_Holder')->orderby('id', 'desc')->get();


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
                'data' => [],
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
                'status' => '0',
                'message' => $validator->errors()->first(),
                'data' => $x
            ]);
        }
        $cardholder = auth('cardapi')->authenticate($request->bearerToken());

        if (!$cardholder) {
            return response()->json([
                'status' => '2',
                'message' => "Token is mismatch",
                'data' => $x
            ]);
        }

        $feedback['title'] = $request->title;
        $feedback['description'] = $request->description;
        if ($cardholder) {
            $feedback['type'] = "Cardholder";
        }
        $feedback['add_id'] = $cardholder->card_id;
        $feedback['add_name'] = $cardholder->name;
        $feedback['created_at'] =  Carbon::now();

        $feedback_id = DB::table('feedbacks')->insertGetId($feedback);

        $data = DB::table('feedbacks')->select('id', 'title', 'description', 'type')->where('id', $feedback_id)->first();
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
    public function logout()
    {
        $x = new stdClass();
        Auth::guard('cardapi')->logout();
        return response()->json([
            'status' => '1',
            'message' => 'Logged out successfully',
            'data' => $x

        ]);


    }
    public function hospital_list(Request $request)
    {
        $x = new stdClass();
        $validator = Validator::make($request->all(), [
            // 'type' => 'required',

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


        $data = DB::table('sewapartners')->where('active_status', 1)->select('id', 'name', 'email', DB::raw("if(profile!='',profile,'') as profile"), 'contactnumber', 'sewa_address', 'categories', 'badge_status')->orderby('id', 'desc')->get();
        foreach ($data as $value) {
            $time = DB::table('sewapartners')->where('id', $value->id)->value('timings') ?? '';
            $time1 = DB::table('sewapartners')->where('id', $value->id)->value('timings2') ?? '';
            if ($value->categories == "Hospital") {
                $value->timing = $time;
            } else {
                $value->timing = $time . ' to ' . $time1;
            }

        }


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
                'data' => [],
            ]);
        }


    }
    public function doctor_list(Request $request)
    {
        $x = new stdClass();
        $validator = Validator::make($request->all(), [
            // 'type' => 'required',

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


        $data = DB::table('sewapartner_doctors')->select('id', 'sewapartner_id', 'doctor_id')->groupBy('doctor_id')->orderby('id', 'desc')->get();
        foreach ($data as $value) {
            $time = DB::table('sewapartner_doctors')->where('id', $value->id)->value('timing');
            $time1 = DB::table('sewapartner_doctors')->where('id', $value->id)->value('timing1');
            // $value->timing = $time.' to '.$time1;
            $value->hospital = DB::table('sewapartners')->where('id', $value->sewapartner_id)->value('name');
            $value->address = DB::table('sewapartners')->where('id', $value->sewapartner_id)->value('sewa_address');
            $value->contact_number = DB::table('sewapartners')->where('id', $value->sewapartner_id)->value('contactnumber');
            $value->timings = DB::table('sewapartners')->where('id', $value->sewapartner_id)->value('timings');
            $value->doctor_name = DB::table('doctors')->where('id', $value->doctor_id)->value('name');
            $value->specialization = DB::table('doctors')->where('id', $value->doctor_id)->value('specialization');


        }


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
                'data' => [],
            ]);
        }


    }
    public function hospital_details(Request $request)
    {
        $x = new stdClass();
        $validator = Validator::make($request->all(), [
            'sewapartner_id' => 'required',

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


        $data = DB::table('sewapartners')->where('active_status', 1)->select('id', 'name', 'email', DB::raw("if(profile!='',profile,'') as profile"), 'contactnumber', 'sewa_address', 'categories')->where('id', $request->sewapartner_id)->first();

        $time = DB::table('sewapartners')->where('active_status', 1)->where('id', $data->id)->value('timings');
        $time1 = DB::table('sewapartners')->where('active_status', 1)->where('id', $data->id)->value('timings2');
        if ($data->categories == "Hospital") {
            $data->timing = $time;
        } else {
            $data->timing = $time . ' to ' . $time1;
        }
        $data->services = DB::table('sewapartner_services')->select('id', 'service_name')->where('sewapartner_id', $data->id)->get();
        $data->doctors = DB::table('sewapartner_doctors')
            ->join('doctors', 'doctors.id', '=', 'sewapartner_doctors.doctor_id')
            ->where([['sewapartner_doctors.sewapartner_id', $data->id], ['doctors.status', 1]])
            ->select('sewapartner_doctors.id', 'sewapartner_doctors.doctor_id')
            ->groupBy('sewapartner_doctors.doctor_id')
            ->get();
        foreach ($data->doctors as $value) {
            $time = DB::table('sewapartner_doctors')->select('day', 'timing', 'timing1')->where([['doctor_id', $value->doctor_id], ['sewapartner_id', $request->sewapartner_id]])->get();


            foreach ($time as $tim) {
                $value->timing[] = $tim->day . ' :- ' . $tim->timing . ' to ' . $tim->timing1;
            }


            // $time = DB::table('sewapartner_doctors')->where('doctor_id',$value->doctor_id)->value('timing');
            // $time1 = DB::table('sewapartner_doctors')->where('doctor_id',$value->doctor_id)->value('timing1');
            // $value->timing = $time.' to '.$time1;


            $value->doctor_name = DB::table('doctors')->where([['id', $value->doctor_id], ['status', 1]])->value('name');
            $value->specialization = DB::table('doctors')->where([['id', $value->doctor_id], ['status', 1]])->value('specialization');
            $value->qualification = DB::table('doctors')->where([['id', $value->doctor_id], ['status', 1]])->value('qualification');


        }


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
                'data' => [],
            ]);
        }


    }
    public function doctor_details(Request $request)
    {
        $x = new stdClass();
        $validator = Validator::make($request->all(), [
            // 'type' => 'required',

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


        $data = DB::table('sewapartner_doctors')->select('id', 'sewapartner_id', 'doctor_id', 'day')->where('doctor_id', $request->doctor_id)->get();
        foreach ($data as $value) {
            $time = DB::table('sewapartner_doctors')->where('id', $value->id)->value('timing');
            $time1 = DB::table('sewapartner_doctors')->where('id', $value->id)->value('timing1');
            $value->timing = $time . ' to ' . $time1;
            $value->hospital = DB::table('sewapartners')->where('id', $value->sewapartner_id)->value('name');
            $value->address = DB::table('sewapartners')->where('id', $value->sewapartner_id)->value('sewa_address');
            $value->categories = DB::table('sewapartners')->where('id', $value->sewapartner_id)->value('categories');
            $value->contact_number = DB::table('sewapartners')->where('id', $value->sewapartner_id)->value('contactnumber');
            $value->profile = DB::table('sewapartners')->where('id', $value->sewapartner_id)->value('profile');
            $value->doctor_name = DB::table('doctors')->where('id', $value->doctor_id)->value('name');
            $value->doctor_qualification = DB::table('doctors')->where('id', $value->doctor_id)->value('qualification');
            // $value->specialization = DB::table('doctors')->where('id',$value->doctor_id)->value('specialization');


        }


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
                'data' => [],
            ]);
        }


    }

    // public function khalsa_pariwar_link(Request $request)
    // {
    //     $x = new stdClass();
       
    //    $data =  DB::table('khalsa_pariwar_link')->select('link')->first();
   

    //    if($data)
    //     {
    //         return response()->json([
    //             'status'=>'1',
    //             'message'=>'success',
    //             'data'=>$data,
    //             // 'token' =>  $token
    //         ]); 
    //     }
    //     else{
    //         return response()->json([
    //             'status'=>'0',
    //             'message'=>'No data found',
    //             'data'=> [],
    //         ]);     
    //     }
       
    
    // }
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




        $data = DB::table('business')->select('id', 'title', 'description','city', 'address', 'business_type', DB::raw("if(phone_number!='',phone_number,'') as phone_number"), 'created_at as date')->where('status', 0)->orderby('id', 'desc')->get();
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
    public function youtube_link(Request $request)
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




        $data = DB::table('youtube_channel')->select('youtube_link', 'image')->first();
        $data->support_number = DB::table('supports')->select('phone_number')->value('phone_number') ?? '';
        $data->pariwar_link =  DB::table('khalsa_pariwar_link')->select('link')->value('link') ?? '';;
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
    public function request_blood_donor(Request $request)
    {

        $x = new stdClass();
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'address' => 'required',



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

        $blood['name'] = $request->name;
        $blood['address'] = $request->address;

        $blood['hospital_name'] = $request->hospital_name;
        $blood['blood_group'] = $request->blood_group;
        $blood['contact_number'] = $request->contact_number;
        $blood['contact_number'] = $request->contact_number;
        $blood['requirement_details'] = $request->requirement_details;
        $blood['created_at'] = Carbon::now();

        $blood_id = DB::table('request_blood')->insertGetId($blood);

        $data = DB::table('request_blood')->select('id', 'name', 'address', 'hospital_name', 'blood_group', 'contact_number', 'requirement_details')->where('id', $blood_id)->first();
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
    public function filters(Request $request)
    {
        // dd('hh');
        $x = new stdClass();
        $validator = Validator::make($request->all(), [
            // 'sewapartner_type' => 'required',         




        ]);

        if ($validator->fails()) {

            return response()->json([
                'status' => '0',
                'message' => $validator->errors()->first(),
                'data' => $x
            ]);
        }


        if ($request->sewapartner_type) {
            $valu = explode(',', $request->sewapartner_type);
            if ($request->name) {
                $seached_product = $request->name;
                $sewapartner = DB::table('sewapartners')->select('id', 'name', 'email', 'profile', 'contactnumber', 'sewa_address', 'categories', 'badge_status')
                    ->whereIn('categories', $valu)->where(
                        function ($sewapartner) use ($seached_product) {
                            return $sewapartner
                                ->where([['name', 'LIKE', '%' . $seached_product . '%'],['active_status', 1]])
                                ->orWhere([['sewa_address', 'LIKE', '%' . $seached_product . '%'],['active_status', 1]]);

                        }
                    )

                    ->orderby('id', 'desc')->get();
                foreach ($sewapartner as $value) {
                    $time = DB::table('sewapartners')->where('id', $value->id)->value('timings') ?? '';
                    $time1 = DB::table('sewapartners')->where('id', $value->id)->value('timings2') ?? '';
                    if ($value->categories == "Hospital") {
                        $value->timing = $time;
                    } else {
                        $value->timing = $time . ' to ' . $time1;
                    }

                }

            } else {
                $valu = explode(',', $request->sewapartner_type);
                $sewapartner = DB::table('sewapartners')->select('id', 'name', 'email', 'profile', 'contactnumber', 'sewa_address', 'categories', 'badge_status')
                    ->whereIn('categories', $valu)->orderby('id', 'desc')->get();
                foreach ($sewapartner as $value) {
                    $time = DB::table('sewapartners')->where('id', $value->id)->value('timings') ?? '';
                    $time1 = DB::table('sewapartners')->where('id', $value->id)->value('timings2') ?? '';
                    if ($value->categories == "Hospital") {
                        $value->timing = $time;
                    } else {
                        $value->timing = $time . ' to ' . $time1;
                    }

                }
            }
        } elseif ($request->name) {
            $sewapartner = DB::table('sewapartners')->select('id', 'name', 'email', 'profile', 'contactnumber', 'sewa_address', 'categories', 'badge_status')
                ->where([['name', 'LIKE', '%' . $request->name . '%'],['active_status', 1]])
                ->orWhere([['sewa_address', 'LIKE', '%' . $request->name . '%'],['active_status', 1]])
                ->orderby('id', 'desc')->get();
            foreach ($sewapartner as $value) {
                $time = DB::table('sewapartners')->where('id', $value->id)->value('timings') ?? '';
                $time1 = DB::table('sewapartners')->where('id', $value->id)->value('timings2') ?? '';
                if ($value->categories == "Hospital") {
                    $value->timing = $time;
                } else {
                    $value->timing = $time . ' to ' . $time1;
                }

            }
        } else {
            $sewapartner = DB::table('sewapartners')->select('id', 'name', 'email', 'profile', 'contactnumber', 'sewa_address', 'categories', 'badge_status')
            ->where('active_status', 1)->orderby('id', 'desc')->get();
            foreach ($sewapartner as $value) {
                $time = DB::table('sewapartners')->where('id', $value->id)->value('timings') ?? '';
                $time1 = DB::table('sewapartners')->where('id', $value->id)->value('timings2') ?? '';
                if ($value->categories == "Hospital") {
                    $value->timing = $time;
                } else {
                    $value->timing = $time . ' to ' . $time1;
                }

            }
        }


        if ($sewapartner) {
            return response()->json([
                'status' => '1',
                'message' => 'success',
                'data' => $sewapartner,

            ]);
        } else {
            return response()->json([
                'status' => '0',
                'message' => 'No data found',
                'data' => []
            ]);
        }

    }


    public function get_profile(Request $request)
    {
        // dd('hh');
        $x = new stdClass();
        $validator = Validator::make($request->all(), [
            'cardholder_id' => 'required',         
        ]);

        if ($validator->fails()) {

            return response()->json([
                'status' => '0',
                'message' => $validator->errors()->first(),
                'data' => $x
            ]);
        }

        $cardholder = DB::table('cardholder')->select('id','card_id','name','name_punjabi','age','address','address_punjabi','cardholder_profile','job','annual_income','contact_number','qualification','adhaar_number','own_house','rent','rent_price','long_disease','disease_name','disease_details','support_organisation','joined_organisation','verify_officer','family_head','blood_group','blood_donor','is_needy','whatsapp_number','email','village')->where('id',$request->cardholder_id)->first();

        if($cardholder) {
            if($cardholder->blood_group) {
                $cardholder->blood_group_punjabi = DB::table('blood_group')->where('english',$cardholder->blood_group)->value('punjabi');
            } else {
                $cardholder->blood_group_punjabi = '';
            }
            $cardholder->family = DB::table('cardholder_family')->select('id','cardholder_id','fname','famritdhari','fage','fqualification','fjob','fsalary','fblood_group','faadhaar','frelation')->where('cardholder_id',$cardholder->id)->get();

            $cardholder->children = DB::table('cardholder_children')->select('id','cardholder_id','cname','camritdhari','cage','cqualification','cfees','cschool','caadhaar','crelation')->where('cardholder_id',$cardholder->id)->get();

            if($cardholder->is_needy != 'No') {
                $cardholder->needyData = DB::table('cardholders')
                ->select('id','cardholder_id','name','disease_time','own_house','rent_price','annual_income','medical_detail','foundation_detail','foundation_help','foundation_member','govthelp','help_amount','agriculture','cattle','social_media','gurudwara','gurudwara_mgmt','gurudwara_contact','attesting_officer','family_head','volunteer_name','volunteer_photo','two_wheeler','four_wheeler','air_conditioner','income_source','date','blood_donor','volunteer_signature','company_name','policy_number','policy_issue_date','policy_expiry_date','add_name','add_type')
                ->orderBy('id','DESC')
                ->where('cardholder_id',$cardholder->id)
                ->first();
                
                if($cardholder->needyData) {
                    $cardholder->needyData->house_photos = DB::table('carholders_images')->select('id','image')->where([['cardholders_id',$cardholder->needyData->id],['image','!=','']])->get();
                    $cardholder->needyData->aadhaar_photos = DB::table('carholders_images')->select('id','aadhaar_images')->where([['cardholders_id',$cardholder->needyData->id],['aadhaar_images','!=','']])->get();
                }
            } 
        }
        
        
    


        if ($cardholder) {
            return response()->json([
                'status' => '1',
                'message' => 'success',
                'data' => $cardholder,

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