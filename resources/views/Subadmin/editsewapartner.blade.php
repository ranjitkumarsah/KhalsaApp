@extends('Subadmin.layouts.App')
@section('sewapartners','menu-open')
@section('viewsewapartner','active')

  <!-- Content Wrapper. Contains page content -->
 
  @section('main_section')
  <style>
     a.btn.btn-primary.back_btn{
      background-color:#ED9B2D;
      color:black;
    }
    .select2-container--default .select2-selection--multiple .select2-selection__choice__display{
      margin-left: 9px;
    }
    @media only screen 
    and (device-width : 375px) 
    and (device-height : 736px) 
    and (-webkit-device-pixel-ratio : 3) {
      button.btn.btn-primary {
          width: 54% !important;
          margin-left: 281px !important;
      }


 }
    button.btn.btn-primary {
    margin-top: -52px !important;
    width:22% !important;
}
      select#categories {
        border: 1px solid #0b528f;      
        border-radius: 6px;
      }
      select#categories:hover {
        border: 1px solid #0b528f;      
        border-radius: 1px;
      }
      button.btn.btn-primary {
        background-color: #ED9B2D !important;
        color: black;
        margin-left: 354px;
        width: 52%;
      }
      .select2-container--default.select2-container--focus .select2-selection--multiple{
        border:1px solid #3d9def;
      }
      .select2-container--default.select2-container .select2-selection--multiple{
        border:1px solid #0b528f;
      }
      span.select2-selection__choice__display {
          background-color: #E13C06 !important;
      }
    .hide {
            display: none;
        }
        .show {
            display: block;
        }
    input#popup {
        height: 39px;
        width: 100%;
    }
    @media (max-width:992px) {
      form#sewa-form {
        margin-left: 246px;
        margin-right: 14px;
    }
   }
   @media only screen and (min-width: 1200px) {
    form#sewa-form {
        margin-left: 20px;
        margin-right: 20px;
    }
  }
   @media(min-width:280px) and (max-width:767px) {
    form#sewa-form {
          margin-left: 16px;
      }
      .card-body {
        width: 100% !important;
      }
      /* button.btn.btn-primary {
        background-color: #ED9B2D !important;
        color: black;
        margin-left: 69px;
        width: 82%;
    } */
    button.btn.btn-primary {
    width: 54% !important;
    margin-left: 281px !important;
}

    
  }
  .text-center {
    text-align: center!important;
    position: relative;
    /* top: 92px; */
    right: 200px;
}
  </style>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit SewaPartner</h1>
          </div>
          <div class="col-6 col-sm-6 text-right">
            <a href="{{url('Subadmin/sewapartner')}}"class="btn btn-primary back_btn">Back</a>
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
    <section class="content pb-5">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary" style="font-size: 0.9rem;">
            
              <!-- /.card-header -->
              <!-- form start -->
              <form id="sewa-form">
                @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                @endif
                {{-- <h4 style="text-align:center;">Sewa Partner Register</h4> --}}
                <div class="card-body">
                <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                <div id="show_response"></div>
                <div class="form-group">
                  <label for="email">Select Category:</label><br>
                  <select name="categories" id="categories" style="width: 100%;height: 37px;">
                  <option value="" >Select</option>
                  <option value="Hospital" {{$sewapartner->categories == "Hospital"  ? 'selected' : ''}} >Hospital</option>
                  <option value="Clinic" {{$sewapartner->categories == "Clinic"  ? 'selected' : ''}} >Clinic</option>
                  <option value="Laboratory" {{$sewapartner->categories == "Laboratory"  ? 'selected' : ''}} >Laboratory</option>
                  <option value="Medicalstore" {{$sewapartner->categories == "Medicalstore"  ? 'selected' : ''}} >Medical Stores</option>
                  </select>
              </div>
              </div>
                  <div class="col-lg-6 col-md-6 col-sm-12">
                  <div class="form-group">
                  <label for="pwd">Name:</label>
                  <input type="text" class="form-control" placeholder="Enter name" name="name" id="name" value="{{$sewapartner->name}}">
                 </div>
                 </div>
                 </div>
                  @csrf

                  <div class="row">
                  <div class="col-lg-6 col-md-6 col-sm-12">
                  <div class="form-group">
                  <label for="email">Email:</label>
                  <input type="email" class="form-control"  placeholder="Enter Email" name="email" id="email" value="{{$sewapartner->email}}">
                  </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-12">
                  <input type="hidden" name="sewapartner_id" id="sewapartner_id" value="{{$sewapartner->id}}">
                  <div class="form-group">
                    <label for="email">UserName:</label>
                    <input type="text" class="form-control"  placeholder="Enter UserName" name="username" id="username" value="{{$sewapartner->username}}">
                  </div>
                  {{-- <div id="textboxcont"></div> --}}
                  </div>
                  </div>
                  <div class="row">
                  <div class="col-lg-6 col-md-6 col-sm-12">
                    <div id="textboxcont"></div>
                  <div class="form-group">
                  <label for="email">Password:</label>
                  <input type="password" class="form-control"  placeholder="Enter Password" name="password" id="password" value="{{$sewapartner->numpassword}}">
                  </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-12">
                  <div class="form-group">
                  <label for="email">Contact Number:</label>
                  <input type="number" class="form-control"  placeholder="Enter Contact Number" name="contactnumber" id="contactnumber" value="{{$sewapartner->contactnumber}}">
                  </div>
                  </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="form-group">
                    <label for="email">Address:</label>
                    <input type="text" class="form-control"  placeholder="Enter Address" name="sewa_address" id="sewa_address" value="{{$sewapartner->sewa_address}}">
                    </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">                   
                    {{-- <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12"> --}}
                    <div class="form-group" id="show_services" >
                      <label for="">Select Service:</label>
                      <select class="js-example-basic-multiple" name="services[]" multiple="multiple" style="width: 100%" >
                        @foreach($allservices as $service)
                       <option value="{{$service->service}}"  @if(in_array($service->service,$services->toArray())) selected @endif>{{$service->service}}</option>
                       @endforeach
                     </select>
                    </div>
                    </div>
                    </div>
                 
                    <div class="row">
                      <div class="col-lg-6 col-md-6 col-sm-12">
                      {{-- <div class="form-group" id="show_doctors" style="display:none">
                    	  <label for="">Select Doctor</label>
                    		<select class="js-example-basic-multiple" name="doctors[]" multiple="multiple" style="width: 100%" >
                      		@foreach($doctors as $doctor)
                     		<option value="{{$doctor->id}}">{{$doctor->name}}</option>
                     		@endforeach
                   		</select>
                  </div>  --}}
		      </div>
          </div>
         @if($sewapartner->categories == "Hospital")
          <div class="row" >
            <div class="col=lg-6 col-md-6 col-sm-12"> 
              <div class="form-group"  id="medicaltime">
                <label for="email">Timings:</label>
                <input type="text" class="form-control"  placeholder="Timings" name="timings" id="timings" value="{{$sewapartner->timings}}">
              </div>
            </div>
          </div>
          @else
            <div class="row" id="hospitaltime" >
              <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="form-group">
                  <label for="email">Timings From:</label>
                  <input type="time" class="form-control"  placeholder="Timings" name="timings" id="timings" >
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="form-group">
                  <label for="email">Timings To:</label>
                  <input type="time" class="form-control"  placeholder="Timings" name="timings2" id="timings">
                </div>
              </div>
            </div>
          @endif    
               
                
                 
                   
                  <div class="row">
                      <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group">
                        <label for="name">Profile Picture</label>
                        <input type="file" name="newprofile" class="form-control" id="profile_pic" >
                        <input type="hidden" value ="{{$sewapartner->profile}}" name="profile"/>
                        <img src="{{$sewapartner->profile}}" style="height: 50px; width: 50px;margin-top: 5px;">
                       
                    </div>
                      </div>
                      <div class="col=lg-6 col-md-6 col-sm-12">

                        <div class="form-group" id="villagelocation">

                          <label for="subject">City:</label>

                          <select name="village" class="form-control " placeholder="Select village/city" id="village">
                            <option value="">Select city</option>
                            @foreach($cities as $name)
                            <option value="{{$name->city}}" <?php if($name->city == $sewapartner->village) { ?> selected="selected"
                              <?php } ?>>{{$name->city}}</option>
                            @endforeach
                          </select>

                        </div>
                        </div>
                    </div>
                  </div>
                    
                  <div class="text-center">
               
                  <button type="submit" class="btn btn-primary ">Update</button>
                
                  </div>
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
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script type="text/javascript">

  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
  $('.js-example-basic-multiple').select2();
  $('#sewa-form').on('submit', function(event){
    // alert('hh');
      event.preventDefault();
   
      var spinner = $('#loader');
            spinner.show();
    //  var services = $('#services').val();
    //  if (services.length < 1) {  
    //    $('#services').after('<span class="error">Service is required</span>');  
    //    return false;
    //  }
 
     const fd = $('#sewa-form').serialize();

     id = $("#sewapartner_id").val();
    //  console.log(id);
     $.ajax({
       type: "POST",
        url: "{{url('Subadmin/updatesewapartner')}}" + '/' + id,
        dataType: 'json',
        data:new FormData(this),
        cache : false,
        processData: false,
        contentType: false,
           processData: false,
           success: function(data) {
            if(data.status == 1)
            {
              spinner.hide();
              // location.reload();
              Swal.fire(
                'Good job!',
                'Sewapartner Updated!',
                'success'
              )
              // window.location = "{{url('Admin/sewapartner')}}";
              location.reload();
            }
            if(data.status == 0)
            {
              spinner.hide();
              toastr["error"](data.message, "Error");
            }
        },
       });
      });
    </script>
 <script>
         $(document).ready(function(){
         $('#categories').change(function(){
             var adnum=$(this).val();
             
             if (adnum == "Hospital"){
                 $("#show_doctors").show(); 
                //  $("#show_services").show();
                 $("#hospitaltime").hide();
                 $("#medicaltime").show(); 
             }
             else{
              $("#show_doctors").hide(); 
                //  $("#show_services").hide();
                 $("#hospitaltime").show(); 
                 $("#medicaltime").hide(); 
 
             }
           
         });
 
     });
     </script> 
     {{-- <script>
       $(document).ready(function () {
       var adnum =  $("#categories").val();
       if (adnum == "Hospital"){
                 $("#show_doctors").show(); 
                //  $("#show_services").show();
                 $("#hospitaltime").hide();
                 $("#medicaltime").show(); 
             }
             else{
              $("#show_doctors").hide(); 
                //  $("#show_services").hide();
                 $("#hospitaltime").show(); 
                 $("#medicaltime").hide(); 
                
 
             }
       });
        </script> --}}
     {{-- <script>
      function clickMe() {
        var text = document.getElementById("popup");
        text.classList.toggle("hide");
        text.classList.toggle("show");
      }

      
  </script> --}}
  {{-- <script>
    $(document).ready(function() {
    var max_fields      = 10; //maximum input boxes allowed
    var wrapper   		= $(".input_fields_wrap"); //Fields wrapper
    var add_button      = $(".add_field_button"); //Add button ID

    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
   e.preventDefault();
    if(x < max_fields){ //max input box allowed
      x++; //text box increment
      $(wrapper).append('<div class="input-group mb-3"><label for="email">Doctor name:</label><input placeholder="Doctor Name" type="text" name="mytext[]" class="form-control"><div class="input-group-append"><button class="btn btn-outline-danger remove_field" type="button">Remove</button></div></div>'); //add input box
      $(wrapper).append('<div class="input-group mb-3"><label for="email">Doctor Qualification:</label><input placeholder="Doctor Qualification" type="text" name="mytext[]" class="form-control"><div class="input-group-append"><button class="btn btn-outline-danger remove_field" type="button">Remove</button></div></div>');
      $(wrapper).append('<div class="input-group mb-3"><label for="email">OPD Timing:</label><input placeholder="OPD Timing" type="text" name="mytext[]" class="form-control"><div class="input-group-append"><button class="btn btn-outline-danger remove_field" type="button">Remove</button></div></div>');
    }
   });

 $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
  e.preventDefault(); $(this).parent('div').parent('div').remove(); x--;
  })
 });

  $("#doctor_name").click(function(){
      $(".input_fields_wrap").toggle();
  });
  </script> --}}
@endsection
