@extends('Admin.layouts.App')
@section('business','menu-open')
@section('view_business','active')

  <!-- Content Wrapper. Contains page content -->
  @section('main_section')
  <style>

.select2-container--default .select2-selection--single {
      background-color: #fff;
      border: 1px solid #0b528f;
      border-radius: 4px;
      height: 38px;
    }
      textarea#description {
      width: 100%;
      }
        select#category {
          border: 1px solid #0b528f;
      }
      textarea#description {
          border: 1px solid #0b528f;
      }
      .card-footer{
        background-color:white !important;
      }
      a.btn.btn-primary.back_btn{
        background-color:#ED9B2D;
        color:black;
      }
      textarea#description{
        margin-top: 2px;
        height: 64px;
      }
      textarea#address{
        width:100%;
        margin-top: 2px;
        height: 64px;
        border: 1px solid #0b528f;
      }
      form#sub-admin-form {
          margin-left: 20px;
          margin-right: 20px;
      }
      button.btn.btn-primary {
          width: 22%;
          background-color: #ED9B2D
      }
      /* ui design */
      @media (max-width:992px) {
      form#sub-admin-form {
          margin-left: 244px;
      }
    }
    @media(min-width:280px) and (max-width:767px) {
      textarea#description {
        width: 100%;
        height:40px !important;
      }
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
            <h1>Add Business</h1>
          </div>
          <div class="col-6 col-sm-6 text-right">
            <a href="{{url('Admin/view_business')}}"class="btn btn-primary back_btn">Back</a>
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
                          <label for="email">Select Business Type: <span class="text-danger">*</span></label><br>
                          <select name="business_type" id="business_type" class="form-control">
                          <option value="">Select Business Type</option>
                          @foreach($business_type as $value)
                          <option value="{{$value->business_type}}">{{$value->business_type}}</option>
                        @endforeach
                          </select>
                      </div>
                      </div>
                      <div class="col=lg-6 col-md-6 col-sm-12">
                        <div class="form-group">
                          <label for="email">Title: <span class="text-danger">*</span></label>
                          <input type="text" class="form-control" id="title" placeholder="Enter  Title" name="title">
                        </div> 
                      </div>
                    </div>

                    <div class="row">
                      <div class="col=lg-6 col-md-6 col-sm-12">
                         
                          <label >Description: <span class="text-danger">*</span></label>
                          <textarea  id="description" placeholder="Enter  Description" name="description" rows="4"   cols="65" ></textarea>
                         
                      </div>
                      <div class="col-md-6 col-sm-12">
                          <div class="form-group">
                          <label for="pwd">Address: <span class="text-danger">*</span></label>
                          <textarea  id="address" placeholder="Enter  Address" name="address" rows="4"   cols="65" ></textarea>
                          <!-- <input type="text" class="form-control" id="address" placeholder="Enter  Address"  name="address"> -->
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col=lg-6 col-md-6 col-sm-12">
                        <div class="form-group">
                          <label for="city">City:</label>
                          
                          <select name="city" id="city" class="form-control">
                            <option value="">Select City</option>
                            @foreach($cities as $name)
                            <option value="{{$name->city}}">{{$name->city}}</option>
                            @endforeach
                          </select>
                        </div> 
                      </div>
                      <div class="col=lg-6 col-md-6 col-sm-12">
                        <div class="form-group">
                          <label for="phone_number">Phone Number:</label>
                          <input type="text" class="form-control" id="phone_number" placeholder="Enter Phone Number" onkeypress="return isNumber(event)" name="phone_number" maxlength="10">
                        </div> 
                      </div>
                    </div>

                  
                    </div>

	              <div class="card-footer text-center">                          
			            <button type="submit" class="btn btn-primary" style="margin-left: 20px;">Add Business</button>
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

  </div>


  <!-- Page specific script -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <script type="text/javascript">

$('#city').select2({
      placeholder:'Select City',
      minimumResultsForSearch:1,
    });

    function isNumber(evt) {
      evt = (evt) ? evt : window.event;
      var charCode = (evt.which) ? evt.which : evt.keyCode;
      if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
      }
      return true;
    }

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
  
    $('#sub-admin-form').on('submit', function(event){
        event.preventDefault();
        var spinner = $('#loader');
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
          url: "{{url('Admin/savebusiness')}}",
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
                  'Business Added!',
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
  </script>
@endsection
