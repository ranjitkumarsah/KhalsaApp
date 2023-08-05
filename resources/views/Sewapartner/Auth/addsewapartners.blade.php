<html>
  <head>
    <style>
      span.error{
        color:red;
      }
      body{
          background-image: url("/public/images/hospital.jpg");
          background-repeat: no-repeat, repeat;
          background-position: center; /* Center the image */
          background-size: cover; /* Resize the background image to cover the entire container */
          padding-top: 50px;
        }
        .login-form{
          background:#1a11117a;
          margin-top: 100px;
          margin-bottom: 100px;
          padding: 100px;
          border-radius: 50px;
          color: white; 
          /* width: 85%;  */
        }
        .login-heading{
          text-align: center;
          margin-top: 20px;
        }
        .container{
          background: #09090a4f;
          border-radius: 50px;
  
        }
        .btn-primary{
          width: 100%;
        }
        select#categories {
          width: 100%;
          height: 38px;
        }
    </style>
      <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  </head>
<body>
    <div class="container">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <div class="login-form">
          <form id="sewa-form">
                      @if(session()->has('message'))
                          <div class="alert alert-success">
                              {{ session()->get('message') }}
                          </div>
                      @endif
                      <h4 style="text-align:center;">Sewa Partner Register</h4>
                      <div id="show_response"></div>
                        <div class="form-group">
                        <label for="pwd">Name:</label>
                        <input type="text" class="form-control" placeholder="Enter name" name="name" id="name">
                       </div>
                        @csrf
                        <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control"  placeholder="Enter Email" name="email" id="email">
                        </div>
                        <div id="textboxcont"></div>
                        <div class="form-group">
                        <label for="email">Password:</label>
                        <input type="password" class="form-control"  placeholder="Enter Password" name="password" id="password">
                        </div>
                        <div class="form-group">
                        <label for="email">Contact Number:</label>
                        <input type="text" class="form-control"  placeholder="Enter Contact Number" name="contactnumber" id="contactnumber">
                        </div>
                        <div class="form-group">
                        <label for="email">Address:</label>
                        <input type="text" class="form-control"  placeholder="Enter Address" name="sewa_address" id="sewa_address">
                        </div>
                        <div class="form-group">
                            <label for="email">Select Category:</label><br>
                            <select name="categories" id="categories">
                            <option value="">Select</option>
                            <option value="hospital">Hospital</option>
                            <option value="clinic">Clinic</option>
                            <option value="laboratory">Laboratory</option>
                            <option value="medicalstore">Medical Stores</option>
                            </select>
                        </div>

                        <div class="form-group" id="doctor_name" style="display:none">
                                <label for="email">Doctor name:</label>
                                <input type="text" class="form-control"  placeholder="Doctor name" name="doctor_name" >
                        </div>
                        <div class="form-group" id="qualification" style="display:none">
                                <label for="email">Doctor Qualification:</label>
                                <input type="text" class="form-control"  placeholder="Doctor Qualification" name="qualification" >
                          
                        </div>
                        <div class="form-group" id="opdtiming" style="display:none">
                          <label for="email">OPD Timing:</label>
                          <input type="text" class="form-control"  placeholder="OPD Timing" name="opdtiming" >
                    
                         </div>
                        <div class="form-group">
                        <label for="email">Timings:</label>
                        <input type="text" class="form-control"  placeholder="Timings" name="timings" id="timings">
                        </div>
                        <div class="form-group">
                        <label for="email">Services:</label>
                        <input type="text" class="form-control"  placeholder="Enter services" name="services" id="services">
                        </div>
                        <button type="submit" class="btn btn-primary">Register</button>
                    </form>
          </div>
        </div>
      </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    < <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>

<script type="text/javascript">
 $.ajaxSetup({
     headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
     }
 });

 $('#sewa-form').on('submit', function(event){
     event.preventDefault();
     var name = $('#name').val();
     $(".error").remove();  
     if (name.length < 1) {  
      $('#name').after('<span class="error">Name is required</span>');  
    } 
    var email = $('#email').val();
    if (email.length < 1) {  
      $('#email').after('<span class="error">Email is required</span>');  
    } 
    var contactnumber = $('#contactnumber').val();
    if (contactnumber.length < 1) {  
      $('#contactnumber').after('<span class="error">Contact number is required</span>');  
    } 
    var password = $('#password').val();
    if (password.length < 1) {  
      $('#password').after('<span class="error">Password is required</span>');  
      return false;
    }
    var sewa_address = $('#sewa_address').val();
    if (sewa_address.length < 1) {  
      $('#sewa_address').after('<span class="error">Address is required</span>');  
      return false;
    }
    var timings = $('#timings').val();
    if (timings.length < 1) {  
      $('#timings').after('<span class="error">Timing is required</span>');  
      return false;
    }
    var services = $('#services').val();
    if (services.length < 1) {  
      $('#services').after('<span class="error">Service is required</span>');  
      return false;
    }

    const fd = $('#sewa-form').serialize();
    // console.log(fd);
    // return false;
    $.ajax({
      type: "POST",
       url: "{{url('Sewapartner/addsewapartnersform')}}",
       dataType: 'json',
       data:new FormData(this),
       cache : false,
    processData: false,
    contentType: false,
          processData: false,
          success: function(response) {
            $("#show_response").html(response);
            window.location.href = "{{url('Sewapartner/login')}}";
       },
      });
     });
   </script>
<script>
        $(document).ready(function(){
        $('#categories').change(function(){
            var adnum=$(this).val();
            // alert(adnum); 
            if (adnum == "hospital"){
                $("#doctor_name").show(); 
                $("#qualification").show();
                $("#opdtiming").show(); 
            }
            else{
                $("#doctor_name").hide(); 
                $("#qualification").hide();
                $("#opdtiming").hide();  

            }
          
        });

    });
    </script> 

