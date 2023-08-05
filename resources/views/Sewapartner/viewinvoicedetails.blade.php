@extends('Sewapartner.layouts.App')
@section('card','menu-open')
@section('viewconsultation','active')
<style>
  th{
    color:#0b528f !important;
    font-size: 0.9rem;
    text-align: center !important;
  }
  button#submitForm {
    background-color: #f39118;
    width: 22%;
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
          div#Table_ID_wrapper {
              overflow-y: scroll;
          }
          table#Table_ID{
          margin-left: 0px !important;
        }
        }
   @media (max-width:992px) {
    table#Table_ID {
        margin-left: 224px;
    }
    .col-sm-6{ 
    margin: 0px auto;
    }
    .content-header h1 {
        font-size: 20px;
        margin-left: 37px !important;
    }
   }
  @media screen and (max-width: 600px) {
    h1 {
    font-size: 30px;
}
  }

   @media only screen and (max-width: 414px) {
    h1 {
        font-size: 18px !important;
    }
    .card{
      box-shadow:none !important;
    }
  }

  #active{
    border: none;color: blue;font-size: 22px;
  }
  #inactive{
    border: none;color: red;font-size: 22px;
  }
  #verify{
    border: none;color: blue;font-size: 22px;
  }
  #unverify{
    border: none;color: red;font-size: 22px;
  }
  table {
  border-collapse: collapse;
  border-spacing: 0;
  width: 100%;
  border: 1px solid #ddd;
}

th, td {
  text-align: left;
  padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}
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
            <h1>View Invoice</h1>
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
                <div class="table-responsive"> 
                  <a href="{{url('Sewapartner/viewinvoicedetails')}}" class="btn btn-primary" style="float:right;">Create new Invoice</a><br><br>
                <table id="Table_ID" class="table table-responsive-sm table table-bordered table-hover" >
                  <thead>
                  <tr>
                    <th style="width: 15px;">#</th>
                    <th style="width: 15px;">Cardholder Id</th>
                    <th style="width: 15px;">Name</th>
                    @if($sewapartner->categories == 'Hospital')                                 
                    <th style="width: 70px;">Consulted By</th>
                    @endif
                    <th style="width: 70px;">Description</th>
                    <th style="width: 70px;">Charges</th>
                    <th style="width: 70px;">Discount</th>
                    <th style="width: 70px;">Total Due</th>
                    <th style="width: 70px;">Date</th>
                    <th style="width: 70px;">Invoice</th>
                  </tr>
                  </thead>
                  <tbody style="font-size: 0.9rem;">
                  <?php $i=1; ?>
                    @foreach ($data as $value)
                    <tr>
                      <td>{{$i++}}</td> 
                      <td>{{$value->cardholder_id}}</td>  
                      <td>{{$value->name}}</td>
                      @if($sewapartner->categories == 'Hospital')                 
                      <td>{{$value->doctor_name}}</td>  
                      @endif                   
                      <td>{{$value->description}}</td>                     
                      <td>@if($value->charges)Rs.{{$value->charges}}@endif</td>                     
                      <td>@if($value->discount)Rs.{{$value->discount}}@endif</td>                     
                      <td>@if($value->balance)Rs.{{$value->balance}}@endif</td> 
                      <td>{{$value->created_at}}</td>
                      <td><a href="{{url('Sewapartner/reprint')}}/{{$value->id}}">Reprint</a></td>                                 
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
      </div>
      <!-- /.container-fluid -->
    </section>
    <section class="content">
    <div class="card">
        <div class="container-fluid">

        </div>
    </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2022 <a href="https://protolabzit.com/" target="_blank">Protolabz eServices</a>.</strong>
    All rights reserved.
    {{-- <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.2.0-rc
    </div> --}}
  </footer>

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
             url:"{{url('Admin/change_active_status')}}",
             data: {cardholder_id:id },
             success: function(data) {              
                   location.reload();
             }
         });
       }  
   </script>
     <script> 
    
      function verify(id) {
         //  alert(id);
          $.ajax({
              type: "Get",
              url:"{{url('Admin/change_verify_status')}}",
              data: {cardholder_id:id },
              success: function(data) {              
                    location.reload();
              }
          });
        }  
    </script>
@endsection


