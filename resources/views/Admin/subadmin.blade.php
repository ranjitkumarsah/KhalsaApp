@extends('Admin.layouts.App')
@section('subadmins','menu-open')
@section('viewsubadmins','active')
<style>
   th{
    color:#0b528f !important;
    font-size: 0.9rem;
    text-align: center !important;
  }
   section.content {
    background-color:#F5DDBD;
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
  @media (max-width:992px) {
    table#Table_ID {
    margin-left: 221px;
}
  }

  @media(min-width:280px) and (max-width:767px) {
    table#Table_ID {
    margin-left: 0px;
    }
    h1 {
    font-size: 16px !important;
    }
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
    }
    @media only screen and (min-width: 768px) and (max-width: 991px) {
        .col-sm-6.subadmin_class {
          margin-left: 255px;
        }
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
          <div class="col-sm-6 subadmin_class">
            <h1>View Subadmin</h1>
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
                <a href="{{url('Admin/subadmin_register')}}" class="btn btn-primary" style="float:right;">Add Subadmin</a><br><br>
                <table id="Table_ID" class="table table-responsive-sm table-striped table table-bordered table-hover" >
                  <thead>
                  <tr>
                    <th >#</th>  
                    <th >Id</th>  
                    <th >Name</th>   
                    <th >Username</th>              
                    <th >Contact Number</th>
                    <th >Village/City</th>
                    {{-- <th >Landmark</th> --}}
                    <th >Address</th>
                    <th >Active</th>
                    <th >Registered On</th>
                    <th >Action</th>
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
      var dataSrc = [];
    var table = $('#Table_ID').DataTable({

      'initComplete': function(){
         var api = this.api();

         // Populate a dataset for autocomplete functionality
         // using data from first, second and third columns
         api.cells('tr', [0,1,2,3,4,5]).every(function(){
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
        processing: true,
        // serverSide: true,
        bDestroy:true,
        stateSave:true,
        ajax: {
          url: "{{ url('Admin/subadmin') }}",
          data: function (d) {
              
              
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
        columnDefs: [
            { 
              width: "30%", 
              targets: 6, 
            },
        ],
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex',orderable: true, searchable: false},
      
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
            {data: 'username', name: 'username'},
            {data: 'contact_number', name: 'contact_number'},
            {data: 'village', name: 'village'},
           
            {data: 'address', name: 'address'},
           
            {data: 'active', name: 'active'},
           
            {data: 'created_at', name: 'created_at'},
          
            {
                data: 'action', 
                name: 'action', 
                orderable: false, 
                searchable: false
            },
        ],
        order: [ [1, 'desc'] ]
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
          url:"{{url('Admin/change_subadmin_status')}}",
          data: {subadmin_id:id },
          success: function(data) {              
                location.reload();
          }
      });
    }  
</script>
@endsection


