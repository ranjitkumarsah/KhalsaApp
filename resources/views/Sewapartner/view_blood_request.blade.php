@extends('Sewapartner.layouts.App')
@section('blood_request','menu-open')
@section('blood_request','active')
<style>
    section.content {
      background:#F5DDBD;
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
      .col-md-2.status_class{
        margin-left:0px !important;
      }
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
    tr{
      text-align: center;
  }
  div#Table_ID_filter {
      margin-top: 0px !important;
      margin-bottom: 16px;
  }
</style>
  <!-- Content Wrapper. Contains page content -->
  @section('main_section')
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <?php $segment =request()->segment(count(request()->segments())) ?>
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            @if($segment =='pending_blood_request')
              <h1>Pending Blood Request</h1>
            @else 
              <h1>View Blood Request</h1>
            @endif
          </div>
          <div class="col-6 col-sm-6 text-right">
            <a href="{{url('Subadmin/dashboard')}}"class="btn btn-primary back_btn">Back</a>
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
                <div class="row">         
                    <div class="col-sm-6">
                        @if($segment =='pending_blood_request')
                            <input type="hidden" class="form-control filter-select" name="status" id="status" value="Pending" >
                        @else 
                            <div class="col-sm-6 status_class" style="margin-bottom: 15px;">
                            <label   for="exampleInputEmail1" class="form-label ">Filter by (Request Status)</label> 
                            <select data-coloum="0" class="form-control filter-select" name="status" id="status">
                                
                                <option value=''>All </option>
                                <option  value='Pending'>Pending</option>
                                <option value='Fulfilled'>Fulfilled</option>
                            </select>
                            </div>
                        @endif
                    </div>
                    <div class="col-sm-6">
                        <a href="{{url('Sewapartner/add_blood_request')}}" class="btn btn-primary mt-3" style="float:right;">Add Blood Request</a>
                    </div>
                  
                </div>
                {{-- <a href="{{url('Admin/notifications')}}" class="btn btn-primary" style="float:right;">Add Notifications</a><br><br>  --}}
                <table id="Table_ID" class="table table-responsive-sm table table-bordered table-hover" >
                  <thead>
                  <tr>
                    <th style="width: 15px;">#</th>
                    {{-- <th style="width: 15px;">Cardholder Id</th> --}}
                    <th style="width: 15px;">Name</th>  
                    <th style="width: 15px;">Contact</th>
                    <th style="width: 15px;">Hospital Name</th>  
                    <th style="width: 70px;">Hospital Address</th>                   
                   
                    <th style="width: 15px;">Blood Group</th>
                    <th style="width: 15px;">Requirement Detail</th>
                    <!-- <th style="width: 15px;">Request Status</th>  -->
                    <th style="width: 15px;">Request Fulfill/Pending</th> 
                    <th style="width: 70px;">Date</th>                  
                  
                   
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
    $(document).ready( function () {
      // alert('hh');
    var table = $('#Table_ID').DataTable({
        processing: true,
        serverSide: true,
        bDestroy:true,
        stateSave:true,
        ajax: {
          url: "{{ url('Sewapartner/blood_request') }}",
          data: function (d) {
              
                d.status=$('#status').val()
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
      
            // {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
            {data: 'contact_number', name: 'contact_number'},
            {data: 'hospital_name', name: 'hospital_name'},
            {data: 'address', name: 'address'},
            {data: 'blood_group', name: 'blood_group'},
            {data: 'requirement_details', name: 'requirement_details'},
           
            // {data: 'active', name: 'active'},
            {data: 'status', name: 'status'},
            {data: 'created_at', name: 'created_at'},
            // {
            //     data: 'action', 
            //     name: 'action', 
            //     orderable: false, 
            //     searchable: false
            // },
        ],
        order: [ [0, 'desc'] ]
    });
        
         
          $('#status').change(function(){
              var id=$(this).val();
              // alert(id);
              table.draw();
          });


          table.on('draw.dt', function() {
           
      

   
        });
      });
//   setInterval( function () {
//     table.ajax.reload(null, false);
// }, 15000 );
  
        </script>
  <script> 
    
    function show(id) {
       //  alert(id);
        $.ajax({
            type: "Get",
            url:"{{url('Admin/blood_status')}}",
            data: {blood_id:id },
            success: function(data) {              
                  location.reload();
            }
        });
      }  
  </script>
@endsection


