@extends('Admin.layouts.App')
@section('business','menu-open')
@section('view_business','active')


  <!-- Content Wrapper. Contains page content -->
  @section('main_section')
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <style>
     a.btn.btn-primary.back_btn{
        background-color:#ED9B2D;
        color:black;
      }
    .card-footer{
      background-color:white !important;
    }
      button#submitForm {
          width: 22%;
          background-color: #ED9B2D;
          color:black;
      }
    @media(min-width:280px) and (max-width:767px) {
      button#submitForm {
        width: 22%;
      }
    }
    th{
    color:#0b528f !important;
    font-size: 0.9rem;
    text-align: center !important;
  }
  </style>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>View Business Type</h1>
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
              <form action="/Admin/saveservices" method="POST" enctype="multipart/form-data" id="form">
                @csrf
                <div class="card-body">
                
                  <div class="form-group">
                    <label for="exampleInputEmail1">Enter Business Type</label>
                    <input  type="text" name="business_type" class="form-control @error('business_type') is-invalid @enderror" id="service" placeholder="Enter Business type" required>
                    @error('business_type')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $errors->first('business_type') }}</strong>
                    </span>
                    @enderror
                  </div>
                
                </div>
                <!-- /.card-body -->
                <div class="card-footer text-center">
                  <button type="submit" class="btn btn-primary"  id="submitForm">Submit</button>
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
    <section class="content pb-5">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                <table id="Table_ID" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th >Id</th>
                    <th >Business Type</th>
                    
                    <th >Action</th>
                  </tr>
                  </thead>
                  <tbody style="font-size: 0.9rem;">
                   @foreach($business as $value)
                    <tr>
                      <td></td>
                    
                      <td>{{$value->business_type}}</td>
                     
                     
                      <td >
                        {{-- <a href="{{url('Admin/editservice')}}/{{$service->id}}"><i class="fa-solid fa-square-pen" style="font-size:25px;"></i></a> --}}
                        <a href="{{url('Admin/deletebusiness_type')}}/{{$value->id}}"><i class="fa-solid fa-trash-can" style="color:red; font-size:23px;" onclick="return confirm('Are you sure to delete this?')"></i></a>
                      
                     
                      </td>
                    </tr>
               @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
  
           
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
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
      var spinner = $('#loader');
            spinner.show();
    e.preventDefault();
    var data = new FormData(this);
   
      $.ajax({
          type: 'POST',
          url: '{{url('Admin/savebusiness_type')}}',
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
                'Business Type Added!',
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
    $(document).ready( function () {
      // alert('hh');
      var t = $('#Table_ID').DataTable({
          columnDefs: [
              {
                  searchable: false,
                  orderable: false,
                  targets: 0,
              },
          ],
          order: [[0, 'desc']],
      });
   
      t.on('order.dt search.dt', function () {
          let i = 1;
   
          t.cells(null, 0, { search: 'applied', order: 'applied' }).every(function (cell) {
              this.data(i++);
          });
      }).draw();
    } );
    </script>
@endsection
