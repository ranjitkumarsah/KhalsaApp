
<html>
  <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">


  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Content Wrapper. Contains page content -->

  <style>
    /* @font-face {
      font-family: 'ArivMdr';
      font-style: normal;
      font-weight: 100;
      src: url('../../public/fonts/Arivmdr-x9qO.ttf') format('truetype');
    } */
    /* body {
      font-family: sans-serif;
    } */
    /* table.details tr { 
      line-height: 17px; 
    } */
    .cardholder_idclass{
      margin:10px;
      position: absolute;
      left:10px;
    }
    #carddata{
      /* background-color:#ED9B2D; */
        /* background-image: url("../public/images/IMG/Orange-Back-Side.jpg") !important;
        background-size: cover; */
    }
    .card-body second{
      background-color:#ED9B2D;
    }
    #cardid{
      margin-left:40px;
      margin-top:40px !important;
    }
    p.heading{
      font-style:normal;
      /* font-family:inherit; */
      font-size:15px;
      /* margin-left:40px !important; */
      margin-top:10px !important;
    }
    p.para{
      /* font-family: Times, "Times New Roman", Georgia, serif; */
      font-style:normal;
      font-size:15px;
      margin-top:10px !important;
    }
   
    img #cardlogo{
      width: 100%; 
      height: 300px; 
      margin-top:0px !important;

    }
    .row{
      width: 60%; 
      height: 200px; 
      margin-left:20%;
      /* background-color:#ED9B2D; */
        /* background-image: url("images/Card.png") !important; */
    }
    .new{
      width: 60%; 
      height: 300px; 
      margin-left:20%;
      /* background-color:#ED9B2D; */
        /* background-image: url("images/Card.png") !important; */
    }
    .column {
        float: left;
        /* width: 60%; */
        /* padding: 10px; */
        height: 300px;
    }
    .column-60 {
      width:60%
    }

/* Clear floats after the columns */
      .row:after {
        content: "";
        display: table;
        clear: both;
      }
      .card-primary {
        height: 200px;
      }
      th {
        padding: 6px;
        padding-right: 12px;
        width: 150px;
      }

      .details tr { height: 20px; }
  </style>
  </head>
  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header mb-5">
      <div class="container-fluid">
        <div class="new">
          <!-- <div id="cardid">
          {{--$cardholderdetails->card_id--}}
          </div> -->
         
          <div class="card card-primary">
            <!-- <img src="{{asset('/public/images/IMG/khalsa-card-front.png')}}" style="width:100%; ">    -->
            <img src="{{asset('/public/images/IMG/Orange-Front-Side.jpg')}}" style="width:100%; ">   

            <!-- <h4 style="text-align:center;  background-color:#ED9B2D">Khalsa Card</h4> -->
            <div class="cardholder_idclass">
              <b>{{$cardholderdetails->card_id}} </b> 
              <!-- <b> 1699-{{1000000+$cardholderdetails->id}} </b> -->
            </div>
           
            <!-- <img src="{{ asset('/public/images/IMG/card-logo.png') }}" style="width:100%; height:200px; visibility:hidden;">    -->
          </div>
          
          <div class="col-sm-6">
          
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <br>
    <!-- Main content -->
   
    
    <section class="content mt-5">
      <div class="container-fluid">
        <div class="row">
            <div class="card">
            <div id="carddata">
              <!-- /.card-header -->
              <img src="{{asset('/public/images/IMG/Orange-Back-Side.jpg')}}" style="width:100%;">
              <div class="card-body second pb-5 ml-5" style="z-index:999; position:absolute; top:0;left:0;">
                <form>
                  <table class="details mt-4">
                    <tr>
                      <th>Name:</th>
                      <th>{{$cardholderdetails->name}}</th>
                    </tr>
                    <tr>
                      <th>ਨਾਮ :</th>
                      <th>{{$cardholderdetails->name_punjabi}}</th>
                    </tr>
                    <tr>
                      <th>Phone:</th>
                    
                      <th>{{$cardholderdetails->contact_number}}</th>
                    </tr>
                    <tr>
                      <th>ਫੋਨ:</th>
                      <th>{{$cardholderdetails->contact_number}}</th>
                    </tr>
                    <tr>
                      <th>Blood Group:</th>
                      <th>{{$cardholderdetails->blood_group}}</th>
                    </tr>
                    <tr>
                      <th>ਬਲੱਡ ਗਰੁੱਪ:</th>
                      <th>{{$cardholderdetails->blood_group_punjabi}}</th>
                    </tr>
                    <tr>
                      <th>Address:</th>
                      <th>{{$cardholderdetails->address}}</th>
                    </tr>
                    <tr>
                      <th>ਪਤਾ:</th>
                      <th>{{$cardholderdetails->address_punjabi}}</th>
                    </tr>
                  </table>

                  {{--<div class="row" style="margin-left: 2%;">
                    <div class="column column-60" >
                      <p class="heading">NAME:</p>
                      <p class="heading">PHONE:</p>
                      <p class="heading">BLOOD GROUP:</p>
                      <p class="heading">ADDRESS:</p>

                    </div>
                    <div class="column">
                      <p class="para">{{$cardholderdetails->name}}</p>
                      <p class="para">{{$cardholderdetails->contact_number}}</p>
                      <p class="para">{{$cardholderdetails->blood_group}}</p>
                      <p class="para">{{$cardholderdetails->address}}</p>

                    </div>
                  </div>--}}
                  <!-- <div class="row">
                              <div class="col-lg-4 col-md-4 col-sm-4">
                                  NAME:
                              </div>
                              <div class="col-lg-4 col-md-4 col-sm-4">{{--$cardholderdetails->name--}}</div>
                          </div><br>

                          <div class="row">
                              <div class="col-lg-4 col-md-4 col-sm-4">
                                  ADDRESS:
                              </div>
                              <div class="col-lg-4 col-md-4 col-sm-4">{{--$cardholderdetails->address--}}</div>
                          </div><br>

                          <div class="row">
                              <div class="col-lg-4 col-md-4 col-sm-4">
                                  PHONE:
                              </div>
                              <div class="col-lg-4 col-md-4 col-sm-4">{{--$cardholderdetails->contact_number--}}</div>
                          </div><br>

                          <div class="row">
                              <div class="col-lg-4 col-md-4 col-sm-4">
                                  BLOOD GROUP: -->
                              </div>
                              
                </form>
              </div>
              <!-- /.card-body -->
            </div>
            </div>
            <!-- /.card -->
  
           
            <!-- /.card -->
        
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
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

<!-- Page specific script -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
  // var is_chrome = function () { return Boolean(window.chrome); }
  // if(is_chrome){
  //     window.print();
  //     //  setTimeout(function(){window.close();}, 10000);
  //     //  give them 10 seconds to print, then close
  // }else{
  //     window.print();
  // }


  // Check if the browser is Chrome
  var is_chrome = Boolean(window.chrome);

  // Function to redirect back to the previous page
  function redirectToPreviousPage() {
    window.location.href = document.referrer;
  }

  // Register the onafterprint event handler
  window.onafterprint = function() {
    // Redirect back to the previous page
    // redirectToPreviousPage();
    setTimeout(redirectToPreviousPage, 5000);

  };

  // Initiate the print dialog
  window.print();

  // If the browser is not Chrome, redirect immediately
  if (!is_chrome) {
    redirectToPreviousPage();
  }
</script>

