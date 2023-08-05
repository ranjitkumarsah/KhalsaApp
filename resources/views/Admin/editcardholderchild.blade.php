@extends('Admin.layouts.App')
@section('card','menu-open')
@section('viewcardholder','active')

  <!-- Content Wrapper. Contains page content -->
  @section('main_section')
  <style>
    .card-footer {
    background-color: #F5DDBD;
    }
    .card-footer {
    border-top: none;
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
          padding: 20px 20px 30px;
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
                <!-- <div class="invoice-wrapper"> -->
                  <!-- <div class="row">  -->
                   
                 
                <!-- </div> -->

                  
                  <!-- <div class="col-sm-4 col-md-4">
                    <img src="{{url('public/images/sikh.png')}}" alt="Logo" style="width: 100px; margin-left: 75px;margin-top: 7px;margin-bottom: 7px;">
                </div> -->
              <!-- </div> -->
              <!-- /.card-header -->
              <!-- form start -->
              <form  method="post" action="{{url('Admin/savecardholder')}}" id="form">
                @csrf
                <div class="row mt-3">
                    <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="form-group">
                    <label for="pwd">Name</label>
                    <input type="text" class="form-control" id="cname" name="cname" value="{{$card_child->cname}}">
                  </div>
                    </div>
                    <input type="hidden" class="form-control" id="card_child_id" name="card_child_id" value="{{$card_child->id}}">
                    <div class="col-lg-2 col-md-2 col-sm-12">
                    <div class="form-group">
                    <label  for="pwd">Amritdhari</label>
                    <select id = "ddlPassport" class="form-control" name="camritdhari">
                      <option value="Yes" {{$card_child->camritdhari == "Yes"  ? 'selected' : ''}}>Yes</option>
                      <option value="No" {{$card_child->camritdhari == "No"  ? 'selected' : ''}}>No</option>            
                  </select>
                 </div>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-12">
                      <div class="form-group">
                        <label for="pwd">Age</label>
                        <input type="number" class="form-control" id="cage" name="cage" value="{{$card_child->cage}}">
                      </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12">
                      <div class="form-group">
                        <label for="pwd">Aadhaar Number</label>
                        <input type="number" max="12" class="form-control" id="caadhaar" name="caadhaar" value="{{$card_child->caadhaar}}">
                      </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-12">
                    <div class="form-group">
                    <label for="pwd">Educational Qualification</label>
                    <select id = "qualification" class="form-control" name="cqualification">
                          <option value="below10" {{$card_child->cqualification == "below10"  ? 'selected' : ''}}>below 10</option>
                          <option value="12" {{$card_child->cqualification == "12"  ? 'selected' : ''}}>12</option>            
                          <option value="graduate" {{$card_child->cqualification == "graduate"  ? 'selected' : ''}}>Graduate</option>            
                          <option value="degree" {{$card_child->cqualification == "degree"  ? 'selected' : ''}}>Degree</option>            
                          <option value="diploma" {{$card_child->cqualification == "diploma"  ? 'selected' : ''}}>Diploma</option>            
                          <option value="postgraduate" {{$card_child->cqualification == "postgraduate"  ? 'selected' : ''}}>Post Graduate</option>            
                          <option value="PhD" {{$card_child->cqualification == "PhD"  ? 'selected' : ''}}>PhD</option>            
                      </select><br>
                    </div>
                  </div>

                  <div class="col-lg-3 col-md-3 col-sm-12">
                    <div class="form-group">
                      <label for="pwd">School Name</label>
                      <input type="text" class="form-control" id="cschool" name="cschool"   value="{{$card_child->cschool}}">
            
                    </div>
                  </div>
                  <div class="col-lg-3 col-md-3 col-sm-12">
                    
                    <label for="pwd">Fees</label>
                    <input type="number" class="form-control" id="cfees" name="cfees"  value="{{$card_child->cfees}}">
                  </div>
                  <div class="col-lg-3 col-md-3 col-sm-12">
                    
                    <label for="crelation">Relation</label>
                    <select name="crelation" id="crelation" class="form-control">
                      <option value="Brother" {{$card_child->crelation == "Brother"  ? 'selected' : ''}}>Brother</option>
                      <option value="Son" {{$card_child->crelation == "Son"  ? 'selected' : ''}}>Son</option>
                      <option value="Daughter" {{$card_child->crelation == "Daughter"  ? 'selected' : ''}}>Daughter</option>
                    </select>
                  </div>
                </div>
              </div>
               
            </div>
             
                    
              </div>
         
                    </div>
                

                
      

    


                
                  
                   
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
    var id = $("#card_child_id").val();
      $.ajax({
          type: 'POST',
          url: '{{url('Admin/updatecardholderchild')}}' + '/' + id,
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
  
@endsection
