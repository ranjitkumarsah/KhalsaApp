@extends('Admin.layouts.App')
@section('card','menu-open')
@section('viewcardholder','active')
<style>
  table.dataTable tbody th, table.dataTable tbody td {
    padding: 8px 10px;
    border: 1px solid black;
  }
  table.dataTable.no-footer {
    border-bottom: 1px solid #111;
    border: 1px solid black;
  }
  table.dataTable.no-footer th{
      border: 1px solid black;
	}
  #active{
    border: none;color: blue;font-size: 22px;
  }
  #inactive{
    border: none;color: red;font-size: 22px;
  }
  th{
    color:#0b528f !important;
    font-size: 0.9rem;
    text-align: center !important;
  }
</style>
  <!-- Content Wrapper. Contains page content -->
  @section('main_section')
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Manage Children Details</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                <a href="{{url('Admin/add_cardchildren')}}/{{$id}}" class="btn btn-primary" style="float:right;">Add CardHolderChildren</a><br><br>
                <table id="Table_ID" class="table table-responsive-sm table-striped table-bordered table-hover dataTable no-footer" >
                  <thead>
                  <tr>
                  <th style="width: 15px;">Id</th>
                    <th style="width: 15px;">Card Id</th>                     
                    <th style="width: 15px;">Name</th>                     
                    <th style="width: 15px;">Amritdhari</th>                  
                    <th style="width: 70px;">Age</th>
                    <th style="width: 70px;">Aadhaar Number</th>
                    <th style="width: 70px;">Qualification</th>
                    <th style="width: 70px;">School Name</th>
                    <th style="width: 70px;">Fees</th>
                    <th style="width: 70px;">Relation</th>
                    <th style="width: 70px;">Action</th>
                  </tr>
                  </thead>
                  <tbody style="font-size: 0.9rem;">
                  <?php $i=1; ?>
                    @foreach ($childrendata as $data)
                    <tr>
                    <td>{{$i++}}</td> 
                      <td>{{$data->card_id}}</td>                    
                      <td>{{$data->cname}}</td>                    
                      <td>{{$data->camritdhari}}</td>                     
                      <td>{{$data->cage}}</td>
                      <td>{{$data->caadhaar}}</td>
                      <td>{{$data->cqualification}}</td>
                      <td>{{$data->cschool}}</td>
                      <td>{{$data->cfees}}</td>
                      <td>{{$data->crelation}}</td>
                      <td>
                        <a href="{{url('Admin/editcardholderchild')}}/{{$data->id}}"><i class="fa-solid fa-square-pen" style="font-size:25px;"></i></a>
                        <a href="{{url('Admin/deletecardholderchild',$data->id)}}"><i class="fa-solid fa-trash-can" style="color:red; font-size:23px;" onclick="return confirm('Are you sure to delete this?')"></i></a>
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

<!-- DataTables  & Plugins -->

<!-- AdminLTE App -->
<
<!-- Page specific script -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
  $(document).ready( function () {
    // alert('hh');
    var t = $('#Table_ID').DataTable({
        // columnDefs: [
        //     {
        //         searchable: false,
        //         orderable: false,
        //         targets: 0,
        //     },
        // ],
        // order: [[0, 'desc']],
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
    });
 
    // t.on('order.dt search.dt', function () {
    //     let i = 1;
 
    //     t.cells(null, 0, { search: 'applied', order: 'applied' }).every(function (cell) {
    //         this.data(i++);
    //     });
    // }).draw();
    
  } );
  </script>
   <script> 
    
     function show(id) {
        //  alert(id);
         $.ajax({
             type: "Get",
             url:"{{url('Admin/change_status_customer')}}",
             data: {customer_id:id },
             success: function(data) {              
              
                   location.reload();
             }
         });
       }  
   </script>
@endsection


