@extends('Admin.layouts.App')
@section('sewapartners','menu-open')
@section('viewsewapartner1','active')
<head>
</head>
<style>
  /* body.sidebar-mini {
    overflow: hidden;
  } */
  button#doctor_btn {
      margin-top: -43px;
  }
  .row.ml-5 {
      font-style: 40px;
      font-size: 15px !important;
  }
  div#show_services {
      margin-left: 14px;
  }
  img#new_profile_image {
      border: 1px solid black;
  }
  section.content.second {
      margin-top: 40px !important;
  }
  .content-wrapper{
    min-height: 615px !important;
  }
  .card.new {
      /* margin-left: 257px; */
      width: 100%;
  }

  section.content {
    background-color: #F5DDBD;
  }
  body {
    background-color: #F5DDBD !important;

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
      width: 12%;
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
      background-color: #ff7600;
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
  

    th{
      color:#0b528f !important;
      font-size: 0.9rem;
      text-align: center !important;
    }
    section.box {
      background-color: #ffffff;
      margin: 15px 0;
      display: inline-block;
      width: 100%;
      overflow: hidden;
  }
  .doc-img {
      max-width: 220px;
      margin-bottom: 25px;
      position: relative;
  }
  .center-block {
      display: block;
      margin-right: auto;
      margin-left: auto;
  }
  .img-thumbnail {
      display: inline-block;
      max-width: 100%;
      height: auto;
      padding: 4px;
      line-height: 1.42857143;
      background-color: #fff;
      border: 1px solid #ddd;
      border-radius: 4px;
      -webkit-transition: all .2s ease-in-out;
      -o-transition: all .2s ease-in-out;
      transition: all .2s ease-in-out;
  }
  .doctors-head .header {
      font-size: 19px;
      margin-bottom: 5px;
      margin-top: 0;
  }
  section.content.second {
      /* margin-top: 74px !important; */
  }
  .col-xs-12 {
      width: 100%;
  }
  section header {
      width: 100%;
      display: inline-block;
      border: 1px solid rgba(0, 0, 0, 0.09);
      border-bottom: 0px solid transparent;
      vertical-align: top;
      position: relative;
      min-height: 75px;
  }
  section .content-body {
      padding: 5px 20px 30px 20px;
      border: 1px solid #e8e8e8;
      border-top: 0px;
      -webkit-transition: 800ms;
      -moz-transition: 800ms;
      -o-transition: 800ms;
      transition: 800ms;
  }
  .check {
      display: flex;
      /* justify-content: space-between; */
  }
  .relative {
      position: relative !important;
  }
  .doctors-list:before {
      position: absolute;
      content: '';
      top: 0;
      left: 0;
      width: 100%;
      height: 40%;
      background: #4d9cf8;
  }
  .center-block {
      display: block;
      margin-right: auto;
      margin-left: auto;
  }
  .img-thumbnail {
      display: inline-block;
      max-width: 100%;
      height: auto;
      padding: 4px;
      line-height: 1.42857143;
      background-color: #fff;
      border: 1px solid #ddd;
      border-radius: 4px;
      -webkit-transition: all .2s ease-in-out;
      -o-transition: all .2s ease-in-out;
      transition: all .2s ease-in-out;
  }
  .doctors-list {
      padding: 30px 20px;
      width: 100%;
  }
  section .content-body {
      padding: 5px 20px 30px 20px;
      border: 1px solid #e8e8e8;
      border-top: 0px;
      -webkit-transition: 800ms;
      -moz-transition: 800ms;
      -o-transition: 800ms;
      transition: 800ms;
  }
  .col-xs-12 {
      width: 100%;
  }
  .col-lg-1, .col-lg-10, .col-lg-11, .col-lg-12, .col-lg-2, .col-lg-3, .col-lg-4, .col-lg-5, .col-lg-6, .col-lg-7, .col-lg-8, .col-lg-9, .col-md-1, .col-md-10, .col-md-11, .col-md-12, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-sm-1, .col-sm-10, .col-sm-11, .col-sm-12, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-xs-1, .col-xs-10, .col-xs-11, .col-xs-12, .col-xs-2, .col-xs-3, .col-xs-4, .col-xs-5, .col-xs-6, .col-xs-7, .col-xs-8, .col-xs-9 {
      position: relative;
      min-height: 1px;
      padding-right: 15px;
      padding-left: 15px;
  }





  *{
      margin: 0%;
      padding: 0%;
      box-sizing: border-box;
      font-family: 'Roboto', sans-serif;
  }
  body{
  background-color: #f7f7f7;
  }
  .firstsection {
      padding-top: 15px;
  }
  .container {
      width: 100%;
      /* max-width: 1069px; */
      /* margin: 0px auto; */
      /* padding: 0px 15px; */
  }
  .firstsection .borderbox{
      width: 100%;
      background: #fff;
      margin-top: 10px;
      padding: 8px 25px;
      border-radius: 35px;
      border: 1px solid #eee;
      margin-bottom: 15px;
  }
  .firstsection .borderbox h1 {
      font-size: 22px;
      font-weight: 500;
      margin: 5px 0px;
      padding: 5px 0;
      text-transform: capitalize;
      font-family: 'Roboto', sans-serif;
      color: rgba(118, 118, 118, 1.0);
  }
  .secondsection {
      margin-top: 31px;
      padding: 0 0.5rem;
  }
  .secondsection .row {
    display: flex;
      width: 100%;
      margin: 0px auto;
      justify-content: space-between;
  }
  .secondsection .row .doctor-head{
      width: 30%;
      background-color: #fff;
      z-index: 0;
      border: 1px solid #e8e8e8;
      position: relative;
      box-shadow: 0 0 1px rgba(0,0,0,.125), 0 1px 3px rgba(0,0,0,.2);
      border-radius: 0.25rem;
  }
  .secondsection .row .box{
      width: 32%;
      background-color: #fff;
      border: 1px solid #e8e8e8;
      box-shadow: 0 0 1px rgba(0,0,0,.125), 0 1px 3px rgba(0,0,0,.2);
      border-radius: 0.25rem;
  }

  .secondsection .doctor-image {
      /* width: 22%; */
      margin: 0px auto;
      border-radius: 63%;
      z-index: 1;

  }
  .secondsection .doctor-image img {
    border-radius: 59%;
      width: 130px;
      height: 130px;
      border: 1px solid black;

  }
  .secondsection .row .orange-color {
      
      width: 100%;
      display: flex;
      z-index: -1;
      height: 160px;
      background-color: #ff7600;
      align-items: center;
      border-top-left-radius: 0.25rem;
      border-top-right-radius: 0.25rem;
  }

  .secondsection .doctor-center .text-box h4 ,.secondsection .box .text-box h4 {
      font-size: 14px;
      line-height: 20px;
      font-weight: 700;
  }

  .secondsection .doctor-center .text-box span , .secondsection .box .text-box span {
      font-weight: 400;
      padding-left: 10px;
      font-size: 0.9rem;
  }


  .secondsection .doctor-center .text-box ,.secondsection  .box .space-box .text-box{
      padding: 22px 30px;
  }
  .secondsection .box .text-box .inlinebx {
      float: left;
      width: 100%;
  }

  .secondsection .box .text-box .inlinebx ul {
      float: left;
      padding: 0px  22px;
      font-size: 0.9rem;
  }
  @media (min-width: 1200px){
  .container {
      /* max-width: 1039px !important; */
      padding: 0px;
  }
  }
  /* 769 to 1024 */
  @media screen and (min-width: 769px) and (max-width:1024px){
      .secondsection .doctor-image {width: 27%;}
  }
  /* 710 to 768  */
  @media screen and (min-width: 698px) and (max-width:768px){
      .secondsection .row {display: flex; flex-direction: column; width: 100%; row-gap: 17px;
      }
      .secondsection .row .doctor-head , .secondsection .row .box {
          width: 100%;
      }
      .secondsection .doctor-image {width: 18%;}
      .secondsection .doctor-center .text-box h4, .secondsection .box .text-box h4 {
          font-size: 16px;
      }
  }
  /* 426 to 709 */
  @media screen and (min-width:561px) and (max-width:697px){
      .secondsection {
          margin-top: 22px;
      }
      .secondsection .row {display: flex; flex-direction: column; width: 100%; row-gap: 17px;
      }
      .secondsection .row .doctor-head , .secondsection .row .box {
          width: 100%;
      }
      .secondsection .doctor-image {width: 23%;}
      .secondsection .doctor-center .text-box h4, .secondsection .box .text-box h4 {
          font-size: 16px;
      }
      .secondsection .doctor-center .text-box, .secondsection .box .space-box .text-box {
          padding: 20px;
      }
  }
  /* 375 to 425 */
  @media screen and (min-width: 485px) and (max-width: 560px){
      .secondsection {
          margin-top: 22px;
      }
      .secondsection .row {display: flex; flex-direction: column; width: 100%; row-gap: 17px;
      }
      .secondsection .row .doctor-head , .secondsection .row .box {
          width: 100%;
      }
      .secondsection .doctor-image {width: 27%;}
      .secondsection .doctor-center .text-box h4, .secondsection .box .text-box h4 {
          font-size: 14px;
      }
      .secondsection .doctor-center .text-box, .secondsection .box .space-box .text-box {
          padding: 20px;
      }
  }
  @media screen and (min-width:373px) and (max-width: 484px){
      .secondsection {
          margin-top: 22px;
      }
      .secondsection .row {display: flex; flex-direction: column; width: 100%; row-gap: 17px;
      }
      .secondsection .row .doctor-head , .secondsection .row .box {
          width: 100%;
      }
      .secondsection .doctor-image {width: 32%;}
      .secondsection .doctor-center .text-box h4, .secondsection .box .text-box h4 {
          font-size: 14px;
      }
      .secondsection .doctor-center .text-box, .secondsection .box .space-box .text-box {
          padding: 20px;
      }
  }
  /* 0 to 374 */
  @media screen and (min-width:0px) and (max-width:374px){
      .secondsection {
          margin-top: 22px;
      }
      .secondsection .row {display: flex; flex-direction: column; width: 100%; row-gap: 17px;
      }
      .secondsection .row .doctor-head , .secondsection .row .box {
          width: 100%;
      }
      .secondsection .doctor-image {width: 42%;}
      .secondsection .doctor-center .text-box h4, .secondsection .box .text-box h4 {
          font-size: 14px;
      }
      .secondsection .doctor-center .text-box, .secondsection .box .space-box .text-box {
          padding: 20px;
      }
  }
  .inlinebx ul {
  -webkit-column-count: 2;
     -moz-column-count: 2;
          column-count: 2;
  -webkit-column-width: 50%;
     -moz-column-width: 50%;
          column-width: 50%;
    -webkit-column-gap: 4em;
       -moz-column-gap: 4em;
            column-gap: 4em;
}

footer.main-footer {
  margin-left:0 !important;
}
.first_row {
  background-color: #dce4eb;
  width: 100%;
  height: 160px;
}
img#new_profile_image {
    border-radius: 50%;
    width: 125px;
    height: 125px;
    margin-top: -80px;
    margin-left: 63px;
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
  <div class="content-wrapper" style="">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-9">
            <h1 >{{$data->username}} (SW{{$data->id}})</h1>
          </div>
          <div class="col-sm-3" style="display: flex;justify-content: flex-end;">
            @if($data->categories == "Hospital")
              <a href="{{url('Admin/add_doctor')}}/{{$data->id}}" class="btn btn-primary float-right mr-5">Add Doctor</a>
            @endif
            <a href="{{url('Admin/sewapartner1')}}"class="btn btn-primary back_btn float-right">Back</a>
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

        <div class="row mb-5">
          <div class="col-sm-6">
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
                    <th>City:</th>
                    <td>{{$data->village}}</td>
                  </tr>
                  <tr>
                    <th>Address:</th>
                    <td>{{$data->sewa_address}}</td>
                  </tr>
                </table>
                
              </div>          
            </div>
          </div>  
          <div class="col-sm-6">
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
    <!-- <div class="secondsection">
      <div class="container-fluid">
        <div class="row">

          <div class="doctor-head">
            <div class="doctor-center">
              <div class="orange-color">
                <div class="doctor-image">
                  <img src="{{$data->profile}}" alt="doctor-profile" width="100%" height="100%">
                </div>
              </div>

              <div class="text-box">
                <h4>Name: <span>{{$data->name}}</span></h4>
                <h4>Email: <span>{{$data->email}}</span></h4>
                <h4>Contact Number:<span>{{$data->contactnumber}}</span></h4>
              </div>
            </div>
          </div>

          <div class="box">
            <div class="space-box">
              <div class="text-box">
                @if($data->categories == 'Hospital')
                  <h4>Timings: <span>{{$data->timings}}</span></h4>
                @else
                  <h4>Timings: <span>{{$data->timings}} to {{$data->timings2}}</span></h4>
                @endif  
                <h4>Registered On: <span>{{$data->created_at}} </span></h4>
                <h4>Category:<span> {{$data->categories}}</span></h4>
                <div class="check"><h4>Address: </h4><span>{{$data->sewa_address}}</span></div>
              </div>
            </div>
          </div>
          <div class="box" style="width: 35%;">
            <div class="space-box">
              <div class="text-box">
                <h4>Services:</h4>
                <span class="inlinebx">
                  <ul>
                    
                    <?php echo "<li>" . str_replace ("," , "</li><li>" , $content) . "</li>";?>
                    
                    {{-- 
                      <li>{{$content}}</li>
                      <li> Gynaecology</li>
                      <li>Consultation</li>
                      <li> Paediatrics</li>
                      <li>Gastroentrology</li>
                      <li> Surgery</li>  
                      <li>Neurology</li>
                      <li> Cardio-THORACIC Surgery</li>
                      <li>Oral Health Sciences</li>
                      <li> Opthalmology</li>
                      <li>Endocriologyy</li>
                      <li>Toxicology</li>
                      <li>Consultation</li> 
                    --}}
                  </ul>
                </span>
            
              </div>
            </div>
          </div> 
        </div>
      </div>
    </div> -->

@if($data->categories == "Hospital")

<section class="content second pb-5">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card new">
          <!-- /.card-header -->
          <div class="card-body">
            <table id="Table_ID" class="table table-bordered table-hover table-responsive-sm">
              <thead>
              <tr>
                <th>Id</th>
                <th>Doctor Name</th>
                {{-- <th>Qualification</th>
                <th>Specialization</th> --}}
                <th>Day</th>
                <th>Timing</th>
                <th>Action</th>
              </tr>
              </thead>
              <tbody style="font-size: 0.9rem;">
              <?php $i=1; ?>
               @foreach($doctors as $doctor)
                <tr>
                  <td>{{$i++}}</td>
                
                  <td>{{$doctor->doctor_name}}({{$doctor->doctor_qualification}},{{$doctor->doctor_specialization}})</td>
                  {{-- <td>{{$doctor->doctor_qualification}}</td>
                  <td>{{$doctor->doctor_specialization}}</td> --}}
                  <td>{{$doctor->day}}</td>
                  <td>{{$doctor->timing}} to {{$doctor->timing1}}</td>
                 
                  <td>
                    {{-- <a href="{{url('Admin/editservice')}}/{{$service->id}}"><i class="material-icons">edit</i></a> --}}
                    <a href="{{url('Admin/deletesewa_doctor')}}/{{$doctor->id}}"><i class="material-icons" onclick="return confirm('Are you sure to delete this?')">delete</i></a>
                 
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
 
@endif
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

@if($data->categories == "Hospital")
<script>
  $('.content').removeClass('pb-5');
</script>
@endif
@endsection
<!-- AdminLTE App -->
<!-- Page specific script -->
