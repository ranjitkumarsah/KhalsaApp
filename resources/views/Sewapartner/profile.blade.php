@extends('Sewapartner.layouts.App')
@section('profile','menu-open')
@section('profile','active')
<head>
</head>
<style>
  th{
    color:#0b528f !important;
    font-size: 0.9rem;
    text-align: center !important;
  }
  div#show_services {
      margin-left: 14px;
  }
  img#new_profile_image {
      border: 1px solid black;
  }
  /* section.content.second {
      margin-top: 74px !important;
  } */
  .content-wrapper{
    min-height: 615px !important;
  }
  .card.new {
      margin-left: 257px;
      width: 80%;
  }

  section.content {
    background-color: #F5DDBD;
  }
  table.dataTable.no-footer {
      width: 100%;
  }
  a.btn.btn-primary.back_btn{
        background-color:#ED9B2D;
        color:black;
  }
    .name_class.ml-2 {
      margin-top: -15px;
      margin-left: 20px !important;
  } 
  div#doctor_class {
    float: right;
    margin-top: -49px;
  }
  button#doctor_btn {
      color: black;
      background-color: #ff7600;
  }
  img#new_profile_image {
    border-radius: 50%;
    width: 125px;
    height: 125px;
    margin-top: -80px;
    margin-left: 63px;
  }
  b {
    font-weight: 500;
    color: black;
  }
  .col-lg-4.col-md-4.col-sm-12 {
    font-weight: 400;
  }


  div#show_image_popup {
    display: none;
    top:50%;
    left:37%;
    position:absolute;
    z-index: 1000; /  adobe all elements   /
  transform: translate(-50%, -50%); /  make center   /

  } 
  div#show_aadhar_popup {
      display: none;
      top:50%;
      left:37%;
      position:absolute;
      z-index: 1000; /  adobe all elements   /
    transform: translate(-50%, -50%); /  make center   /
  }
  div#show_voter_popup {
      display: none;
      top:50%;
      left:37%;
      position:absolute;
      z-index: 1000; /  adobe all elements   /
    transform: translate(-50%, -50%); /  make center   /

  }
    #active{
      border: none;color: blue;font-size: 22px;
    }
    #inactive{
      border: none;color: red;font-size: 22px;
    }
    .first_row {
      background-color: #dce4eb;
      width: 100%;
      height: 160px;
    }
    img#show_profile_image {
      height: 125px;
      width: 12%;
      margin-left: 61px;
      margin-top: -84px;
      border-radius: 50%;
      border: 2px solid #ff6a00;
    }
    .name_class.ml-2 {
      margin-top: -15px;
  }
  .close-btn-area {
      background-color: white;
    }
    #show_image_popup{
    position: absolute; /  so that not take place   /
    top: 50%;
    left: 50%;
    z-index: 1000; /  adobe all elements   /
    transform: translate(-50%, -50%); /  make center   /
    display: none; /  to hide first time   /
    } 
    .profile-info, .business-info {
      height:100%;
    }
    .profile-info .heading i , .business-info .heading i{
      position: absolute;
      font-size:25px;
    }
    .profile-info .table tr th, .business-info .table tr th{
      color:#212529 !important;
      text-align:left !important;
      font-size:1rem !important;
    }

    .profile-info .table tr td{
      width: 60%;
    }

    span.services-span {
      display: inline-block;
      margin: 2px;
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
            <h1>{{$data->name}} (SW{{$data->id}})</h1>
          </div>
          <div class="col-6 col-sm-6 text-right">
            <a href="{{url('Sewapartner/dashboard')}}"class="btn btn-primary back_btn">Back</a>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    {{-- <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
              <!-- /.card-body -->
              <div class="row">
                <div class="first_row">
              
                </div>
              </div><br>
              <div class="row">
              <img src="{{$get_profile}}" id="new_profile_image">
              <div class="row">
              <div class="name_class ml-2"><b>{{$data->username}}</b></div>
              </div>
              </div><br><br>
              
             
             <div class="row ml-5">
             <div class="col-lg-2 col-md-2 col-sm-12"><b>Name:</b></div>
              <div class="col-lg-3 col-md-3 col-sm-12">{{$data->name}}</div>
              <div class="col-lg-2 col-md-2 col-sm-12"><b>Email:</b></div>
              <div class="col-lg-3 col-md-3 col-sm-12">{{$data->email}}</div>
             </div><br>
             <div class="row ml-5">
              <div class="col-lg-2 col-md-2 col-sm-12"><b>Contact Number:</b></div>
              <div class="col-lg-3 col-md-3 col-sm-12">{{$data->contactnumber}}</div>
              <div class="col-lg-2 col-md-2 col-sm-12"><b>Address:</b></div>
              <div class="col-lg-3 col-md-3 col-sm-12">{{$data->sewa_address}}</div>
             </div><br>
             <div class="row ml-5">
              <div class="col-lg-2 col-md-2 col-sm-12"><b>Timings:</b></div>
              <div class="col-lg-3 col-md-3 col-sm-12">
                @if($data->categories == 'Hospital')
                {{$data->timings}}
                @else 
                {{$data->timings}} to {{$data->timings2}}
                @endif
               
               
              </div>
               <div class="col-lg-2 col-md-2 col-sm-12"><b>Category:</b></div>
               <div class="col-lg-3 col-md-3 col-sm-12">
              {{$data->categories}}
             
                 </div>

             </div><br>

             <div class="row ml-5">
              <div class="col-lg-2 col-md-2 col-sm-12"><b>Services:</b></div>
                @foreach($services as $service)
                <div id="show_services">
                    {{$service->service_name}},
                </div>
               
             @endforeach</div><br>
             
            

             
            
           
  

             </div>
          
            </div>
            </div>
          
            <!-- /.card -->

           
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section> --}}
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                <!-- /.card-body -->
                <div class="row">
                  <div class="first_row">
              
                  </div>
                </div><br>
                <div class="row">
                  <div class="col-9">
                    <img src="{{$get_profile}}" id="new_profile_image">
                    <h4 class="d-inline ml-2 position-absolute" style="top:-15px;"><b> {{$data->username}}</b></h4>
                  </div>
                  <!-- <div class="col-3">
                    <button class="btn border" style="font-weight:600; padding-right: 15%;">EDIT PROFILE <i class="material-icons" style="position: absolute;left: 42%; font-size:20px;">edit</i></button>
                  </div> -->
                </div><br>
              </div>          
            </div>
          </div>      
        </div> 

        <div class="row">
          <div class="col-6">
            <div class="card profile-info">
                <!-- /.card-header -->
              <div class="card-body">
                <div class="heading mt-2">
                  <h5>
                    <i class="material-icons ">person</i>
                    <b style="margin-left:2rem;">PROFILE INFORMATION</b>
                  </h5>
                </div>
                <table class="table mt-5 mb-4">
                  <tr>
                    <th>Name:</th>
                    <td>{{$data->name}}</td>
                  </tr>
                  <tr>
                    <th>Email:</th>
                    <td>{{$data->email}}</td>
                  </tr>
                  <tr>
                    <th>Contact Number:</th>
                    <td>{{$data->contactnumber}}</td>
                  </tr>
                  <tr>
                    <th>Address:</th>
                    <td>{{$data->sewa_address}}</td>
                  </tr>
                </table>
                
              </div>          
            </div>
          </div>  
          <div class="col-6">
            <div class="card business-info">
                <!-- /.card-header -->
              <div class="card-body">
                <div class="heading mt-2">
                  <h5>
                    <i class="material-icons ">business_center</i>
                    <b style="margin-left:2rem;">BUSINESS INFORMATION</b>
                  </h5>
                </div>
                <table class="table mt-5 mb-4">
                  <tr>
                    <th>Category:</th>
                    <td><span class=" rounded px-1" style="background-color:#FFBA0C">{{$data->categories}}</span></td>
                  </tr>
                  <tr>
                    <th>Services:</th>
                    <td> 
                      @foreach($service_names as $service)
                        <span class="bg-danger services-span rounded px-1">{{$service}}</span>
                      
                      @endforeach
                    </td>
                  </tr>
                  <tr>
                  <th>Timings:</th>
                    @if($data->categories == "Hospital")
                    <td>{{$data->timings}}</td>
                    @else
                    <td>
                      <span>From</span>&emsp;&emsp;&emsp;<span>To</span><br><br>
                      <span>{{date('h:i A',strtotime($data->timings)) }}</span>&emsp;&emsp;
                      <span>{{ date('h:i A',strtotime($data->timings2))}}</span>
                    </td>
                    @endif
                  </tr>
                </table>
                
              </div>          
            </div>
          </div>      
        </div>        
      </div>      
    </section>
  
   
    

    @if($data->categories == "Hospital")
    <section class="content second">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12 mt-5">
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                <table id="Table_ID" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Id</th>
                    <th>Doctor Name</th>
                    {{-- <th>Qualification</th>
                    <th>Specialization</th> --}}
                    <th>Day</th>
                    <th>Timing</th>
                   
                  </tr>
                  </thead>
                  <tbody style="font-size: 0.9rem;">
                   @foreach($doctors as $doctor)
                    <tr>
                      <td></td>
                    
                      <td>{{$doctor->doctor_name}}({{$doctor->doctor_qualification}},{{$doctor->doctor_specialization}})</td>
                      {{-- <td>{{$doctor->doctor_qualification}}</td>
                      <td>{{$doctor->doctor_specialization}}</td> --}}
                      <td>{{$doctor->day}}</td>
                      <td>{{$doctor->timing}} to {{$doctor->timing1}}</td>
                     
                     
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
    @endif
    <!-- /.content -->
  </div>
 

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->

<!-- DataTables  & Plugins -->
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
  @endsection
<!-- AdminLTE App -->
<!-- Page specific script -->
