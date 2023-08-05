@extends('Subadmin.layouts.App')
@section('blood_donor','menu-open')
@section('viewblood_donor','active')
<style>
  a.btn.btn-primary.back_btn{
    background-color:#ED9B2D;
    color:black;
  }
  section.content {
    background:#F5DDBD;
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
  tr{
    text-align: center;
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
            <h1>View Blood Donor</h1>
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
           
          
                  <div class="col-md-3 category_class" style="margin-bottom: 20px;">
                    <label   for="exampleInputEmail1" class="form-label ">Filter by (Blood Group)</label> 
                    <select data-coloum="0" class="form-control filter-select" name="blood_group" id="blood_group">
                       
                       <option value=''>All </option>
                       <option value="A+">A+</option>
                       <option value="A-">A-</option>  
                       <option value="O+">O+</option>
                       <option value="O-">O-</option>
                       <option value="B-">B+</option>         
                       <option value="B+">B-</option>
                       <option value="AB+">AB+</option>
                       <option value="AB-">AB-</option>      
                    </select>
                    </div>
                    </div>
                {{-- <a href="{{url('Subadmin/notifications')}}" class="btn btn-primary" style="float:right;">Add Notifications</a><br><br>  --}}
                <table id="Table_ID" class="table table-responsive-sm table table-bordered table-hover" >
                  <thead>
                  <tr>
                    <th style="width: 15px;">#</th>
                    <th style="width: 15px;">Cardholder Id</th>
                    <th style="width: 15px;">Name</th>  
                    <th style="width: 70px;">Contact Number</th>                   
                    <th style="width: 15px;">Address</th> 
                    <th style="width: 15px;">Blood Group</th>
                    <th style="width: 15px;">Date</th>                   
                  
                   
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
    var table = $('#Table_ID').DataTable({
        processing: true,
        serverSide: true,
        bDestroy:true,
        stateSave:true,
        ajax: {
          url: "{{ url('Subadmin/blood_donor') }}",
          data: function (d) {
              
                d.blood_group=$('#blood_group').val()
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
      
            {data: 'card_id', name: 'card_id'},
            {data: 'name', name: 'name'},
            {data: 'contact_number', name: 'contact_number'},
            {data: 'address', name: 'address'},
            // {data: 'profile', name: 'profile'},
            {data: 'blood_group', name: 'blood_group'},
           
            {data: 'created_at', name: 'created_at'},
          
         
        ],
        order: [ [1, 'desc'] ]
    });
        
         
          $('#blood_group').change(function(){
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
       //  alert(id);
        $.ajax({
            type: "Get",
            url:"{{url('Subadmin/change_business_status')}}",
            data: {business_id:id },
            success: function(data) {              
                  location.reload();
            }
        });
      }  
  </script>
@endsection


