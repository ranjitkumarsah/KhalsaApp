@extends('Admin.layouts.App')
@section('reports','menu-open')
@section('addinvoices','active')
<style>
  section.content {
    background-color: #F5DDBD;
  } 
  a.btn.btn-primary.back_btn{
    background-color:#ED9B2D;
    color:black;
  }
  #active{
    border: none;color: blue;font-size: 22px;
  }
  #inactive{
    border: none;color: red;font-size: 22px;
  }
 div#Table_ID_filter {
    margin-top: 10px;
}
@media(min-width:280px) and (max-width:767px) {
    .table-responsive-sm {
    display: block;
    width: 100%;
    overflow-x: auto;
    -webkit-overflow-scrolling: touch;
    }
    table#Table_ID {
        overflow-x: scroll;
    }
    div#Table_ID_wrapper {
        overflow-y: scroll;
    }
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
            <h1>{{$name}}</h1>
          </div>
          <div class="col-6 col-sm-6 text-right">
            <a href="{{url('Admin/dashboard')}}"class="btn btn-primary back_btn">Back</a>
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
                {{-- <a href="{{url('Admin/doctor')}}" class="btn btn-primary" style="float:right;">Add Doctors</a><br><br> --}}
                <table id="Table_ID" class="table table-responsive-sm table table-bordered table-hover" >
                  <thead>
                  <tr>
                    <th>#</th>
                  
                    <th>Cardholder Id</th>
                    <th>Doctor Name</th>
                    <th>Description</th>
                    <th>Charges</th>                  
                    <th>Discount</th>                   
                    <th>Amount</th>
                    <th>Date</th>
                  </tr>
                  </thead>
                  <tbody style="font-size: 0.9rem;">
                    
                    @foreach ($data as $value)
                    <tr>
                    <td></td> 
                  
                    <td>{{$value->cardholder_id}}</td>
                    <td>{{$value->doctor_name}}</td>
                    <td>{{$value->description}}</td>
                    <td>{{$value->charges}}</td>      
                    <td>{{$value->discount}}</td>                    
                    <td>{{$value->balance}}</td>    
                    <td>{{$value->created_at}}</td>  
                    {{-- <td><a href="{{url('Admin/doctorinvoice_details')}}/{{$value->sewapartner_id}}/{{$value->doctor_name}}">Details</td>                   --}}
                  
                     
                      
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
  <!-- <footer class="main-footer">
    <strong>Copyright &copy; 2022 <a href="https://protolabzit.com/" target="_blank">Protolabz eServices</a>.</strong>
    All rights reserved.
    {{-- <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.2.0-rc
    </div> --}}
  </footer> -->

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


