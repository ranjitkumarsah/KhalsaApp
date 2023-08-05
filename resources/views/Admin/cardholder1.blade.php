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
    button#addBtA{
      display:none;
    }
      h5#heading2 {
        margin-left: 8px;
      }
    .card.card-primary.show_policy {
          height: 200px;
      }
    /* select#blood_group {
      margin-left: 8px;
      width: 98%;
    } */
    label.blood_gp {
      margin-left: 8px;
    }
    /* input#profile_pic{
      width: 98%;
    } */
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
    /* select#ffqualification {
        margin-left: 17px;
    } */
    /* select#ccqualification {
        margin-left: 17px;
    } */

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
        /* margin-left: 16px; */
        width: 75px;
    }
    .family-details .col-sm-12{
      padding-left:0;
      text-align: center;
    }
    .children-details .col-sm-12{
      padding-left:0;
      text-align: center;
    }
    /* button#addBtn {
      margin-right: 13px;
    } */
    /* button#addData{
      margin-right: 13px;
    } */
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
    /* input#org_name {
      margin-left: 5px;
    } */
    /* input#family{
      margin-left: 5px;
    } */
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
    #fblood_group {
      width:100% !important;
    }
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
        width: 100%;
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
      footer.main-footer {
        margin-left:0 !important;
      }
      #fblood_group {
        width:89px;
      }
    .select2-container--default .select2-selection--single {
      background-color: #fff;
      border: 1px solid #0b528f;
      border-radius: 4px;
      height: 38px;
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
        <div class="row"> 
          <!-- left column -->
          <div class=" col-lg-12 col-md-12">
            <form  method="post" action="{{url('Admin/savecardholder')}}" id="form">
              @csrf
              <div class="card card-primary" style="font-size: 0.9rem;">
                <div class="container-fluid">
                  <div class="invoice-wrapper">
                    <div class="row"> 
                    </div>
                  </div>
                    <!-- <div class="col-sm-4 col-md-4">
                      <img src="{{url('public/images/sikh.png')}}" alt="Logo" style="width: 100px; margin-left: 75px;margin-top: 7px;margin-bottom: 7px;">
                    </div> 
                    </div> -->
                  <div class="row">
                  
                    <div class="col-lg-6 col-md-6 col-sm-12">
                      <div class="form-group">
                        <label for="pwd">Name of the head of family <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="username" placeholder="Enter name of head of the family name" name="name">
                      </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                      <div class="form-group">
                        <label for="pwd">ਪਰਿਵਾਰ ਦੇ ਮੁਖੀ ਦਾ ਨਾਮ <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="usernameP" placeholder="ਪਰਿਵਾਰ ਦੇ ਮੁਖੀ ਦਾ ਨਾਮ ਦਰਜ ਕਰੋ" name="name_punjabi">
                      </div>
                    </div>
                   
                  </div>

                  <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                      <div class="form-group">
                        <label for="name">Profile Picture</label>
                        <input type="file" name="cardholder_profile" class="form-control" id="profile_pic" accept="image/*">
                      </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                      <div class="form-group">
                        <label for="pwd">Age <span class="text-danger">*</span></label>
                        <input type="number" placeholder="Enter age"  class="form-control" name="age" onkeypress="return isNumber(event)">
                      </div>
                    </div>
                    
                  </div>
                  <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                      <div class="form-group">
                        <label for="pwd">Aadhaar Card No <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="number" name="adhaar_number" placeholder="Enter aadhaar card number" maxlength="12"  onkeypress="return onlyNumberKey(event)"  >
            
                      </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                      <div class="form-group">
                        <label for="pwd">Address <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" placeholder="Enter address" id="Address" name="address">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                      <div class="form-group">
                        <label for="pwd">ਪਤਾ <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" placeholder="ਪਤਾ ਦਰਜ ਕਰੋ" id="AddressP" name="address_punjabi">
                      </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12">
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
                    <div class="col-lg-3 col-md-3 col-sm-12">
                      <div class="form-group">
                        <label for="blood_donor"></label>
                        <label for="blood_donor" class="form-control mt-1 position-relative" style="height: 45px;">
                          <span class="position-absolute " style="top: 20%; left: 15%; color: #0b528f; font-size: 0.9rem;">Blood Donor</span>
                        </label>
                        <input type="checkbox" class="position-absolute" id="blood_donor" name="blood_donor" value="yes" style="top: 39%; left: 10%;">

                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                      <div class="form-group">
                        <!-- <label  for="pwd">Village/City</label>
                        <input type="text" class="form-control" placeholder="Enter vilage/city"  name="village" id="village"> -->
                        <label for="name">City </label>
                        <!-- <input type="text" name="village" placeholder="Enter village/city" class="form-control @error('village') is-invalid @enderror" id="village"> -->
                        
                        <select name="village" class="form-control @error('village') is-invalid @enderror" placeholder="Select village/city" id="village">
                              <option value="">Select city</option>
                            @foreach($cities as $name)
                            <option value="{{$name->city}}">{{$name->city}}</option>
                            @endforeach
                                </select>
                        
                        @error('village')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('village') }}</strong>
                        </span>
                      @enderror
                      </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                      <div class="form-group">
                        <label for="pwd">Contact Number <span class="text-danger">*</span></label>
                        <input type="tel" placeholder="Enter contact number" class="form-control" name="contact_number" id="contact_nos" onkeypress="return isNumber(event)" maxlength="10">
                        


                      </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                      <div class="form-group">
                        <label for="whatsapp_number">WhatsApp Number <span class="text-danger">*</span></label>
                        <input type="tel" placeholder="Enter WhatsApp Number" class="form-control" name="whatsapp_number" id="whatsapp_number" onkeypress="return isNumber(event)" maxlength="10">
                      </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                      <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" placeholder="Enter Email" class="form-control">
                       
                      </div>
                    </div>
                  </div>

                  

                  <h5 class="mt-2" ><b> Qualification & Profession </b></h5>
                  <div class="row mt-3">
                    <div class="col-lg-4 col-md-4 col-sm-12">
                      <div class="form-group">
                        <label for="pwd">Educational Qualification <span class="text-danger">*</span></label>
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
                        <label for="pwd">Occupation <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" placeholder="Enter occupation " id="username" name="occupation">
                      </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12">
                      <div class="form-group">
                        <label for="pwd">Monthly Income</label>
                        <input type="number"  class="form-control" placeholder="Enter monthly income" name="annual_income">
                      </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12">
                      <label for="pwd">Accomodation</label>
                      <select name="own_house" id = "ddlPassport" class="form-control" onchange = "ShowHideDiv()">
                          <option value="yes">Own House</option>
                          <option value="no">Rent</option>            
                      </select><br>
                    </div>

                    <div class="col-lg-4 col-md-4 col-sm-12" id="dvPassport" style="display: none">
                      <label for="pwd">(How much rent)</label>
                      <input type="text" class="form-control" id="rent3" name="rent_price" placeholder="Enter rent price" onkeypress="return isNumber(event)">
                    </div>
                    
                  </div>

                </div>
              </div>

              <div class="card card-primary" style="font-size: 0.9rem;">
                <div class="container-fluid">
                  <div class="row mt-3">
                    <div class="col-md-12 col-sm-12">
                      <h5 style="font-weight:bold;" id="heading2">Details of family Member:</h5>
                    </div>
                  </div>
                  <div class="" id="family-details">
                    <div class="row mt-3 mx-2 family-details">
                        <div class="col-lg-2 col-sm-12 ">
                          <div class="form-group">
                            <label for="fname">Name</label>  
                            <input type="text" name="fname[]" placeholder="Enter name" class="form-control fname">
                          </div>
                        </div>
                        <div class="col-lg-1 col-sm-12"> 
                          <div class="form-group">
                            <label for="famritdhari">Amritdhari</label>  
                            <select  id="select_amritdhari" class="form-control" name="famritdhari[]">
                              <option value="Yes">Yes</option>
                              <option value="No">No</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-lg-1 col-sm-12"> 
                          <div class="form-group">
                            <label for="fage">Age</label> 
                            <input type="text" name="fage[]" placeholder="Age" onkeypress="return isNumber(event)"  class="form-control"> 
                          </div>
                        </div>
                        <div class="col-lg-2 col-sm-12">
                          <div class="form-group">
                            <label for="">Blood Group</label>  
                            <select id = "" class="form-control" name="fblood_group[]" style="">
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
                          </div>
                        </div>
                        <div class="col-lg-2 col-sm-12">
                          <div class="form-group">
                            <label for="fqualification">Qualification</label>  
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
                          </div>
                        </div>
                        <div class="col-lg-2 col-sm-12">
                          <div class="form-group">
                            <label for="fjob">Job</label> 
                            <input type="text" name="fjob[]" placeholder="Enter job name" class="form-control"> 
                          </div>
                        </div>
                        <div class="col-lg-2 col-sm-12">
                          <div class="form-group">
                            <label for="">Salary</label> 
                            <input type="text" name="fsalary[]" placeholder="Salary" onkeypress="return isNumber(event)"  class="form-control"> 
                          </div>
                          
                        </div>
                        <div class="col-lg-2 col-sm-12">
                          <div class="form-group">
                            <label for="faadhaar">Aadhaar Card No</label> 
                            <input type="text" name="faadhaar[]" placeholder="Aadhaar number" onkeypress="return isNumber(event)" maxlength="12"   class="form-control"> 
                          </div>
                          
                        </div>
                        <div class="col-lg-2 col-sm-12">
                          <div class="form-group">
                            <label for="frelation">Relation</label> 
                            <select name="frelation[]" id="frelation" class="form-control">
                              <option value="">Select</option>
                              <option value="Father">Father</option>
                              <option value="Mother">Mother</option>
                              <option value="Brother">Brother</option>
                              <option value="Wife">Wife</option>
                            </select>
                          </div>
                          
                        </div>

                      {{--<table id="tbody">
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
                          <td><input type="text" name="fname[]" placeholder="Enter name" class="form-control fname">
                            </td>
                          <td> <select  id="select_amritdhari" class="form-control" name="famritdhari[]">
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                          </select></td>
                          <td><input type="text" name="fage[]" placeholder="Enter age" onkeypress="return isNumber(event)"  class="form-control"></td>
                          <td>  <select id = "fblood_group" class="form-control" name="fblood_group[]" style="margin-left: 12px;width: 91px;margin-right: -15px;">
                            <option value="">Select</option>
                              <option value="A+">A+</option>
                              <option value="A-">A-</option>  
                              <option value="O+">O+</option>
                              <option value="O-">O-</option>
                              <option value="B-">B+</option>         
                              <option value="B+">B-</option>
                              <option value="AB+">AB+</option>
                              <option value="AB-">AB-</option>        
                          </select></td>
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
                          <td><input type="text" name="fjob[]" placeholder="Enter job name" class="form-control"></td>
                          <td><input type="text" name="fsalary[]" placeholder="Enter salary amount" onkeypress="return isNumber(event)"  class="form-control"></td>
                        </tr>
                      </table>--}}
                    </div>
                  </div>

                  <div class="text-right my-4">
                    <button class="btn btn-md btn-success" id="addBtn" type="button" style="font-size: 0.9rem; font-weight:600;">
                          ADD NEW ROW <i class="fa fa-plus"></i>
                    </button>
                  </div>
                </div>
              </div>

              <div class="card card-primary" style="font-size: 0.9rem;">
                <div class="container-fluid">
            
                  <div class="row mt-3 " style="font-size: 0.9rem;">
                    <div class="col-lg-12 col-md-12 col-sm-12 ml-2">
                      <h5 style="font-weight:bold;" id="heading1" >Details of Children in family:</h5>
                    </div>
                  </div>
                  <div class="" id="children-details">
                    <div class="row mt-3 mx-2 children-details">
                      <div class="col-lg-2 col-sm-12 ">
                        <div class="form-group">
                          <label for="cname">Name</label>  
                          <input type="text" name="cname[]" placeholder="Enter name" class="form-control">
                        </div>
                        
                      </div>
                      <div class="col-lg-1 col-sm-12 ">
                        <div class="form-group">
                          <label for="camritdhari">Amritdhari</label>  
                          <select  id="select_amritdhari" class="form-control" name="camritdhari[]">
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-lg-1 col-sm-12 ">
                        <div class="form-group">
                          <label for="cage">Age</label>  
                          <input type="text" name="cage[]" placeholder="age" onkeypress="return isNumber(event)" class="form-control">
                        </div>
                      </div>
                      <div class="col-lg-2 col-sm-12 ">
                        <div class="form-group">
                          <label for="cqualification">Class</label> 
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
                        </div>
                      </div>
                      <div class="col-lg-2 col-sm-12 ">
                        <div class="form-group">
                          <label for="cfees">Fees</label>  
                          <input type="number" name="cfees[]" placeholder="Fees amount" class="form-control" >
                        </div>
                      </div>
                      <div class="col-lg-2 col-sm-12 ">
                        <div class="form-group">
                          <label for="cschool">School Name</label>
                          <input type="text" name="cschool[]" placeholder="School name"  class="form-control">
                        </div>
                      </div>
                      <div class="col-lg-2 col-sm-12 ">
                        <div class="form-group">
                          <label for="caadhaar">Aadhaar Card No</label>
                          <input type="text" name="caadhaar[]" placeholder="Aadhaar bumner"  onkeypress="return isNumber(event)" maxlength="12" class="form-control">
                        </div>
                      </div>
                      <div class="col-lg-2 col-sm-12">
                        <div class="form-group">
                          <label for="crelation">Relation</label> 
                          <select name="crelation[]" id="crelation" class="form-control">
                            <option value="">Select</option>
                            <option value="Brother">Brother</option>
                            <option value="Son">Son</option>
                            <option value="Daughter">Daughter</option>
                          </select>
                        </div>
                        
                      </div>
                      


                      {{--<table id="table_class">
                        <tr>
                          <th>Name</th>
                          <th id="table1">Amritdhari</th>
                          <th>Age</th>
                          <th>Class</th>
                          <th>Fees</th>
                          <th>School Name</th>
                        </tr>
                        <tr>
                          <td><input type="text" name="cname[]" placeholder="Enter name" class="form-control"></td>
                          <td> <select  id="select_amritdhari" class="form-control" name="camritdhari[]">
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                          </select></td>
                          <td><input type="text" name="cage[]" placeholder="Enter age" onkeypress="return isNumber(event)" class="form-control"></td>
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
                          </select></td>
                          <td><input type="number" name="cfees[]" placeholder="Enter fees amount" class="form-control" style="margin-left: 19px;"></td>
                          <td><input type="text" name="cschool[]" placeholder="Enter school name"  class="form-control"></td>
                        </tr>
                      </table> --}}

                    </div>
                  </div>

                  <div class="text-right my-4">
                    <button class="btn btn-md btn-success" id="addData" type="button" style="font-size: 0.9rem; font-weight:600;">
                          ADD NEW ROW <i class="fa fa-plus"></i>
                    </button>
                  </div>
                </div>
              </div>

              <!-- <div class="card card-primary" style="font-size: 0.9rem;">
                <div class="container-fluid">
            
                  <div class="row mt-3 ">
                    <div class="col-lg-12 col-md-12 col-sm-12 ml-2">
                      <h5 style="font-weight:bold;" id="heading1" >Other Detail</h5>
                    </div>
                  </div>

                  <div class="row mt-3" >
                    <div class="col-lg-4 col-md-6 col-sm-12">
                      <div class="form-group family_member ">
                        <label for="pwd" >Family members suffering from disease:</label>
                        <input type="text"  class="form-control" placeholder="Enter disease name" id="family" name="long_disease">
                      </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12">
                      <div class="form-group ">
                        <label for="pwd">Suffering since
                        </label>
                        <input type="text" placeholder="Suffering since" class="form-control"  name="disease_name">
                      </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12">
                      <div class="form-group">
                        <label for="pwd">Disease Name and details:</label>
                        <input type="text"  placeholder="Enter disease name and details" class="form-control" name="disease_details" id="disease_details">
                      </div>
                    </div>
                  </div>

                  <div class="row" >
                    <div class="col-lg-4 col-md-4 col-sm-12">
                      <div class=" form-group organisation ">
                        <label for="pwd" >Support from any organisation/NGO:</label>
                        <input type="text" placeholder="support from organisation or ngo " class="form-control" name="support_organisation" id="org_name">
                      </div>
                    </div>

                    <div class="col-lg-8 col-md-8 col-sm-12">
                      <div class=" form-group">
                        <label for="pwd">Joined any organisation:</label>
                        <input type="text" placeholder="Joined any organisation"  class="form-control"  name="joined_organisation" id="org_joined">
                      </div>
                    </div>

                  </div>

                  
                </div>
              </div> -->
              
              <div class="row mt-4">
                <div class="col">
                  <div class="form-group ml-2">
                    <label for="blood_donor">Is Needy</label>
                    <input type="checkbox" id="granthi" name="granthi" value="Yes">
                  </div>
                </div>
              </div>
            
              <div class="data card mb-5" id="member" style="display: none">
                <div class="card-body" style="font-size: 0.9rem;">
                  <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                      <label>Patient's Detail in Family</label><br>
                      <input type="text" placeholder="Enter patient name here" class="form-control" name="patient_detail">
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                      <label>Suffering since</label><br>
                      <input type="text" placeholder="Enter time here" class="form-control" name="disease_time">
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
                        <label for="pwd">Monthly Income</label>
                        <input type="number"  class="form-control" placeholder="Enter monthly income" name="annual_income">
                      </div>
                    </div> -->
                  </div>
                  
                  <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                      <label>Disease and medical detail</label><br>
                      <!-- <input type="text" placeholder="Enter disease/medical detail" class="form-control" name="medical_detail"> -->
                      <textarea class="form-control" name="medical_detail" placeholder="Enter disease/medical detail"></textarea>
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
                      <input type="text" placeholder="Enter membership of any foundation" class="form-control foundation-data" name="foundation_member">
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
                      <!-- <input type="text" class="form-control" name="govthelp" id="govhelp"> -->
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
                    <!-- <div class="col-lg-6 col-md-6 col-sm-12 mt-2">
                      </div> -->
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
                        <div class="col-lg-4 col-md-4 col-sm-12">
                          <label>Yes</label><br>
                          <input type="radio" id="checkbox_id" name="social_media" value="yes">
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12">
                          <label>No</label><br>
                          <input type="radio" name="social_media" value="no">
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                      <label>If you are a granthi singh or doing job ,then Name/Address of Gurudwara Sahib</label><br>
                      <input type="text" placeholder="Enter name and address" class="form-control" name="gurudwara">
                    </div>
                  </div><br>
                  <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                      <label>Contact of Gurudwara Mgmt. Commmittee's office Bearers</label><br>
                      <input type="text" placeholder="Enter contact details" class="form-control" name="gurudwara_mgmt">
                    </div><br>
                    <!-- <div class="col-lg-6"></div> -->
                    <div class="col-lg-6 col-md-6 col-sm-12">
                      <label>2nd Contact of Gurudwara Mgmt. Commmittee's office Bearers</label><br>
                      <input type="text" placeholder="Enter 2nd contact Number" class="form-control" name="gurudwara_contact">
                    </div>
                  </div><br>

                  <div class="row">
                    <div class="col-12">
                      <div class="form-group">
                        <input type="checkbox" name="certify_granthi" id="certify_granthi">&nbsp;
                        <label for="certify_granthi">I certify that As a Granthi Singh Pracharak, I will be bound to fulfill whatever responsibility is imposed on me for the sake of religious preaching.</label>
                      </div>
                    </div>
                    <!-- <div class="col-lg-6 col-md-6 col-sm-12">
                      <label>Attesting Officer</label><br>
                      <input type="text" placeholder="Enter attesting officer name" class="form-control" name="attesting_officer">
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                      <label>Head of family</label><br>
                      <input type="text" placeholder="Enter head of family name" class="form-control" name="family_heads">
                    </div> -->
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
              </div>
                  
                  
                 
              <div class="row mt-3" style="font-size: 0.9rem;">
                <div class="col-12">
                  <div class="form-group">
                    <input type="checkbox" name="certify" id="certify" required>&nbsp;
                    <label for="certify">I certify that the information I have provided is true and complete to the best of my knowledge.</label>
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                  <div class=" form-group " >
                    <input type="text" class="form-control" placeholder="Enter  attesting officer name" name="verify_officer" id="verify_officer" >
                    <label for="pwd" class="verify_officer_label"> Attesting Officer:</label>
                  </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-12">
                  <div class=" form-group ">
                    <input type="text" placeholder="Enter head of family name"  name="family_head" class="form-control" id="verify_officer" >
                    <label class="verify_officer_label">Head of family:</label>
                  </div>
                </div>
              </div>
              <div class="justify-content-around">
                <div class="card-footer">
                  <div class="text-center mt-4">
                    <button type="submit"  class="btn btn-primary" id="submitForm">Submit</button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
            <!-- /.card -->
            <!-- </div> -->
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
  <!-- </div> -->
        <!-- </div> -->
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
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/microsoft-translator@3.0.0/dist/browser/microsoft-translator.min.js"></script>



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
    var rowIdx = 0;
  
  // jQuery button click event to add a row.
  
  $('#addBtn').on('click', function () {
      // Adding a row inside the tbody.
    $('#family-details').append(`
      <div class="row mx-2 family-details position-relative" id ="FR${++rowIdx}">
        <div class="col-lg-2 col-sm-12 ">
          <div class="form-group">
            <label for="fname">Name</label>  
            <input type="text" name="fname[]" placeholder="Enter name" class="form-control fname">
          </div>
        </div>
        <div class="col-lg-1 col-sm-12"> 
          <div class="form-group">
            <label for="famritdhari">Amritdhari</label>  
            <select  id="select_amritdhari" class="form-control" name="famritdhari[]">
              <option value="Yes">Yes</option>
              <option value="No">No</option>
            </select>
          </div>
        </div>
        <div class="col-lg-1 col-sm-12"> 
          <div class="form-group">
            <label for="fage">Age</label> 
            <input type="text" name="fage[]" placeholder="Age" onkeypress="return isNumber(event)"  class="form-control"> 
          </div>
        </div>
        <div class="col-lg-2 col-sm-12">
          <div class="form-group">
            <label  for="fblood_group">Blood Group</label>  
            <select id = "" class="form-control" name="fblood_group[]" style="">
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
          </div>
        </div>
        <div class="col-lg-2 col-sm-12">
          <div class="form-group">
            <label for="fqualification">Qualification</label>  
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
          </div>
        </div>
        <div class="col-lg-2 col-sm-12">
          <div class="form-group">
            <label for="fjob">Job</label> 
            <input type="text" name="fjob[]" placeholder="Enter job name" class="form-control"> 
          </div>
        </div>
        <div class="col-lg-2 col-sm-12">
          <div class="form-group">
            <label for="">Salary</label> 
            <input type="text" name="fsalary[]" placeholder="Salary" onkeypress="return isNumber(event)"  class="form-control"> 
          </div>
          <span id="${rowIdx}" class="position-absolute fam-close-btn" style="color:red; right: -4%;top: 37%;font-size:19px; cursor:pointer;">X</span>
        </div>
        <div class="col-lg-2 col-sm-12">
          <div class="form-group">
            <label for="faadhaar">Aadhaar Card No</label> 
            <input type="text" name="faadhaar[]" placeholder="Aadhaar number" onkeypress="return isNumber(event)" maxlength="12"   class="form-control"> 
          </div>
          
        </div>
        <div class="col-lg-2 col-sm-12">
          <div class="form-group">
            <label for="frelation">Relation</label> 
            <select name="frelation[]" id="frelation" class="form-control">
              <option value="">Select</option>
              <option value="Father">Father</option>
              <option value="Mother">Mother</option>
              <option value="Brother">Brother</option>
              <option value="Wife">Wife</option>
            </select>
          </div>
        </div>
      </div>`       
                      
    );        
  });

  $(document).on('click','.fam-close-btn',function () {
    var id = $(this).attr('id');
    var remove = '#FR'+id;
    $(remove).remove();
     
  });
  $(document).on('click','.child-close-btn',function () {
    var id = $(this).attr('id');
    var remove = '#CR'+id;
    $(remove).remove();
     
  });

  $('#addData').on('click', function () {
      // Adding a row .
    $('#children-details').append(`
      <div class="row mx-2 children-details" id ="CR${++rowIdx}">
        <div class="col-lg-2 col-sm-12 ">
          <div class="form-group">
            <label for="cname">Name</label>  
            <input type="text" name="cname[]" placeholder="Enter name" class="form-control">
          </div>
        </div>
        <div class="col-lg-1 col-sm-12 ">
          <div class="form-group">
            <label for="camritdhari">Amritdhari</label>  
            <select  id="select_amritdhari" class="form-control" name="camritdhari[]">
              <option value="Yes">Yes</option>
              <option value="No">No</option>
            </select>
          </div>
        </div>
        <div class="col-lg-1 col-sm-12 ">
          <div class="form-group">
            <label for="cage">Age</label>  
            <input type="text" name="cage[]" placeholder="age" onkeypress="return isNumber(event)" class="form-control">
          </div>
        </div>
        <div class="col-lg-2 col-sm-12 ">
          <div class="form-group">
            <label for="cqualification">Class</label> 
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
          </div>
        </div>
        <div class="col-lg-2 col-sm-12 ">
          <div class="form-group">
            <label for="cfees">Fees</label>  
            <input type="number" name="cfees[]" placeholder="Fees amount" class="form-control" >
          </div>
        </div>
        <div class="col-lg-2 col-sm-12 ">
          <div class="form-group">
            <label for="cschool">School Name</label>
            <input type="text" name="cschool[]" placeholder="School name"  class="form-control">
          </div>
        </div>
        <div class="col-lg-2 col-sm-12 ">
          <div class="form-group">
            <label for="caadhaar">Aadhaar Card No</label>
            <input type="text" name="caadhaar[]" placeholder="Aadhaar number"  onkeypress="return isNumber(event)" maxlength="12" class="form-control">
          </div>
          <span id="${rowIdx}" class="position-absolute child-close-btn" style="color:red; right: -3%;top: 39%;font-size:19px; cursor:pointer;">X</span>
        </div>
        <div class="col-lg-2 col-sm-12">
          <div class="form-group">
            <label for="crelation">Relation</label> 
            <select name="crelation[]" id="crelation" class="form-control">
              <option value="">Select</option>
              <option value="Brother">Brother</option>
              <option value="Son">Son</option>
              <option value="Daughter">Daughter</option>
            </select>
          </div>
          
        </div>
      </div>`

    );
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
  </script>
  <script>
  //   $("input[name='social_media']").change(function(){
  //     var help = $('input[name=social_media]:checked').val();
  //     if(help == "yes"){
  //       $("#social").show();
  //       $("#unsocial").hide();
  //     }else{
  //       $("#social").hide();
  //       $("#unsocial").show();
  //     }
  //   //  alert(help);
  // });
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
  </script>
  <script>
    $("#policy_checkbox").click(function() {
    if($(this).is(":checked")) {
        $(".show_policy").show();
    } else {
        $(".show_policy").hide();
    }
});
    $('#village').select2({
      placeholder:'Select City',
      // minimumResultsForSearch:-1,
    });
  </script>
@endsection
