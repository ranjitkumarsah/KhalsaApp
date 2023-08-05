@extends('Subadmin.layouts.App')
@section('services','menu-open')
@section('addservices','active')


  <!-- Content Wrapper. Contains page content -->
  @section('main_section')
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <style>
    .form-group{
      display:flex;
    }
     a.btn.btn-primary.back_btn{
        background-color:#ED9B2D;
        color:black;
      }
    .card-footer{
      background-color:white !important;
    }
      button#submitForm {
          /* width: 22%; */
          background-color: #ED9B2D;
          color:black;
          margin-top: 31px;
      }
    @media(min-width:280px) and (max-width:767px) {
      button#submitForm {
        /* width: 22%; */
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
            <h1>View Services</h1>
          </div>
          <div class="col-6 col-sm-6 text-right">
            <a href="{{url('Subadmin/dashboard')}}"class="btn btn-primary back_btn">Back</a>
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
              <form action="/Subadmin/saveservices" method="POST" enctype="multipart/form-data" id="form">
                @csrf
                <div class="card-body">
                
                  <div class="form-group">
                    <div class="col-md-8">
                        <label for="exampleInputEmail1">Enter Service</label>
                        <input  type="text" name="service" class="form-control @error('service') is-invalid @enderror" id="service" placeholder="Enter Service" required>
                        @error('service')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('service') }}</strong>
                        </span>
                        @enderror
                    </div>
                  
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-primary"  id="submitForm">Add Service</button>
                    </div>
                    <!-- <label for="exampleInputEmail1">Enter Service</label>
                    <input  type="text" name="service" class="form-control @error('service') is-invalid @enderror" id="service" placeholder="Enter Service" required>
                    @error('service')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $errors->first('service') }}</strong>
                    </span>
                    @enderror -->
                  </div>
                
                </div>
                <!-- /.card-body -->
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
                    <th >Service Name</th>
                    <th >Date</th>
                    <th >Action</th>
                  </tr>
                  </thead>
                  <tbody style="font-size: 0.9rem;">
                  <?php $i=1; ?>
                   @foreach($services as $service)
                   <tr style="text-align: center;">
                      <td>{{$i++}}</td>
                    
                      <td>{{$service->service}}</td>
                     
                      <td>{{$service->created_at}}</td>
                      <td >
                        <a href="{{url('Subadmin/editservice')}}/{{$service->id}}"><i class="fa-solid fa-square-pen" style="font-size:25px;"></i></a>
                        <a href="{{url('Subadmin/deleteservice')}}/{{$service->id}}"><i class="fa-solid fa-trash-can" style="color:red; font-size:23px;" onclick="return confirm('Are you sure to delete this?')"></i></a>
                      
                     
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
    e.preventDefault();
    var spinner = $('#loader');
            spinner.show();
    var data = new FormData(this);
   
      $.ajax({
          type: 'POST',
          url: '{{url('Subadmin/saveservices')}}',
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
                'Services Added!',
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
      var dataSrc = [];
      var t = $('#Table_ID').DataTable({
        stateSave: true,
        'initComplete': function(){
         var api = this.api();

         // Populate a dataset for autocomplete functionality
         // using data from first, second and third columns
         api.cells('tr', [0, 1, 2]).every(function(){
            // Get cell data as plain text
            var data = $('<div>').html(this.data()).text();           
            if(dataSrc.indexOf(data) === -1){ dataSrc.push(data); }
         });
         
         // Sort dataset alphabetically
         dataSrc.sort();
        
         // Initialize Typeahead plug-in
         $('.dataTables_filter input[type="search"]', api.table().container())
            .typeahead({
               source: dataSrc,
               afterSelect: function(value){
                  api.search(value).draw();
               }
            }
         );
      },
          columnDefs: [
              // {
              //     searchable: false,
              //     orderable: false,
              //     targets: 0,
              // },
          ],
          dom: 'Bfrtip',
          buttons: [
            {
              extend: 'excelHtml5',
              exportOptions: {
                columns: ':visible'
              }
            },
            {
              extend: 'pdfHtml5',
              exportOptions: {
                columns: ':visible'
              }
            },
            {
              extend: 'print',
              exportOptions: {
                columns: ':visible'
              }
            },
            'colvis',
          ],
          // order: [[0, 'desc']],
      });
   
      // t.on('order.dt search.dt', function () {
      //     let i = 1;
   
      //     t.cells(null, 0, { search: 'applied', order: 'applied' }).every(function (cell) {
      //         this.data(i++);
      //     });
      // }).draw();
    } );
  </script>
@endsection
