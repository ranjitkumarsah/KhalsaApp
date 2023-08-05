
<html><head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Content Wrapper. Contains page content -->

  <style>
     th{
    color:#0b528f !important;
    font-size: 0.9rem;
    text-align: center !important;
  }
    .card{
      border:none;
    }
    p.para1{
      margin-left:20%;
    }
    /* p #para1{
      margin-left:20px !important;
    } */
    footer {
      text-align: center;
      color:black;
    }
    section.content{
      border:none !important;
    }
    table {
      font-family: arial, sans-serif;
      border-collapse: collapse;
      width: 115%;
      border:1px solid black;
      margin-left:-40px;
      margin-right:-60px;
      height:400px;
     
    }

    td, th {
      border: 1px solid black;
      text-align: left;
      padding: 8px;
      text-align:center;
    }

    tr:nth-child(even) {
      /* background-color: #dddddd; */
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
      width: 100%; 
      height: 250px; 
      margin-left:-20px;
      
      /* background-color:#ED9B2D; */
        /* background-image: url("images/Card.png") !important; */
    }
    .row1{
      width: 100%; 
      height: 200px; 
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
        width: 37%;
        /* padding: 10px; */
        height: 300px;
    }
   

/* Clear floats after the columns */
      .row:after {
        content: "";
        display: table;
        clear: both;
      }
  </style>
  </head>
  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
 
    <!-- Main content -->
   
    
    <section class="content">
      <div class="container-fluid">
        <div class="row">
       
            <div class="card">
            <div id="carddata">
              <!-- /.card-header -->
              <div class="card-body second">
             

                <form>
                <div class="row">
                  <div class="column" >
                    <p class="heading"><b>{{$cardholder->name}}:</b></p>
                    <p class="heading">{{$cardholder->address}}</p>
                    <p class="heading"><b>{{$cardholder->contact_number}}</b></p>
                    <p class="heading"><b>abc@gmail.com</b></p>
                  </div>
                  <div class="column">
                    <p class="para1"><b>INVOICE</b></p>
                    <p class="para1">{{$data->created_at}}</p>
                  </div>
                  <div class="column">
                    <p class="para" style="margin-top:-2px !important;"><b>HEALTHCARE</b></p>
                    <p class="para"><b>{{$sewapartner->name}}</b></p>
                    <p class="para">{{$sewapartner->sewa_address}}</p>
                    <p class="heading"><b>{{$sewapartner->contactnumber}}</b></p>
                    <p class="heading"><b>{{$sewapartner->email}}</b></p>
                  </div>
                </div>
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
    </section><br>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
       
            <div class="card">
            <table>
  <tr>
    <th style="width:20% !important;">S.No</th>
    <th>Description</th>
    <th>Fees</th>
    <th>Discount</th>
    <th>Amount</th>
  </tr>
  <tr>
    <td>1</td>
    <td>{{$data->description}}</td>
    <td>{{$data->charges}}</td>
    <td>{{$data->discount}}</td>
    <td>{{$data->balance}}</td>
  </tr>
 

 
  <tr>
    <td style="border:none;"></td>
    <td style="border:none;"></td>
    <td><b>Subtotal</b></td>
    <td>{{$data->charges}}</td>
    <td></td>
  </tr>
  <tr>
    <td></td>
    <td style="text-align:right;"><b>Total</b></td>
    <td>{{$data->balance}}</td>
    <td></td>
    <td></td>
  </tr>


</table>
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
    <section class="content">
      <div class="container-fluid">
        <div class="row">
       
            <div class="card">
            <div id="carddata">
              <!-- /.card-header -->
              <div class="card-body second">
             

                <form>
                <div class="row">
                  <div class="column" >
                    <p class="heading">Attend by:</p>
                    <p class="heading">Doctor name</p><br>
                    {{$data->doctor_name}}
                  </div>

                  <div class="column" >
                 
                  </div>
                 
                  <div class="column">
                    <p>Invoice generated by:</p>
                    <p id="para1">Sewa Partner Account Holder</p>
                  </div>
                </div>
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
      <!-- <footer>
    <a>COMPUTERISED GENERATED INVOICE</a></p>
  </footer> -->
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

