@extends('Subadmin.layouts.App')
@section('business','menu-open')
@section('view_business','active')

  <!-- Content Wrapper. Contains page content -->
  @section('main_section')
  <style>
    textarea#description , textarea#address{
    width: 100%;
  }
    select#category {
      border: 1px solid #0b528f;
  }
  textarea#description, textarea#address {
      border: 1px solid #0b528f;
  }
    .card-footer{
      background-color:white !important;
    }
    a.btn.btn-primary.back_btn{
      background-color:#ED9B2D;
      color:black;
    }
    textarea#description , textarea#address{
      margin-top: 2px;
      height: 64px;
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
    textarea#description , textarea#address {
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
            <h1>Edit Business</h1>
          </div>
          <div class="col-6 col-sm-6 text-right">
            <a href="{{url('Subadmin/view_business')}}"class="btn btn-primary back_btn">Back</a>
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
            <div class="card card-primary">
            
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
                      
                      <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group">
                          <label for="email">Title:</label>
                          <input type="text" class="form-control" id="title"  name="title" value="{{$business->title}}">
                        </div> 
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group">
                          <label for="email">Business Type:</label><br>
                          <select name="business_type" id="business_type" class="form-control">
                            <option value="">Select Business Type</option>
                            @foreach($business_type as $value)
                              <option value="{{$value->business_type}}" {{$business->business_type == $value->business_type  ? 'selected' : ''}}>{{$value->business_type}}</option>
                            @endforeach
                          </select>
                          <!-- <input type="text" class="form-control" id="business_type"   name="business_type" value="{{$business->business_type}}"> -->
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group">
                          <label >Description:</label>
                          <textarea  id="description"  name="description" rows="4"   cols="65" >{{$business->description}}</textarea>
                          
                        </div>
                      </div>
                      <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                          <label for="pwd">Address:</label>
                          <textarea  id="address"  name="address" rows="4"   cols="65" >{{$business->address}}</textarea>
                          <!-- <input type="text" class="form-control" id="address" name="address" value="{{$business->address}}"> -->
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
                            <option value="{{$name->city}}" {{$business->city == $name->city  ? 'selected' : ''}}>{{$name->city}}</option>
                            @endforeach
                          </select>
                        </div> 
                      </div>
                      <div class="col=lg-6 col-md-6 col-sm-12">
                        <div class="form-group">
                          <label for="phone_number">Phone Number:</label>
                          <input type="text" class="form-control" id="phone_number" placeholder="Enter Phone Number" onkeypress="return isNumber(event)" name="phone_number" maxlength="10" value="{{$business->phone_number}}">
                        </div> 
                      </div>
                    </div>
                    <input type="hidden" class="form-control" id="business_id"  name="business_id" value="{{$business->id}}">
                  </div>

	             <div class="card-footer text-center">                          
			 <button type="submit" class="btn btn-primary" style="margin-left: 20px;">Edit Business</button>
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
 
  $('#sub-admin-form').on('submit', function(event){
      event.preventDefault();
      var spinner = $('#loader');
            spinner.show();
     const fd = $('#sub-admin-form').serialize();
   var id = $("#business_id").val();
     $.ajax({
       type: "POST",
        url: "{{url('Subadmin/updatebusiness')}}" + '/' + id,
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
                'Business Updated!',
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
