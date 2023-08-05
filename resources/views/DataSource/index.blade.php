<x-app-layout>
    <style>
        .text-xl {
            font-size:1.5rem;
            color:#234765;
        }
        hr {
            height:3px !important; 
            color:#234765;
        }
        .main-container {
            color:#234765;
        }
        .min-h-screen {
            background-color:#F5F5F5 !important;
        }
        .card {
            min-height:322px;
            max-height:322px;
            overflow-x: hidden;
        }
        .field_option_icon {
            /* width: 1.3rem; */
            height: 1.9rem;
            cursor: pointer;
        }
    </style>
    <x-slot name="header">
        <h1 class="font-semibold fw-bolder text-xl text-gray-800 leading-tight" >
            {{ __('Merge Field Coding Tool') }}
        </h1>
        <hr class="mt-3">
    </x-slot>
    <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8 main-container">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-12">
                <label for="">Select Data Source</label>
                <div class="card ">
                    <div class="card-body p-0 px-2">
                        @foreach($dataSources as $data)
                            <div class="row data_sources" id="data_sources{{$data->id}}">
                                <div class="col" style="cursor:pointer;">
                                    <p class="data_sources_name"  id="{{$data->id}}">{{$data->name}}</p>
                                </div>
                                <div class="col">
                                <a href="#" id="{{$data->id}}">
                                    <i class="fa fa-pencil float-end mt-1"></i>
                                </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                @if(Auth::user()->role=='Admin')
                    <a href="#" class="btn btn-sm float-start my-3 create_btn" data-bs-toggle="modal" data-bs-target="#createDataSourceModal"><i class="fa fa fa-plus"></i> CREATE DATA SOURCE</a>
                @endif    
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12">
                <label for="">Select A Field</label>
                <div class="card ">
                    <div class="card-body p-0 px-2 data_field">

                    </div>
                </div>
                @if(Auth::user()->role=='Admin')
                    <a href="#" class="btn btn-sm float-start my-3 create_btn" data-bs-toggle="modal" data-bs-target="#createDataSourceTypeModal"><i class="fa fa fa-plus"></i> CREATE DATA SOURCE FIELD</a>
                @endif    
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12" style="margin-top:-14px;">
                <div class="row ">
                    <!-- <div class="col-4 p-0">
                        <label for="">Select An Option</label>
                    </div> -->
                    <div class="col mb-1">
                        
                        <img src="{{asset('public/images/Icons/other.svg')}}" class="field_option_icon d-inline float-end border ms-1"  alt="Other" data-id="Other" title="Other">
                    
                    
                        <img src="{{asset('public/images/Icons/sort.svg')}}" class="field_option_icon d-inline float-end border ms-1"  alt="Sort" title="Sort" data-id="Sort">
                    
                    
                        <img src="{{asset('public/images/Icons/money.svg')}}" class="field_option_icon d-inline float-end border ms-1"  alt="Sale & Purchase" title="Sale & Purchase" data-id="Sale & Purchase">
                    
                    
                        <img src="{{asset('public/images/Icons/image.svg')}}" class="field_option_icon d-inline float-end border ms-1"  alt="Images" title="Images" data-id="Images">
                    
                    
                        <img src="{{asset('public/images/Icons/person.svg')}}" class="field_option_icon d-inline float-end border ms-1"  alt="Grammar" title="Grammar" data-id="Grammar">
                    
                    
                        <img src="{{asset('public/images/Icons/logic.svg')}}" class="field_option_icon d-inline float-end border ms-1"  alt="Logic" title="Logic" data-id="Logic">
                    
                    
                        <img src="{{asset('public/images/Icons/repeat.svg')}}" class="field_option_icon d-inline float-end border ms-1"  alt="Repeat" title="Repeat" data-id="Repeat">
                    
                    
                        <img src="{{asset('public/images/Icons/edit.svg')}}" class="field_option_icon d-inline float-end border ms-1"  alt="Calendar" title="Calendar" data-id="Calendar">
                    
                    
                        <img src="{{asset('public/images/Icons/phones.svg')}}" class="field_option_icon d-inline float-end border ms-1"  alt="Phones" title="Phones" data-id="Phones">
                    
                    
                        <img src="{{asset('public/images/Icons/numbers.svg')}}" class="field_option_icon d-inline float-end border ms-1"  alt="Numbers" title="Numbers" data-id="Numbers">
                    
                    
                        <img src="{{asset('public/images/Icons/text.svg')}}" class="field_option_icon d-inline float-end border ms-1"  alt="Text" title="Text" data-id="Text">
                        
                    </div>
                </div>

                <div class="card ">
                    <div class="card-body p-0 px-2 data_options">
                        
                    </div>
                </div> 
                @if(Auth::user()->role=='Admin')
                    <a href="#" class="btn btn-sm float-start my-3 create_btn" data-bs-toggle="modal" data-bs-target="#createDataSourceOptionModal"><i class="fa fa fa-plus"></i> CREATE DATA SOURCE OPTION</a>
                @endif    
            </div>
        </div>

        {!! Form::open(['id'=>'saveResult']) !!}
            <div class="row mt-4">
                <label for="result" class=" fw-bolder"> <b>Result</b></label>
                <div class="col-10">
                    <input type="text" name="result" id="result" class="form-control">
                </div>
                <div class="col-2">
                    <button type="submit" class="btn btn-secondary">Add to List</button>
                </div>
            </div>
        {!! Form::close() !!}
    </div>
    @include('DataSource.createModal')
</x-app-layout>
