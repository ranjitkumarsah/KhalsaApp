@extends('Admin.layouts.App')
@section('subadmins','menu-open')
@section('viewsubadmin','active')

  <!-- Content Wrapper. Contains page content -->
  @section('main_section')
  <style>

.select2-container--default .select2-selection--single {
      background-color: #fff;
      border: 1px solid #0b528f;
      border-radius: 4px;
      height: 38px;
    }
     section.content {
    background-color:#F5DDBD;
} 
    a.btn.btn-primary.back_btn{
      background-color:#ED9B2D;
      color:black;
    }
    button.btn.btn-primary{
      background-color: #ED9B2D !important;
      color:black;
    }
   
    li.nav-item p {
        color: black;
    }
    label{
      color:#0b528f;
      font-family:inherit;
    }
    button.btn.btn-primary{
      background-color: #E13C06;
    }
    h1.heading{
      color:#0b528f;
      font-family:inherit;
    }
    .form-control{
      border: 1px solid #0b528f;
    }
    form#sub-admin-form {
        margin-left: 20px;
        margin-right: 20px;
    }
    button.btn.btn-primary {
        width: 22%;
    }
    /* ui design */
    @media (max-width:992px) {
    form#sub-admin-form {
        margin-left: 244px;
    }
  }
  @media(min-width:280px) and (max-width:767px) {
    button.btn.btn-primary {
        width: 40%;
    }
    form#sub-admin-form {
      margin-left: 0px;
  }
form#sub-admin-form {
    margin-right: 0px !important;
} 
  .card-body {
    width: 100% !important;
    }

  }
    /* ui design */
  </style>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-md-6 col-sm-6">
            <h1 class="heading">Add Sub-Admin(Manager)</h1>
          </div>
          <div class="col-6 col-sm-6 text-right">
            <a href="{{url('Admin/subadmin')}}"class="btn btn-primary back_btn">Back</a>
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
              <form id="sub-admin-form">
                @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                @endif
                {{-- <h4 style="text-align:center;">Sub Admin Register</h4> --}}
                <div class="card-body">
                    @csrf

                    <div class="row">
                      <div class="col=lg-6 col-md-6 col-sm-12">
                        <div class="form-group">
                          <label for="pwd">Name: <span class="text-danger">*</span></label>
                          <input type="text" class="form-control" id="name" placeholder="Enter name" name="name">
                          </div>
                      </div>
                      <div class="col=lg-6 col-md-6 col-sm-12">
                        <div class="form-group">
                          <label for="email">Email: <span class="text-danger">*</span></label>
                          <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                        </div> 
                      </div>
                    </div>

                    <div class="row">
                      <div class="col=lg-6 col-md-6 col-sm-12">
                          <div class="form-group">
                          <label for="email">Username: <span class="text-danger">*</span></label>
                          <input type="text" class="form-control" id="username" placeholder="Enter username" name="username">
                          </div>
                      </div>
                      <div class="col-md-6 col-sm-12">
                          <div class="form-group">
                          <label for="pwd">Password: <span class="text-danger">*</span></label>
                          <input type="password" class="form-control" id="password" placeholder="Enter Password" name="password">
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col=lg-6 col-md-6 col-sm-12">
                          <div class="form-group">
                          <label for="email">Contact number: <span class="text-danger">*</span></label>
                          <input type="number" class="form-control" id="contact_number" placeholder="Enter contact number" name="contact_number">
                        </div>
                      </div>
                      <div class="col=lg-6 col-md-6 col-sm-12">
                          <div class="form-group">
                          <label for="subject">City: <span class="text-danger">*</span></label>

                          <select name="village" class="form-control" placeholder="Select village/city" id="village">
                              <option value="">Select city</option>
                            @foreach($cities as $name)
                            <option value="{{$name->city}}">{{$name->city}}</option>
                            @endforeach
                                </select>
                          
                          <!-- pattern="^[A-Za-z]*$" -->
                          </div>
                      </div>
                    </div>

                      <div class="row">
                      <div class="col=lg-6 col-md-6 col-sm-12">
                          <div class="form-group">
                          <label for="subject">Landmark:</label>
                          <input type="text" class="form-control" id="landmark" placeholder="Enter landmark" name="landmark">
                          </div>
                      </div>
                      <div class="col=lg-6 col-md-6 col-sm-12">
                          <div class="form-group">
                          <label for="subject">Full Address: <span class="text-danger">*</span></label>
                          <input type="text" class="form-control" id="address" placeholder="Enter full address" name="address">
                          </div>
                      </div>
                    </div>

	             <div class="text-center">                          
			 <button type="submit" class="btn btn-primary">Register</button>
                     </div>
                    
            
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
  var spinner = $('#loader');
  $('#sub-admin-form').on('submit', function(event){
      event.preventDefault();
      spinner.show();
    //   var name = $('#name').val();
    //   $(".error").remove();  
    //   if (name.length < 1) {  
    //    $('#name').after('<span class="error">Name is required</span>');  
    //  } 
    //  var email = $('#email').val();
    //  if (email.length < 1) {  
    //    $('#email').after('<span class="error">Email is required</span>');  
    //  } 
    //  var contact_number = $('#contact_number').val();
    //  if (contact_number.length < 1) {  
    //    $('#contact_number').after('<span class="error">Contact number is required</span>');  
    //  }
    //  var address = $('#address').val();
    //  if (address.length < 1) {  
    //    $('#address').after('<span class="error">Address is required</span>');  
    //  }
    //  var password = $('#password').val();
    //  if (password.length < 1) {  
    //    $('#password').after('<span class="error">Password is required</span>');  
    //    return false;
    //  }
    
      
     const fd = $('#sub-admin-form').serialize();
     // console.log(fd);
     // return false;
      $.ajax({
       type: "POST",
        url: "{{url('Admin/addsubadminform')}}",
        dataType: 'json',
        data:new FormData(this),
        cache : false,
        processData: false,
        contentType: false,
           processData: false,
           success: function(data) {
            //  $("#show_response").html(response);
             if(data.status == 1)
            {
              // alert('hh');
              spinner.hide();
              Swal.fire(
                'Good job!',
                'SubAdmin Added!',
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
       });
      });
      $('#village').select2({
      placeholder:'Select City',
      minimumResultsForSearch:1,
    });
    </script>
@endsection
