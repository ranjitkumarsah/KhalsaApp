@extends('Admin.layouts.App')
@section('card','menu-open')
@section('viewcardholder','active')
<style>
  a#btn_id {
    margin-left: 111px;
    background-color:#ED9B2D;
    color:black;
  }
   a.btn.btn-primary.back_btn{
    background-color:#ED9B2D;
    color:black;
  }
  .card-body{
    background-color:white !important;
  }
  .content-wrapper{
    min-height: 867px !important;
  }
  table.dataTable tbody th, table.dataTable tbody td {
    border: 1px solid black;
  }
  .content-wrapper .content {
    background-color: #F5DDBD;
} 
  textarea {
    width: 97%;
    height: 55px;
}
  table.dataTable.no-footer th {
    border: 1px solid black;
}
  table.dataTable.no-footer {
    border: 1px solid black;
}
table.dataTable thead th {
    / outline: none; /
    border: 1px solid black !important;
}
  input[type="text"] {
    width: 95%;
  }
  #active{
    border: none;color: blue;font-size: 22px;
  }
  #inactive{
    border: none;color: red;font-size: 22px;
  }
  h3.heading_detail{
    color:black;
    font-weight:500;
  }
  .card {
    box-shadow: none !important;
  }
  .card-body {
    background-color: #F5DDBD;
  }
  @media(min-width:375px) {
    .content-wrapper{
      min-height: 867px !important;
    }
  }
  table#Table th {
    border: 1px solid black;
}
table#Table_ID th {
    border: 1px solid black;
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
  .needy-red-box {
    /* background-color: #3695eb; */
    /* ff9f40 */
    /* 3695eb */
    padding: 20px;
  }
  .needy-red-box h3 {
    font-size: 14px;
    margin: 14px 0px;
    font-weight: 600;
    /* color: #fff; */
  }
  .needy-red-box p {
    font-size: 14px;
    font-weight: 400;
    margin: 10px 0px;
    /* color: #fff; */
    text-align: left;
  }
*{
    margin: 0%;
    padding: 0%;
    font-family: 'Open Sans', sans-serif;
}

/* <!-- firstsection  start --> */
.f-section {
    padding-top: 15px;
}
.f-section .row {
    display: flex;
    width: 100%;
}
.container {
    width: 100%;
    max-width: 1029px;
    margin: 0px auto;
    padding: 0px 15px;
}
.f-section .borderbox{
    width: 100%;
    background: #fff;
    margin-top: 10px;
    padding: 8px 25px;
    border-radius: 35px;
    border: 1px solid #eee;
    margin-bottom: 15px;
    box-shadow: 0px 0px 27px 2px #eee;
}
.f-section .borderbox h1 {
    font-size: 22px;
    font-weight: 500;
    margin: 5px 0px;
    padding: 5px 0;
    text-transform: capitalize;
    font-family: 'Roboto', sans-serif;
    color: rgba(118, 118, 118, 1.0);
}
/* <!-- firstsection  end --> */

/* s-section start */
.s-section .row .s-box1 {
    width: 49%;
    box-shadow: 0 2px 28px rgba(0,0,0,.1) !important;
    display: flex;
    border: 1px solid #e8e8e8;
    flex-direction: column;
    justify-content: flex-start;
}

.s-section .row {
    display: flex;
    justify-content: space-between;
    gap: 0px;
}
.s-section .row .s-box1 .content-box1{
    background-image: url('/public/images/IMG/cardholder-doctors.jpg');
    position: relative;
    width: 100%;
    height: 54%;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    z-index: 0;

}
.s-section .row .s-box1 .content-box1::before {
    content: '';
    position: absolute;
    left: 0px;
    top: 0px;
    width: 100%;
    z-index: -1;
    background: #4d9cf8e6;
    height: 100%;
}
.s-section .row .s-box1 .content-box1 .list-box {
    padding: 0px 20px 30px;
    text-align: center;
}

.s-section .row .list-box .img-box {
    max-width: 150px;
    margin: 12px auto;
    z-index: 999;
    margin-bottom: 20px;
    padding-top: 25px;
}

.s-section .row .list-box .img-box img {
    border-radius: 50%;
    width: 150px;
    height: 150px;
    border: 3px solid #fff;
}
.s-section .row .s-box1 .content-box1 .row-box1 {
    display: grid;
    position: relative;
    top: 45px;
    grid-row-gap: 17px;
    justify-content: space-evenly;
    grid-template-columns: auto  auto auto auto;
}

.s-section .row .s-box1 .content-box1 .row-box1 .first-grid {
    background: #ffff;
    width: 108px;
    box-shadow: 0 2px 28px rgba(0,0,0,.1) !important;
    padding: 10px;

   
}
.s-section .row .s-box1 .content-box1 .list-box .lastbox {
    text-align: left;
    background-color: #b39cdb;
    position: relative;
    top: 26px;
    padding: 15px;
}
.s-section .row .s-box1 .content-box1 .row-box1 .first-grid h3 {
    font-size: 14px;
    font-weight: 700;
    line-height: 24px;
    color: #505458;
}

.s-section .row .s-box1 .content-box1 .row-box1 .first-grid h4 {
    font-size: 14px;
    font-weight: 400;
    color: #505458;

}
  .s-section .row .s-box1 .content-box1 .list-box .lastbox h4 {
    font-size: 14px;
    font-weight: 400;
    color: #fff;

  }
.s-section .row .s-box1 .content-box1 .list-box h3  {
    color: #fff;
    font-size: 19px;
    font-weight: 700;
}

.s-section .row .s-box1 .content-box1 .list-box .lastbox h3  {
    font-size: 14px;
    /* color: #eee; */
    font-weight: 700;
    padding: 4px 0px;
}
/* seccond s-box1 */
.s-section .row .s-box1 .blue-box {
  background-color: #3695eb;
    padding: 20px;
    /* margin: 20px; */
}
.s-section .row .s-box1 .blue-box h3 , .s-section .row .s-box1 .red-box h3 , .s-section .row .s-box1 .green-box h3{
    font-size: 14px;
    margin: 14px 0px;
    font-weight: 600;
    color: #fff;
}
.s-section .row .s-box1 .blue-box h3.hide{
    display: none;
}
.s-section .row .s-box1 .blue-box h3 span ,.s-section .row .s-box1 .red-box span , .s-section .row .s-box1 .green-box span, .s-section .list-box .lastbox h3 span{
    font-size: 14px;
    font-weight: 400;
    color: #fff;
    text-align: left;
}
.s-section .row .s-box1 .blue-box select {
    width: 142px;
    border: none;
}
.s-section .row .s-box1 .red-box {
  background-color: #ed858f;
    padding: 20px;
    /* margin: 20px; */
}
.s-section .row .s-box1 .green-box {
    background-color: #99d683;
    padding: 20px;
    /* margin: 20px; */
}
/* .aadhaar-images,.house-images {
      padding-left:3rem !important;
    } */
@media screen and (min-width:426px) and (max-width:678px){
    .s-section .row {flex-direction: column; display: flex;}
    .s-section .row .s-box1 { width: 100%; }
    .container { padding: 0px;}
    .s-section .row .s-box1 .content-box1 .row-box1 {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
    }
}
@media screen and (min-width:321px) and (max-width:425px){
    .s-section .row {flex-direction: column; display: flex;}
    .s-section .row .s-box1 { width: 100%; }
    .container { padding: 0px;}
    .s-section .row .s-box1 .content-box1 .row-box1 {display: grid; grid-template-columns: auto auto; 
        justify-content: space-evenly;}
}
@media screen and (min-width:0px) and (max-width:320px){
    .s-section .row {flex-direction: column; display: flex;}
    .s-section .row .s-box1 { width: 100%; }
    .container { padding: 0px;}
    .s-section .row .s-box1 .content-box1 .row-box1 {display: grid; grid-template-columns: auto  auto; 
        justify-content: space-evenly;}
}
@media screen and (min-width:280px) and (max-width:767px) {
    /* .aadhaar-images,.house-images {
      padding-left:0 !important;
    } */
}
.volunteer-photo,.house-photo,.aadhaar-photo {
  background: #ff9f40;
    width: 160px;
    height: 100px;
    align-items: center;
    padding: inherit;
}
.scroll-class {
  overflow-x: auto;
}
.scroll-class .row {
  flex-wrap: nowrap !important; 
  width:100%;
}
.dynamic_image {
  flex: 0 0 auto;
  width:100px;
  height: 100px;
  cursor:pointer
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
          <div class="col-sm-8">
            <h1>{{$datas->name}} ({{$datas->card_id}})</h1>
          </div>
         
          <div class="col-sm-4 text-right">
            @if($datas->is_needy == 'Yes')
              <a href="{{url('Admin/khalsamemberformdata',$datas->id)}}" class="btn btn-success mr-4" style="font-size: 0.9rem;">Download Card</a>
            @else 
              <a href="{{url('Admin/khalsaformdata',$datas->id)}}" class="btn btn-success mr-4" style="font-size: 0.9rem;">Download Card</a>
            @endif
            <a href="{{url('Admin/viewcardholder')}}"class="btn btn-primary"  style="position: relative !important;  background-color:#ED9B2D; color:black;" style="font-size: 0.9rem;">Back</a>
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
    
                <!-- /.card-body -->

                {{-- <div class="row">
                  <div class="col-lg-2 col-md-2 col-sm-12" style="font-size: 0.9rem;"><b>Name:</b></div>
                  <div class="col-lg-2 col-md-2 col-sm-12" style="font-size: 0.9rem;"> {{$datas->name}}</div>
                  <div class="col-lg-2 col-md-2 col-sm-12" style="font-size: 0.9rem;"><b>Contact Number:</b></div> 
                  <div class="col-lg-2 col-md-2 col-sm-12" style="font-size: 0.9rem;">{{$datas->contact_number}} </div>
                  <div class="col-lg-2 col-md-2 col-sm-12" style="font-size: 0.9rem;"><b>Job:</b></div>
                  <div class="col-lg-2 col-md-2 col-sm-12" style="font-size: 0.9rem;">{{$datas->job}}</div>
                  </div><br>
                  <div class="row">
                  <!-- <div class="col-lg-4 col-md-4 col-sm-12"><b>Address:</b></div>
                  <div class="col-lg-4 col-md-4 col-sm-12"><input type="text" value={{$datas->address}} readonly></div> -->
                  <div class="col-lg-2 col-md-2 col-sm-12" style="font-size: 0.9rem;"><b>Monthly Income:</b></div>
                  <div class="col-lg-2 col-md-2 col-sm-12" style="font-size: 0.9rem;">{{$datas->annual_income}}</div>
                  <div class="col-lg-2 col-md-2 col-sm-12" style="font-size: 0.9rem;"><b>Qualification:</b></div>
                  <div class="col-lg-2 col-md-2 col-sm-12" style="font-size: 0.9rem;">{{$datas->qualification}}</div>
                  <div class="col-lg-2 col-md-2 col-sm-12" style="font-size: 0.9rem;"><b>Aadhaar Number:</b></div>
                  <div class="col-lg-2 col-md-2 col-sm-12" style="font-size: 0.9rem;">{{$datas->adhaar_number}}</div>
                  </div><br>
                  <div class="row">
                  <div class="col-lg-2 col-md-2 col-sm-12" style="font-size: 0.9rem;"><b>Verify Officer:</b></div>
                  <div class="col-lg-2 col-md-2 col-sm-12" style="font-size: 0.9rem;">{{$datas->verify_officer}}</div>
                  <div class="col-lg-2 col-md-2 col-sm-12" style="font-size: 0.9rem;"><b>Family head:</b></div>
                  <div class="col-lg-2 col-md-2 col-sm-12" style="font-size: 0.9rem;">{{$datas->family_head}}</div>
                  <div class="col-lg-2 col-md-2 col-sm-12" style="font-size: 0.9rem;"><b>Address:</b></div>
                  <div class="col-lg-2 col-md-2 col-sm-12" style="font-size: 0.9rem;">{{$datas->address}}</div>
                  </div><br>
                  <div class="row">
                  <div class="col-lg-2 col-md-2 col-sm-12" style="font-size: 0.9rem;"><b>Disease Name:</b></div>
                  <div class="col-lg-2 col-md-2 col-sm-12" style="font-size: 0.9rem;">{{$datas->disease_name}}</div>
                  <div class="col-lg-2 col-md-2 col-sm-12" style="font-size: 0.9rem;"><b>Disease Details:</b></div>
                  <div class="col-lg-2 col-md-2 col-sm-12" style="font-size: 0.9rem;">{{$datas->disease_details}}</div>
                  <div class="col-lg-2 col-md-2 col-sm-12" style="font-size: 0.9rem;"><b>Support Organisation:</b></div>
                  <div class="col-lg-2 col-md-2 col-sm-12" style="font-size: 0.9rem;">{{$datas->support_organisation}}</div>
                  </div><br>
                
                  <div class="row">
                  <div class="col-lg-2 col-md-2 col-sm-12" style="font-size: 0.9rem;"><b>Added By:</b></div>
                  @if($datas->add_type == 'Volunteer')
                  <div class="col-lg-6 col-md-2 col-sm-12" style="font-size: 0.9rem;">{{$datas->add_type}}({{$datas->add_name}},VL{{$datas->add_id}})</div>
                  @elseif($datas->add_type == 'Subadmin')
                  <div class="col-lg-6 col-md-2 col-sm-12" style="font-size: 0.9rem;">{{$datas->add_type}}({{$datas->add_name}},SA{{$datas->add_id}})</div>
                  @else
                  <div class="col-lg-6 col-md-2 col-sm-12" style="font-size: 0.9rem;">{{$datas->add_type}}({{$datas->add_name}},{{$datas->add_id}})</div>
                  @endif
                  <div class="col-lg-2 col-md-2 col-sm-12" style="font-size: 0.9rem;"><b>Profile:</b></div>
                  <div class="col-lg-2 col-md-2 col-sm-12" style="font-size: 0.9rem;"><img src="{{$datas->cardholder_profile}}" style="height: 50px;width:50px;"></div>
                  </div>
                </div><br> --}}
                <div class="s-section">
                  <div class="container">
                    <div class="row">
                      <div class="s-box1">
                        <div class="content-box1">
                        <div class="list-box">
                        <div class="img-box">
                        <img src="{{$datas->cardholder_profile}}">
                      </div>   
                      <h3>Name: {{$datas->name}}</h3> 
          
                      <div class="row-box1 mb-5">
                        <div class="first-grid"><h3>Phone: </h3> <h4> {{$datas->contact_number}}</h4></div>
                        <div class="first-grid"><h3>Age:{{$datas->age}}</h3><h4>Years Old</h4></div>
                        <div class="first-grid"><h3>Blood:</h3><h4>{{$datas->blood_group}}</h4></div>
                        <div class="first-grid"><h3>Education:</h3><h4>{{$datas->qualification}}</h4></div>
                      </div>
                      <h6 style="padding-top: 35px;"> Added By: {{$datas->add_name.' ('.$datas->add_type.$datas->add_card_id.')'}} </h6>

                      <div class="lastbox">
                        <h3>Aadhaar Number : <span>{{$datas->adhaar_number}}</span></h3>
                        <h3>Village : <span>{{$datas->village}}</span></h3>
                        <h3>Address : <span>{{$datas->address}}</span></h3>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="s-box1">
                  <div class="blue-box m-3">
                      <h3>Email : <span>{{$datas->email}}</span></h3> 
                      <h3>WhatsApp Number : <span>{{$datas->whatsapp_number}}</span></h3> 
                      <h3>Occupation : <span>{{$datas->job}}</span></h3> 
                      <h3>Monthly Income : <span>{{$datas->annual_income}}</span></h3> 
                      <h3>Accomodation : 
                        <span>
                          @if($datas->own_house)
                            @if($datas->own_house == 'yes') 
                              Own House 
                            @else
                              Rent
                            @endif
                          @endif
                        </span>
                      </h3> 
                      
                      @if($datas->own_house == 'no')
                      <h3>How much rent : <span>Rs.{{$datas->rent_price}}</span></h3>
                      @endif
                      <h3>Blood Donor : <span>{{ $datas->blood_donor === "yes" ? "Yes" : "No" }}</span></h3>
                  </div>
                  
                  @if($datas->is_needy == 'Yes')
                  <div class="red-box mx-3 mb-3">

                      <h3>Family members suffering from disease : <span>{{$is_needy_data->name}}</span></h3>
                      <h3>Suffering since : <span>{{$is_needy_data->disease_time}}</span></h3>
                      <h3>Disease Name and details : <span>{{$is_needy_data->medical_detail}}</span></h3>
                  </div>

                  <div class="green-box mx-3 mb-3">
                    <h3>Company Name : <span>{{$is_needy_data->company_name}}</span></h3>
                    <h3>Policy No : <span>{{$is_needy_data->policy_number}}</span></h3>
                    <h3>Issue Date : <span>{{$is_needy_data->policy_issue_date}}</span></h3>
                    <h3>Expiry Date : <span>{{$is_needy_data->policy_expiry_date}}</span></h3>
                    </div>
                  </div>
                  @else
                  <div class="red-box mx-3 mb-3">

                      <h3>Family members suffering from disease : <span>{{$datas->long_disease}}</span></h3>
                      <h3>Suffering since : <span>{{$datas->disease_name}}</span></h3>
                      <h3>Disease Name and details : <span>{{$datas->disease_details}}</span></h3>
                  </div>
                  <div class="green-box mx-3 mb-3">
                    <h3>Company Name :<span>{{$datas->company_name}}</span></h3>
                    <h3>Policy No :<span>{{$datas->policy_number}}</span></h3>
                    <h3>Issue Date :<span>{{$datas->policy_issue_date}}</span></h3>
                    <h3>Expiry Date :<span>{{$datas->policy_expiry_date}}</span></h3>
                    </div>
                  </div>
                  @endif
                  
                </div>
                      <!-- <div class="s-box1"></div> -->
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
      @if($datas->is_needy == 'Yes')
        <section class="content">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="car-body">
                  <h5 class="heading_detail text-left mx-3 my-3">Is Needy</h5>
                  <hr>
                  <div class="needy-red-box mx-3 mb-3 rounded">
                    <div class="row">
                      <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="row">
                          <div class="col-6">
                            <h3>Patient's Detail in Family</h3>
                          </div>
                          <div class="col-1">
                            <h3>:</h3>
                          </div>
                          <div class="col-5">
                              <p>{{$is_needy_data->name }}</p>
                          </div>
                          <div class="col-6">
                            <h3>Disease Time</h3>
                          </div>
                          <div class="col-1">
                            <h3>:</h3>
                          </div>
                          <div class="col-5">
                              <p>{{$is_needy_data->disease_time}}</p>
                          </div>
                          <div class="col-6">
                            <h3>Medical Detail</h3>
                          </div>
                          <div class="col-1">
                            <h3>:</h3>
                          </div>
                          <div class="col-5">
                              <p>{{$is_needy_data->medical_detail}}</p>
                          </div>
                          <div class="col-6">
                            <h3>Help from foundation</h3>
                          </div>
                          <div class="col-1">
                            <h3>:</h3>
                          </div>
                          <div class="col-5">
                              <p>{{$is_needy_data->foundation_detail}}</p>
                          </div>
                          <div class="col-6">
                            <h3>Foundation help detail</h3>
                          </div>
                          <div class="col-1">
                            <h3>:</h3>
                          </div>
                          <div class="col-5">
                              <p>{{$is_needy_data->foundation_help}}</p>
                          </div>
                          <div class="col-6">
                            <h3>Foundation Memebership</h3>
                          </div>
                          <div class="col-1">
                            <h3>:</h3>
                          </div>
                          <div class="col-5">
                              <p>{{$is_needy_data->foundation_member}}</p>
                          </div>
                          <div class="col-6">
                            <h3>Help from government</h3>
                          </div>
                          <div class="col-1">
                            <h3>:</h3>
                          </div>
                          <div class="col-5">
                              <p>{{$is_needy_data->govthelp}}</p>
                          </div>
                          <div class="col-6">
                            <h3>Help amount</h3>
                          </div>
                          <div class="col-1">
                            <h3>:</h3>
                          </div>
                          <div class="col-5">
                              <p>{{$is_needy_data->help_amount}}</p>
                          </div>
                          <div class="col-6">
                            <h3>Agricultural land detail</h3>
                          </div>
                          <div class="col-1">
                            <h3>:</h3>
                          </div>
                          <div class="col-5">
                              <p>{{$is_needy_data->agriculture}}</p>
                          </div>
                          <div class="col-6">
                            <h3>Patient's photo/video can be used on social media</h3>
                          </div>
                          <div class="col-1">
                            <h3>:</h3>
                          </div>
                          <div class="col-5">
                              <p>{{$is_needy_data->social_media}}</p>
                          </div>
                        </div>
                      
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-12">

                        <div class="row">
                          <div class="col-6">
                            <h3>Name/Address of Gurudwara Sahib</h3>
                          </div>
                          <div class="col-1">
                            <h3>:</h3>
                          </div>
                          <div class="col-5">
                            <p>{{$is_needy_data->gurudwara}}</p>                            
                          </div>
                          <div class="col-6">
                            <h3>Contact of Gurudwara Mgmt</h3>
                          </div>
                          <div class="col-1">
                            <h3>:</h3>
                          </div>
                          <div class="col-5">
                            <p>{{$is_needy_data->gurudwara_mgmt}}</p>                            
                          </div>
                          <div class="col-6">
                            <h3>2nd Contact of Gurudwara Mgmt</h3>
                          </div>
                          <div class="col-1">
                            <h3>:</h3>
                          </div>
                          <div class="col-5">
                            <p>{{$is_needy_data->gurudwara_contact}}</p>                            
                          </div>
                          <div class="col-6">
                            <h3>Attesting Officer</h3>
                          </div>
                          <div class="col-1">
                            <h3>:</h3>
                          </div>
                          <div class="col-5">
                            <p>{{$is_needy_data->attesting_officer}}</p>                            
                          </div>
                          <div class="col-6">
                            <h3>Head of family</h3>
                          </div>
                          <div class="col-1">
                            <h3>:</h3>
                          </div>
                          <div class="col-5">
                            <p>{{$is_needy_data->family_head}}</p>                            
                          </div>
                          <div class="col-6">
                            <h3>Volunteer Name</h3>
                          </div>
                          <div class="col-1">
                            <h3>:</h3>
                          </div>
                          <div class="col-5">
                            <p>{{$is_needy_data->volunteer_name}}</p>                            
                          </div>
                          <div class="col-6">
                            <h3>Details of two wheelers</h3>
                          </div>
                          <div class="col-1">
                            <h3>:</h3>
                          </div>
                          <div class="col-5">
                            <p>{{$is_needy_data->two_wheeler}}</p>                            
                          </div>
                          <div class="col-6">
                            <h3>Details of four wheelers</h3>
                          </div>
                          <div class="col-1">
                            <h3>:</h3>
                          </div>
                          <div class="col-5">
                            <p>{{$is_needy_data->four_wheeler}}</p>                            
                          </div>
                          <div class="col-6">
                            <h3>Details of air conditioner</h3>
                          </div>
                          <div class="col-1">
                            <h3>:</h3>
                          </div>
                          <div class="col-5">
                            <p>{{$is_needy_data->air_conditioner}}</p>                            
                          </div>
                          <div class="col-6">
                            <h3>Details of all other income sources</h3>
                          </div>
                          <div class="col-1">
                            <h3>:</h3>
                          </div>
                          <div class="col-5">
                            <p>{{$is_needy_data->income_source}}</p>                            
                          </div>
                          
                         
                        </div>

                      </div>
                    </div>
                    
                  </div>
                  <hr>
                  <!-- <div class="detail-images-box  my-3 rounded p-3" style="background:#ff9f40;">
                    <div class="row ml-2 mr-1">
                      <div class="col-lg-2 col-md-2 col-sm-12 p-0">
                        <h6 class="text-white text-center mb-3">Volunteer's Photo</h6>
                        @if($is_needy_data->volunteer_photo)
                          <img src="{{$is_needy_data->volunteer_photo}}" class="rounded dynamic_image" style="width:100%; height: 125px;" data-toggle="modal" data-target="#myModal"  data-image="{{$is_needy_data->volunteer_photo}}" alt=""/>
                        @else 
                          <p class="text-dark text-center">Image not uploaded</p>  
                        @endif
                      </div>
                      <div class="house-images col-lg-5 col-md-5 col-sm-12">
                        <h6 class="text-white text-center mb-3">Photos of House Condition</h6>
                        @if(count($house_images) > 0)
                          <div class="row">
                            
                            @foreach($house_images as $image)
                              @if($image->image)
                                <div class="col-sm-6">
                                  <img src="{{$image->image}}" class="rounded mb-2 dynamic_image" style="width:100%; height: 125px;" data-toggle="modal" data-target="#myModal" data-id="{{$image->id}}" data-image="{{$image->image}}" alt=""/>
                                </div>
                              @endif  
                            @endforeach
                          </div>
                        @else
                          <p class="text-dark text-center">Image not uploaded</p>  
                        @endif
                      </div>
                      <div class="aadhaar-images col-lg-5 col-md-5 col-sm-12">
                        <h6 class="text-white text-center mb-3">Aadhar card Photocopies of family</h6>
                        @if(count($aadhaar_images)>0)
                          <div class="row">
                            @foreach($aadhaar_images as $image)
                              @if($image->aadhaar_images)
                                <div class="col-sm-6">
                                  <img src="{{$image->aadhaar_images}}" class="rounded mb-2 dynamic_image" style="width:100%; height: 125px;" data-toggle="modal" data-target="#myModal" data-id="{{$image->id}}" data-image="{{$image->aadhaar_images}}" alt=""/>
                                </div>
                              @endif  
                            @endforeach
                          </div>
                        @else 
                          <p class="text-dark text-center">Image not uploaded</p>  
                        @endif
                      </div>
                    </div>
                  </div> -->


                  <!-- New Scroable Images section -->
                  <div class="detail-images-box m-5">
                    <div class="row  justify-content-center">
                      <div class="col-2 ">
                        <div class="row volunteer-photo">
                          <h6 class="text-white text-center">Volunteer's Photo</h6>
                        </div>
                      </div>
                      <div class="col-1"></div>
                      <div class="col-9 pl-0">
                        @if($is_needy_data->volunteer_photo)
                            <img src="{{$is_needy_data->volunteer_photo}}" class="rounded dynamic_image ml-3" style="width:100px; height: 100px;" data-toggle="modal" data-target="#myModal"  data-image="{{$is_needy_data->volunteer_photo}}" alt=""/>
                          @else 
                            <p class="text-dark text-center">Image not uploaded</p>  
                          @endif
                      </div>
                    </div>

                  </div>
                  <hr>
                  <div class="house-images m-5">
                    <div class="row  justify-content-center">
                      <div class="col-2 ">
                        <div class="row house-photo">
                        <h6 class="text-white text-center ">Photos of House Condition</h6>
                        </div>
                      </div>
                      <div class="col-1"></div>
                      <div class="col-9">
                        @if(count($house_images) > 0)
                          <div class="scroll-class ">
                            <div class="row">
                              @foreach($house_images as $image)
                                @if($image->image)
                                  
                                    <img src="{{$image->image}}" class="rounded mb-2 dynamic_image ml-3"  data-toggle="modal" data-target="#myModal" data-id="{{$image->id}}" data-image="{{$image->image}}" alt=""/>
                                
                                @endif  
                              @endforeach
                            </div>
                          </div>
                        @else
                          <p class="text-dark text-center">Image not uploaded</p>  
                        @endif
                      </div>
                    </div>

                  </div>
                  <hr>
                  <div class="aadhaar-images m-5">
                    <div class="row  justify-content-center">
                      <div class="col-2 ">
                        <div class="row aadhaar-photo">
                        <h6 class="text-white text-center ">Aadhar card Photocopies of family</h6>
                        </div>
                      </div>
                      <div class="col-1"></div>
                      <div class="col-9">
                        @if(count($aadhaar_images)>0)
                          <div class="scroll-class">
                            <div class="row">
                              @foreach($aadhaar_images as $image)
                                @if($image->aadhaar_images)
                                  
                                    <img src="{{$image->aadhaar_images}}" class="rounded mb-2 dynamic_image ml-3" data-toggle="modal" data-target="#myModal" data-id="{{$image->id}}" data-image="{{$image->aadhaar_images}}" alt=""/>
                                  
                                @endif  
                              @endforeach
                            </div>
                          </div>
                        @else 
                          <p class="text-dark text-center">Image not uploaded</p>  
                        @endif
                      </div>
                    </div>

                  </div>
                  <!-- Scroable Images section End Here -->
                </div>
              </div>
            </div>
          </div>
          <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  

                </div>
                <div class="modal-body">
                    <p><span class="roomNumbers">

                    </span></p>                               
                </div>
               
              </div>
            </div>
           </div>
        </section>
      @endif  
      <section class="content">

        <div class="row">
          <div class="col-12">
            
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                <h3 class="heading_detail text-center">Family Details:</h3>
                <hr class="mt-3 mb-4">
                <table id="Table_ID" class=" table table-responsive-sm table-striped table table-bordered table-hover ">
                  <thead>
                  <tr>
                    <th>Id</th>
                    <th>Card Id</th>
                    <th>Name</th>
                    <th>Amritdhari</th>
                    <th>Age</th>
                    <th>Aadhaar Number</th>
                    <th>Qualification</th>
                    <th>Job</th>
                    <th>Salary</th>
                    <th>Relation</th>
                  </tr>
                  </thead>
                  <tbody style="font-size: 0.9rem;">
                  <?php $i=1; ?>
                    @foreach($datasss as $value)
                    <tr>
                      <td>{{$i++}}</td>                            
                      <td>{{$value->card_id}}</td>                            
                      <td>{{$value->fname}}</td>             
                      <td>{{$value->famritdhari}}</td>
                      <td>{{$value->fage}}</td>
                      <td>{{$value->faadhaar}}</td>
                      @if($value->fjob == 'null')
                      <td>NA</td>
                      @else
                      <td>{{$value->fqualification}}</td>
                      @endif
                      @if($value->fjob == 'null')
                      <td>NA</td>
                      @else
                      <td>{{$value->fjob}}</td>
                      @endif
                      @if($value->fsalary == 'null')
                      <td>NA</td>
                      @else
                      <td>{{$value->fsalary}}</td>
                      <td>{{$value->frelation}}</td>
                      @endif
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
      </section>
      <section class="content pb-5">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                <h3 class="heading_detail text-center">Children Details:</h3>
                <hr class="mt-3 mb-4">
                <table id="Table" class=" table table-responsive-sm table-striped table table-bordered table-hover ">
                  <thead>
                  <tr>
                    <th>Id</th>
                    <th>Card Id</th>
                    <th>Name</th>
                    <th>Amritdhari</th>
                    <th>Age</th>
                    <th>Aadhaar Number</th>
                    <th>Qualification</th>
                    <th>Fees</th>
                    <th>School</th>
                    <th>Relation</th>
                  </tr>
                  </thead>
                  <tbody style="font-size: 0.9rem;">
                  <?php $i=1;?>
                    @foreach($children as $child)
                    <tr>
                      <td>{{$i++}}</td>   
                      <td>{{$child->card_id}}</td>                          
                      <td>{{$child->cname}}</td>             
                      <td>{{$child->camritdhari}}</td>
                      <td>{{$child->cage}}</td>
                      <td>{{$child->caadhaar}}</td>
                      @if($child->cqualification == 'null')
                      <td>NA</td>
                      @else
                      <td>{{$child->cqualification}}</td>
                      @endif
                      @if($child->cfees == 'null')
                      <td>NA</td>
                      @else
                      <td>{{$child->cfees}}</td>
                      @endif
                      @if($child->cschool == 'null')
                      <td>NA</td>
                      @else
                      <td>{{$child->cschool}}</td>
                      @endif
                      <td>{{$child->crelation}}</td>
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

      </section>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
  $(document).ready( function () {
    // alert('hh');
    var t = $('#Table_ID').DataTable({
        // columnDefs: [
        //     {
        //         searchable: false,
        //         orderable: false,
        //         targets: 0,
        //     },
        // ],
        // order: [[0, 'desc']],
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
    });
 
    // t.on('order.dt search.dt', function () {
    //     let i = 1;
 
    //     t.cells(null, 0, { search: 'applied', order: 'applied' }).every(function (cell) {
    //         this.data(i++);
    //     });
    // }).draw();
    
  } );
  </script>
  <script>
    $(document).ready( function () {
      // alert('hh');
      var t = $('#Table').DataTable({
          // columnDefs: [
          //     {
          //         searchable: false,
          //         orderable: false,
          //         targets: 0,
          //     },
          // ],
          // order: [[0, 'desc']],
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
      });
   
      // t.on('order.dt search.dt', function () {
      //     let i = 1;
   
      //     t.cells(null, 0, { search: 'applied', order: 'applied' }).every(function (cell) {
      //         this.data(i++);
      //     });
      // }).draw();
      
    } );
  </script>
  <script> 
    $('.dynamic_image').click(function() {

    var myRoomNumber = $(this).attr('data-image');
   
    $('#myModal').find('.roomNumbers').html('<img src="'+myRoomNumber+'" style="width:100%"/>');
});
     function show(id) {
        //  alert(id);
         $.ajax({
             type: "Get",
             url:"{{url('Admin/change_status_customer')}}",
             data: {customer_id:id },
             success: function(data) {              
                //  if(data.status == 0){
                //    $.each(data.message, function (key, value) {
                //           $('#'+key).removeClass('d-none');
                //           $('#'+key).html(value[0]);
                //        });
                //    }
                //    if(data.status == 1){
                //        Swal.fire(
                //        'Good job!',
                //        'Status Changed!',
                //        'success'
                //      )
                   
                //    }
                   location.reload();
             }
         });
       }  
   </script>
@endsection


