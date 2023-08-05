<html>
  <head>
    <style>
      body{
          background-image: url("/public/images/545.jpg");
          background-repeat: no-repeat, repeat;
          background-position: center; /* Center the image */
          background-size: cover; /* Resize the background image to cover the entire container */
          padding-top: 50px;
        }
        h4.admin_login{
            font-size:26px;
            color:black !important;
          }
        /* .login-form{
          background:#FFDDAA;
          margin-bottom: 100px;
          padding: 91px;
          color: white;
         
        } */
        .login-form {
              background: #FFDDAA;
              margin-bottom: 100px;
              padding: 48px;
              color: white;
              width: 60%;
              margin-left: -129px;
              border-radius: 23px;
          }
        .login-heading{
          text-align: center;
          margin-top: 20px;
        }
        .container{
          /* background: #09090a4f; */
          border-radius: 50px;
  
        }
        .btn-primary{
          width: 100%;
        }
        a.principal_register {
            float: right;
            color: white;
            background-color:#007bff;
            margin-top:20px;
            padding:8px;
            border-radius:5px;
        }
        label {
              color: black;
          }
        /* ui changes */
        /* ui changes */
        @media(min-width:280px) and (max-width:767px) {
          .login-form {
            padding: 77px;
            margin-left:0% !important;
          }
          h4.admin_login{
            font-size:20px;
            color:black !important;
            margin-top: -20px !important;
          }
        }
        @media (max-width:992px) {
        .login-form {
          padding: 16px;
        }
      }
    </style>
      <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>


  <head>
  <style>
    .error{
      color:red;
    }
    body{
      overflow:hidden;
    }
  </style>
</head>
  </head>
<body>

    <div class="container">
      <div class="row">

        <div class="col-md-8 offset-md-2 sign_class">
          <div class="login-form">
              <img src="{{ asset('/public/images/img1.png') }}" style="width:54%; height:149px; transform: translate(36%, -14%);  " alt="description of myimage">     
              <form method="POST" action="{{url('Sewapartner/sewapartnerdata')}}">
    @csrf
    @if(session('errormessage'))
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{session('errormessage')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
        </button>
      </div>
    @endif
    <h4 style="text-align:center;" class="admin_login">Sewapartner Login</h4>
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
      @if($errors->has('email'))
         <div class="error">{{ $errors->first('email') }}</div>
      @endif
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password">
      @if($errors->has('password'))
         <div class="error">{{ $errors->first('password') }}</div>
      @endif
    </div>
   
    <div class="form-group">
    <button type="submit" style="background-color: #ff7600;" class="btn btn-primary">Login</button>
   
    </div>
  </form>
          </div>
        </div>
      </div>
    </div>

  


 