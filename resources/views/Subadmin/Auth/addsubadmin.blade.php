<html>
  <head>
    <style>
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
          width:84%;
         
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
          <form id="sub-admin-form">
                    @if(session()->has('message'))
                        <div class="alert alert-success">
                            {{ session()->get('message') }}
                        </div>
                    @endif
                    <h4 style="text-align:center;">Sub Admin Register</h4>
                        <div class="form-group">
                        <label for="pwd">Name:</label>
                        <input type="text" class="form-control" id="name" placeholder="Enter  name" name="name">
                        </div>
                        @csrf
                        <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter  email" name="email">
                      </div>
                        <div class="form-group">
                        <label for="pwd">Password:</label>
                        <input type="password" class="form-control" id="password" placeholder="Enter Password" name="password">
                        </div>
                        <div class="form-group">
                        <label for="email">Contact number:</label>
                        <input type="text" class="form-control" id="contact_number" placeholder="Enter contact number" name="contact_number">
                        </div>
                        <div class="form-group">
                        <label for="subject">Full Address:</label>
                        <input type="text" class="form-control" id="address" placeholder="Enter full address" name="address">
                        </div>
                        <div class="form-group">
                        <button type="submit" class="btn btn-primary">Register</button>
                        </div>
                        </div>
                        </div> 
                    </form>          </div>
        </div>
      </div>
    </div>
  </body>
  </html>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>

<script type="text/javascript">
 $.ajaxSetup({
     headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
     }
 });

 $('#sub-admin-form').on('submit', function(event){
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
    var contact_number = $('#contact_number').val();
    if (contact_number.length < 1) {  
      $('#contact_number').after('<span class="error">Contact number is required</span>');  
    }
    var address = $('#address').val();
    if (address.length < 1) {  
      $('#address').after('<span class="error">Address is required</span>');  
    }
    var password = $('#password').val();
    if (password.length < 1) {  
      $('#password').after('<span class="error">Password is required</span>');  
      return false;
    }
    const fd = $('#sub-admin-form').serialize();
    // console.log(fd);
    // return false;
    $.ajax({
      type: "POST",
       url: "{{url('Subadmin/addsubadminform')}}",
       dataType: 'json',
       data:new FormData(this),
       cache : false,
    processData: false,
    contentType: false,
          processData: false,
          success: function(response) {
            $("#show_response").html(response);
            window.location.href = "{{url('Subadmin/login')}}";
       },
      });
     });
   </script>