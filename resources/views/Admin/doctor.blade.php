@extends('Admin.layouts.App')
@section('doctors','menu-open')
@section('viewdoctor','active')

  <!-- Content Wrapper. Contains page content -->
  @section('main_section')
  <style>
      a.btn.btn-primary.back_btn {
          background-color: #ED9B2D;
          color: black;
          float: right;
      }
      button#submitForm{
            width:22%;
            background-color: #ED9B2D;
            color:black;
        }
   
     @media only screen and (min-width: 1200px) {
      button#submitForm{
            width:22%;
            background-color: #ED9B2D
        }
     }
      @media only screen and (min-width: 768px) and (max-width: 991px) {
        .checkbox_class {
              margin-left: 222px;
          }
          .card-body {
            width: 100% !important;
            margin-left: 230px;
        }
      
    }
    
    input.form-control {
        margin-top: 10px;
    }
    select.form-control {
        margin-top: 10px;
    }
    input[type="checkbox"] {
        margin-top: 24px;
        margin-left: 30px;
    }
    h6 {
    font-weight: 600;
    }
@media (max-width:992px) {
     form#form {
     margin-left: 243px;
     }
    }
    @media(min-width:280px) and (max-width:767px) {
      .col-lg-5.col-md-5.col-sm-5.days_class {
          margin-left: 20px;
        } 
    .col-lg-3.col-md-3.col-sm-3.from_class{
          margin-left: 20px;
    }
    .col-lg-3.col-md-3.col-sm-3.to_class{
          margin-left: 20px;
    }
       

        }
     form#form{
           margin-left: 0px !important;
         }
         .card-body {
    width: 100% !important;
    }
     }
 </style>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Doctor</h1>
          </div>
          <div class="col-sm-6">
            <a href="{{url('Admin/view_doctor')}}" class="btn btn-primary back_btn">Back</a>
          </div>
    
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              {{-- <li class="breadcrumb-item"><a href="#">Home</a></li> --}}
              {{-- <li class="breadcrumb-item active">Validation</li> --}}
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary" style="font-size: 0.9rem;">
            
              <!-- /.card-header -->
              <!-- form start -->
              <form action="/Admin/savedoctor" method="POST" enctype="multipart/form-data" id="form">
                @csrf
                <div class="card-body">
                <div class="row">
                      <div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="form-group name_class">
                          <label for="name">Name <span class="text-danger">*</span></label>
                          <input type="text" name="name" placeholder="Enter enter name" class="form-control @error('name') is-invalid @enderror" id="name" onkeypress="return inputOnlyText(event)">
                          @error('name')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                          </span>
                          @enderror
                        </div>
                      </div>
                      <div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="form-group qualification_class">
                          <label for="name">Qualification</label>
                          <input type="text" name="qualification" placeholder="Enter qulaification" class="form-control @error('qualification') is-invalid @enderror" id="qualification" >
                          @error('qualification')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('qualification') }}</strong>
                          </span>
                          @enderror
                        </div>
                      </div>
                      <div class="col-lg-4 col-md-4 col-sm-12">
                      <div class="form-group">
                          <label for="name">Specialization</label>
                          <input type="text" name="specialization" placeholder="Enter specialization" class="form-control @error('specialization') is-invalid @enderror" id="specialization" >
                          @error('specialization')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('specialization') }}</strong>
                          </span>
                          @enderror
                        </div>
                      </div>
                </div>
                <div class="row">
                      {{-- <div class="col=lg-6 col-md-6 col-sm-12">
                        <div class="form-group">
                          <label for="name">OPD Timing</label>
                          <input type="text" name="opd_timing" class="form-control @error('opd_timing') is-invalid @enderror" id="opd_timing" >
                          @error('opd_timing')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('opd_timing') }}</strong>
                          </span>
                          @enderror
                        </div>
                      </div> --}}
                     
                      {{-- <div class="col=lg-6 col-md-6 col-sm-12">
                      <div class="form-group">
                        <label for="name">OPD Timing</label>
                        <input type="time" name="opd_timing" class="form-control @error('opd_timing') is-invalid @enderror" id="opd_timing" >
                        @error('opd_timing')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('opd_timing') }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div> --}}
                  </div>

                    {{-- <div class="row">
                      <div class="col=lg-6 col-md-6 col-sm-12">
                        <div class="form-group" >
                          <label for="">Select Days</label>
                          <select class="js-example-basic-multiple" name="days[]" multiple="multiple" style="width: 100%" >                      
                           <option value="Monday">Monday</option>
                           <option value="Tuesday">Tuesday</option>
                           <option value="Wednesday">Wednesday</option>
                           <option value="Thursday">Thursday</option>
                           <option value="Friday">Friday</option>
                           <option value="Saturday">Saturday</option>
                           <option value="Sunday">Sunday</option>
                         </select>
                        </div> 
                      </div>
                      <div class="col=lg-6 col-md-6 col-sm-12">
                       

                        <div class="form-group" >
                          <label for=""></label>
                        <input type="time" name="opd_timing2" class="form-control @error('opd_timing2') is-invalid @enderror" id="opd_timing2" >
                        </div>
                      </div>
                    </div> --}}
                      {{-- <input type="time" name="opd_timing2" class="form-control @error('opd_timing2') is-invalid @enderror" id="opd_timing2" > --}}
                    </div>
                      {{-- <div class="form-group" >
                        <label for="">Select Days</label>
                        <select class="js-example-basic-multiple" name="days[]" multiple="multiple" style="width: 100%" >                      
                         <option value="Monday">Monday</option>
                         <option value="Tuesday">Tuesday</option>
                         <option value="Wednesday">Wednesday</option>
                         <option value="Thursday">Thursday</option>
                         <option value="Friday">Friday</option>
                         <option value="Saturday">Saturday</option>
                         <option value="Sunday">Sunday</option>
                       </select>
                      </div>  --}}

		                    {{-- <div class="row text-center">
                       	<div class="col=lg-12 col-md-12 col-sm-12">
                          <h4 style="font-weight:500; color:black;">Manage Timings</h4>
                       	</div>
                      </div> --}}

		                {{-- <div class="row">
                        <div class="col=lg-1 col-md-1 col-sm-1">
                           
                        </div>
                        <div class="col-lg-5 col-md-5 col-sm-5 days_class">
                            <h6>Days</h6>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 from_class">
                            <h6>From</h6>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 to_class">
                            <h6>To</h6>
                        </div>
                     </div> --}}
                    {{-- <div class="checkbox_class">
		                <div class="row parent_class">
                        <div class="col-lg-1 col-md-1 col-sm-1">
                          <input type="checkbox" name="checked_days" class="checked_fields"  onchange="valueChanged()">
                        </div>  
                        <div class="col-lg-5 col-md-5 col-sm-5">
                          <input type="text" name="monday" value="Monday" id="monday" class="form-control day_type"    readonly>
                        </div>  
                        <div class="col-lg-3 col-md-3 col-sm-3">
                              <select class="form-control from_value" name="mondaytime"  style="display:none;">                      
                                <option value="12:00am">12:00am</option>
                                <option value="12:30am">12:30am</option>
                                <option value="1:00am">1:00am</option>
                                <option value="1:30am">1:30am</option>
                                <option value="2:00am">2:00am</option>
                                <option value="2:30am">2:30am</option>
                                <option value="3:00am">3:00am</option>
                                <option value="3:30am">3:30am</option>
                                <option value="4:00am">4:00am</option>
                                <option value="4:30am">4:30am</option>
                                <option value="5:00am">5:00am</option>
                                <option value="5:30am">5:30am</option>
                                <option value="6:00am">6:00am</option>
                                <option value="6:30am">6:30am</option>
                                <option value="7:00am">7:00am</option>
                                <option value="7:30am">7:30am</option>
                                <option value="8:00am">8:00am</option>
                                <option value="8:30am">8:30am</option>
                                <option value="9:00am">9:00am</option>
                                <option value="9:30am">9:30am</option>
                                <option value="10:00am">10:00am</option>
                                <option value="10:30am">10:30am</option>
                                <option value="11:00am">11:00am</option>
                                <option value="11:30am">11:30am</option>
                              </select>
                        </div>
                        <div class="col=lg-3 col-md-3 col-sm-3">
                        <select class="form-control to_value" name="mondaytime1"  style="display:none;">                      
                                <option value="12:00pm">12:00pm</option>
                                <option value="12:30pm">12:30pm</option>
                                <option value="1:00pm">1:00pm</option>
                                <option value="1:30am">1:30pm</option>
                                <option value="2:00pm">2:00pm</option>
                                <option value="2:30pm">2:30pm</option>
                                <option value="3:00pm">3:00pm</option>
                                <option value="3:30pm">3:30pm</option>
                                <option value="4:00pm">4:00pm</option>
                                <option value="4:30pm">4:30pm</option>
                                <option value="5:00pm">5:00pm</option>
                                <option value="5:30pm">5:30pm</option>
                                <option value="6:00pm">6:00pm</option>
                                <option value="6:30pm">6:30pm</option>
                                <option value="7:00pm">7:00pm</option>
                                <option value="7:30pm">7:30pm</option>
                                <option value="8:00pm">8:00pm</option>
                                <option value="8:30pm">8:30pm</option>
                                <option value="9:00pm">9:00pm</option>
                                <option value="9:30pm">9:30pm</option>
                                <option value="10:00pm">10:00pm</option>
                                <option value="10:30pm">10:30pm</option>
                                <option value="11:00pm">11:00pm</option>
                                <option value="11:30pm">11:30pm</option>
                              </select>
                        </div>
                     </div>  

		                  <div class="row">
                        <div class="col=lg-1 col-md-1 col-sm-1"><input type="checkbox" name="checked_days" class="checked_fields1" onchange="valueChanged1()"></div>  
                        <div class="col-lg-5 col-md-5 col-sm-5"><input type="text" name="tuesday" id="tuesday"  class="form-control"  value="Tuesday"  readonly></div>  
                        <div class="col=lg-3 col-md-3 col-sm-3">
                              <select class="form-control from_value1" name="tuesdaytime"  style="display:none;">                      
                                <option value="12:00am">12:00am</option>
                                <option value="12:30am">12:30am</option>
                                <option value="1:00am">1:00am</option>
                                <option value="1:30am">1:30am</option>
                                <option value="2:00am">2:00am</option>
                                <option value="2:30am">2:30am</option>
                                <option value="3:00am">3:00am</option>
                                <option value="3:30am">3:30am</option>
                                <option value="4:00am">4:00am</option>
                                <option value="4:30am">4:30am</option>
                                <option value="5:00am">5:00am</option>
                                <option value="5:30am">5:30am</option>
                                <option value="6:00am">6:00am</option>
                                <option value="6:30am">6:30am</option>
                                <option value="7:00am">7:00am</option>
                                <option value="7:30am">7:30am</option>
                                <option value="8:00am">8:00am</option>
                                <option value="8:30am">8:30am</option>
                                <option value="9:00am">9:00am</option>
                                <option value="9:30am">9:30am</option>
                                <option value="10:00am">10:00am</option>
                                <option value="10:30am">10:30am</option>
                                <option value="11:00am">11:00am</option>
                                <option value="11:30am">11:30am</option>
                              </select>
                        </div>
                        <div class="col=lg-3 col-md-3 col-sm-3">
                        <select class="form-control to_value1" name="tuesdaytime1" style="display:none;">                      
                                <option value="12:00pm">12:00pm</option>
                                <option value="12:30pm">12:30pm</option>
                                <option value="1:00pm">1:00pm</option>
                                <option value="1:30am">1:30pm</option>
                                <option value="2:00pm">2:00pm</option>
                                <option value="2:30pm">2:30pm</option>
                                <option value="3:00pm">3:00pm</option>
                                <option value="3:30pm">3:30pm</option>
                                <option value="4:00pm">4:00am</option>
                                <option value="4:30pm">4:30pm</option>
                                <option value="5:00pm">5:00pm</option>
                                <option value="5:30pm">5:30pm</option>
                                <option value="6:00pm">6:00pm</option>
                                <option value="6:30pm">6:30am</option>
                                <option value="7:00pm">7:00am</option>
                                <option value="7:30pm">7:30am</option>
                                <option value="8:00pm">8:00am</option>
                                <option value="8:30pm">8:30pm</option>
                                <option value="9:00pm">9:00pm</option>
                                <option value="9:30pm">9:30pm</option>
                                <option value="10:00pm">10:00pm</option>
                                <option value="10:30pm">10:30pm</option>
                                <option value="11:00pm">11:00pm</option>
                                <option value="11:30pm">11:30pm</option>
                              </select>
                        </div>
                     </div>  

                     <div class="row">
                        <div class="col=lg-1 col-md-1 col-sm-1"><input type="checkbox" class="checked_fields2" onchange="valueChanged2()"></div>  
                        <div class="col-lg-5 col-md-5 col-sm-5"><input type="text" name="wednesday" id="wednesday"  class="form-control"  value="Wednesday"  readonly></div>  
                        <div class="col=lg-3 col-md-3 col-sm-3">
                              <select class="form-control from_value2" name="wednesdaytime" style="display:none;">                      
                                <option value="12:00am">12:00am</option>
                                <option value="12:30am">12:30am</option>
                                <option value="1:00am">1:00am</option>
                                <option value="1:30am">1:30am</option>
                                <option value="2:00am">2:00am</option>
                                <option value="2:30am">2:30am</option>
                                <option value="3:00am">3:00am</option>
                                <option value="3:30am">3:30am</option>
                                <option value="4:00am">4:00am</option>
                                <option value="4:30am">4:30am</option>
                                <option value="5:00am">5:00am</option>
                                <option value="5:30am">5:30am</option>
                                <option value="6:00am">6:00am</option>
                                <option value="6:30am">6:30am</option>
                                <option value="7:00am">7:00am</option>
                                <option value="7:30am">7:30am</option>
                                <option value="8:00am">8:00am</option>
                                <option value="8:30am">8:30am</option>
                                <option value="9:00am">9:00am</option>
                                <option value="9:30am">9:30am</option>
                                <option value="10:00am">10:00am</option>
                                <option value="10:30am">10:30am</option>
                                <option value="11:00am">11:00am</option>
                                <option value="11:30am">11:30am</option>
                              </select>
                        </div>
                        <div class="col=lg-3 col-md-3 col-sm-3">
                        <select class="form-control to_value2" name="wednesdaytime1"  style="display:none;">                      
                                <option value="12:00pm">12:00pm</option>
                                <option value="12:30pm">12:30pm</option>
                                <option value="1:00pm">1:00pm</option>
                                <option value="1:30am">1:30pm</option>
                                <option value="2:00pm">2:00pm</option>
                                <option value="2:30pm">2:30pm</option>
                                <option value="3:00pm">3:00pm</option>
                                <option value="3:30pm">3:30pm</option>
                                <option value="4:00pm">4:00am</option>
                                <option value="4:30pm">4:30pm</option>
                                <option value="5:00pm">5:00pm</option>
                                <option value="5:30pm">5:30pm</option>
                                <option value="6:00pm">6:00pm</option>
                                <option value="6:30pm">6:30am</option>
                                <option value="7:00pm">7:00am</option>
                                <option value="7:30pm">7:30am</option>
                                <option value="8:00pm">8:00am</option>
                                <option value="8:30pm">8:30pm</option>
                                <option value="9:00pm">9:00pm</option>
                                <option value="9:30pm">9:30pm</option>
                                <option value="10:00pm">10:00pm</option>
                                <option value="10:30pm">10:30pm</option>
                                <option value="11:00pm">11:00pm</option>
                                <option value="11:30pm">11:30pm</option>
                              </select>
                        </div>
                     </div>  

                     <div class="row">
                        <div class="col=lg-1 col-md-1 col-sm-1"><input type="checkbox" class="checked_fields3" onchange="valueChanged3()"></div>  
                        <div class="col-lg-5 col-md-5 col-sm-5"><input type="text" name="thursday" id="thursday" value="Thursday" class="form-control"  readonly></div>  
                        <div class="col=lg-3 col-md-3 col-sm-3">
                              <select class="form-control from_value3" name="thursdaytime" style="display:none;">                      
                                <option value="12:00am">12:00am</option>
                                <option value="12:30am">12:30am</option>
                                <option value="1:00am">1:00am</option>
                                <option value="1:30am">1:30am</option>
                                <option value="2:00am">2:00am</option>
                                <option value="2:30am">2:30am</option>
                                <option value="3:00am">3:00am</option>
                                <option value="3:30am">3:30am</option>
                                <option value="4:00am">4:00am</option>
                                <option value="4:30am">4:30am</option>
                                <option value="5:00am">5:00am</option>
                                <option value="5:30am">5:30am</option>
                                <option value="6:00am">6:00am</option>
                                <option value="6:30am">6:30am</option>
                                <option value="7:00am">7:00am</option>
                                <option value="7:30am">7:30am</option>
                                <option value="8:00am">8:00am</option>
                                <option value="8:30am">8:30am</option>
                                <option value="9:00am">9:00am</option>
                                <option value="9:30am">9:30am</option>
                                <option value="10:00am">10:00am</option>
                                <option value="10:30am">10:30am</option>
                                <option value="11:00am">11:00am</option>
                                <option value="11:30am">11:30am</option>
                              </select>
                        </div>
                        <div class="col=lg-3 col-md-3 col-sm-3">
                        <select class="form-control to_value3" name="thursdaytime1" style="display:none;">                      
                                <option value="12:00pm">12:00pm</option>
                                <option value="12:30pm">12:30pm</option>
                                <option value="1:00pm">1:00pm</option>
                                <option value="1:30pm">1:30pm</option>
                                <option value="2:00pm">2:00pm</option>
                                <option value="2:30pm">2:30pm</option>
                                <option value="3:00pm">3:00pm</option>
                                <option value="3:30pm">3:30pm</option>
                                <option value="4:00pm">4:00pm</option>
                                <option value="4:30pm">12:30pm</option>
                                <option value="5:00pm">5:00pm</option>
                                <option value="5:30pm">5:30pm</option>
                                <option value="6:00pm">6:00pm</option>
                                <option value="6:30pm">6:30pm</option>
                                <option value="7:00pm">7:00pm</option>
                                <option value="7:30pm">7:30pm</option>
                                <option value="8:00pm">8:00pm</option>
                                <option value="8:30pm">8:30pm</option>
                                <option value="9:00pm">9:00pm</option>
                                <option value="9:30pm">9:30pm</option>
                                <option value="10:00pm">10:00pm</option>
                                <option value="10:30pm">10:30pm</option>
                                <option value="11:00pm">11:00pm</option>
                                <option value="11:30pm">11:30pm</option>
                              </select>
                        </div>
                     </div>  

                     <div class="row">
                        <div class="col=lg-1 col-md-1 col-sm-1"><input type="checkbox" class="checked_fields4" onchange="valueChanged4()"></div>  
                        <div class="col-lg-5 col-md-5 col-sm-5"><input type="text" name="friday" id="friday" class="form-control" value="Friday"  readonly></div>  
                        <div class="col=lg-3 col-md-3 col-sm-3">
                              <select class="form-control from_value4" name="fridaytime" style="display:none;">                      
                                <option value="12:00am">12:00am</option>
                                <option value="12:30am">12:30am</option>
                                <option value="1:00am">1:00am</option>
                                <option value="1:30am">1:30am</option>
                                <option value="2:00am">2:00am</option>
                                <option value="2:30am">2:30am</option>
                                <option value="3:00am">3:00am</option>
                                <option value="3:30am">3:30am</option>
                                <option value="4:00am">4:00am</option>
                                <option value="4:30am">4:30am</option>
                                <option value="5:00am">5:00am</option>
                                <option value="5:30am">5:30am</option>
                                <option value="6:00am">6:00am</option>
                                <option value="6:30am">6:30am</option>
                                <option value="7:00am">7:00am</option>
                                <option value="7:30am">7:30am</option>
                                <option value="8:00am">8:00am</option>
                                <option value="8:30am">8:30am</option>
                                <option value="9:00am">9:00am</option>
                                <option value="9:30am">9:30am</option>
                                <option value="10:00am">10:00am</option>
                                <option value="10:30am">10:30am</option>
                                <option value="11:00am">11:00am</option>
                                <option value="11:30am">11:30am</option>
                              </select>
                        </div>
                        <div class="col=lg-3 col-md-3 col-sm-3">
                        <select class="form-control to_value4" name="fridaytime1" style="display:none;">                      
                                <option value="12:00pm">12:00pm</option>
                                <option value="12:30pm">12:30pm</option>
                                <option value="1:00pm">1:00pm</option>
                                <option value="1:30am">1:30pm</option>
                                <option value="2:00pm">2:00pm</option>
                                <option value="2:30pm">2:30pm</option>
                                <option value="3:00pm">3:00pm</option>
                                <option value="3:30pm">3:30pm</option>
                                <option value="4:00pm">4:00am</option>
                                <option value="4:30pm">12:30pm</option>
                                <option value="5:00pm">5:00pm</option>
                                <option value="5:30pm">5:30pm</option>
                                <option value="6:00pm">6:00pm</option>
                                <option value="6:30pm">6:30am</option>
                                <option value="7:00pm">7:00am</option>
                                <option value="7:30pm">7:30am</option>
                                <option value="8:00pm">8:00am</option>
                                <option value="8:30pm">8:30pm</option>
                                <option value="9:00pm">9:00pm</option>
                                <option value="9:30pm">9:30pm</option>
                                <option value="10:00pm">10:00pm</option>
                                <option value="10:30pm">10:30pm</option>
                                <option value="11:00pm">11:00pm</option>
                                <option value="11:30pm">11:30pm</option>
                              </select>
                        </div>
                     </div>  

                     <div class="row">
                        <div class="col=lg-1 col-md-1 col-sm-1"><input type="checkbox" class="checked_fields5" onchange="valueChanged5()"></div>  
                        <div class="col=lg-5 col-md-5 col-sm-5"><input type="text" name="saturday" id="saturday"  class="form-control"  value="Saturday"  readonly></div>  
                        <div class="col=lg-3 col-md-3 col-sm-3">
                              <select class="form-control from_value5" name="saturdaytime" style="display:none;">                      
                                <option value="12:00am">12:00am</option>
                                <option value="12:30am">12:30am</option>
                                <option value="1:00am">1:00am</option>
                                <option value="1:30am">1:30am</option>
                                <option value="2:00am">2:00am</option>
                                <option value="2:30am">2:30am</option>
                                <option value="3:00am">3:00am</option>
                                <option value="3:30am">3:30am</option>
                                <option value="4:00am">4:00am</option>
                                <option value="4:30am">4:30am</option>
                                <option value="5:00am">5:00am</option>
                                <option value="5:30am">5:30am</option>
                                <option value="6:00am">6:00am</option>
                                <option value="6:30am">6:30am</option>
                                <option value="7:00am">7:00am</option>
                                <option value="7:30am">7:30am</option>
                                <option value="8:00am">8:00am</option>
                                <option value="8:30am">8:30am</option>
                                <option value="9:00am">9:00am</option>
                                <option value="9:30am">9:30am</option>
                                <option value="10:00am">10:00am</option>
                                <option value="10:30am">10:30am</option>
                                <option value="11:00am">11:00am</option>
                                <option value="11:30am">11:30am</option>
                              </select>
                        </div>
                        <div class="col=lg-3 col-md-3 col-sm-3">
                        <select class="form-control to_value5" name="saturdaytime1"  style="display:none;">                      
                                <option value="12:00pm">12:00pm</option>
                                <option value="12:30pm">12:30pm</option>
                                <option value="1:00pm">1:00pm</option>
                                <option value="1:30am">1:30pm</option>
                                <option value="2:00pm">2:00pm</option>
                                <option value="2:30pm">2:30pm</option>
                                <option value="3:00pm">3:00pm</option>
                                <option value="3:30pm">3:30pm</option>
                                <option value="4:00pm">4:00pm</option>
                                <option value="4:30pm">12:30pm</option>
                                <option value="5:00pm">5:00pm</option>
                                <option value="5:30pm">5:30pm</option>
                                <option value="6:00pm">6:00pm</option>
                                <option value="6:30pm">6:30pm</option>
                                <option value="7:00pm">7:00pm</option>
                                <option value="7:30pm">7:30pm</option>
                                <option value="8:00pm">8:00pm</option>
                                <option value="8:30pm">8:30pm</option>
                                <option value="9:00pm">9:00pm</option>
                                <option value="9:30pm">9:30pm</option>
                                <option value="10:00pm">10:00pm</option>
                                <option value="10:30pm">10:30pm</option>
                                <option value="11:00pm">11:00pm</option>
                                <option value="11:30pm">11:30pm</option>
                              </select>
                        </div>
                     </div>  

                     <div class="row">
                        <div class="col=lg-1 col-md-1 col-sm-1"><input type="checkbox" class="checked_fields6" onchange="valueChanged6()"></div>  
                        <div class="col-lg-5 col-md-5 col-sm-5"><input type="text" name="sunday" id="sunday" class="form-control" value="Sunday"  readonly></div>  
                        <div class="col=lg-3 col-md-3 col-sm-3">
                              <select class="form-control from_value6" name="sundaytime"  style="display:none;">                      
                                <option value="12:00am">12:00am</option>
                                <option value="12:30am">12:30am</option>
                                <option value="1:00am">1:00am</option>
                                <option value="1:30am">1:30am</option>
                                <option value="2:00am">2:00am</option>
                                <option value="2:30am">2:30am</option>
                                <option value="3:00am">3:00am</option>
                                <option value="3:30am">3:30am</option>
                                <option value="4:00am">4:00am</option>
                                <option value="4:30am">12:30am</option>
                                <option value="5:00am">5:00am</option>
                                <option value="5:30am">5:30am</option>
                                <option value="6:00am">6:00am</option>
                                <option value="6:30am">6:30am</option>
                                <option value="7:00am">7:00am</option>
                                <option value="7:30am">7:30am</option>
                                <option value="8:00am">8:00am</option>
                                <option value="8:30am">8:30am</option>
                                <option value="9:00am">9:00am</option>
                                <option value="9:30am">9:30am</option>
                                <option value="10:00am">10:00am</option>
                                <option value="10:30am">10:30am</option>
                                <option value="11:00am">11:00am</option>
                                <option value="11:30am">11:30am</option>
                              </select>
                        </div>
                        <div class="col=lg-3 col-md-3 col-sm-3">
                        <select class="form-control to_value6" name="sundaytime1" style="display:none;">                      
                                <option value="12:00pm">12:00pm</option>
                                <option value="12:30pm">12:30pm</option>
                                <option value="1:00pm">1:00pm</option>
                                <option value="1:30am">1:30pm</option>
                                <option value="2:00pm">2:00pm</option>
                                <option value="2:30pm">2:30pm</option>
                                <option value="3:00pm">3:00pm</option>
                                <option value="3:30pm">3:30pm</option>
                                <option value="4:00pm">4:00pm</option>
                                <option value="4:30pm">4:30pm</option>
                                <option value="5:00pm">5:00pm</option>
                                <option value="5:30pm">5:30pm</option>
                                <option value="6:00pm">6:00pm</option>
                                <option value="6:30pm">6:30pm</option>
                                <option value="7:00pm">7:00pm</option>
                                <option value="7:30pm">7:30pm</option>
                                <option value="8:00pm">8:00pm</option>
                                <option value="8:30pm">8:30pm</option>
                                <option value="9:00pm">9:00pm</option>
                                <option value="9:30pm">9:30pm</option>
                                <option value="10:00pm">10:00pm</option>
                                <option value="10:30pm">10:30pm</option>
                                <option value="11:00pm">11:00pm</option>
                                <option value="11:30pm">11:30pm</option>
                              </select>
                        </div>
                     </div> 
                     </div> 
                     <br><br> --}}
			<div class="card-footer text-center"> 		
                  	<button type="submit" class="btn btn-primary" id="submitForm">Submit</button>
                	</div>
                </div>

                </div>
                <!-- /.card-body -->
               
              </form>
            </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">

          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  {{-- <footer class="main-footer">
    <strong>Copyright &copy; 2022 <a href="https://protolabzit.com/" target="_blank">Protolabz eServices</a>.</strong>
    All rights reserved.
   
  </footer> --}}

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->

<!-- Page specific script -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $('.js-example-basic-multiple').select2();
   
      // $('#submitForm').click(function(e) {
    $('#form').on('submit', function (e) {
      // alert('hh');
    e.preventDefault();
    var spinner = $('#loader');
            spinner.show();
    var data = new FormData(this);
     var value=fruits;
      data.append('days', value);
    // console.log(data);

          $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
         });
      $.ajax({
          type: 'POST',
          url: '{{url('Admin/savedoctor')}}',
          dataType: 'json',
          data: data,
            
          cache: false,
          contentType: false,
          processData: false,      
          success: function (data) {
            
            if(data.status == 1)
            {
              // location.reload();
              spinner.hide();
              Swal.fire(
                'Good job!',
                'Doctor Added!',
                'success'
              )
              location.reload();
            }
            if(data.status == 0)
            {
              spinner.hide();
              toastr["error"](data.message, "Error");
            }
             
          },
          error: function (data) {
              // alert(data);
          }
      });
    });
  });
  </script>
<script>
   var fruits = [];
        function valueChanged()
    {
     
        if($('.checked_fields').is(":checked"))   {
          $(".from_value").show();
            $(".to_value").show();
            var mon = $("#monday").val();
            
            fruits.push(mon);
            console.log(fruits);
        }
           
        else{
          $(".from_value").hide();
            $(".to_value").hide();
            // $("#monday").val();
        }
      
    }
    function valueChanged1()
    {
      // const fruits = [];
        if($('.checked_fields1').is(":checked"))   {
          $(".from_value1").show();
            $(".to_value1").show();
            var tues = $("#tuesday").val();
            
            fruits.push(tues);
            console.log(fruits);
        }
           
        else{
          $(".from_value1").hide();
            $(".to_value1").hide();
        }
      
    }
    function valueChanged2()
    {
      // const fruits = [];
        if($('.checked_fields2').is(":checked"))   {
          $(".from_value2").show();
            $(".to_value2").show();
            var wed = $("#wednesday").val();
            fruits.push(wed);
            console.log(fruits);
        }
           
        else{
          $(".from_value2").hide();
            $(".to_value2").hide();
        }
      
    }
    function valueChanged3()
    {
      // const fruits = [];
        if($('.checked_fields3').is(":checked"))   {
          $(".from_value3").show();
            $(".to_value3").show();
            var thu = $("#thursday").val();
            fruits.push(thu);
            console.log(fruits);
        }
           
        else{
          $(".from_value3").hide();
            $(".to_value3").hide();
        }
      
    }
    function valueChanged4()
    {
      // const fruits = [];
        if($('.checked_fields4').is(":checked"))   {
          $(".from_value4").show();
            $(".to_value4").show();
            var fri = $("#friday").val();
            fruits.push(fri);
        }
           
        else{
          $(".from_value4").hide();
            $(".to_value4").hide();
        }
      
    }
    function valueChanged5()
    {
      // const fruits = [];
        if($('.checked_fields5').is(":checked"))   {
          $(".from_value5").show();
            $(".to_value5").show();
            var sat = $("#saturday").val();
            fruits.push(sat);
        }
           
        else{
          $(".from_value5").hide();
            $(".to_value5").hide();
        }
      
    }
    function valueChanged6()
    {
      // const fruits = [];
        if($('.checked_fields6').is(":checked"))   {
          $(".from_value6").show();
            $(".to_value6").show();
            var sun = $("#sunday").val();
            fruits.push(sun);
        }
           
        else{
          $(".from_value6").hide();
            $(".to_value6").hide();
        }
      
    }
    function inputOnlyText(event) {
      
      var keyCode = event.keyCode || event.which;

           
      if ((keyCode >= 65 && keyCode <= 90) ||  // A-Z
          (keyCode >= 97 && keyCode <= 122) || // a-z
          keyCode === 32 || // Space
          keyCode === 8 ||  // Backspace
          keyCode === 46) { // Delete
            return true;
      } else {
        event.preventDefault();
        return false;
      }
    }

  </script>
@endsection
