@extends('Admin.layouts.App')
@section('business','menu-open')
@section('viewbusiness','active')
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
  div#Table_ID_filter {
    margin-top: 0px !important;
    margin-bottom: 16px;
  }
  .card-body p.user_type {
    color: green;
    font-weight: 500;
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
            @if($segment =='pending_business')
              <h1>Pending Business Listing</h1>
            @else
              <h1>Manage Business Listing</h1>
            @endif
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
                <div class="row" style="float: right;margin-bottom: 5px;">
                <a href="{{url('Admin/business')}}" class="btn btn-primary" style="margin-right:10px;height: 36px;
                font-size: 0.9rem;">Add Business</a><br><br>
                <a href="{{url('Admin/business_type')}}" class="btn btn-primary" style="height: 36px;
                font-size: 0.9rem;margin-right: 14px;">Add Business Type</a><br><br>  
                </div>
                <table id="Table_ID" class="table table-responsive-sm table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th >#</th>
                    <th >Title</th>
                    <th >Description</th>  
                    <th >Address</th>                   
                    <th >Business Type</th> 
                    <th >Added By</th>                  
                    <th >Verify</th>
                    <th >Date</th>
                    <th >Action</th>
                   
                  </tr>
                  </thead>
                  <tbody style="font-size: 0.9rem;">
                   <?php $i=1;?>
                    @foreach ($business as $value)
                    <tr style="text-align:center">
                    <td>{{$i}}</td> 
                    <td>{{$value->title}}</td>      
                      <td>{{$value->description}}</td>                    
                      <td>{{$value->address}}</td>                     
                      <td>{{$value->business_type}}</td>
                      <td>{{$value->user_type}}
                          <p class="user_type">
                            @if($value->user_type == 'Volunteer')
                            @php $user_name =\DB::table('volunteers')->where('id',$value->user_id)->pluck('name')->first(); @endphp
                             @else
                             @php $user_name =\DB::table('cardholder')->where('id',$value->user_id)->pluck('name')->first(); @endphp
                            @endif
                            @if(!empty($user_name) && isset($user_name))
                              ({{$user_name}})
                            @endif
                          </p>
                      
                      </td>      
                      <td>  
                        @if($value->status == 1 )
                         <button class="on" id="active" onclick="show({{$value->id}})"><i class="fa-solid fa-toggle-on" ></i></button>
                         @else
                         <button class="on" id="inactive" onclick="show({{$value->id}})"><i class="fa-solid fa-toggle-off"></i></button>
                            @endif
                           
                              
                            </td>
                            <td>{{$value->created_at}}</td>    
                            <td>
                              <a href="{{url('Admin/editbusiness')}}/{{$value->id}}"><i class="fa-solid fa-square-pen" style="font-size:25px;"></i>
                              </a>
                              <a href="{{url('Admin/deletebusiness',$value->id)}}"><i class="fa-solid fa-trash-can" style="color:red; font-size:23px;margin-left:3px;" onclick="return confirm('Are you sure to delete this?')"></i></a>
                            </td>
                      
                    </tr>
                    <?php $i++; ?>
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
    var t = $('#Table_ID').DataTable({
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
          // {
          //     searchable: false,
          //     orderable: false,
          //     targets: 0,
          // },
          { 
            width: "30%", 
            targets: [2,3] ,
          },
          { 
            width: "10%", 
            targets: [1,6] ,
          },
      ],
       
    });
  });
  </script>
  <script> 
    
    function show(id) {
       //  alert(id);
        $.ajax({
            type: "Get",
            url:"{{url('Admin/change_business_status')}}",
            data: {business_id:id },
            success: function(data) {              
                  location.reload();
            }
        });
      }  
  </script>
@endsection


