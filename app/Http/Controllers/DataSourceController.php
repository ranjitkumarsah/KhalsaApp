<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Models\DataSource;
use App\Models\DataSourceType;
use App\Models\DataSourceOption;
use Carbon\Carbon;

use Exception, Validator;

class DataSourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataSources = DataSource::select('id','name')->get();

        return view('DataSource.index',compact('dataSources'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255','unique:data_sources',],
            'data_source_type' => ['required','max:255','string','unique:data_source_types'],
            'option_name' => ['required','max:255','string','unique:data_source_options'],
            'option_value' => ['required','max:255','string','unique:data_source_options'],
        ]); 

        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()->first()],422);
        } 

        $data_source['name'] = $request->name;

        $dataSource = DataSource::create($data_source);

        if($dataSource->id) {
            $data_type['data_source_id'] = $dataSource->id;
            $data_type['data_source_type'] = $request->data_source_type;

            $dataType = DataSourceType::create($data_type);

            if($dataType->id) {
                $data_field['data_source_type_id'] = $dataType->id;
                $data_field['option_name'] = $request->option_name;
                $data_field['option_value'] = $request->option_value;

                $dataField = DataSourceOption::create($data_field);

            }
        }
        return response()->json([
            'success' => true,
            'message' => 'Data Source Added Successfully!',
        ], 200);

    }


    public function createDataSource(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255','unique:data_sources',],
        ]); 

        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()->first()],422);
        } 

        $data['name'] = $request->name;
        $create = DataSource::create($data);

        if($create) {
            return response()->json([
                'success' => true,
                'message' => 'Data Source Created Successfully!',
            ], 200);
        }
    }
    public function createDataSourceType(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'data_source_id' => ['required'],
            'data_source_type' => ['required', 'string', 'max:255','unique:data_source_types'],
        ]); 

        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()->first()],422);
        } 

        $data['data_source_id'] = $request->data_source_id;
        $data['data_source_type'] = $request->data_source_type;

        $create = DataSourceType::create($data);

        if($create) {
            return response()->json([
                'success' => true,
                'message' => 'Data Source Type Created Successfully!',
            ], 200);
        }
    }

    public function createDataSourceOption(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'data_source_type_id' => ['required'],
            'option_type' => ['required', 'string', 'max:255'],
            'option_name' => ['required', 'string', 'max:255'],
            'option_value' => ['required', 'string', 'max:255'],
        ]); 

        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()->first()],422);
        } 

        $data['data_source_type_id'] = $request->data_source_type_id;
        $data['option_type'] = $request->option_type;
        $data['option_name'] = $request->option_name;
        $data['option_value'] = $request->option_value;

        $create = DataSourceOption::create($data);

        if($create) {
            return response()->json([
                'success' => true,
                'message' => 'Data Source Option Created Successfully!',
            ], 200);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function getDataSourceType(Request $request, $id)
    {
        $dataSourceType = DataSourceType::where('data_source_id',$id)->get();

        if($request->ajax()){
            return response()->json([
                'success'=>true,
                'status'=>200,
                'data'=>$dataSourceType,
            ]);
        }
    }

    public function getDataSourceOption(Request $request, $id)
    {
        $dataSourceOption = DataSourceOption::where('data_source_type_id',$id)->get();

        if($request->ajax()){
            return response()->json([
                'success'=>true,
                'status'=>200,
                'data'=>$dataSourceOption,
            ]);
        }
    }

    public function getDataSourceOptionByType(Request $request ,$id)
    {
        $dataSourceOption = DataSourceOption::where('option_type',$id)->get();

        if($request->ajax()){
            return response()->json([
                'success'=>true,
                'status'=>200,
                'data'=>$dataSourceOption,
            ]);
        }
    }
}
