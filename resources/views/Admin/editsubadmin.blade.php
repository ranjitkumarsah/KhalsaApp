@extends('Admin.layouts.App')
@section('subadmins','menu-open')
@section('viewsubadmin','active')

  <!-- Content Wrapper. Contains page content -->
  @section('main_section')
  <style>
     a.btn.btn-primary.back_btn{
        background-color:#ED9B2D;
        color:black;
      }
    button.btn.btn-primary {
      background-color: #ED9B2D !important;
      color: black;
      width:22%;
  }
  @media only screen and (min-width: 768px) and (max-width: 991px) {
    .col-sm-6.edit_class{
      margin-left:32%;
    }
  }
  form#sub-admin-form {
      margin-left: 20px;
      margin-right: 20px;
  }
  /* ui design */
  @media (max-width:992px) {
  form#sub-admin-form {
      margin-left: 244px;
  }
}
@media(min-width:280px) and (max-width:767px) {
  form#sub-admin-form {
    margin-left: 0px;
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
          <div class="col-sm-6 edit_class">
            <h1>Edit Sub-Admin(Manager)</h1>
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
                <div class="row">
                <div class="col=lg-6 col-md-6 col-sm-12">
                    <div class="form-group">
                    <label for="pwd">Name: <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="name" placeholder="Enter  name" name="name" value="{{$subadmin->name}}" onkeypress="return inputOnlyText(event)">
                    </div>
                </div>
                    @csrf
                    <div class="col=lg-6 col-md-6 col-sm-12">
                    <div class="form-group">
                    <label for="email">Email: <span class="text-danger">*</span></label>
                    <input type="email" class="form-control" id="email" placeholder="Enter  email" name="email" value="{{$subadmin->email}}">
                  </div>
                </div>
                </div>
                <div class="row">
                <div class="col=lg-6 col-md-6 col-sm-12">
                  <div class="form-group">
                    <label for="email">Username: <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="username" placeholder="Enter  username" name="username" value="{{$subadmin->username}}">
                  </div>
                  </div>
                  <input type="hidden" name="subadmin_id" value="{{$subadmin->id}}" id="subadmin_id">
                  <div class="col=lg-6 col-md-6 col-sm-12">
                    <div class="form-group">
                    <label for="pwd">Password: <span class="text-danger">*</span></label>
                    <input type="password" class="form-control" id="password" placeholder="Enter Password" name="password" value="{{$subadmin->numpassword}}">
                    </div>
                    </div>
                    </div>
                    <div class="row">
                    <div class="col=lg-6 col-md-6 col-sm-12">
                    <div class="form-group">
                    <label for="email">Contact number: <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="contact_number" placeholder="Enter contact number" name="contact_number" value="{{$subadmin->contact_number}}" onkeypress="return validatePhone(event)">
                    </div>
                    </div>
                    <div class="col=lg-6 col-md-6 col-sm-12">
                    <div class="form-group">
                    <label for="subject">City: <span class="text-danger">*</span></label>
                    <!-- <input type="text" class="form-control" id="village" placeholder="Enter village/city" name="village" value="{{$subadmin->village}}"> -->
                   
                    <select name="village" class="form-control " placeholder="Select village/city" id="village">
                              <option value="">Select city</option>
                            @foreach($cities as $name)
                            <option value="{{$name->city}}" <?php if($name->city == $subadmin->village) { ?> selected="selected"<?php } ?>>{{$name->city}}</option>
                            @endforeach
                                </select>
                  
                  </div>
                    </div>
                    </div>
                    <div class="row">
                    <div class="col=lg-6 col-md-6 col-sm-12">
                    <div class="form-group">
                    <label for="subject">Landmark:</label>
                    <input type="text" class="form-control" id="landmark" placeholder="Enter landmark" name="landmark" value="{{$subadmin->landmark}}">
                    </div>
                    </div>
                    <div class="col=lg-6 col-md-6 col-sm-12">
                    <div class="form-group">
                    <label for="subject">Full Address: <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="address" placeholder="Enter full address" name="address" value="{{$subadmin->address}}">
                    </div>
                    </div>
                  </div>
                    <div class="form-group text-center">
                    <button type="submit" class="btn btn-primary">Update</button>
                    </div>
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
     var id = $('#subadmin_id').val();
     $.ajax({
       type: "POST",
        url: "{{url('Admin/updatesubadmin')}}" + '/' + id,
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
                'SubAdmin Updated!',
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
