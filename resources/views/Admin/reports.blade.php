@extends('Admin.layouts.App')
@section('reports','menu-open')
@section('addreports','active')
<style>
  /* .main-footer {
    padding-top: 30px !important;
  } */
  section.content {
    background-color:#F5DDBD;
  } 
  img#profile_image {
      width: 107%;
  }
  a.btn.btn-primary.back_btn{
    background-color:#ED9B2D;
    color:black;
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
  i.fa-solid.fa-trash-can{
  margin-left: 5px;
  }
  table#Table_ID {
      font-size: 14.5px;
  }
  th{
    color:#0b528f !important;
      font-size: 0.9rem;
      text-align: center !important;
    }
    div#Table_ID_filter {
      margin-top: 0px !important;
      margin-bottom: 12px;
  }
  tr{
    text-align:center;
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
            <h1>View Reports</h1>
          </div>
          <div class="col-6 col-sm-6 text-right">
            <a href="{{url('Admin/dashboard')}}"class="btn btn-primary back_btn">Back</a>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    
    <!-- Main content -->
    <section class="content pb-5">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">

              
              <!-- /.card-header -->
              <div class="card-body">
        
                <div class="row" style="margin-bottom: 10px;">
                  <div class="col-md-2">
                    <label   for="exampleInputEmail1" class="form-label ">Start Date</label> 
                    <input type="date" name="from_date" id="from_date" class="form-control" placeholder="From Date"/>
                </div>
                <div class="col-md-2">
                    <label   for="exampleInputEmail1" class="form-label ">End Date</label> 
                    <input type="date" name="to_date" id="to_date" class="form-control" placeholder="To Date"  />
                </div>
                <div class="col-md-2" style="margin-top: 34px;">
                     
                  <button type="button" name="filter" id="filter_date" class="btn btn-danger">Filter</button>
                   <button type="button" name="refresh" id="refresh" class="btn btn-success">Clear</button> 
              </div>
              <div class="col-md-2"></div>
              <div class="col-md-2">
                <label   for="exampleInputEmail1" class="form-label ">Filter by (Day)</label> 
                <select data-coloum="0" class="form-control filter-select" name="range" id="range">
                   
                   <option value=''>All</option>
                   <option value='today'>Today</option>
                   <option value='yesterday'>Yesterday </option>
                   <option value='weekly'>Weekly </option>
                   <option value='monthly'>Monthly </option>
                </select>
              </div>
              <div class="col-md-2">
                <label   for="exampleInputEmail1" class="form-label ">Filter by (Category)</label> 
                <select data-coloum="0" class="form-control filter-select" name="category" id="category">
                  
                   <option value=''>All</option>
                   <option value="Hospital">Hospital</option>
                   <option value="Clinic">Clinic</option>
                   <option value="Laboratory">Laboratory</option>
                   <option value="Medicalstore">Medical Stores</option>
                </select>
              </div>
                </div>

                <div class="table-responsive"> 
                  {{-- <a href="{{url('Admin/cardholder')}}" class="btn btn-primary" style="float:right;">Add CardHolder</a><br><br> --}}
                  {{-- <a href="{{url('Admin/newcardholder')}}" class="btn btn-primary" style="float:right;">Add NewCardHolder</a><br><br> --}}
                <table id="Table_ID" class="table table-responsive-sm table table-bordered table-hover" >
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Id</th>
                    <th>Sewapartner Name</th>  
                    <th>Category</th>                   
                    <th>Description</th>                  
                    <th>Charges</th>
                    {{-- <th>Profile Picture</th> --}}
                   
                    <th>Discount</th>
                   
                    <th>Amount</th>
                    <th>Date</th>
                   
                  </tr>
                  </thead>
                  <tbody style="font-size: 0.9rem;">
                  
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
<!-- Page specific script -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.colVis.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/2.1.24/daterangepicker.js"></script>
{{-- <script>
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
</script> --}}
  <script>
    var table = $('#Table_ID').DataTable({
        processing: true,
        serverSide: true,
        bDestroy:true,
        stateSave:true,
        ajax: {
          url: "{{ url('Admin/reports') }}",
          data: function (d) {
                d.from_date=$('#from_date').val(),
                d.to_date=$('#to_date').val(),
                d.range=$('#range').val(),
                d.category=$('#category').val()
            }
        },
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
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex',orderable: true, searchable: false},
      
            {data: 'sewapartner_id', name: 'sewapartner_id'},
            {data: 'name', name: 'name'},
            {data: 'sewapartner_category', name: 'sewapartner_category'},
            {data: 'description', name: 'description'},
            
            {
              data: function data(row) {
                if(row.charges) {
                  return '<span>Rs.'+row.charges+'</span>'
                } else {
                  return '';
                }
              },
              name: 'charges'
            },

            {
              data: function data(row) {
                if(row.discount) {
                  return '<span>Rs.'+row.discount+'</span>'
                } else {
                  return '';
                }
              },
              name: 'discount'
            },
           
            {
              data: function data(row) {
                if(row.balance) {
                  return '<span>Rs.'+row.balance+'</span>'
                } else {
                  return '';
                }
              },
              name: 'balance'
            },

            {data: 'created_at', name: 'created_at'},
          
        ],
        order: [ [1, 'desc'] ]
    });
        
         $('#filter_date').click(function(){
              var id=$(this).val();
              table.draw();
          });
          $('#refresh').click(function(){
            $('#from_date').val('');
            $('#to_date').val('');
              table.draw();
          });
          $('#range').change(function(){
           
              var id=$(this).val();
              table.draw();
          });
          $('#category').change(function(){
           
              var id=$(this).val();
              // alert(id);
              table.draw();
          });


          table.on('draw.dt', function() {
           
      

   
        });
    
//   setInterval( function () {
//     table.ajax.reload(null, false);
// }, 15000 );
  
        </script>
   <script> 
    
     function show(id) {
      
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


