@extends('Admin.layouts.App')
@section('doctors','menu-open')
@section('viewdoctor','active')

  <!-- Content Wrapper. Contains page content -->
  @section('main_section')
  <style>
      a.btn.btn-primary.back_btn{
        background-color:#ED9B2D;
        color:black;
      }
    button#submitForm{
      width:22%;
      background-color:#ED9B2D !important;
      color:black;
    }
    @media (max-width:992px) {
     form#form {
     margin-left: 243px;
     }
    }
    @media(min-width:280px) and (max-width:767px) {
     form#form{
           margin-left: 0px !important;
         }
         .card-body {
    width: 100% !important;
    }
    button#submitForm{
        width:65% !important;
      }
     }
     @media only screen   
     and (device-width: 375px) 
    and (device-height: 812px) 
   {
      button#submitForm{
        width:100% !important;
      }
    }
 </style>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Doctor</h1>
          </div>
          <div class="col-6 col-sm-6 text-right">
            <a href="{{url('Admin/view_doctor')}}"class="btn btn-primary back_btn">Back</a>
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
              <form action="/Admin/updatedoctor" method="POST" enctype="multipart/form-data" id="form">
                @csrf
                <div class="card-body">
                  <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="form-group">
                        <label for="name">Name <span class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" value="{{$doctor->name}}" onkeypress="return inputOnlyText(event)">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('name') }}</strong>
                        </span>
                        @enderror
                      </div>
                      <input type="hidden" name="doctor_id" class="form-control " id="doctor_id" value="{{$doctor->id}}">
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12">
                      <div class="form-group">
                        <label for="name">Qualification</label>
                        <input type="text" name="qualification" class="form-control @error('qualification') is-invalid @enderror" id="qualification" value="{{$doctor->qualification}}">
                        @error('qualification')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('qualification') }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="form-group">
                    <label for="name">Specialization</label>
                    <input type="text" name="specialization" class="form-control @error('specialization') is-invalid @enderror" id="specialization" value="{{$doctor->specialization}}">
                    @error('specialization')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $errors->first('specialization') }}</strong>
                    </span>
                    @enderror
                  </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer text-center">
                  <button type="submit" class="btn btn-primary"  id="submitForm">Update</button>
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
  $(document).ready(function() {
    $('.js-example-basic-multiple').select2();
    $('#form').on('submit', function (e) {
      // alert('hh');
    e.preventDefault();
    var spinner = $('#loader');
            spinner.show();
    var data = new FormData(this);
     id = $("#doctor_id").val();
      $.ajax({
          type: 'POST',
          url: '{{url('Admin/updatedoctor')}}' + '/' + id,
          dataType: 'json',
          data: data,  
          cache: false,
          contentType: false,
          processData: false,      
          success: function (data) {
            
            if(data.status == 1)
            {
              // location.reload();
              spinner.hide();
              Swal.fire(
                'Good job!',
                'Doctor Updated!',
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
          error: function (data) {
              // alert(data);
          }
      });
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


  </script>
@endsection
