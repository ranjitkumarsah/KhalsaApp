@extends('Admin.layouts.App')
@section('card','menu-open')
@section('viewcardholder','active')

  <!-- Content Wrapper. Contains page content -->
  @section('main_section')
  <style>
    .card-footer{
      border-top:0px !important;
    }
    input.form-control.policy{
      width:93%;
      margin-left:13px;
    }
    label.policy_label{
      margin-left: 10px;
    }
    .show_policy{
      display: none;
    }
     button#addBt{
    display:none;
  }
      h5#heading2 {
        margin-left: 8px;
      }
    .card.card-primary.show_policy {
          height: 200px;
      }
    select#blood_group {
      margin-left: 8px;
      width: 98%;
    }
    label.blood_gp {
      margin-left: 8px;
    }
    input#profile_pic{
      width: 98%;
    }
    h5#policy_heading{
      color:#0b528f;
    }
     a.btn.btn-primary.back_btn{
      background-color:#ED9B2D;
      color:black;
    }
    th#table1 {
        padding-left: 2% !important;
    }
    .card-footer {
        background-color: #F5DDBD;
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
    	width: 20%;
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
  footer.main-footer {
    margin-left:0 !important;
  }
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
    <section class="content">
      <div class="container-fluid">
        <div class="row"> 
          <!-- left column -->
          <div class=" col-lg-12 col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary" style="font-size: 0.9rem;">
              <div class="container-fluid">
                <div class="invoice-wrapper">
                  <div class="row"> 
                  </div>
                  <!-- <div class="col-sm-4 col-md-4">
                    <img src="{{url('public/images/sikh.png')}}" alt="Logo" style="width: 100px; margin-left: 75px;margin-top: 7px;margin-bottom: 7px;">
                  </div> -->
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form  method="post" action="{{url('Admin/savecardholder')}}" id="form">
                  @csrf
                  <div class="row">
                      <div class="col-lg-4 col-md-4 col-sm-12">
                      <div class="form-group">
                      <label for="pwd">Head of the family</label>
                      <input type="text" class="form-control" id="username" name="name">
                    </div>
                      </div>
                      <div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="form-group">
                        <label  for="pwd">Village/City</label>
                        <input type="text" class="form-control" name="village" id="village">
                        <!-- <input type="text" class="form-control" name="age" id="age" onkeypress="return isNumber(event)"> -->
                    </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="form-group">
                        <label for="pwd">Address</label>
                        <input type="text" class="form-control" id="Address" name="address">
                    </div>
                        </div>
                  
                  </div>

                  <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-12">
                      <div class="form-group">
                        <label for="pwd">Job</label>
                        <input type="text" class="form-control" id="username" name="job">
                      </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12">
                      <div class="form-group">
                        <label for="pwd">Annual Income</label>
                        <input type="number"  class="form-control" name="annual_income">
                      </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12">
                      <div class="form-group">
                        <label for="pwd">Contact no</label>
                        <input type="number"  class="form-control" name="contact_number" id="contact_nos" maxlength="10">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-12">
                      <div class="form-group">
                        <label for="pwd">Educational Qualification</label>
                        <select id = "qualification" class="form-control" name="qualification">
                          <option value="">Select</option>
                          <option value="below10">below 10</option>
                          <option value="12">12</option>            
                          <option value="graduate">Graduate</option>            
                          <option value="degree">Degree</option>            
                          <option value="diploma">Diploma</option>            
                          <option value="postgraduate">Post Graduate</option>            
                          <option value="PhD">PhD</option>            
                        </select><br>
                      </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12">
                      <div class="form-group">
                        <label for="pwd">Aadhaar Card No</label>
                        <input type="text" class="form-control" id="number" name="adhaar_number" maxlength="12"  onkeypress="return onlyNumberKey(event)"  >
                
                      </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12">
                      <label for="pwd">Accomodation</label>
                      <select id = "ddlPassport" class="form-control" onchange = "ShowHideDiv()">
                        <option value="own_house">Own House</option>
                        <option value="rent">Rent</option>            
                      </select><br>
                      <div id="dvPassport" style="display: none">
                        <label for="pwd">(How much rent)</label>
                        <input type="text" class="form-control" id="rent3" name="rent_price" onkeypress="return isNumber(event)">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-12">
                      <div class="form-group">
                        <label for="pwd" class="blood_gp">Blood Group</label>
                        <select id = "blood_group" class="form-control" name="blood_group">
                          <option value="">Select</option>
                          <option value="A+">A+</option>
                          <option value="A-">A-</option>  
                          <option value="O+">O+</option>
                          <option value="O-">O-</option>
                          <option value="B-">B+</option>         
                          <option value="B+">B-</option>
                          <option value="AB+">AB+</option>
                          <option value="AB-">AB-</option>        
                        </select><br>
                      </div>
                    </div>

                    <div class="col-lg-4 col-md-4 col-sm-12">
                      <div class="form-group">
                        <label for="pwd">Age</label>
                        <input type="number"  class="form-control" name="age" onkeypress="return isNumber(event)">
                      </div>
                    </div>

                    <div class="col-lg-4 col-md-4 col-sm-12">
                      <div class="form-group">
                        <label for="name">Profile Picture</label>
                        <input type="file" name="cardholder_profile" class="form-control" id="profile_pic" >
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-12">
                      <div class="form-group">
                        <label for="blood_donor">Blood Donor</label>
                        <input type="checkbox" id="blood_donor" name="blood_donor" value="yes">
                      </div>
                    </div>
                  </div>
  
                  <div class="row">
                    <div class="col-md-12 col-sm-12 ml-3">
                      <h5 style="font-weight:bold;" id="heading2">Details of family Member:</h5>
                    </div>
                  </div>

                  <div class="row" style="font-size: 0.9rem;">
                    <table id="tbody">
                      <tr>
                      
                        <th >Name</th>
                        <th id="table1">Amritdhari</th>
                        <th>Age</th>
                        <th>Blood Group</th>
                        <th>Qualification</th>
                        <th>Job</th>
                        <th>Salary</th>
                      </tr>
                      <tr>
                        <td>
                          <input type="text" name="fnamefirst[]"  class="form-control fname">
                        </td>
                        <td> 
                          <select  id="select_amritdhari" class="form-control" name="famritdhari[]">
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                          </select>
                        </td>
                        <td>
                          <input type="text" name="fage[]" onkeypress="return isNumber(event)"  class="form-control">
                        </td>
                        <td>  
                          <select id = "fblood_group" class="form-control" name="fblood_group[]" style="margin-left: 12px;width: 91px;margin-right: -15px;">
                            <option value="">Select</option>
                            <option value="A+">A+</option>
                            <option value="A-">A-</option>  
                            <option value="O+">O+</option>
                            <option value="O-">O-</option>
                            <option value="B-">B+</option>         
                            <option value="B+">B-</option>
                            <option value="AB+">AB+</option>
                            <option value="AB-">AB-</option>        
                          </select>
                        </td>
                        <td>
                          <select id ="ffqualification" class="form-control" name="fqualification[]">
                            <option value="">Select</option>
                            <option value="below10">below 10</option>
                            <option value="12">12</option>            
                            <option value="graduate">Graduate</option>            
                            <option value="degree">Degree</option>            
                            <option value="diploma">Diploma</option>            
                            <option value="postgraduate">Post Graduate</option>            
                            <option value="PhD">PhD</option>            
                          </select>
                        </td>
                        <td>
                          <input type="text" name="fjob[]"  class="form-control">
                        </td>
                        <td>
                          <input type="text" name="fsalary[]" onkeypress="return isNumber(event)"  class="form-control">
                        </td>
                      </tr>
                    </table>
                  </div>
                  <br>

                  <div class="text-right">
                    <button class="btn btn-md btn-primary" id="addBtn" type="button" style="font-size: 0.9rem;">Add new Row</button>
                  </div><br>
          
                  <div class="row" style="font-size: 0.9rem;">
                    <div class="col-lg-12 col-md-12 col-sm-12 ml-3">
                      <h5 style="font-weight:bold;" id="heading1" style="font-size: 0.9rem;">Details of Children in family:</h5>
                    </div>
                  </div>
              
                  <div class="row" style="font-size: 0.9rem;">
                    <table id="table_class">
                      <tr>
                        <th>Name</th>
                        <th id="table1">Amritdhari</th>
                        <th>Age</th>
                        <th>Class</th>
                        <th>Fees</th>
                        <th>School Name</th>
                      </tr>
                      <tr>
                        <td>
                          <input type="text" name="cname[]"  class="form-control">
                        </td>
                        <td> 
                          <select  id="select_amritdhari" class="form-control" name="camritdhari[]">
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                          </select>
                        </td>
                        <td>
                          <input type="text" name="cage[]"  onkeypress="return isNumber(event)" class="form-control">
                        </td>
                        <td>    
                          <select id = "ccqualification" class="form-control" name="cqualification[]">
                            <option value="">Select</option>
                            <option value="below10">below 10</option>
                            <option value="12">12</option>            
                            <option value="graduate">Graduate</option>            
                            <option value="degree">Degree</option>            
                            <option value="diploma">Diploma</option>            
                            <option value="postgraduate">Post Graduate</option>            
                            <option value="PhD">PhD</option>            
                          </select>
                        </td>
                        <td>
                          <input type="number" name="cfees[]"  class="form-control" style="margin-left: 19px;">
                        </td>
                        <td>
                          <input type="text" name="cschool[]"  class="form-control">
                        </td>
                      </tr>
                    </table>
                  </div><br>

                  <div class="text-right" >
                    <button class="btn btn-md btn-primary" id="addData" type="button" style="font-size: 0.9rem;">Add new Row</button>
                  </div><br><br>

                  <div class="row" style="font-size: 0.9rem;">
                    <div class="col-lg-4 col-md-6 col-sm-12">
                      <div class="form-group family_member ml-2">
                        <label for="pwd" style="margin-left:5px;">Family members suffering from disease:</label>
                        <input type="text"  class="form-control" id="family" name="long_disease">
                      </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12">
                      <div class="form-group ">
                        <label for="pwd">Suffering since
                        </label>
                        <input type="text"  class="form-control"  name="disease_name">
                      </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12">
                      <div class="form-group col-md-12">
                        <label for="pwd">Disease Name and details:</label>
                        <input type="text"   class="form-control" name="disease_details" id="disease_details">
                      </div>
                    </div>
                  </div>

                  <div class="row" style="font-size: 0.9rem;">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                      <div class=" form-group organisation ml-2">
                        <label for="pwd"  style="margin-left:5px;">Support from any organisation/NGO:</label>
                        <input type="text" class="form-control" name="support_organisation" id="org_name">
                      </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                      <div class=" form-group">
                        <label for="pwd">Joined any organisation:</label>
                        <input type="text"  class="form-control"  name="joined_organisation" id="org_joined">
                      </div>
                    </div>
                  </div>

                  <section class="content" style="font-size: 0.9rem;">
                    <div class="container-fluid">
                      <div class="row"> 
                        <div class=" col-lg-12 col-md-12">
                      
                          {{-- <div class="container-fluid"> --}}
                          <div class="row ml-2">
                            <label for="blood_donor">Policy Details:</label>
                            <input type="checkbox" id="policy_checkbox" name="policy_checkbox" value="yes">
                          </div>
                          {{-- <div class="show_policy" > --}}
                          <div class="card card-primary show_policy">
                            <div class="row">
                              <div class="col-lg-6 col-md-6 col-sm-12 mt-4">
                                <label for="pwd" class="policy_label">Company Name:</label>
                                <input type="text" name="company_name" class="form-control policy">
                              </div>
                              <div class="col-lg-6 col-md-6 col-sm-12 mt-4">
                                <label for="pwd" class="policy_label">Policy No:</label>
                                <input type="text" name="policy_no" class="form-control policy">
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-lg-6 col-md-6 col-sm-12">
                                <label for="pwd" class="policy_label">Issue Date:</label>
                                <input type="date" name="issue_date" class="form-control policy">
                              </div>
                              <div class="col-lg-6 col-md-6 col-sm-12">
                                <label for="pwd" class="policy_label">Expiry Date:</label>
                                <input type="date" name="expiry_date" class="form-control policy">
                              </div>
                            </div>
                            {{-- </div> --}}
                            <div class="row">
                              <div class="col-lg-6 col-md-6 col-sm-12">
      
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </section>

                  {{-- <form  method="post" action="{{url('Admin/savecardholder')}}" id="form"> --}}
                  <div class="col-lg-4 col-md-4 col-sm-12" style="font-size: 0.9rem;">
                    <div class="form-group ml-2">
                      <label for="blood_donor">Is Needy</label>
                      <input type="checkbox" id="granthi" name="granthi" value="yes">
                    </div>
                  </div>
              
                  <div class="data" id="member" style="display: none">
                    <div class="card-body" style="font-size: 0.9rem;">
                      {{-- @csrf --}}
                      <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                          <label>Patient's Detail in Family</label><br>
                          <input type="text" class="form-control" name="patient_detail">
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                          <label>How Long</label><br>
                          <input type="text" class="form-control" name="disease_time">
                        </div>
                      </div><br>
      
                      <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                          <label>Disease and medical detail</label><br>
                          <input type="text" class="form-control" name="medical_detail">
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                          <label>Help from any foundation</label><br>
                          <select id="foundation_detail" class="form-control" name="foundation_detail">
                            <option value="">Select</option>
                            <option value="yes">Yes</option>
                            <option value="no">No</option>            
                          </select><br>
                        </div>
                      </div><br>
      
                      <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                          <label>Detail of help from any foundation</label><br>
                          <input type="text" class="form-control" name="foundation_help">
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                          <label>Membership of any foundation</label><br>
                          <input type="text" class="form-control" name="foundation_member">
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
                          <label>No</label><br>
                          <input type="radio" name="govthelp" value="no">
                        </div>
                      </div><br>
      
                      <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12" id="read">
                          <label>If yes mention amount </label><br>
                          <input type="text" class="form-control" name="help_amount"  onkeypress="return isNumber(event)">
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12" id="readonly" style="display:none;" >
                          <label>If yes mention amount </label><br>
                          <input type="text" class="form-control" name="help_amount"  onkeypress="return isNumber(event)" readonly>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                          <label>Details of agricultural land</label><br>
                          <input type="text" class="form-control" name="agriculture">
                        </div>
                      </div><br>
      
                      <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12" id="social">
                          <label>In the card is approved the photographs and videos of patients can be used on social media platforms for awareness purpose.</label>
                          <input type="text" class="form-control" name="social_media">
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12" id="unsocial" style="display: none;">
                          <label>In the card is approved the photographs and videos of patients can be used on social media platforms for awareness purpose.</label>
                          <input type="text" class="form-control" name="social_media" readonly>
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
                          <input type="text" class="form-control" name="gurudwara">
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                          <label>Contact of Gurudwara Mgmt. Commmittee's office Bearers</label><br>
                          <input type="text" class="form-control" name="gurudwara_mgmt">
                        </div>
                      </div><br>
      
                      <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                          <label>Attesting Officer</label><br>
                          <input type="text" class="form-control" name="attesting_officer">
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                          <label>Head of family</label><br>
                          <input type="text" class="form-control" name="family_heads">
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
                          <input type="text" class="form-control" name="volunteer_name">
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
                          <input type="file" class="form-control" id="file_class" name="volunteer_photo" style="display:none;">
                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-12">
                          <label>2) 5 to 7 Photos of House Condition</label>
                          <input type="checkbox"  id="hide_id" onclick="showHide(this)">
                          <div id="new_row" >
                            <input class="form-control" type="file" name="house_photo[]" id="visible" style="display:none;"  /> 
                            <button class="btn btn-md btn-primary" name="house_photo[]" id="addBt" type="button"> Add</button>
                          </div><br>
                        
                          <div id="newinput"></div>
                          <!-- <button id="rowAdder" type="button"
                              class="btn btn-dark">
                              <span class="bi bi-plus-square-dotted">
                              </span> ADD
                          </button> -->
                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-12">
                          <label>3) Aadhar card Photocopies of  family</label>
                          <input type="checkbox" id="aadhaar_id"  onclick="myFunction1()">
                          <input type="file" class="form-control" name="aadhaar_card" id="aadhar_class" style="display:none;">
                        </div>

                      </div><br>
      
                      <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                          <label>Details of two wheelers</label>
                          <input type="text" class="form-control" name="two_wheeler">
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                          <label>Details of four wheelers</label>
                          <input type="text" class="form-control" name="four_wheeler">
                        </div>
                      </div><br>
      
                      <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                          <label>Details of air conditioner</label>
                          <input type="text" class="form-control" name="air_conditioner">
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                          <label>Details of all other income sources</label>
                          <input type="text" class="form-control" name="income_source">
                        </div>
                      </div><br>
      
                      <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                          <label>Date</label>
                          <input type="date" class="form-control" name="date">
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                          <label>Volunteer Signature</label>
                          <input type="text" class="form-control" name="volunteer_signature">
                        </div>
                      </div><br>
      
                    </div>
                    <!-- </div> -->
                    {{-- <div class="register_class">
                      <button type="submit"  class="btn btn-primary" id="submitForm">Submit</button>
                    </div><br> --}}
    
                    {{-- <div class="row">
                      <div class="col-lg-12 col-md-12 col-sm-12">
                        <h5  id="heading_class" style="text-align:center;">Sikhs for Equality Foundation Head Office</h5>
                        </div>
                    </div>
        
                    <div class="card-footer text-center">
                        <p>98558-01984,99145-01984,72057-00009,72058-00009 &nbsp; &nbsp; Joginder Singh Nagar, Paghwara</p>
                        <p></p>
                    </div> --}}
            
                    <div class="row" style="font-size: 0.9rem;">
                
                      <div class="col-lg-6 col-md-6 col-sm-12">
                    
                        <div class=" form-group " style="margin-left: 15px;">
                          <input type="text" class="form-control" name="verify_officer" id="verify_officer" >
                          <label for="pwd" class="verify_officer_label">Verifying Officer:</label>
                        </div>
                      </div>

                      <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class=" form-group " style="margin-right: 18px;">
                          <input type="text"  name="family_head" class="form-control" id="verify_officer" >
                          <label class="verify_officer_label">Head of family:</label>
                        </div>
                      </div>

                    </div>
                    
                  </div>

                      
                  <div class="card-footer">
                    <div class="text-center mt-4">
                      <button type="submit"  class="btn btn-primary" id="submitForm">Submit</button>
                    </div>
                  </div>
  
                  <!-- </div>
                  </div> -->
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
    </section>
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
<script>
  var rowIdx = 0;

// jQuery button click event to add a row.

$('#addBtn').on('click', function () {
    // Adding a row inside the tbody.
  $('#tbody').append(
    `<tr >
      <td >
        <input type="text" name="fnamefirst[]" class="form-control fname">
      </td>
      <td class="row-index text-center">
        <select  id="select_amritdhari" class="form-control" name="famritdhari[]">
            <option value="Yes">Yes</option>
            <option value="No">No</option>
        </select>
      </td>
      <td class="row-index text-center">
        <input type="text" name="fage[]" class="form-control">
      </td>
      <td class="row-index text-center">
        <select id = "fblood_group" class="form-control" name="fblood_group[]" style="margin-left: 12px;width: 91px;margin-right: -15px;">
          <option value="">Select</option>
          <option value="A+">A+</option>
          <option value="A-">A-</option>  
          <option value="O+">O+</option>
          <option value="O-">O-</option>
          <option value="B-">B+</option>         
          <option value="B+">B-</option>
          <option value="AB+">AB+</option>
          <option value="AB-">AB-</option>        
        </select>
      </td>
      <td class="row-index text-center">
        <select id ="ffqualification" class="form-control" name="fqualification[]">
          <option value="">Select</option>
          <option value="below10">below 10</option>
          <option value="12">12</option>            
          <option value="graduate">Graduate</option>            
          <option value="degree">Degree</option>            
          <option value="diploma">Diploma</option>            
          <option value="postgraduate">Post Graduate</option>            
          <option value="PhD">PhD</option>            
        </select>
      </td>
      <td class="row-index text-center">
        <input type="text" name="fjob[]" class="form-control">
      </td>
      <td class="row-index text-center">
        <input type="text" name="fsalary[]" class="form-control">
      </td>      
    </tr>`
  );       
});
$('#addData').on('click', function () {
    // Adding a row inside the tbody.
    $('#table_class').append(`<tr id="R${++rowIdx}">
          <td class="row-index text-center">
          <input type="text" name="cname[]" class="form-control"></td>
          <td class="row-index text-center">
          <select  id="select_amritdhari" class="form-control" name="camritdhari[]">
              <option value="Yes">Yes</option>
              <option value="No">No</option>
          </select></td></td>
          <td class="row-index text-center">
          <input type="text" name="cage[]" class="form-control"></td>
          <td class="row-index text-center">
          <select id = "ccqualification" class="form-control" name="cqualification[]">
                        <option value="">Select</option>
                        <option value="below10">below 10</option>
                        <option value="12">12</option>            
                        <option value="graduate">Graduate</option>            
                        <option value="degree">Degree</option>            
                        <option value="diploma">Diploma</option>            
                        <option value="postgraduate">Post Graduate</option>            
                        <option value="PhD">PhD</option>            
                    </select></td>
          <td class="row-index text-center">
          <input type="text" name="cfees[]" class="form-control" ></td>
          <td class="row-index text-center">
          <input type="text" name="cschool[]" class="form-control"></td>
          
           </tr>`);
});

</script>
<script type="text/javascript">
  
    $( document ).ready(function() {
    $('#form').on('submit', function (e) {
      var spinner = $('#loader');
            spinner.show();
    e.preventDefault();
    var data = new FormData(this);
   
      $.ajax({
          type: 'POST',
          url: '{{url('Admin/savecardholder')}}',
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
                'Card Holder Added!',
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
    function showDiv(divId, element)
    {
        document.getElementById(divId).style.display = element.value == 1 ? 'block' : 'none';
    }
  </script>
  <script>
    function ShowHideDiv() {
        var ddlPassport = document.getElementById("ddlPassport");
        var dvPassport = document.getElementById("dvPassport");
        dvPassport.style.display = ddlPassport.value == "rent" ? "block" : "none";
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
 
    var rowIdx = 0;
      $('#addBt').on('click', function () {
        // Adding a row inside the tbody.
        $('#newinput').append(`<p id="R${++rowIdx}" class="para1">
        
              <input type="file" name="house_photo[]" id="new_file" class="form-control">
              <button class="btn btn-danger" id="DeleteRow" type="button" onclick="removeNameFromTheList(this)"> 
              Remove</button>  
            
               </p>`);
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
  </script>
  <script>
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
  </script>
  <script>
    $("input[name='granthi']").change(function(){
      var help = $('input[name=granthi]:checked').val();
      if(help == "yes"){
        $("#member").show();
        // $("#unsocial").hide();
      }else{
        $("#member").hide();
        // $("#unsocial").show();
      }
    //  alert(help);
  });
  </script>
  <script>
    $("#policy_checkbox").click(function() {
    if($(this).is(":checked")) {
        $(".show_policy").show();
    } else {
        $(".show_policy").hide();
    }
});
  </script>
@endsection
