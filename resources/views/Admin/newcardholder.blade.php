@extends('Admin.layouts.App')
@section('sewapartners','menu-open')
@section('viewkhalsamember','active')

  <!-- Content Wrapper. Contains page content -->
  @section('main_section')
<style>
   .register_class {
    margin-left: 40%;
    width: 98%;
}
  p.para1 {
    display: flex;
    height: 40px;
  }
  div#new_row {
    display: flex;
  }

  button#addBtn{
    display:none;
  }
  /* .card-footer.text-center {
      background-color: #0b528f;
  } */
  input#visible{
    display:none;
  }
  input[type="checkbox"] {
    color: #0b528f;
  }
  button.btn.btn-primary{
    background-color: #ED9B2D !important;
    color: black;
    width: 22%;
  }
  input[type="text"] {
      width: 100%;
  }

  h5#heading_class {
    /* color: #0b528f; */
    font-weight: bolder;
  }
  input[type="checkbox"] {
    color: #0b528f;
    transform: scale(2);
    margin-left: 6px;
  }
    /* input[type="text"] {
      border-top: none;
      border-left: none;
      border-right: none;
  } */

    @media (max-width:992px) {
   
   }
   @media only screen and (min-width: 1200px) {
   
  }
   @media(min-width:280px) and (max-width:767px) {
   
    
  }
    </style>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Cardholder</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              {{-- <li class="breadcrumb-item"><a href="#">Home</a></li> --}}
              {{-- <li class="breadcrumb-item active">Validation</li> --}}
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
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
            
              <!-- /.card-header -->
              <!-- form start -->
              <form  method="post" action="{{url('Admin/savecardholder')}}" id="form">
                
            
                <div class="card-body">
                 @csrf
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
                        <select id = "foundation_detail" class="form-control" name="foundation_detail">
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
                        <label>No</label><br><input type="radio" name="govthelp" value="no">
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
                    <div class="col-lg-2 col-md-2 col-sm-12 mt-4"><label>Yes</label><br><input type="radio" id="checkbox_id" name="social_media" value="yes"></div>
                    <div class="col-lg-2 col-md-2 col-sm-12 mt-4"><label>No</label><br><input type="radio" name="social_media" value="no"></div>
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
                        <input type="text" class="form-control" name="family_head">
                    </div>
                </div><br>

                <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <label>Attesting</label>
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
                    <div id="new_row">
                    <input class="form-control" type="file" name="house_photo[]" id="visible" /> 
                    <button class="btn btn-md btn-primary" name="house_photo[]" id="addBtn" type="button">
                          Add
                        </button>
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
                    <input type="text" class="form-control" name="date">
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <label>Volunteer Signature</label>
                    <input type="text" class="form-control" name="volunteer_signature">
                </div>
                </div><br>

                <div class="register_class">
                  <button type="submit"  class="btn btn-primary" id="submitForm">Submit</button>
                </div><br>

                {{-- <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-12">
                    <h5  id="heading_class" style="text-align:center;">Sikhs for Equality Foundation Head Office</h5>
                   </div>
                </div>
		
                <div class="card-footer text-center">
                    <p>98558-01984,99145-01984,72057-00009,72058-00009 &nbsp; &nbsp; Joginder Singh Nagar, Paghwara</p>
                    <p></p>
                </div> --}}
     
              </form>
            </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">

          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  {{-- <footer class="main-footer">
    <strong>Copyright &copy; 2022 <a href="https://protolabzit.com/" target="_blank">Protolabz eServices</a>.</strong>
    All rights reserved.
    
  </footer> --}}

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
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
   
      $.ajax({
          type: 'POST',
          url: '{{url('Admin/savenewcardholder')}}',
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
  function showHide(that) {
  var hiddenBrowserFiles = document.getElementsByName("house_photo[]");
  
  for (var i = 0; i < hiddenBrowserFiles.length; i++) {
    if (that.id == 'show_id') {
      if (that.checked) {
        hiddenBrowserFiles[i].style.display = "show";
        document.getElementsById("addBtn").style.display = "show";
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
</script>
<link rel="stylesheet" href=
"//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href=
"https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
  var rowIdx = 0;
    $('#addBtn').on('click', function () {
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
  



@endsection
