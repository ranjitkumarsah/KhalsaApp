@extends('Admin.layouts.App')
@section('card','menu-open')
@section('viewkhalsamember','active')
<style>
  section.content {
    background-color: #F5DDBD;
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
            <h1>View Khalsa Member</h1>
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
                <div class="table-responsive"> 
                  {{-- <a href="{{url('Admin/cardholder')}}" class="btn btn-primary" style="float:right;">Add CardHolder</a><br><br> --}}
                  <a href="{{url('Admin/newcardholder')}}" class="btn btn-primary" style="float:right;">Add Khalsa Member</a><br><br>
                <table id="Table_ID" class="table table-responsive-sm table table-bordered table-hover" >
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Id</th>
                    <th>Patient Details</th>                     
                    <th>Disease Time</th> 
                    <th>Address</th>                 
                    <th>Active</th>
                    <th>Verify</th>
                    <th>Action</th>
                  
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($members as $member)
                    <tr>
                    <td></td> 
                      <td>{{$member->card_id}}</td>    
                      <td>{{$member->name}}</td>                    
                      <td>{{$member->disease_time}}</td>  
                      <td>{{$member->gurudwara}}</td>                   
                      <td>  
                        @if($member->active_status == 1 )
                         <button class="on" id="active" onclick="show({{$member->id}})"><i class="fa-solid fa-toggle-on" ></i></button>
                         @else
                         <button class="on" id="inactive" onclick="show({{$member->id}})"><i class="fa-solid fa-toggle-off"></i></button>
                            @endif
                           
                              
                            </td>
                            <td>  
                              @if($member->verify_status == 1 )
                               <button class="on" id="verify" onclick="verify({{$member->id}})"><i class="fa-solid fa-toggle-on" ></i></button>
                               @else
                               <button class="on" id="unverify" onclick="verify({{$member->id}})"><i class="fa-solid fa-toggle-off"></i></button>
                                  @endif
                              
                                    
                              </td>
                              <td>
                                {{-- <a href="{{url('Admin/editcardholder')}}/{{$cardholders->id}}"><i class="fa-solid fa-square-pen" style="font-size:25px;"></i></a> --}}
                                <a href="{{url('Admin/deletemember',$member->id)}}"><i class="fa-solid fa-trash-can" style="color:red; font-size:23px;" onclick="return confirm('Are you sure to delete this?')"></i></a>
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
             url:"{{url('Admin/khalsa_active_status')}}",
             data: {member_id:id },
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
              url:"{{url('Admin/khalsa_verify_status')}}",
              data: {member_id:id },
              success: function(data) {              
                    location.reload();
              }
          });
        }  
    </script>
@endsection


