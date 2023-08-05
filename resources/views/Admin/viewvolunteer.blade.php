@extends('Admin.layouts.App')
@section('volunteers','menu-open')
@section('viewvolunteers','active')
<style>
  section.content {
    background-color: #F5DDBD;
  } 
   a.btn.btn-primary.back_btn{
    background-color:#ED9B2D;
    color:black;
  }
   div#Table_ID_filter {
    margin-top: 10px;
  }
  #active{
    border: none;color: blue;font-size: 22px;
  }
  #inactive{
    border: none;color: red;font-size: 22px;
  }
  @media(min-width:280px) and (max-width:767px) {
    table#Table_ID {
        margin-left: 0px;
    }
    .table-responsive-sm {
    display: block;
    width: 100%;
    overflow-x: auto;
    -webkit-overflow-scrolling: touch;
    }
    div#Table_ID_wrapper {
        overflow-y: scroll;
    }
    table#Table_ID {
      margin-left: 0px !important;
    }
    .content-header h1 {
        font-size: 14px !important;
        margin-left: 37px !important;
    }
    .card{
        box-shadow:none !important;
    }
 
        }
   @media (max-width:992px) {
    table#Table_ID {
      margin-left: 223px;
  }
  .col-sm-6 {
    margin: 0px auto;
  }
  .content-header h1 {
          font-size: 15px;
          margin-left: 37px !important;
      }
  

   }
   th{
    color:#0b528f !important;
    font-size: 0.9rem;
    text-align: center !important;
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
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>View Volunteers</h1>
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
                <div class="row mb-4">
                  <div class="col-md-2">
                    <label   for="exampleInputEmail1" class="form-label ">Start Date</label> 
                    <input type="date" name="from_date" id="from_date" class="form-control" placeholder="From Date"/>
                  </div>
                  <div class="col-md-2">
                      <label   for="exampleInputEmail1" class="form-label ">End Date</label> 
                      <input type="date" name="to_date" id="to_date" class="form-control" placeholder="To Date"  />
                  </div>
                  <div class="col-md-2" style="margin-top: 32px;">
                      
                    <button type="button" name="filter" id="filter_date" class="btn btn-danger">Filter</button>
                    <button type="button" name="refresh" id="refresh" class="btn btn-success">Clear</button> 
                  </div>
             
                  <div class="col-md-2">
                    <label   for="exampleInputEmail1" class="form-label ">Filter by (Day)</label> 
                    <select data-coloum="0" class="form-control filter-select" name="range" id="range">
                        {{-- <option value=''>Select</option> --}}
                      <option value=''>All</option>
                      <option value='today'>Today</option>
                      <option value='yesterday'>Yesterday </option>
                      <option value='weekly'>Weekly </option>
                      <option value='monthly'>Monthly </option>
                    </select>
                  </div>
                  <div class="col-md-2"></div>
                  <div class="col-md-2">
                    <a href="{{url('Admin/volunteer')}}" class="btn btn-primary" style="float:right;margin-top: 32px;">Add Volunteer</a>
                  </div>
              
                </div>

                {{-- <a href="{{url('Admin/volunteer')}}" class="btn btn-primary" style="float:right;">Add Volunteer</a><br><br> --}}
                <table id="Table_ID" class="table table-responsive-sm table-striped table table-bordered table-hover" >
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Id</th>
                      <th>Name</th>                     
                      <th>Username</th>                  
                      <th>Contact Number</th>
                      <th>Profile Picture</th>
                      {{-- <th>Village/City</th> --}}
                      <!-- <th>Landmark</th> -->
                      <th>Address</th>
                      <th>Active</th>
                      <th>Download Card</th>
                      {{-- <th>Registered On</th> --}}
                      <th>Action</th>
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
    $(document).ready(function() {
      var dataSrc = [];
    var table = $('#Table_ID').DataTable({
      // 'initComplete': function(){
      //    var api = this.api();

      //    // Populate a dataset for autocomplete functionality
      //    // using data from first, second and third columns
      //    api.cells('tr', [0, 1, 2]).every(function(){
      //       // Get cell data as plain text
      //       var data = $('<div>').html(this.data()).text();           
      //       if(dataSrc.indexOf(data) === -1){ dataSrc.push(data); }
      //    });
         
      //    // Sort dataset alphabetically
      //    dataSrc.sort();
        
      //    // Initialize Typeahead plug-in
      //    $('.dataTables_filter input[type="search"]', api.table().container())
      //       .typeahead({
      //          source: dataSrc,
      //          afterSelect: function(value){
      //             api.search(value).draw();
      //          }
      //       }
      //    );
      // },
        processing: true,
        serverSide: true,
        bDestroy:true,
        stateSave:true,
        ajax: {
          url: "{{ url('Admin/view_volunteer') }}",
          data: function (d) {
                d.from_date=$('#from_date').val(),
                d.to_date=$('#to_date').val(),
                d.range=$('#range').val()
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
      
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
            {data: 'username', name: 'username'},
            {data: 'contact_number', name: 'contact_number'},
            {data: 'profile_pic', name: 'profile_pic'},
            {data: 'address', name: 'address'},
           
            {data: 'active', name: 'active'},
            {data: 'download_pdf', name: 'download_pdf'},
          
            {
                data: 'action', 
                name: 'action', 
                orderable: false, 
                searchable: false
            },
         
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


          table.on('draw.dt', function() {
           
      

   
        });

      });
 
        </script>
  <script> 
    
    function show(id) {
       //  alert(id);
        $.ajax({
            type: "Get",
            url:"{{url('Admin/change_volunteer_status')}}",
            data: {volunteer_id:id },
            success: function(data) {              
                  location.reload();
            }
        });
      }  
  </script>
@endsection


