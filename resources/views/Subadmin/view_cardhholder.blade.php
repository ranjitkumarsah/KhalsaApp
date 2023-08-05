@extends('Subadmin.layouts.App')
@section('card','menu-open')
@section('viewcardholder','active')
<style>
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
    <?php $segment =request()->segment(count(request()->segments())) ?>
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            @if($segment == 'view_active_cardholder')
              <h1>Active Cardholder</h1>
            @elseif($segment =='view_deactive_cardholder')
              <h1>Deactive Cardholder</h1>
            @else
              <h1>View Cardholder</h1>
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
        
                <div class="row" style="margin-bottom: 10px;">
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
                  <div class="col-md-2">
                    <label   for="isNeedy" class="form-label ">Is Needy</label> 
                    <select data-coloum="0" class="form-control filter-select" name="isNeedy" id="isNeedy">
                      <option value=''>All</option>
                      <option value='Yes'>Yes</option>
                      <option value='No'>No </option>
                    </select>
                  </div>
                  <div class="col-md-2" style="margin-top: 32px;">
                    <a href="{{url('Subadmin/cardholder')}}" class="btn btn-primary float-right" >Add CardHolder</a><br><br>
                  </div>
                </div>

                <div class="table-responsive"> 
                 
                  {{-- <a href="{{url('Subadmin/newcardholder')}}" class="btn btn-primary" style="float:right;">Add NewCardHolder</a><br><br> --}}
                <table id="Table_ID" class="table table-responsive-sm table table-bordered table-hover" >
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Id</th>
                    <th>Name</th>                     
                  
                    <th>City</th>
                    <th>Address</th>
                  
                   
                    <th>Contact Number</th>
                   
                    <th>Active</th>
                    <th>Verify</th>
                    <th>Action</th>
                    <th>Added By</th>
                    <th>Is Needy</th>
                    <th>Family Details</th>
                    <th>Children Details</th>
                    <th>Download Card</th>
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
            {
              targets: 9,
              className: "text-center",
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
    var segment = "{{request()->segment(count(request()->segments()))}}";
    console.log(segment);
    var url  = "{{url('Subadmin')}}/"+segment;
    // console.log(url);

    var table = $('#Table_ID').DataTable({
        processing: true,
        serverSide: true,
        bDestroy:true,
        stateSave:true,
        ajax: {
          url: url,
          data: function (d) {
                d.from_date=$('#from_date').val(),
                d.to_date=$('#to_date').val(),
                d.range=$('#range').val(),
                d.isNeedy=$('#isNeedy').val()

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
            targets: 9,
            className: "text-center",
          },
        ],
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex',orderable: true, searchable: false},
      
            {data: 'card_id', name: 'card_id'},
            // {
            //   data:function data(row) {
            //     var added_by = '';
            //     if(row.is_needy == 'No') {
            //       added_by = '<span> 1699-'+(1000000+row.id)+'</span>';
            //     } else {
            //       added_by = '<span>1984-'+(1000000+row.id)+'</span>';
            //     }
            //     return added_by;
            //   },
            //   name:'added_by'
            // },
            {data: 'name', name: 'name'},
            {data: 'village', name: 'village'},
            {data: 'address', name: 'address'},
            {data: 'contact_number', name: 'contact_number'},
          
           
           
            {data: 'active', name: 'active'},
            {data: 'verify', name: 'verify'},
          
            {
                data: 'action', 
                name: 'action', 
                orderable: false, 
                searchable: false
            },
            {
              data:function data(row) {
                
                if(row.add_type=='Volunteer') {
                  var add_card_id = ' - 1469-'+(1000000+row.add_id);
                } else {
                  var add_card_id = '';
                }
                var added_by = '<span>'+row.add_name+' ('+row.add_type+''+add_card_id+')'+'</span>';

                
                return added_by;
              },
              name:'added_by'
            },
            {
              data:function data(row) {
                return  `<a href="{{url('Subadmin/edit_is_needy')}}/${row.id}">${row.is_needy}</a>`
              },
              name:'is_needy'
            },
            {data: 'family', name: 'family'},
            {data: 'children', name: 'children'},
            {data: 'download_pdf', name: 'download_pdf'},
            {data: 'created_at', name: 'created_at'},
        ],
        order: [ [0, 'ASC'] ]
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
          $('#isNeedy').change(function(){
              var id=$(this).val();
              table.draw();
          });


          table.on('draw.dt', function() {
           
      

   
        });
 
        </script>
   <script> 
    
     function show(id) {
      
         $.ajax({
             type: "Get",
             url:"{{url('Subadmin/change_active_status')}}",
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
              url:"{{url('Subadmin/change_verify_status')}}",
              data: {cardholder_id:id },
              success: function(data) {              
                    location.reload();
              }
          });
        }  
    </script>
  
   
@endsection


