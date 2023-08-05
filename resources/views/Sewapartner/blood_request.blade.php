@extends('Sewapartner.layouts.App')
@section('blood_request','menu-open')
@section('blood_request','active')

  <!-- Content Wrapper. Contains page content -->
  @section('main_section')
  <style>
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
      height: 37px;
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
            <h1>Add Blood Request</h1>
          </div>
          <div class="col-6 col-sm-6 text-right">
            <a href="{{url('Sewapartner/dashboard')}}"class="btn btn-primary back_btn">Back</a>
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
                    <div class="form-group">
                      <label for="email">Patient Name:</label>
                      <input type="text" class="form-control" id="title" placeholder="Enter  Name" name="name">
                    </div>  
                    <div class="form-group">
                      <label >Address:</label>
                      <input type="text" class="form-control" id="address" placeholder="Enter  Address" name="address">
                    </div> 
                    <div class="form-group">
                      <label >Hospital Name:</label>
                      <input type="text" class="form-control" id="hospital_name" placeholder="Hospital Name" name="hospital_name">
                    </div> 
                    <div class="form-group">
                      <label for="email">Select Blood Group:</label><br>
                      <select name="blood_group" id="blood_group" style="width: 100%;height: 37px;">
                      <option value="">Select</option>
                      <option value="A+">A+</option>
                      <option value="O+">O+</option>
                      <option value="B+">B+</option>
                      <option value="AB+">AB+</option>
                      <option value="A-">A-</option>
                      <option value="O-">O-</option>
                      <option value="B-">B-</option>
                      <option value="AB-">AB-</option>
                      </select>
                    </div> 
                    <div class="form-group">
                      <label > Attendant Mobile Number (Patient Care):</label>
                      <input type="number" class="form-control" id="contact_number" placeholder="Enter  Contact Number" name="contact_number">
                    </div> 
                    <div class="form-group">
                      <label > Requirement Detail:</label>
                      <input type="text" class="form-control" id="requirement_details" placeholder="Enter Requirement Detail" name="requirement_details">
                    </div> 
                    {{-- <div class="row">
                      <div class="col=lg-6 col-md-6 col-sm-12">
                        <div class="form-group">
                          <label for="email">Patient Name:</label>
                          <input type="text" class="form-control" id="title" placeholder="Enter  Name" name="name">
                        </div> 
                      </div>
                     
                      <div class="col=lg-6 col-md-6 col-sm-12">                         
                        <label >Address:</label>
                        <input type="text" class="form-control" id="address" placeholder="Enter  Address" name="address">                      
                       
                      </div>                     
                      </div>

                      <div class="row">
                        <div class="col=lg-6 col-md-6 col-sm-12">
                          
                            <label >Hospital Name:</label>
                            <input type="text" class="form-control" id="hospital_name" placeholder="Hospital Name" name="hospital_name">
                          
                        </div>
                        <div class="col=lg-6 col-md-6 col-sm-12">
                          <div class="form-group">
                            <label for="email">Select Blood Group:</label><br>
                            <select name="blood_group" id="blood_group" style="width: 100%;height: 37px;">
                            <option value="">Select</option>
                            <option value="A+">A+</option>
                            <option value="O+">O+</option>
                            <option value="B+">B+</option>
                            <option value="AB+">AB+</option>
                            <option value="A-">A-</option>
                            <option value="O-">O-</option>
                            <option value="B-">B-</option>
                            <option value="AB-">AB-</option>
                            </select>
                        </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col=lg-6 col-md-6 col-sm-12">
                          
                            <label > Attendant Mobile Number (Patient Care):</label>
                            <input type="number" class="form-control" id="contact_number" placeholder="Enter  Contact Number" name="contact_number">
                          
                        </div>
                        <div class="col=lg-6 col-md-6 col-sm-12">
                          
                          <label > Requirement Detail:</label>
                          <input type="text" class="form-control" id="requirement_details" placeholder="Enter Requirement Detail" name="requirement_details">
                        
                      </div>
                      
                    </div> --}}

                  
                    </div>

	             <div class="card-footer text-center">                          
			 <button type="submit" class="btn btn-primary" style="margin-left: 20px;">Send</button>
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
    
     $.ajax({
       type: "POST",
        url: "{{url('Sewapartner/saveblood_request')}}",
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
              spinner.hide();
              // alert('hh');
              Swal.fire(
                'Good job!',
                'Blood Request Added!',
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
