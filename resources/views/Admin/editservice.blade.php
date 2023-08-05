@extends('Admin.layouts.App')
@section('services','menu-open')
@section('viewservices','active')


  <!-- Content Wrapper. Contains page content -->
  @section('main_section')
  <style>
    a.btn.btn-primary.back_btn {
        background-color: #ED9B2D;
        color: black;
    }
  </style>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Services</h1>
          </div>
          <div class="col-sm-6 text-right">
              <a href="{{url('Admin/services')}}" class="btn btn-primary back_btn">Back</a>
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
              <form action="/Admin/updateservice" method="POST" enctype="multipart/form-data" id="form">
                @csrf
                <div class="card-body">
                
                  <div class="form-group">
                    <label for="exampleInputEmail1">Enter Service <span class="text-danger">*</span></label>
                    <input  type="text" name="service" class="form-control @error('service') is-invalid @enderror" id="service" placeholder="Enter Service" value="{{$service->service}}" required>
                    @error('service')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $errors->first('service') }}</strong>
                    </span>
                    @enderror
                  </div>
                  <input  type="hidden" name="service_id" class="form-control" id="service_id"  value="{{$service->id}}">
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
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
  
    $('#form').on('submit', function (e) {
      // alert('hh');
    e.preventDefault();
    var spinner = $('#loader');
            spinner.show();
    var data = new FormData(this);
    id = $("#service_id").val();
      $.ajax({
          type: 'POST',
          url: '{{url('Admin/updateservice')}}' + '/' + id,
          dataType: 'json',
          data: data,  
          cache: false,
          contentType: false,
          processData: false,      
          success: function (data) {
            
            if(data.status == 1)
            {
              spinner.hide();
              // location.reload();
              Swal.fire(
                'Good job!',
                'Service Updated!',
                'success'
              )
              location.reload();
            }
            if(data.status == 2)
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
  </script>
  <script>
    location.href = location.href
location.replace(location.{{url('Admin/services')}})
window.location = window.location
window.self.window.self.window.window.location = window.location
    </script>
@endsection
