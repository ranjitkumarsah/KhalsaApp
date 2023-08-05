@extends('Admin.layouts.App')
@section('card','menu-open')
@section('viewcardholder','active')

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

    <section class="content pb-5">
      <div class="container-fluid">
        <div class="row justify-content-center"> 
          <!-- left column -->
          <div class=" col-lg-12 col-md-12">
            <!-- jquery validation -->
            <div class="" style="font-size: 0.9rem;">
              <div class="container-fluid">
                <div class="invoice-wrapper">
                </div>
                <form  method="post" id="form">
                @csrf
                  <input type="hidden" name="cardholder_id" id="cardholder_id" value="{{$cardholder_id}}">
                  <div class="card card-primary">                               
                    @if($data)
                      <div class="data mb-5" id="member">
                        <div class="card-body" style="font-size: 0.9rem;">
                          <input type="hidden" name="cardholders_id" id="cardholders_id" value="{{$data->id}}">
                          
                          <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                              <label>Patient's Detail in Family</label><br>
                              <input type="text" placeholder="Enter patient name here" class="form-control" name="name" value="{{$data->name}}">
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                              <label>Suffering since</label><br>
                              <input type="text" placeholder="Enter time here" class="form-control" name="disease_time" value="{{$data->disease_time}}">
                            </div>
                          </div><br>

                          <div class="row">

                            <!-- <div class="col-lg-6 col-md-6 col-sm-12">
                              <label for="pwd">Accomodation</label>
                              <select name="own_house" id = "ddlPassport" class="form-control" onchange = "ShowHideDiv()">
                                  <option value="yes" {{$data->own_house == 'yes' ? 'selected' : ''}}>Own House</option>
                                  <option value="no" {{$data->own_house == 'no' ? 'selected' : ''}}>Rent</option>            
                              </select><br>
                              @if($data->own_house == 'yes')
                                <style>
                                  #dvPassport {
                                    display:none;
                                  }
                                </style>
                              @endif
                              <div id="dvPassport">
                                <label for="pwd">(How much rent)</label>
                                <input type="text" class="form-control" id="rent3" name="rent_price" placeholder="Enter rent price" value="{{$data->rent_price}}" onkeypress="return isNumber(event)">
                              </div>
                            </div> -->
                            <!-- <div class="col-lg-6 col-md-6 col-sm-12">
                              <div class="form-group">
                                <label for="pwd">Annual Income</label>
                                <input type="number"  class="form-control" placeholder="Enter annual income" name="annual_income" value="{{$data->annual_income}}">
                              </div>
                            </div> -->
                          </div>
                          
                          <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                              <label>Disease and medical detail</label><br>
                              <input type="text" placeholder="Enter desease/medical detail" class="form-control" name="medical_detail" value="{{$data->medical_detail}}">
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                              <label>Help from any foundation</label><br>
                              <select id = "foundation_detail" class="form-control" name="foundation_detail">
                                <option value="">Select</option>
                                <option value="yes"{{$data->foundation_detail == 'yes' ? 'selected' : ''}}>Yes</option>
                                <option value="no" {{$data->foundation_detail == 'no' ? 'selected' : ''}}>No</option>            
                              </select><br>
                            </div>
                          </div><br>
                          
                          <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                              <label>Detail of help from any foundation</label><br>
                              <input type="text" class="form-control foundation-data" placeholder="Enter details of help from foundation" value="{{$data->foundation_help}}" name="foundation_help" {{$data->foundation_detail == 'no' ? 'readonly' : ''}}>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                              <label>Membership of any foundation</label><br>
                              <input type="text" placeholder="Enter membership of any foundation" class="form-control foundation-data" name="foundation_member" value="{{$data->foundation_member}}" {{$data->foundation_detail == 'no' ? 'readonly' : ''}}>
                            </div>
                            
                          </div><br>

                          <!-- <div class="row">
                            <div class="col-lg-2 col-md-2 col-sm-6">
                              <label>Yes</label><br><input type="radio" name="govthelp" value="yes" id="govthelp" {{$data->govthelp == 'yes' ? 'checked' : ''}}>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-6">
                                <label>No</label><br><input type="radio" name="govthelp" value="no" {{$data->govthelp == 'no' ? 'checked' : ''}}>
                            </div>
                          </div><br> -->
                          @if($data->govthelp =='no')
                              <style>
                                #read{
                                  display:none;
                                }
                                #readonly{
                                  display:block;
                                }
                              </style>
                          @else 
                          <style>
                            #readonly {
                              display:none;
                            }
                          </style>    
                          @endif 
                        <div class="row">
                          <div class="col-lg-6 col-md-6 col-sm-12">
                            <label>Help from any Govt. Organization</label><br>
                              <!-- <input type="text" class="form-control" name="govthelp" id="govhelp"  {{$data->govthelp == 'no' ? 'readonly' : ''}}> -->
                            <div class="row">
                              <div class="col-lg-4 col-md-4 col-sm-6">
                                <label>Yes</label><br><input type="radio" name="govthelp" value="yes" id="govthelp" {{$data->govthelp == 'yes' ? 'checked' : ''}}>
                              </div>
                              <div class="col-lg-4 col-md-4 col-sm-6">
                                <label>No</label><br><input type="radio" name="govthelp" value="no" {{$data->govthelp == 'no' ? 'checked' : ''}}>
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-6 col-md-6 col-sm-12" id="read">
                            <label>If yes mention amount </label><br>
                            <input type="text" class="form-control" placeholder="Enter help amount" name="help_amount"  onkeypress="return isNumber(event)" value="{{$data->help_amount}}">
                          </div>
                          <div class="col-lg-6 col-md-6 col-sm-12" id="readonly" >
                            <label>If yes mention amount </label><br>
                            <input type="text" class="form-control" name="help_amount"  onkeypress="return isNumber(event)" readonly>
                          </div>

                            <!-- <div class="col-lg-6 col-md-6 col-sm-12 mt-2">
                            </div> -->
                        </div><br>
                          {{--@if($data->social_media =='no')
                          <style>
                            #social{
                              display:none;
                            }
                            #unsocial{
                              display:block;
                            }
                            </style>
                          @else 
                          <style>
                            #unsocial {
                              display:none;
                            }
                            </style>    
                          @endif --}}
                          <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                              <label>Details of agricultural land</label><br>
                              <input type="text" placeholder="Enter details of agricultural land" class="form-control" name="agriculture" value="{{$data->agriculture}}">
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 mt-2">
                              <label>Details of cattle</label><br>
                              <input type="text" placeholder="Enter details of cattle " class="form-control" name="cattle" value="{{$data->cattle}}">
                            </div>

                            <!-- <div class="col-lg-6 col-md-6 col-sm-12" id="unsocial" >
                              <label>If the card is approved the photographs and videos of patients can be used on social media platforms for awareness purpose.</label>
                              <input type="text" class="form-control"  name="social_media" readonly>
                            </div> -->
                            <!-- <div class="col-lg-2 col-md-2 col-sm-12 mt-4">
                              <label>Yes</label><br>
                              <input type="radio" id="checkbox_id" name="social_media" value="yes" {{$data->social_media == 'yes' ? 'checked' : ''}}>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-12 mt-4">
                              <label>No</label><br>
                              <input type="radio" name="social_media" value="no" {{$data->social_media == 'no' ? 'checked' : ''}}>
                            </div> -->
                          </div><br>
                
                          <div class="row">
                          <div class="col-lg-6 col-md-6 col-sm-12" id="social">
                              <label>If the card is approved the photographs and videos of patients can be used on social media platforms for awareness purpose.</label>
                              <!-- <input type="text" class="form-control" placeholder="Enter details" name="social_media" > -->
                              <div class="row">

                                <div class="col-lg-4 col-md-4 col-sm-12 ">
                                  <label>Yes</label><br>
                                  <input type="radio" id="checkbox_id" name="social_media" value="yes" {{$data->social_media == 'yes' ? 'checked' : ''}}>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12 ">
                                  <label>No</label><br>
                                  <input type="radio" name="social_media" value="no" {{$data->social_media == 'no' ? 'checked' : ''}}>
                                </div>
                              </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                              <label>If you are a granthi singh or doing job ,then Name/Address of Gurudwara Sahib</label><br>
                              <input type="text" placeholder="Enter name and address" class="form-control" name="gurudwara" value="{{$data->gurudwara}}">
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                              <label>Contact of Gurudwara Mgmt. Commmittee's office Bearers</label><br>
                              <input type="text" placeholder="Enter contact details" class="form-control" name="gurudwara_mgmt" value="{{$data->gurudwara_mgmt}}">
                            </div><br>
                            <!-- <div class="col-lg-6"></div> -->
                            <div class="col-lg-6 col-md-6 col-sm-12">
                              <label>2nd Contact of Gurudwara Mgmt. Commmittee's office Bearers</label><br>
                              <input type="text" placeholder="Enter 2nd contact Number" class="form-control" name="gurudwara_contact" value="{{$data->gurudwara_contact}}">
                            </div>
                          </div><br>
                
                          <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                              <label>Attesting Officer</label><br>
                              <input type="text" placeholder="Enter attesting officer name" class="form-control" name="attesting_officer" value="{{$data->attesting_officer}}">
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                              <label>Head of family</label><br>
                              <input type="text" placeholder="Enter head of family name" class="form-control" name="family_heads" value="{{$data->family_head}}">
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
                              <input type="text" placeholder="Enter volunteer's name" class="form-control" name="volunteer_name" value="{{$data->volunteer_name}}">
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
                              <input type="checkbox" id="file_id" onclick="myFunction()" >
                              <input type="file" class="form-control" id="file_class" name="volunteer_photo" style="display:none;" accept="image/*">
                              <br>
                              @if($data->volunteer_photo)
                                <img src="{{$data->volunteer_photo}}" alt="volunteer photo" width="50px" height="50px">
                                
                              @endif
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12">
                              <label>2) 5 to 7 Photos of House Condition</label>
                              <input type="checkbox"  id="hide_id" onclick="showHide(this)">
                              <div id="new_row" >
                                <input class="form-control" type="file" name="house_photo[]" id="visible" style="display:none;" accept="image/*" /> 
                                <button class="btn btn-md mt-1 btn-primary" name="house_photo[]" id="addBt" type="button">Add</button>
                              </div><br>
                            
                              <div id="newinput"></div>
                              @if($house_images)
                                @foreach($house_images as $house)
                                  @if($house->image)
                                    <img src="{{$house->image}}" alt="house images" width="50px" height="50px" class="mt-1">
                                  @endif
                                @endforeach
                              @endif
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12">
                              <label>3) Aadhar card Photocopies of  family</label>
                              <input type="checkbox" id="aadhaar_id"  onclick="showHideAad(this)">
                              <div id="new_row" >
                                <input type="file" class="form-control" name="aadhaar_card[]" id="aadhar_class" style="display:none;" accept="image/*">
                                <button class="btn btn-md mt-1 btn-primary" name="aadhaar_card[]" id="addBtA" type="button"> Add</button>
                              </div><br>
                              <div id="newinputA"></div>
                              @if($aadhaar_images)
                                @foreach($aadhaar_images as $aadhaar)
                                  @if($aadhaar->aadhaar_images)
                                    <img src="{{$aadhaar->aadhaar_images}}" alt="aadhaar_images" width="50px" height="50px" class="mt-1">
                                  @endif
                                @endforeach
                              @endif
                            </div>
                          </div><br>

                          <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                              <label>Details of two wheelers</label>
                              <input type="text" placeholder="Enter details of two wheeler" class="form-control" name="two_wheeler" value="{{$data->two_wheeler}}">
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                              <label>Details of four wheelers</label>
                              <input type="text" placeholder="Enter details of four wheeler" class="form-control" name="four_wheeler" value="{{$data->four_wheeler}}">
                            </div>
                          </div><br>
                
                          <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                              <label>Details of air conditioner</label>
                              <input type="text" placeholder="Enter details of air conditioner" class="form-control" name="air_conditioner" value="{{$data->air_conditioner}}">
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                              <label>Details of all other income sources</label>
                              <input type="text" placeholder="Enter details of all other income sources" class="form-control" name="income_source" value="{{$data->income_source}}">
                            </div>
                          </div><br>
                
                          <div class="row">
                            <div div class="col-lg-6 col-md-6 col-sm-12">
                              <label>Date</label>
                              <input type="date" class="form-control" name="date" value="{{$data->date}}">
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                              <label>Volunteer Signature</label>
                              <input type="text" placeholder="Enter volunteer signature" class="form-control" name="volunteer_signature" value="{{$data->volunteer_signature}}">
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
                                      <input type="text" placeholder="Enter company name" name="company_name" class="form-control policy" value="{{$data->company_name}}">
                                    </div>
                                  </div>
                                  <div class="col-lg-6 col-md-6 col-sm-12 ">
                                    <div class="form-group">

                                      <label for="pwd" class="policy_label">Policy No:</label>
                                      <input type="text" placeholder="Enter policy number" name="policy_no" class="form-control policy" value="{{$data->policy_number}}">
                                    </div>
                                  </div>
                                </div>

                                <div class="row">
                                  <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                      <label for="pwd" class="policy_label">Issue Date:</label>
                                      <input type="date"  name="issue_date" class="form-control policy" value="{{$data->policy_issue_date}}">
                                    </div>
                                  </div>
                                  <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                      <label for="pwd" class="policy_label">Expiry Date:</label>
                                      
                                      <input type="date" name="expiry_date" class="form-control policy" value="{{$data->policy_expiry_date}}">
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                
                        </div>
                      </div>
                    @else 
                      <div class="data  mb-5" id="member">
                        <div class="card-body" style="font-size: 0.9rem;">
                          <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <label>Patient's Detail in Family</label><br>
                                <input type="text" placeholder="Enter patient name" class="form-control" name="name">
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <label>Suffering since</label><br>
                                <input type="text" placeholder="Enter time here " class="form-control" name="disease_time">
                            </div>
                          </div><br>

                          <div class="row">

                            <!-- <div class="col-lg-6 col-md-6 col-sm-12">
                                <label for="pwd">Accomodation</label>
                                <select name="own_house" id = "ddlPassport" class="form-control" onchange = "ShowHideDiv()">
                                    <option value="yes">Own House</option>
                                    <option value="no">Rent</option>            
                                </select><br>
                                <div id="dvPassport" style="display: none">
                                <label for="pwd">(How much rent)</label>
                                <input type="text" class="form-control" id="rent3" name="rent_price" placeholder="Enter rent price" onkeypress="return isNumber(event)">
                                </div>
                            </div> -->
                            <!-- <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group">
                                <label for="pwd">Annual Income</label>
                                <input type="number"  class="form-control" placeholder="Enter annual income" name="annual_income">
                                </div>
                            </div> -->
                            
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
                                <input type="text" class="form-control foundation-data" placeholder="Enter details of help from foundation" name="foundation_help">
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <label>Membership of any foundation</label><br>
                                <input type="text" placeholder="Enter membership of any foundation foundation-data" class="form-control" name="foundation_member">
                            </div>
                            
                          </div><br>

                          <!-- <div class="row">
                            <div class="col-lg-2 col-md-2 col-sm-6">
                                <label>Yes</label><br><input type="radio" name="govthelp" value="yes" id="govthelp">
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-6">
                                <label>No</label><br><input type="radio" name="govthelp" value="no">
                            </div>
                          </div><br> -->
                
                          <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                              <label>Help from any Govt. Organization</label><br>
                              <!-- <input type="text" class="form-control" name="govthelp"  id="govhelp"> -->
                              <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-6">
                                    <label>Yes</label><br><input type="radio" name="govthelp" value="yes" id="govthelp">
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-6">
                                    <label>No</label><br><input type="radio" name="govthelp" value="no">
                                </div>
                              </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12" id="read">
                                <label>If yes mention amount </label><br>
                                <input type="text" class="form-control" placeholder="Enter help amount" name="help_amount"  onkeypress="return isNumber(event)">
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12" id="readonly" style="display:none;" >
                                <label>If yes mention amount </label><br>
                                <input type="text" class="form-control" name="help_amount"  onkeypress="return isNumber(event)" readonly>
                            </div>
                            
                            <!-- <div class="col-lg-6 col-md-6 col-sm-12 mt-2"></div> -->
                          </div><br>
                          
                          <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                              <label>Details of agricultural land</label><br>
                              <input type="text" placeholder="Enter details of agricultural land" class="form-control" name="agriculture">
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 mt-2">
                                <label>Details of cattle</label><br>
                                <input type="text" placeholder="Enter details of cattle " class="form-control" name="cattle">
                            </div>

                            <!-- <div class="col-lg-6 col-md-6 col-sm-12" id="unsocial" style="display: none;">
                                <label>If the card is approved the photographs and videos of patients can be used on social media platforms for awareness purpose.</label>
                                <input type="text" class="form-control"  name="social_media" readonly>
                            </div> -->
                            <!-- <div class="col-lg-2 col-md-2 col-sm-12 mt-4">
                                <label>Yes</label><br>
                                <input type="radio" id="checkbox_id" name="social_media" value="yes">
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-12 mt-4">
                                <label>No</label><br>
                                <input type="radio" name="social_media" value="no">
                            </div> -->
                          </div><br>
                
                          <div class="row">
                          <div class="col-lg-6 col-md-6 col-sm-12" id="social">
                              <label>If the card is approved the photographs and videos of patients can be used on social media platforms for awareness purpose.</label>
                              <!-- <input type="text" class="form-control" placeholder="Enter details" name="social_media"> -->
                              <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-12 ">
                                  <label>Yes</label><br>
                                  <input type="radio" id="checkbox_id" name="social_media" value="yes">
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-14 ">
                                  <label>No</label><br>
                                  <input type="radio" name="social_media" value="no">
                                </div>
                              </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <label>If you are a granthi singh or doing job ,then Name/Address of Gurudwara Sahib</label><br>
                                <input type="text" placeholder="Enter name and address" class="form-control" name="gurudwara">
                            </div>
                            </div>
                          <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                              <label>Contact of Gurudwara Mgmt. Commmittee's office Bearers</label><br>
                              <input type="text" placeholder="Enter contact details" class="form-control" name="gurudwara_mgmt">
                            </div>
                            <!-- <div class="col-lg-6"></div> -->
                            <div class="col-lg-6 col-md-6 col-sm-12">
                              <label>2nd Contact of Gurudwara Mgmt. Commmittee's office Bearers</label><br>
                              <input type="text" placeholder="Enter 2nd contact Number" class="form-control" name="gurudwara_contact">
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
                                <input type="checkbox" class="" id="policy_checkbox" name="policy_checkbox" value="yes">
                                <label for="policy_checkbox" class="ml-1 mt-2">Policy Details:</label>
                                
                              </div>
                            
                              <div class="show_policy" style="display:none;">
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
                      </div>
                    @endif
                  </div>
                  <div class="card-footer">
                    <div class="text-center mt-4">
                      <button type="submit"  class="btn btn-primary" id="submitForm">Update</button>
                    </div>
                  </div> 
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section> 
  </div>
</div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script type="text/javascript">

    $(document).ready(function() {
      $('#form').on('submit', function (e) {
        e.preventDefault();
        var spinner = $('#loader');
            spinner.show();
        var data = new FormData(this);
        var id = $("#cardholder_id").val();
        $.ajax({
          type: 'POST',
          url: '{{url('Admin/update_is_needy')}}' + '/' + id,
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
                  'Is needy data updated!',
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
          $(this).removeAttr('checked');
      }
    });

    $("input[name='govthelp']").change(function(){
      var help = $('input[name=govthelp]:checked').val();
      if(help == "yes"){
        $("#read").show();
        $("#govhelp").prop('readonly',false);
        $("#readonly").hide();
      }else{
        $("#read").hide();
        $("#readonly").show();
        $("#govhelp").prop('readonly',true);
      }
        //  alert(help);
    });
    $("#foundation_detail").change(function(){
      var fdata = $(this).val();
      if(fdata == "yes"){
        $('.foundation-data').prop('readonly', false);
      }else{
        $('.foundation-data').prop('readonly', true);


      }
      //  alert(help);
    });
    // $("input[name='social_media']").change(function(){
    //   var help = $('input[name=social_media]:checked').val();
    //   if(help == "yes"){
    //     $("#social").show();
    //     $("#unsocial").hide();
    //   }else{
    //     $("#social").hide();
    //     $("#unsocial").show();
    //   }
    //   //  alert(help);
    // });

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
    function showDiv(divId, element)
    {
        document.getElementById(divId).style.display = element.value == 1 ? 'block' : 'none';
    }
    function ShowHideDiv() {
        var ddlPassport = document.getElementById("ddlPassport");
        var dvPassport = document.getElementById("dvPassport");
        dvPassport.style.display = ddlPassport.value == "no" ? "block" : "none";
    }
    
</script>    
@endsection