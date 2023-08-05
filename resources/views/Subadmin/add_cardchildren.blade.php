@extends('Subadmin.layouts.App')
@section('card','menu-open')
@section('viewcardholder','active')

  <!-- Content Wrapper. Contains page content -->
  @section('main_section')
  <style>
    table#table_class {
      border: 1px solid black;
    }
    /* select#ccqualification{
      width:86%;
    } */
    table.dataTable tbody th, table.dataTable tbody td{
      border:1px solid black;
    }
    /* input.form-control.csalary{
      width:86%;
    }
    input.form-control.cage{
      width:86%;
    }
    input.form-control.cqualification{
      width:86%;
    }
    input.form-control.cjob{
      width:86%;
    } */
    /* input.form-control.cname{
      width:84%;
    } */
    .card-footer {
        background-color: white !important;
        border-top: 0px !important;
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
    th#table1 {
        /* padding-left: 2% !important; */
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
    /* margin-left: 20px; */
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
    width: 94%;
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
      width: 22%;
    	/* width: 134%;
      margin-left: 608%; */
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
    table#table_class {
      height: 200px !important;
    }
    label.verify_officer_label {
        margin-left: 0px;
    }
    div#Table_ID_wrapper {
        overflow-y: scroll;
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
.children-details .col-sm-12{
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
            <a href="{{url('Subadmin/viewcardholder')}}"class="btn btn-primary back_btn">Back</a>
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
              <form  method="post" action="{{url('Subadmin/savecardholder')}}" id="form">
                @csrf
              
                

                
                <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-12 ml-3">
                    <h5 style="font-weight:bold;" id="heading1">Details of Children in family:</h5>
                  </div>
                </div>
                <input type="hidden" name="cardholder_id" id="cardholder_id" value="{{$id}}"  class="form-control">
            
                <div id="children-details">
                  <div class="row mx-2 children-details">
                    <div class="col-lg-2 col-sm-12 ">
                      <div class="form-group">
                        <label for="cname">Name</label>  
                        <input type="text" name="cname[]"  class="form-control cname">
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
                    <div class="col-lg-1 col-sm-12">
                      <div class="form-group">
                        <label for="cage">Age</label>
                        <input type="number" name="cage[]"   class="form-control cage">
                      </div>
                    </div>
                    <div class="col-lg-2 col-sm-12">
                      <div class="form-group">
                        <label for="cqualification">Qualification</label>
                        <select id = "ccqualification" class="form-control cqualification" name="cqualification[]">
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
                        <label for="cfees">Fees</label>
                        <input type="number" name="cfees[]"  class="form-control cfees">                      
                      </div>
                    </div>
                    <div class="col-lg-2 col-sm-12">
                      <div class="form-group">
                        <label for="cschool">School Name</label>
                        <input type="text" name="cschool[]"  class="form-control cschool">                      
                      </div>
                    </div>
                    <div class="col-lg-2 col-sm-12">
                      <div class="form-group">
                        <label for="caadhaar">Aadhaar Number</label>
                        <input type="number"  name="caadhaar[]"  class="form-control caadhaar">
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
                  </div>
                  {{--<table id="table_class"  class="table table-responsive-sm table-striped table table-bordered table-hover dataTable no-footer">
                    <tr>
                      <th>Name</th>
                      <th id="table1">Amritdhari</th>
                      <th>Age</th>
                      <th>Qualification</th>
                      <th>Fees</th>
                      <th>School Name</th>
                      <th>Aadhaar Number</th>
                      <th>Relation</th>
                    </tr>
                    <tr>
                      <td><input type="text" name="cname[]"  class="form-control cname"></td>
                      <td> <select  id="select_amritdhari" class="form-control" name="camritdhari[]">
                        <option value="">Select</option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                      </select></td>
                      <td><input type="number" name="cage[]"   class="form-control cage"></td>
                      <td>    
                          <select id = "ccqualification" class="form-control cqualification" name="cqualification[]">
                            <option value="">Select</option>
                            <option value="below10">below 10</option>
                          <option value="12">12</option>            
                          <option value="graduate">Graduate</option>            
                          <option value="degree">Degree</option>            
                          <option value="diploma">Diploma</option>            
                          <option value="postgraduate">Post Graduate</option>            
                          <option value="PhD">PhD</option>            
                      </select></td>
                      <td><input type="number" name="cfees[]"  class="form-control cfees"></td>
                      <td><input type="text" name="cschool[]"  class="form-control cschool"></td>
                      <td><input type="number"  name="caadhaar[]"  class="form-control caadhaar"></td>
                      <td>
                        <select name="crelation[]" id="crelation" class="form-control">
                          <option value="">Select</option>
                          <option value="Brother">Brother</option>
                          <option value="Son">Son</option>
                          <option value="Daughter">Daughter</option>
                        </select>
                      </td>
                    </tr>
                  </table>--}}
                </div><br>

                <div class="text-right">
                <button class="btn btn-md btn-primary" id="addData" type="button" style="font-size: 0.9rem;">
                          Add New Row <i class="fa fa-plus"></i>
                        </button>
                  </div><br><br>
        
            
            
                  
                   
                <!-- </div>
                  
                </div></div>
                  
                </div> -->
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
    e.preventDefault();
    var spinner = $('#loader');
            spinner.show();
    var data = new FormData(this);
    var id = $("#cardholder_id").val();
      $.ajax({
          type: 'POST',
          url: '{{url('Subadmin/saveadd_cardchildren')}}' + '/' + id,
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
                'Card Holder Children Added!',
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
      $('#tbody').append(`<tr id="R${++rowIdx}">
            <td class="row-index text-center">
            <input type="text" name="fname[]" class="form-control"></td>
            <td class="row-index text-center">
            <select  id="select_amritdhari" class="form-control" name="famritdhari[]">
                <option value="Yes">Yes</option>
                <option value="No">No</option>
            </select></td>
            <td class="row-index text-center">
            <input type="text" name="fage[]" class="form-control"></td>
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
                      </select></td>
            <td class="row-index text-center">
            <input type="text" name="fjob[]" class="form-control"></td>
            <td class="row-index text-center">
            <input type="text" name="fsalary[]" class="form-control"></td>
            
             </tr>`);
  });
  var rowIdx = 0;
  $('#addData').on('click', function () {
    // Adding a row inside the tbody.
    $('#children-details').append(`
      <div class="row mx-2 children-details" id ="CR${++rowIdx}">
        <div class="col-lg-2 col-sm-12 ">
          <div class="form-group">
            <label for="cname">Name</label>  
            <input type="text" name="cname[]"  class="form-control cname">
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
        <div class="col-lg-1 col-sm-12">
          <div class="form-group">
            <label for="cage">Age</label>
            <input type="number" name="cage[]"   class="form-control cage">
          </div>
        </div>
        <div class="col-lg-2 col-sm-12">
          <div class="form-group">
            <label for="cqualification">Qualification</label>
            <select id = "ccqualification" class="form-control cqualification" name="cqualification[]">
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
            <label for="cfees">Fees</label>
            <input type="number" name="cfees[]"  class="form-control cfees">                      
          </div>
        </div>
        <div class="col-lg-2 col-sm-12">
          <div class="form-group">
            <label for="cschool">School Name</label>
            <input type="text" name="cschool[]"  class="form-control cschool">                      
          </div>
        </div>
        <div class="col-lg-2 col-sm-12">
          <div class="form-group">
            <label for="caadhaar">Aadhaar Number</label>
            <input type="number"  name="caadhaar[]"  class="form-control caadhaar">
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
      </div>
    `);
    // $('#table_class').append(`
    
    //   <tr id="R${++rowIdx}">
    //       <td class="row-index text-center">
    //       <input type="text" name="cname[]" class="form-control cname"></td>
    //       <td class="row-index text-center">
    //       <select  id="select_amritdhari" class="form-control" name="camritdhari[]">
    //           <option value="Yes">Yes</option>
    //           <option value="No">No</option>
    //       </select></td></td>
    //       <td class="row-index text-center">
    //       <input type="number" name="cage[]" class="form-control cage"></td>
    //       <td class="row-index text-center">
    //       <select id = "ccqualification" class="form-control cqualification" name="cqualification[]">
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
    //       <input type="number" name="cfees[]" class="form-control cjob"></td>
    //       <td class="row-index text-center">
    //       <input type="text" name="cschool[]" class="form-control csalary"></td>
    //       <td><input type="number" name="caadhaar[]"  class="form-control caadhaar"></td>
    //       <td>
    //         <select name="crelation[]" id="crelation" class="form-control">
    //           <option value="">Select</option>
    //           <option value="Brother">Brother</option>
    //           <option value="Son">Son</option>
    //           <option value="Daughter">Daughter</option>
    //         </select>
    //       </td>
          
    //         </tr>
    // `);
  });
  $(document).on('click','.child-close-btn',function () {
    var id = $(this).attr('id');
    var remove = '#CR'+id;
    $(remove).remove();
     
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
