@extends('Admin.layouts.App')
@section('card','menu-open')
@section('viewcardholder','active')

  <!-- Content Wrapper. Contains page content -->
  @section('main_section')
  <style>
    table#tbody {
      border: 1px solid black;
    }
    table.dataTable tbody th, table.dataTable tbody td {
      border: 1px solid black;
    }
    .card-footer {
      background-color: white !important;
      border-top:0px !important;
    }
      h5#heading2 {
        margin-left: 8px;
      }
    .card.card-primary.policy {
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
          color:#0b528f !important;
        }
       table#table_class{
          margin-left: 241px;
          margin-right: 27px;
       }
    }
    select#select_amritdhari {
        /* margin-left: 16px; */
        /* width: 40; */
    }
    button#addBtn {
      margin-right: 13px;
    }
    button#addData{
      margin-right: 13px;
    }
    /* table td input[type="text"] {
    width: 86% ;
    border: 1px solid #afa6a6;
    border-bottom: 1px solid #afa6a6;
    margin-left: 20px;
    } */
    /* table#tbody {
    height: 40px !important;
    } */
    table#table_class{
      height: 40px !important;
    }
     table#tbody {
      width: 94%;
      height:40px !important;
  }
  table#table_class {
    width: 1085px;
  }
    /* input#org_name {
      margin-left: 5px;
    }
    input#family{
      margin-left: 5px;
    }
    #hidden_div {
        display: none;
    } */
    button#submitForm {
      color:black;
      background-color: #ED9B2D;
      width:22%;
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
    width: 86%;
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
      margin-left: 16px;
      width: 92%;
    }
    h4#membership_form {
        font-size: 18px;
    }
    form#form {
      margin-left: 0px;
  }
  table#tbody {
      margin-left: 0px;
      height:250px !important;
    }
    table#table_class{
      margin-left: 0px;
    }
    body:not(.sidebar-mini-md):not(.sidebar-mini-xs):not(.layout-top-nav) .content-wrapper, body:not(.sidebar-mini-md):not(.sidebar-mini-xs):not(.layout-top-nav) .main-footer, body:not(.sidebar-mini-md):not(.sidebar-mini-xs):not(.layout-top-nav) .main-header {
    margin-left: 0px !important;
}
}
/* input.form-control.fname {
    width: 84%;
} */
.family-details .col-sm-12{
      padding-left:0;
      text-align: center;
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
                    <div class="col-md-12 col-sm-12 ml-3">
                    <h5 style="font-weight:bold;" id="heading2">Details of family Members:</h5>
                  </div>
                
    </div>
    <input type="hidden" name="cardholder_id" id="cardholder_id" value="{{$id}}"  class="form-control">


    <div id="family-details">
      <div class="row mx-2 family-details">
        <div class="col-lg-2 col-sm-12 ">
          <div class="form-group">
            <label for="fname">Name</label>  
            <input type="text" name="fname[]"  class="form-control fname">
          </div>
        </div>
        <div class="col-lg-1 col-sm-12 ">
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
            <input type="number" name="fage[]" onkeypress="return isNumber(event)"  class="form-control fage">
          </div>
        </div>
        <div class="col-lg-2 col-sm-12">
          <div class="form-group">
            <label for="fblood_group">Blood Group</label>
            <select id = "fblood_group" class="form-control" name="fblood_group[]" >
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
            <input type="text" name="fjob[]"  class="form-control">                     
          </div>
        </div>
        <div class="col-lg-2 col-sm-12">
          <div class="form-group">
            <label for="fsalary">Salary</label>
            <input type="number" onkeypress="return isNumber(event)" name="fsalary[]"  class="form-control">                      
          </div>
        </div>
        <div class="col-lg-2 col-sm-12">
          <div class="form-group">
            <label for="faadhaar">Aadhaar Number</label>
            <input type="tel" onkeypress="return isNumber(event)" maxlength="12" name="faadhaar[]"  class="form-control faadhaar">
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
      </div>
      {{--<table id="tbody" class="table table-responsive-sm table table-bordered table-hover dataTable no-footer">
        <tr>
        
          <th >Name</th>
          <th id="table1">Amritdhari</th>
          <th>Age</th>
          <th>Blood Group</th>
          <th>Qualification</th>
          <th>Job</th>
          <th>Salary</th>
          <th>Aadhaar Number</th>
          <th>Relation</th>
        </tr>
        <tr>
          <td><input type="text" name="fname[]" class="form-control fname"></td>
          <td> <select  id="select_amritdhari" class="form-control" name="famritdhari[]">
            <option value="Yes">Yes</option>
            <option value="No">No</option>
          </select></td>
          <td><input type="number" name="fage[]" onkeypress="return isNumber(event)"  class="form-control"></td>
          <td>  <select id = "fblood_group" class="form-control" name="fblood_group[]" style="margin-left: 12px;width: 91px;">
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
          <td><input type="text" name="fjob[]"  class="form-control"></td>
          <td><input type="number" name="fsalary[]"  class="form-control"></td>
          <td><input type="number" name="faadhaar[]"  class="form-control"></td>
          <td>
            <select name="frelation[]" id="frelation" class="form-control">
              <option value="">Select</option>
              <option value="Father">Father</option>
              <option value="Mother">Mother</option>
              <option value="Brother">Brother</option>
              <option value="Wife">Wife</option>
            </select>
          </td>
        </tr>
      </table>--}}
    </div>
    </div><br>

    <div class="text-right">
                <button class="btn btn-md btn-primary" id="addBtn" type="button" style="font-size: 0.9rem;">
                          Add New Row <i class="fa fa-plus"></i>
                        </button>
                  </div><br>
        
            
                {{-- <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 ml-3">
                      <h5 style="font-weight:bold;" id="heading1">Details of Children in family:</h5>
                    </div>
                  </div>
            
                <div class="row">
                  <table id="table_class" class="table table-responsive-sm table table-bordered table-hover dataTable no-footer">
                    <tr>
                      <th>Name</th>
                      <th id="table1">Amritdhari</th>
                      <th>Age</th>
                      <th>Qualification</th>
                      <th>Job</th>
                      <th>Salary</th>
                    </tr>
                    <tr>
                      <td><input type="text" name="cname[]"  class="form-control"></td>
                      <td> <select  id="select_amritdhari" class="form-control" name="camritdhari[]">
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                      </select></td>
                      <td><input type="text" name="cage[]"  onkeypress="return isNumber(event)" class="form-control"></td>
                      <td>    
                          <select id = "ccqualification" class="form-control" name="cqualification[]">
                          <option value="below10">below 10</option>
                          <option value="12">12</option>            
                          <option value="graduate">Graduate</option>            
                          <option value="degree">Degree</option>            
                          <option value="diploma">Diploma</option>            
                          <option value="postgraduate">Post Graduate</option>            
                          <option value="PhD">PhD</option>            
                      </select></td>
                      <td><input type="text" name="cjob[]"  class="form-control"></td>
                      <td><input type="text" name="csalary[]"  class="form-control"></td>
                    </tr>
                  </table>
                </div><br>

                <div class="text-right">
                <button class="btn btn-md btn-primary" id="addData" type="button">
                          Add new Row
                        </button>
                  </div><br><br> --}}


                {{-- <div class="row">
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

                  <div class="row">
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

                  <section class="content">
                    <div class="container-fluid">
                    <div class="row"> 
                      <div class=" col-lg-12 col-md-12">
                        <div class="card card-primary policy">
                          <div class="container-fluid">
                            <div class="row">
                             <h5 style="font-weight:bold;" id="heading1">Policy Details:</h5>
                            </div>
  
                            <div class="row">
                              <div class="col-lg-6 col-md-6 col-sm-12">
                                <label for="pwd">Company Name:</label>
                                <input type="text" name="company_name" class="form-control">
                              </div>
                              <div class="col-lg-6 col-md-6 col-sm-12">
                                <label for="pwd">Policy No:</label>
                                <input type="text" name="policy_no" class="form-control">
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-lg-6 col-md-6 col-sm-12">
                                <label for="pwd">Issue:</label>
                                <input type="date" name="issue_date" class="form-control">
                              </div>
                              <div class="col-lg-6 col-md-6 col-sm-12">
                                <label for="pwd">Expiry Date:</label>
                                <input type="date" name="expiry_date" class="form-control">
                              </div>
                          </div>
                          <div class="row">
                          <div class="col-lg-6 col-md-6 col-sm-12">
  
                          </div>
                          </div>
                        </div>
                       </div>
                      </div>
                    </section>
                 
                    <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class=" form-group">
                    <input type="text" class="form-control" name="verify_officer" id="verify_officer" style="margin-left:13px;">
                    <label for="pwd" class="verify_officer_label">Verifying Officer:</label>
                  </div>
                    </div>

                     <div class="col-lg-4 col-md-4 col-sm-12">
                     <div class=" form-group">
                    <input type="text"  name="family_head" class="form-control" id="verify_officer" style="margin-left:40px;">
                    <label class="verify_officer_label">Head of family:</label>
                  </div>
               </div> --}}
                  
                   
                <!-- </div> -->
                  
             
                <div class="card-footer">
                    <div class="text-center mt-4">
                      <button type="submit"  class="btn btn-primary" id="submitForm">Submit</button>
                    </div>
                </div>
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
      var spinner = $('#loader');
            spinner.show();
    e.preventDefault();
    var data = new FormData(this);
    var id = $("#cardholder_id").val();
      $.ajax({
          type: 'POST',
          url: '{{url('Admin/saveadd_cardfamily')}}' + '/' + id,
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
                'Card Holder Family Added!',
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
        <div class="row mx-2 family-details" id="FR${++rowIdx}">
          <div class="col-lg-2 col-sm-12 ">
            <div class="form-group">
              <label for="fname">Name</label>  
              <input type="text" name="fname[]"  class="form-control fname">
            </div>
          </div>
          <div class="col-lg-1 col-sm-12 ">
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
              <input type="number" name="fage[]" onkeypress="return isNumber(event)"  class="form-control fage">
            </div>
          </div>
          <div class="col-lg-2 col-sm-12">
            <div class="form-group">
              <label for="fblood_group">Blood Group</label>
              <select id = "fblood_group" class="form-control" name="fblood_group[]" >
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
              <input type="text" name="fjob[]"  class="form-control">                     
            </div>
          </div>
          <div class="col-lg-2 col-sm-12">
            <div class="form-group">
              <label for="fsalary">Salary</label>
              <input type="number" onkeypress="return isNumber(event)" name="fsalary[]"  class="form-control">                      
            </div>
            <span id="${rowIdx}" class="position-absolute fam-close-btn" style="color:red; right: -4%;top: 37%;font-size:19px; cursor:pointer;">X</span>
          </div>
          <div class="col-lg-2 col-sm-12">
            <div class="form-group">
              <label for="faadhaar">Aadhaar Number</label>
              <input type="tel" onkeypress="return isNumber(event)" maxlength="12"  name="faadhaar[]"  class="form-control faadhaar">
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
        </div>
      `);
      // $('#tbody').append(`<tr id="R${++rowIdx}">
      //       <td class="row-index text-center">
      //       <input type="text" name="fname[]" class="form-control"></td>
      //       <td class="row-index text-center">
      //       <select  id="select_amritdhari" class="form-control" name="famritdhari[]">
      //           <option value="Yes">Yes</option>
      //           <option value="No">No</option>
      //       </select></td>
      //       <td class="row-index text-center">
      //       <input type="number" name="fage[]" class="form-control"></td>
      //       <td>  <select id = "fblood_group" class="form-control" name="fblood_group[]" style="margin-left: 12px;width: 91px;">
      //                   <option value="">Select</option>
      //                     <option value="A+">A+</option>
      //                     <option value="A-">A-</option>  
      //                     <option value="O+">O+</option>
      //                     <option value="O-">O-</option>
      //                     <option value="B-">B+</option>         
      //                     <option value="B+">B-</option>
      //                     <option value="AB+">AB+</option>
      //                     <option value="AB-">AB-</option>        
      //                 </select></td>
      //       <td class="row-index text-center">
      //       <select id ="ffqualification" class="form-control" name="fqualification[]">
      //                     <option value="">Select</option>
      //                     <option value="below10">below 10</option>
      //                     <option value="12">12</option>            
      //                     <option value="graduate">Graduate</option>            
      //                     <option value="degree">Degree</option>            
      //                     <option value="diploma">Diploma</option>            
      //                     <option value="postgraduate">Post Graduate</option>            
      //                     <option value="PhD">PhD</option>            
      //                 </select></td>
      //       <td class="row-index text-center">
      //       <input type="text" name="fjob[]" class="form-control"></td>
      //       <td class="row-index text-center">
      //       <input type="number" name="fsalary[]" class="form-control"></td>
      //       <td><input type="number" name="faadhaar[]"  class="form-control"></td>
      //       <td>
      //         <select name="frelation[]" id="frelation" class="form-control">
      //           <option value="">Select</option>
      //           <option value="Father">Father</option>
      //           <option value="Mother">Mother</option>
      //           <option value="Brother">Brother</option>
      //           <option value="Wife">Wife</option>
      //         </select>
      //       </td>
      //        </tr>`
      // );
  });
  $(document).on('click','.fam-close-btn',function () {
    var id = $(this).attr('id');
    var remove = '#FR'+id;
    $(remove).remove();
     
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
@endsection
