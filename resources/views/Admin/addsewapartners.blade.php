@extends('Admin.layouts.App')
@section('sewapartners', 'menu-open')
@section('viewsewapartner1', 'active')


<!-- Content Wrapper. Contains page content -->
@section('main_section')
    <style>
        .select2-container--default .select2-selection--multiple .select2-selection__choice__display {
            padding: 15px !important;
        }
        section.content {
            background-color: #F5DDBD;
        }

        a.btn.btn-primary.back_btn {
            background-color: #ED9B2D;
            color: black;
        }

        .card-footer {
            background-color: white;
        }

        select#categories {
            border: 1px solid #0b528f !important;
            border-radius: 4px;
        }

        textarea.select2-search__field {
            height: 26px !important;
        }

        .select2-container--default.select2-container--focus .select2-selection--multiple {
            border: 1px solid #0b528f !important;
        }

        .select2-container--default.select2-container .select2-selection--multiple {
            border: 1px solid #0b528f !important;
        }

        button.btn.btn-primary {
            background-color: #ED9B2D !important;
            color: black;
        }

        span.select2-selection__choice__display {
            /* background-color: #E13C06 !important; */
            color:#000 !important
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

            button.btn.btn-primary {
                width: 22%;
            }
        }

        @media(min-width:280px) and (max-width:767px) {
            form#sewa-form {
                margin-left: 16px;
            }

            .card-body {
                width: 100% !important;
            }

            button.btn.btn-primary {
                width: 40%;
            }

        }
        .select2-container--default .select2-selection--single {
            background-color: #fff;
            border: 1px solid #0b528f;
            border-radius: 4px;
            height: 38px;
        }
    </style>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Add SewaPartner</h1>
                    </div>
                    <div class="col-6 col-sm-6 text-right">
                        <a href="{{ url('Admin/sewapartner1') }}"class="btn btn-primary back_btn">Back</a>
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
                            @if ($errors->any())
                                <h4>{{ $errors->first() }}</h4>
                            @endif
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form id="sewa-form">
                                @if (session()->has('message'))
                                    <div class="alert alert-success">
                                        {{ session()->get('message') }}
                                    </div>
                                @endif
                                {{-- <h4 style="text-align:center;">Sewa Partner Register</h4> --}}
                                <div class="card-body">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div id="show_response"></div>
                                            <div class="form-group">
                                                <label for="email">Select Category: <span class="text-danger">*</span></label><br>
                                                <select name="categories" id="categories" style="width: 100%;height: 37px;">
                                                    <option value="">Select</option>
                                                    <option value="Hospital">Hospital</option>
                                                    <option value="Clinic">Clinic</option>
                                                    <option value="Laboratory">Laboratory</option>
                                                    <option value="Medicalstore">Medical Stores</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label for="pwd">Name: <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" placeholder="Enter name"
                                                    name="name" id="name" onkeypress="return inputOnlyText(event)">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label for="username">Username: <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" placeholder="Enter Username"
                                                    name="username" id="username">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label for="email">Email: <span class="text-danger">*</span></label>
                                                <input type="email" class="form-control" placeholder="Enter Email"
                                                    name="email" id="email">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div id="textboxcont"></div>
                                            <div class="form-group">
                                                <label for="email">Password: <span class="text-danger">*</span></label>
                                                <input type="password" class="form-control" placeholder="Enter Password"
                                                    name="password" id="password">
                                            </div>
                                        </div>
                                        <div class="col=lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label for="email">Contact Number: <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control"
                                                    placeholder="Enter Contact Number" name="contact_number"
                                                    id="contactnumber" onkeypress="return validatePhone(event)">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                      <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="village">City: <span class="text-danger">*</span></label>
                                            <select name="village" class="form-control " placeholder="Select village/city" id="village">
                                                <option value="">Select city</option>
                                                @foreach($cities as $name)
                                                    <option value="{{$name->city}}">{{$name->city}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label for="email">Address: <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" placeholder="Enter Address"
                                                    name="sewa_address" id="sewa_address">
                                            </div>
                                        </div>
                                       
                                    </div>

                                    {{--<div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group" id="show_doctors" style="display:none">
                    	                        <label label for="">Select Doctor</label>
                    		                    <select class="js-example-basic-multiple" name="doctors[]" multiple="multiple" style="width: 100%" >
                                                    @foreach ($doctors as $doctor)
                                                        <option value="{{$doctor->id}}">{{$doctor->name}}</option>
                                                    @endforeach
                   		                        </select>
                                            </div> 
                                        </div>
                                    </div> --}}
                                    <div class="row" id="hospitaltime" style="display: none;">
                                        
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label for="email">Timings From:</label>
                                                <input type="time" class="form-control" onchange="onTimeChange()"
                                                    placeholder="Timings" name="timings" id="timings">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label for="email">Timings To:</label>
                                                <input type="time" class="form-control" onchange="onTimeChange()"
                                                placeholder="Timings" name="timings2" id="timings2">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col=lg-6 col-md-6 col-sm-12">
                                            <div class="form-group" style="display: none;" id="medicaltime">
                                                <label for="email">Timings:</label>
                                                <input type="text" class="form-control" placeholder="24 * 7" value="24 * 7" readonly
                                                    name="clinictimings" id="timings">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label for="name">Profile Picture</label>
                                                <input type="file" name="profile" class="form-control"
                                                    id="profile_pic">

                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                          <div class="form-group" id="show_services">
                                              <label for="">Select Service:</label>
                                              <select class="form-control js-example-basic-multiple" name="services[]"
                                                  multiple="multiple" style="width: 100%">
                                                  @foreach ($services as $service)
                                                      <option value="{{ $service->service }}">{{ $service->service }}
                                                      </option>
                                                  @endforeach
                                              </select>
                                          </div>



                                      </div>
                                    </div>
                                </div>



                                <div class="card-footer text-center">
                                    <button type="submit" class="btn btn-primary">Register</button>
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
        $('.js-example-basic-multiple').select2({
            placeholder:'Select multiple services'
        });
        $('#village').select2({
            placeholder:'Select City',
            minimumResultsForSearch:1,
        });
        $('#sewa-form').on('submit', function(event) {
            // alert('hh');
            var spinner = $('#loader');
            spinner.show();
            event.preventDefault();
            const fd = $('#sewa-form').serialize();
            $.ajax({
                type: "POST",
                url: "{{ url('Admin/addsewapartnersform') }}",
                dataType: 'json',
                data: new FormData(this),
                cache: false,
                processData: false,
                contentType: false,
                processData: false,
                success: function(data) {
                    if (data.status == 1) {

                        // location.reload();
                        spinner.hide();
                        Swal.fire(
                            'Good job!',
                            'Sewapartner Added!',
                            'success'
                        )

                        location.reload();
                    }
                    if (data.status == 0) {
                        spinner.hide();
                        toastr["error"](data.message, "Error");
                    }
                },
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#categories').change(function() {
                var adnum = $(this).val();
                // alert(adnum); 
                if (adnum == "Hospital") {
                    $("#show_doctors").show();
                    //  $("#show_services").show();
                    $("#hospitaltime").hide();
                    $("#medicaltime").show();
                } else {
                    $("#show_doctors").hide();
                    //  $("#show_services").hide();
                    $("#hospitaltime").show();
                    $("#medicaltime").hide();

                }

            });

        });
    </script>
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
    <script>
        var inputEle = document.getElementById('timings');
        // console.log(inputEle);
        // return false;
        function onTimeChange() {
            var timeSplit = inputEle.value.split(':'),
                hours,
                minutes,
                meridian;
            hours = timeSplit[0];
            minutes = timeSplit[1];
            if (hours > 12) {
                meridian = 'PM';
                hours -= 12;
            } else if (hours < 12) {
                meridian = 'AM';
                if (hours == 0) {
                    hours = 12;
                }
            } else {
                meridian = 'PM';
            }
            $("#timings").val() = hours + ':' + minutes + ' ' + meridian;
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

    function validatePhone(event) {
            // Get the pressed key code
            var keyCode = event.keyCode || event.which;

            // Allow only digits (0-9)
            if (keyCode >= 48 && keyCode <= 57) {
                // Check the length of the input value
                var inputValue = event.target.value;
                if (inputValue.length >= 10) {
                    event.preventDefault();
                    return false;
                }
            } else {
                event.preventDefault();
                return false;
            }
    }
    </script>
@endsection
