@extends('Admin.layouts.App')
@section('card','menu-open')
@section('viewcardholder','active')

  <!-- Content Wrapper. Contains page content -->
  @section('main_section')
  <style>
    
	  a.btn.btn-primary.back_btn{
      background-color:#ED9B2D;
      color:black;
    }
    /* .card.card-primary {
      height: 595px;
    } */
    .card-footer {
        background-color: #F5DDBD !important;
        border-top:0px;
        /* margin-top:-20px !important; */
    }
    body.sidebar-mini {
        overflow-x: hidden;
    }
    label.verify_officer_label {
        margin-left: 36%;
    }
    h4#membership_form {
        float: left;
    }
    select#ffqualification {
        margin-left: 17px;
    }
    select#ccqualification {
        margin-left: 17px;
    }

     @media only screen and (min-width: 768px) and (max-width: 991px) {
      .container-fluid {
          width: 65%;
          margin: 0px auto;
          text-align: center;
          margin-right: 14px;
        }

      
        table#tbody {
          margin-left: 241px;
          margin-right: 27px;
       }

       .form-group.family_member {
          margin-left: 256px;
      }
    
       h5#heading1{
          margin-left: 247px;
        }
       h5#heading2{
          margin-left: 247px;
        }
       table#table_class{
          margin-left: 241px;
          margin-right: 27px;
       }
    }
    select#select_amritdhari {
        margin-left: 16px;
        width: 40;
    }
    button#addBtn {
      margin-right: 13px;
    }
    button#addData{
      margin-right: 13px;
    }
    table td input[type="text"] {
    width: 96%;
    border: 1px solid #afa6a6;
    border-bottom: 1px solid #afa6a6;
    margin-left: 20px;
    }
    table#tbody {
    height: 40px !important;
    }
    table#table_class{
      height: 40px !important;
    }
     table#tbody {
      width: 1085px;
    }
    table#table_class {
      width: 1085px;
    }
    input#org_name {
      margin-left: 5px;
    }
    input#family{
      margin-left: 5px;
    }
    #hidden_div {
        display: none;
    }
    button#submitForm {
      color:black;
      background-color: #ED9B2D;
    	/* width: 20%; */
    }
    input{
    border: none;
    outline: none;
    background: none;
    font-family: 'Open Sans', Helvetica, Arial, sans-serif;
    border-bottom-style: groove;
    }
   .invoice-wrapper{
          background: #FFF;

          margin-top: 20px;
          border-radius: 4px;
          margin-bottom: 20px;
      }
      .verify_officer {
        display: grid !important;
        grid-template-columns: 1fr !important;
        grid-template-rows: repeat(2,1fr) !important;
        text-align: center;
     }
   
     .verify_officer_label {
    position: absolute;
    margin-top: 20px;
    left: 10%;
   }
   
    table{
    /* width:92% ;  */
    /* margin:2%;  */
    height: 216px !important;
    text-align: center;
    
    }
    table th{
      text-align: center;
    }
    .form-group{
    margin-bottom: 20px !important;
      }
      table td input[type="text"] {
        width: 96%;
      }
    @media (max-width:992px) {
    /* form#form {
        margin-left: 244px;
    }
    table#tbody {
      margin-left: 256px;
    }
    table#table_class{
      margin-left: 264px;
    } */
    }

    @media(min-width:280px) and (max-width:767px) {
      button#submitForm{
          width:33%;
      }
      label.verify_officer_label {
          margin-left: 0px;
      }
      div#Table_ID_wrapper {
          overflow-y: scroll;
      }
      select#select_amritdhari {
          margin-left: 19px;
          width: 40;
      }
      h4#membership_form {
          font-size: 18px;
      }
      form#form {
        margin-left: 0px;
    }
    table#tbody {
        margin-left: 0px;
      }
      table#table_class{
        margin-left: 0px;
      }
      body:not(.sidebar-mini-md):not(.sidebar-mini-xs):not(.layout-top-nav) .content-wrapper, body:not(.sidebar-mini-md):not(.sidebar-mini-xs):not(.layout-top-nav) .main-footer, body:not(.sidebar-mini-md):not(.sidebar-mini-xs):not(.layout-top-nav) .main-header {
      margin-left: 0px !important;
    }
    }
    button#addBt{
        display:none;
      }
      button#addBtA{
        display:none;
      }
  </style>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <div class="main_content">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Khalsa Card Membership Form</h1>
          </div>
          <div class="col-6 col-sm-6 text-right">
            <a href="{{url('Admin/viewcardholder')}}"class="btn btn-primary back_btn">Back</a>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section> 

    <!-- Main content -->
     <section class="content pb-5">
      <div class="container-fluid">
        <div class="row justify-content-center"> 
          <!-- left column -->
          <div class=" col-lg-12 col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary" style="font-size: 0.9rem;">
              <div class="container-fluid">
                <div class="invoice-wrapper">
                </div>

              <!-- form start -->
              <form  method="post" action="{{url('Admin/savecardholder')}}" id="form">
                @csrf
                <div class="row">
                  <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="form-group">
                      <label for="pwd">Name of the head of family <span class="text-danger">*</span></label>
                      <input type="text" class="form-control" id="username" name="name" value="{{$cardholder->name}}">
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="form-group">
                      <label for="pwd">ਪਰਿਵਾਰ ਦੇ ਮੁਖੀ ਦਾ ਨਾਮ <span class="text-danger">*</span></label>
                      <input type="text" class="form-control" id="usernameP" placeholder="ਪਰਿਵਾਰ ਦੇ ਮੁਖੀ ਦਾ ਨਾਮ ਦਰਜ ਕਰੋ" value="{{$cardholder->name_punjabi}}" name="name_punjabi">
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="form-group">
                      <label for="cardholder_profile">Profile Picture</label>
                      <input type="file" name="cardholder_profile" class="form-control" id="profile_pic" >
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="form-group">
                      <label for="pwd">Previously Uploaded Profile Picture </label><br>
                      @if($cardholder->cardholder_profile)
                        <img src="{{$cardholder->cardholder_profile}}" alt="" style="width:50px; height:50px;">
                      @else
                        <div class="box border text-danger" style="width:75px; height:50px; margin-left:40%;">
                          <p class="text-center">Not Uploaded</p> 
                        </div>
                      @endif
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="form-group">
                      <label  for="pwd">Age <span class="text-danger">*</span></label>
                      <input type="text" class="form-control" name="age" id="age" onkeypress="return isNumber(event)" value="{{$cardholder->age}}">
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="form-group">
                      <label for="pwd">Aadhaar Card No <span class="text-danger">*</span></label>
                      <input type="text" class="form-control" id="number" name="adhaar_number" maxlength="12"  onkeypress="return onlyNumberKey(event)"  value="{{$cardholder->adhaar_number}}">
            
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="form-group">
                      <label for="pwd">Address <span class="text-danger">*</span></label>
                      <input type="text" class="form-control" id="Address" name="address" value="{{$cardholder->address}}">
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="form-group">
                      <label for="pwd">ਪਤਾ <span class="text-danger">*</span></label>
                      <input type="text" class="form-control" placeholder="ਪਤਾ ਦਰਜ ਕਰੋ" id="AddressP" value="{{$cardholder->address_punjabi}}" name="address_punjabi">
                    </div>
                  </div>

                  <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="form-group">
                      <label for="pwd" class="blood_gp">Blood Group</label>
                      <select id="blood_group" class="form-control" name="blood_group">
                        <option value="">Select</option>
                          <option value="A+" {{$cardholder->blood_group == "A+"  ? 'selected' : ''}}>A+</option>
                          <option value="A-" {{$cardholder->blood_group == "A-"  ? 'selected' : ''}}>A-</option>  
                          <option value="O+" {{$cardholder->blood_group == "O+"  ? 'selected' : ''}}>O+</option>
                          <option value="O-" {{$cardholder->blood_group == "O-"  ? 'selected' : ''}}>O-</option>
                          <option value="B-" {{$cardholder->blood_group == "B+"  ? 'selected' : ''}}>B+</option>         
                          <option value="B+" {{$cardholder->blood_group == "B-"  ? 'selected' : ''}}>B-</option>
                          <option value="AB+" {{$cardholder->blood_group == "AB+"  ? 'selected' : ''}}>AB+</option>
                          <option value="AB-" {{$cardholder->blood_group == "AB-"  ? 'selected' : ''}}>AB-</option>        
                      </select><br>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="form-group">
                      <label for="blood_donor"></label>
                      <label for="blood_donor" class="form-control mt-1 position-relative" style="height: 45px;">
                        <span class="position-absolute " style="top: 21%; left: 15%; color: #0b528f; font-size: 0.9rem;">Blood Donor</span>
                      </label>
                      <input type="checkbox" class="position-absolute" id="blood_donor" name="blood_donor" value="yes" style="top: 39%; left: 10%;" {{$cardholder->blood_donor == "yes"  ? 'checked' : ''}}>

                    </div>
                  </div>
                  <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="form-group">
                      <label for="pwd">City</label>
                      
                      <!-- <input type="text" class="form-control" placeholder="Enter vilage/city" name="village" id="village" value="{{$cardholder->village}}"> -->
                   

                      <select name="village" class="form-control " placeholder="Select city" id="village">
                              <option value="">Select city</option>
                            @foreach($cities as $name)
                            <option value="{{$name->city}}" <?php if($name->city == $cardholder->village) { ?> selected="selected"<?php } ?>>{{$name->city}}</option>
                            @endforeach
                                </select>
                    </div>
                  </div>
                  <input type="hidden"  class="form-control" name="cardholder_id" id="cardholder_id" value="{{$cardholder->id}}">

                  <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="form-group">
                      <label for="pwd">Contact Number <span class="text-danger">*</span></label>
                      <input type="number"  class="form-control" name="contact_number" id="contact_nos" maxlength="10" value="{{$cardholder->contact_number}}">
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-4 col-sm-12">
                      <div class="form-group">
                        <label for="whatsapp_number">WhatsApp Number <span class="text-danger">*</span></label>
                        <input type="number" placeholder="Enter WhatsApp Number" class="form-control" name="whatsapp_number"  value="{{$cardholder->whatsapp_number}}"id="whatsapp_number" maxlength="10">
                      </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12">
                      <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email"  value="{{$cardholder->email}}"placeholder="Enter Email" class="form-control">
                      </div>
                    </div>
                  <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="form-group">
                      <label for="pwd">Educational Qualification <span class="text-danger">*</span></label>
                      <select id = "qualification" class="form-control" name="qualification">
                        <option value="below10" {{$cardholder->qualification == "below10"  ? 'selected' : ''}}>below 10</option>
                        <option value="12" {{$cardholder->qualification == "12"  ? 'selected' : ''}}>12</option>            
                        <option value="graduate" {{$cardholder->qualification == "graduate"  ? 'selected' : ''}}>Graduate</option>            
                        <option value="degree" {{$cardholder->qualification == "degree"  ? 'selected' : ''}}>Degree</option>            
                        <option value="diploma" {{$cardholder->qualification == "diploma"  ? 'selected' : ''}}>Diploma</option>            
                        <option value="postgraduate" {{$cardholder->qualification == "postgraduate"  ? 'selected' : ''}}>Post Graduate</option>            
                        <option value="PhD" {{$cardholder->qualification == "PhD"  ? 'selected' : ''}}>PhD</option>            
                      </select><br>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="form-group">
                      <label for="pwd">Occupation <span class="text-danger">*</span></label>
                      <input type="text" class="form-control" placeholder="Enter occupation " id="username" name="occupation" value="{{$cardholder->job}}">
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="form-group">
                      <label for="pwd">Monthly Income</label>
                      <input type="number"  class="form-control" placeholder="Enter monthly income" name="annual_income" value="{{$cardholder->annual_income}}">
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-4 col-sm-12">
                    <label for="pwd">Accomodation</label>
                    <select name="own_house" id = "ddlPassport" class="form-control" onchange = "ShowHideDiv()">
                        <option value="yes" {{$cardholder->own_house == 'yes' ? 'selected' : ''}}>Own House</option>
                        <option value="no" {{$cardholder->own_house == 'no' ? 'selected' : ''}}>Rent</option>            
                    </select><br>
                    @if($cardholder->own_house == 'yes')
                      <style>
                        #dvPassport {
                          display:none;
                        }
                      </style>
                    @endif
                  </div>
                  <div id="dvPassport" class="col-lg-4 col-md-4 col-sm-12">
                    <label for="pwd">(How much rent)</label>
                    <input type="text" class="form-control" id="rent3" name="rent_price" placeholder="Enter rent price" value="{{$cardholder->rent_price}}" onkeypress="return isNumber(event)">
                  </div>
                </div>

                
                <!-- <div class="row">
                  <div class="col-lg-4 col-md-4 col-sm-12">
                    <div div class="form-group">
                      <label for="pwd">Annual Income</label>
                      <input type="number"  class="form-control" name="annual_income" value="{{$cardholder->annual_income}}">
                    </div>
                  </div>

                  <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="form-group family_member ml-2">
                      <label for="pwd" style="margin-left:5px;">Family members suffering from disease:</label>
                      <input type="text"  class="form-control" id="family" name="long_disease" value="{{$cardholder->long_disease}}">
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="form-group ">
                      <label for="pwd">Suffering since
                      </label>
                      <input type="text"  class="form-control"  name="disease_name" value="{{$cardholder->disease_name}}">
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="form-group col-md-12">
                      <label for="pwd">Disease Name and details:</label>
                      <input type="text"   class="form-control" name="disease_details" id="disease_details" value="{{$cardholder->disease_details}}">
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class=" form-group organisation ml-2">
                      <label for="pwd"  style="margin-left:5px;">Support from any organisation/NGO:</label>
                      <input type="text" class="form-control" name="support_organisation" id="org_name" value="{{$cardholder->support_organisation}}">
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class=" form-group">
                      <label for="pwd">Joined any organisation:</label>
                      <input type="text"  class="form-control"  name="joined_organisation" id="org_joined" value="{{$cardholder->joined_organisation}}">
                    </div>
                  </div>
                </div> -->
                 
         
              </div>
                   
            </div>
                  

            {{--<div class="row mt-4">
              <div class="col">
                <div class="form-group ml-2">
                  <label for="blood_donor">Is Needy</label>
                  <input type="checkbox" id="granthi" name="granthi" value="Yes" {{$cardholder->is_needy == "Yes"  ? 'checked' : ''}}>
                </div>
              </div>
            </div>
            @if($cardholder->is_needy != 'Yes')
              <style>
                #member {
                  display: none;
                }
              </style>
            @endif
            <div class="data card mb-5" id="member">
              <div class="card-body" style="font-size: 0.9rem;">
                <div class="row">
                  <div class="col-lg-6 col-md-6 col-sm-12">
                    <label>Patient's Detail in Family</label><br>
                    <input type="text" placeholder="Enter patient details" class="form-control" name="patient_detail" value="">
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-12">
                    <label>How Long</label><br>
                    <input type="text" placeholder="how long " class="form-control" name="disease_time" value="">
                  </div>
                </div><br>
                <div class="row">

                  <div class="col-lg-6 col-md-6 col-sm-12">
                    <label for="pwd">Accomodation</label>
                    <select name="own_house" id = "ddlPassport" class="form-control" onchange = "ShowHideDiv()">
                        <option value="yes" value="">Own House</option>
                        <option value="no">Rent</option>            
                    </select><br>
                    <div id="dvPassport" style="display: none">
                      <label for="pwd">(How much rent)</label>
                      <input type="text" class="form-control" id="rent3" name="rent_price" placeholder="Enter rent price" onkeypress="return isNumber(event)">
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="form-group">
                      <label for="pwd">Annual Income</label>
                      <input type="number"  class="form-control" placeholder="Enter annual income" name="annual_income">
                    </div>
                  </div>
                </div>
    
                <div class="row">
                  <div class="col-lg-6 col-md-6 col-sm-12">
                    <label>Disease and medical detail</label><br>
                    <input type="text" placeholder="Enter desease/medical detail" class="form-control" name="medical_detail">
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-12">
                    <label>Help from any foundation</label><br>
                    <select id = "foundation_detail" class="form-control" name="foundation_detail">
                      <option value="">Select</option>
                      <option value="yes">Yes</option>
                      <option value="no">No</option>            
                    </select><br>
                  </div>
                </div><br>
    
                <div class="row">
                  <div class="col-lg-6 col-md-6 col-sm-12">
                    <label>Detail of help from any foundation</label><br>
                    <input type="text" class="form-control" placeholder="Enter details of help from foundation" name="foundation_help">
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-12">
                    <label>Membership of any foundation</label><br>
                    <input type="text" placeholder="Enter membership of any foundation" class="form-control" name="foundation_member">
                  </div>
                </div><br>
                <div class="row">
                  <div class="col-lg-6 col-md-6 col-sm-12">
                    <label>Help from any Govt. Organization</label><br>
                    <input type="text" class="form-control" name="govthelp">
                  </div>
                  <div class="col-lg-2 col-md-2 col-sm-6">
                    <label>Yes</label><br><input type="radio" name="govthelp" value="yes" id="govthelp">
                  </div>
                  <div class="col-lg-2 col-md-2 col-sm-6">
                    <label>No</label><br><input type="radio" name="govthelp" value="no">
                  </div>
                </div><br>
    
                <div class="row">
                  <div class="col-lg-6 col-md-6 col-sm-12" id="read">
                    <label>If yes mention amount </label><br>
                    <input type="text" class="form-control" placeholder="Enter help amount" name="help_amount"  onkeypress="return isNumber(event)">
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-12" id="readonly" style="display:none;" >
                    <label>If yes mention amount </label><br>
                    <input type="text" class="form-control" name="help_amount"  onkeypress="return isNumber(event)" readonly>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-12">
                    <label>Details of agricultural land</label><br>
                    <input type="text" placeholder="Enter details of agricultural land" class="form-control" name="agriculture">
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-12 mt-2">
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-12 mt-2">
                    <label>Details of cattle</label><br>
                    <input type="text" placeholder="Enter details of cattle " class="form-control" name="cattle">
                  </div>
                </div><br>
    
                <div class="row">
                  <div class="col-lg-6 col-md-6 col-sm-12" id="social">
                    <label>In the card is approved the photographs and videos of patients can be used on social media platforms for awareness purpose.</label>
                    <input type="text" class="form-control" placeholder="Enter details" name="social_media">
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-12" id="unsocial" style="display: none;">
                    <label>In the card is approved the photographs and videos of patients can be used on social media platforms for awareness purpose.</label>
                    <input type="text" class="form-control"  name="social_media" readonly>
                  </div>
                  <div class="col-lg-2 col-md-2 col-sm-12 mt-4">
                    <label>Yes</label><br>
                    <input type="radio" id="checkbox_id" name="social_media" value="yes">
                  </div>
                  <div class="col-lg-2 col-md-2 col-sm-12 mt-4">
                    <label>No</label><br>
                    <input type="radio" name="social_media" value="no">
                  </div>
                </div><br>
    
                <div class="row">
                  <div class="col-lg-6 col-md-6 col-sm-12">
                    <label>If you are a granthi singh or doing job ,then Name/Address of Gurudwara Sahib</label><br>
                    <input type="text" placeholder="Enter name and address" class="form-control" name="gurudwara">
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-12">
                    <label>Contact of Gurudwara Mgmt. Commmittee's office Bearers</label><br>
                    <input type="text" placeholder="Enter contact details" class="form-control" name="gurudwara_mgmt">
                  </div>
                </div><br>
    
                <div class="row">
                  <div class="col-lg-6 col-md-6 col-sm-12">
                    <label>Attesting Officer</label><br>
                    <input type="text" placeholder="Enter attesting officer name" class="form-control" name="attesting_officer">
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-12">
                    <label>Head of family</label><br>
                    <input type="text" placeholder="Enter head of family name" class="form-control" name="family_heads">
                  </div>
                </div><br>
    
                <div class="row">
                  <div class="col-lg-6 col-md-6 col-sm-12">
                    <label>Attested By:</label>
                  </div>
                </div><br>

                <div class="row">
                  <div class="col-lg-6 col-md-6 col-sm-12">
                    <label>Volunteer's name</label><br>
                    <input type="text" placeholder="Enter volunteer's name" class="form-control" name="volunteer_name">
                  </div>
                </div><br>
    
                <div class="row">
                  <div class="col-lg-6 col-md-6 col-sm-12">
                    <h5 id="heading_class">Volunteer's Details</h5>
                  </div>
                </div>
    
                <div class="row">
                  <div class="col-lg-4 col-md-4 col-sm-12">
                    <label>1) Volunteer's Photo with family</label>
                    <input type="checkbox" id="file_id" onclick="myFunction()">
                    <input type="file" class="form-control" id="file_class" name="volunteer_photo" style="display:none;" accept="image/*">
                  </div>
                  <div class="col-lg-4 col-md-4 col-sm-12">
                    <label>2) 5 to 7 Photos of House Condition</label>
                    <input type="checkbox"  id="hide_id" onclick="showHide(this)">
                    <div id="new_row" >
                      <input class="form-control" type="file" name="house_photo[]" id="visible" style="display:none;" accept="image/*" /> 
                      <button class="btn btn-md mt-1 btn-primary" name="house_photo[]" id="addBt" type="button">
                          Add
                        </button>
                    </div><br>
                  
                    <div id="newinput"></div>
                      
                  </div>
                  <div class="col-lg-4 col-md-4 col-sm-12">
                    <label>3) Aadhar card Photocopies of  family</label>
                    <input type="checkbox" id="aadhaar_id"  onclick="showHideAad(this)">
                    <div id="new_row" >
                      <input type="file" class="form-control" name="aadhaar_card[]" id="aadhar_class" style="display:none;" accept="image/*">
                      <button class="btn btn-md mt-1 btn-primary" name="aadhaar_card[]" id="addBtA" type="button"> Add</button>
                    </div><br>
                    <div id="newinputA"></div>
                  </div>
                </div><br>
                <div class="row">
                  <div class="col-lg-6 col-md-6 col-sm-12">
                    <label>Details of two wheelers</label>
                    <input type="text" placeholder="Enter details of two wheeler" class="form-control" name="two_wheeler">
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-12">
                    <label>Details of four wheelers</label>
                    <input type="text" placeholder="Enter details of four wheeler" class="form-control" name="four_wheeler">
                  </div>
                </div><br>
    
                <div class="row">
                  <div class="col-lg-6 col-md-6 col-sm-12">
                    <label>Details of air conditioner</label>
                    <input type="text" placeholder="Enter details of air conditioner" class="form-control" name="air_conditioner">
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-12">
                    <label>Details of all other income sources</label>
                    <input type="text" placeholder="Enter details of all other income sources" class="form-control" name="income_source">
                  </div>
                </div><br>
    
                <div class="row">
                  <div div class="col-lg-6 col-md-6 col-sm-12">
                    <label>Date</label>
                    <input type="date" class="form-control" name="date">
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-12">
                    <label>Volunteer Signature</label>
                    <input type="text" placeholder="Enter volunteer signature" class="form-control" name="volunteer_signature">
                  </div>
                </div><br>

                <div class="row"> 
                  <div class=" col-lg-12 col-md-12">
                    <div class="form-group">
                      <input type="checkbox" class="" id="policy_checkbox" name="policy_checkbox" checked value="yes">
                      <label for="policy_checkbox" class="ml-1 mt-2">Policy Details:</label>
                      
                    </div>
                  
                    <div class="show_policy">
                      <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                          <div class="form-group">
                            <label for="pwd" class="policy_label">Company Name:</label>
                            <input type="text" placeholder="Enter company name" name="company_name" class="form-control policy">
                          </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 ">
                          <div class="form-group">

                            <label for="pwd" class="policy_label">Policy No:</label>
                            <input type="text" placeholder="Enter policy number" name="policy_no" class="form-control policy">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                          <div class="form-group">
                            <label for="pwd" class="policy_label">Issue Date:</label>
                            <input type="date"  name="issue_date" class="form-control policy">
                          </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                          <div class="form-group">
                            <label for="pwd" class="policy_label">Expiry Date:</label>
                            <input type="date" name="expiry_date" class="form-control policy">
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
    
              </div>
            </div> --}}



            <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-12">
                <div class=" form-group">
                  <input type="text" class="form-control" name="verify_officer" id="verify_officer" value="{{$cardholder->verify_officer}}" placeholder="Enter attesting officer name">
                  <label for="pwd" class="verify_officer_label"> Attesting Officer:</label>
                </div>
              </div>
      
              <div class="col-lg-6 col-md-6 col-sm-12">
                <div class=" form-group">
                  <input type="text"  name="family_head" class="form-control" id="verify_officer" value="{{$cardholder->family_head}}" placeholder="Enter head of family name">
                  <label class="verify_officer_label">Head of family:</label>
                </div>
              </div>
            
              {{-- <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="form-group">
                  <label for="pwd">Or Rent</label>
                  <select id="rent2" class="form-control" name="form_select" onchange="showDiv('hidden_div', this)">
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                  </select><br>
                  <div id="hidden_div"> 
                    <label for="pwd">(How much rent)</label>
                    <input type="text" class="form-control" id="rent3" name="rent_price"></div>
              </div> --}}
                
            </div>
          </div>
          <div class="card-footer">
              <div class="text-center mt-4">
                <button type="submit"  class="btn btn-primary" id="submitForm">Update</button>
              </div>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
  </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">

          </div>
          <!--/.col (right) -->
        {{-- </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section> --}}
    <!-- /.content -->
  </div>
        </div>
  <!-- /.content-wrapper -->
  {{-- <footer class="main-footer">
    <strong>Copyright &copy; 2022 <a href="https://protolabzit.com/">Protolabz eServices</a>.</strong>
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

<!-- Page specific script -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
  
    $('#form').on('submit', function (e) {
      // alert('hh');
      e.preventDefault();
      var spinner = $('#loader');
            spinner.show();
      var data = new FormData(this);
      var id = $("#cardholder_id").val();
      $.ajax({
          type: 'POST',
          url: '{{url('Admin/updatecardholder')}}' + '/' + id,
          dataType: 'json',
          data: data,  
          cache: false,
          contentType: false,
          processData: false,      
          success: function (data) {
            
            if(data.status == 1)
            {
              // location.reload();
              spinner.hide();
              Swal.fire(
                'Good job!',
                'Card Holder Updated!',
                'success'
              )
              location.reload();
            }
            if(data.status == 0)
            {
              spinner.hide();
              toastr["error"](data.message, "Error");
            }
             
          },
          error: function (data) {
              // alert(data);
          }
      });
    });
  });
  </script>
  <script>
    $("input[name='granthi']").change(function(){
      var help = $('input[name=granthi]:checked').val();
      if(help == "Yes"){
        $("#member").show();
        // $("#unsocial").hide();
      }else{
        $("#member").hide();
        // $("#unsocial").show();
      }
      //  alert(help);
    });
    $("#policy_checkbox").click(function() {
      if($(this).is(":checked")) {
          $(".show_policy").show();
      } else {
          $(".show_policy").hide();
      }
    });

    $("input[name='govthelp']").change(function(){
      var help = $('input[name=govthelp]:checked').val();
      if(help == "yes"){
        $("#read").show();
        $("#readonly").hide();
      }else{
        $("#read").hide();
        $("#readonly").show();
      }
      //  alert(help);
    });
    $("input[name='social_media']").change(function(){
      var help = $('input[name=social_media]:checked').val();
      if(help == "yes"){
        $("#social").show();
        $("#unsocial").hide();
      }else{
        $("#social").hide();
        $("#unsocial").show();
      }
      //  alert(help);
    });
    // function ShowHideDiv() {
    //   var ddlPassport = document.getElementById("ddlPassport");
    //   var dvPassport = document.getElementById("dvPassport");
    //   dvPassport.style.display = ddlPassport.value == "no" ? "block" : "none";
    // }
  </script>
  <script>
    function showHide(that) {
      var hiddenBrowserFiles = document.getElementsByName("house_photo[]");
    
      for (var i = 0; i < hiddenBrowserFiles.length; i++) {
        if (that.id == 'show_id') {
          if (that.checked) {
            hiddenBrowserFiles[i].style.display = "show";
            document.getElementsById("addBt").style.display = "show";
          } 
        }
        else{
          if (that.checked) {
            hiddenBrowserFiles[i].style.display = "block";
            
          } 
          else{
            hiddenBrowserFiles[i].style.display = "none";
          }
        }
      }
    }

    function showHideAad(that) {
      var hiddenBrowserFiles = document.getElementsByName("aadhaar_card[]");
    
      for (var i = 0; i < hiddenBrowserFiles.length; i++) {
        if (that.id == 'show_id') {
          if (that.checked) {
            hiddenBrowserFiles[i].style.display = "show";
            document.getElementsById("addBtA").style.display = "show";
          } 
        }
        else{
          if (that.checked) {
            hiddenBrowserFiles[i].style.display = "block";
            
          } 
          else{
            hiddenBrowserFiles[i].style.display = "none";
          }
        }
      }
    }
 
    var rowIdx = 0;
    $('#addBt').on('click', function () {
      // Adding a row inside the tbody.
      $('#newinput').append(`
        <p id="R${++rowIdx}" class="para1">
          <input type="file" name="house_photo[]" id="new_file" class="form-control" accept="image/*">
          <button class="btn mt-1 btn-danger" id="DeleteRow" type="button" onclick="removeNameFromTheList(this)"> Remove</button>  
            
        </p>`
      );
    });
    var rowIdxx = 0;
    $('#addBtA').on('click', function () {
      // Adding a row inside the tbody.
      $('#newinputA').append(`
        <p id="R${++rowIdxx}" class="para1">
          <input type="file" class="form-control" name="aadhaar_card[]" id="new_file_a" accept="image/*">
          <button class="btn mt-1 btn-danger" id="DeleteRow" type="button" onclick="removeNameFromTheList(this)"> Remove</button>  
            
        </p>`
      );
    });
    function removeNameFromTheList(e) {
        e.parentElement.remove()
     }
  </script>
  <script>
    function myFunction() {
      var checkBox = document.getElementById("file_id");
      var text = document.getElementById("file_class");
      if (checkBox.checked == true){
        text.style.display = "block";
      } else {
          text.style.display = "none";
      }
    }
    function myFunction1() {
      var checkBox = document.getElementById("aadhaar_id");
      var text = document.getElementById("aadhar_class");
      if (checkBox.checked == true){
        text.style.display = "block";
      } else {
          text.style.display = "none";
      }
    }
  </script>




  <script>
    var rowIdx = 0;
  
  // jQuery button click event to add a row.
  $('#addBtn').on('click', function () {
      // Adding a row inside the tbody.
      $('#tbody').append(`<tr id="R${++rowIdx}">
            <td class="row-index text-center">
            <input type="text" name="fname[]" class="form-control"></td>
            <td class="row-index text-center">
            <select  id="select_amritdhari" class="form-control" name="famritdhari[]">
                <option value="1">Yes</option>
                <option value="0">No</option>
            </select></td>
            <td class="row-index text-center">
            <input type="text" name="fage[]" class="form-control"></td>
            <td class="row-index text-center">
            <select id ="ffqualification" class="form-control" name="fqualification[]">
                          <option value="below10">below 10</option>
                          <option value="12">12</option>            
                          <option value="graduate">Graduate</option>            
                          <option value="degree">Degree</option>            
                          <option value="diploma">Diploma</option>            
                          <option value="postgraduate">Post Graduate</option>            
                          <option value="PhD">PhD</option>            
                      </select></td>
            <td class="row-index text-center">
            <input type="text" name="fjob[]" class="form-control"></td>
            <td class="row-index text-center">
            <input type="text" name="fsalary[]" class="form-control"></td>
            
             </tr>`);
  });
  $('#addData').on('click', function () {
      // Adding a row inside the tbody.
      $('#table_class').append(`<tr id="R${++rowIdx}">
            <td class="row-index text-center">
            <input type="text" name="cname[]" class="form-control"></td>
            <td class="row-index text-center">
            <select  id="select_amritdhari" class="form-control" name="camritdhari[]">
                <option value="1">Yes</option>
                <option value="0">No</option>
            </select></td></td>
            <td class="row-index text-center">
            <input type="text" name="cage[]" class="form-control"></td>
            <td class="row-index text-center">
            <select id = "ccqualification" class="form-control" name="cqualification[]">
                          <option value="below10">below 10</option>
                          <option value="12">12</option>            
                          <option value="graduate">Graduate</option>            
                          <option value="degree">Degree</option>            
                          <option value="diploma">Diploma</option>            
                          <option value="postgraduate">Post Graduate</option>            
                          <option value="PhD">PhD</option>            
                      </select></td>
            <td class="row-index text-center">
            <input type="text" name="cjob[]" class="form-control"></td>
            <td class="row-index text-center">
            <input type="text" name="csalary[]" class="form-control"></td>
            
             </tr>`);
  });

  </script>
  <script>
    function showDiv(divId, element)
    {
        document.getElementById(divId).style.display = element.value == 1 ? 'block' : 'none';
    }
  </script>
  <script>
    function ShowHideDiv() {
        var ddlPassport = document.getElementById("ddlPassport");
        var dvPassport = document.getElementById("dvPassport");
        dvPassport.style.display = ddlPassport.value == "no" ? "block" : "none";
    }
  </script>
 <script>
    function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}

  </script>
  <script>
 function onlyNumberKey(evt) {
              
              // Only ASCII character in that range allowed
              var ASCIICode = (evt.which) ? evt.which : evt.keyCode
              if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
                  return false;
              return true;
          }
  function onlyNumberKey(evt) {
      
      // Only ASCII character in that range allowed
      var ASCIICode = (evt.which) ? evt.which : evt.keyCode
      if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
          return false;
      return true;
  }
  </script>
@endsection
