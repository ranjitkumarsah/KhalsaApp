@extends('Subadmin.layouts.App')
@section('card','menu-open')
@section('viewcardholder','active')
<style>
  a#btn_id {
    margin-left: 111px;
    background-color:#ED9B2D;
    color:black;
  }
   a.btn.btn-primary.back_btn{
    background-color:#ED9B2D;
    color:black;
  }
  .card-body{
    background-color:white !important;
  }
  .content-wrapper{
    min-height: 867px !important;
  }
  table.dataTable tbody th, table.dataTable tbody td {
    border: 1px solid black;
  }
  /* section.content {
    background-color: #F5DDBD;
  }  */
    textarea {
      width: 97%;
      height: 55px;
  }
    table.dataTable.no-footer th {
      border: 1px solid black;
  }
    table.dataTable.no-footer {
      border: 1px solid black;
  }
  table.dataTable thead th {
      / outline: none; /
      border: 1px solid black !important;
  }
  input[type="text"] {
    width: 95%;
  }
  #active{
    border: none;color: blue;font-size: 22px;
  }
  #inactive{
    border: none;color: red;font-size: 22px;
  }
  h3.heading_detail{
    color:black;
    font-weight:500;
  }
  .card {
    box-shadow: none !important;
  }
  .card-body {
    background-color: #F5DDBD;
  }
  @media(min-width:375px) {
    .content-wrapper{
      min-height: 867px !important;
    }
  }
  table#Table th {
    border: 1px solid black;
  }
  table#Table_ID th {
      border: 1px solid black;
  }
  th{
    color:#0b528f !important;
    font-size: 0.9rem;
    text-align: center !important;
  }
</style>
<!-- Content Wrapper. Contains page content -->
  @section('main_section')
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-4">
            <h1>{{$datas->name}} ({{$datas->card_id}})</h1>
          </div>
          <div class="col-4 col-sm-6 text-right">
            <a href="{{url('Subadmin/khalsaformdata',$datas->id)}}" class="btn btn-primary back_btn" style="font-size: 0.9rem;">Download Card</a>
            <a href="{{url('Subadmin/viewcardholder')}}"class="btn btn-primary"  style="position: relative !important;
    left: 27px !important;  background-color:#ED9B2D; color:black;" style="font-size: 0.9rem;">Back</a>
          </div>
          <div class="col-4 col-sm-6 text-right">
          
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
    
              <!-- /.card-body -->

              <div class="row">
              <div class="col-lg-2 col-md-2 col-sm-12" style="font-size: 0.9rem;"><b>Name:</b></div>
              <div class="col-lg-2 col-md-2 col-sm-12" style="font-size: 0.9rem;"> {{$datas->name}}</div>
              <div class="col-lg-2 col-md-2 col-sm-12" style="font-size: 0.9rem;"><b>Contact Number:</b></div> 
              <div class="col-lg-2 col-md-2 col-sm-12" style="font-size: 0.9rem;">{{$datas->contact_number}} </div>
              <div class="col-lg-2 col-md-2 col-sm-12" style="font-size: 0.9rem;"><b>Job:</b></div>
              <div class="col-lg-2 col-md-2 col-sm-12" style="font-size: 0.9rem;">{{$datas->job}}</div>
             </div><br>
             <div class="row">
              <!-- <div class="col-lg-4 col-md-4 col-sm-12"><b>Address:</b></div>
              <div class="col-lg-4 col-md-4 col-sm-12"><input type="text" value={{$datas->address}} readonly></div> -->
              <div class="col-lg-2 col-md-2 col-sm-12" style="font-size: 0.9rem;"><b>Annual Income:</b></div>
              <div class="col-lg-2 col-md-2 col-sm-12" style="font-size: 0.9rem;">{{$datas->annual_income}}</div>
              <div class="col-lg-2 col-md-2 col-sm-12" style="font-size: 0.9rem;"><b>Qualification:</b></div>
              <div class="col-lg-2 col-md-2 col-sm-12" style="font-size: 0.9rem;">{{$datas->qualification}}</div>
              <div class="col-lg-2 col-md-2 col-sm-12" style="font-size: 0.9rem;"><b>Aadhaar Number:</b></div>
              <div class="col-lg-2 col-md-2 col-sm-12" style="font-size: 0.9rem;">{{$datas->adhaar_number}}</div>
             </div><br>
             <div class="row">
              <div class="col-lg-2 col-md-2 col-sm-12" style="font-size: 0.9rem;"><b>Verify Officer:</b></div>
              <div class="col-lg-2 col-md-2 col-sm-12" style="font-size: 0.9rem;">{{$datas->verify_officer}}</div>
              <div class="col-lg-2 col-md-2 col-sm-12" style="font-size: 0.9rem;"><b>Family head:</b></div>
              <div class="col-lg-2 col-md-2 col-sm-12" style="font-size: 0.9rem;">{{$datas->family_head}}</div>
              <div class="col-lg-2 col-md-2 col-sm-12" style="font-size: 0.9rem;"><b>Address:</b></div>
              <div class="col-lg-2 col-md-2 col-sm-12" style="font-size: 0.9rem;">{{$datas->address}}</div>
             </div><br>
             <div class="row">
              <div class="col-lg-2 col-md-2 col-sm-12" style="font-size: 0.9rem;"><b>Disease Name:</b></div>
              <div class="col-lg-2 col-md-2 col-sm-12" style="font-size: 0.9rem;">{{$datas->disease_name}}</div>
              <div class="col-lg-2 col-md-2 col-sm-12" style="font-size: 0.9rem;"><b>Disease Details:</b></div>
              <div class="col-lg-2 col-md-2 col-sm-12" style="font-size: 0.9rem;">{{$datas->disease_details}}</div>
              <div class="col-lg-2 col-md-2 col-sm-12" style="font-size: 0.9rem;"><b>Support Organisation:</b></div>
              <div class="col-lg-2 col-md-2 col-sm-12" style="font-size: 0.9rem;">{{$datas->support_organisation}}</div>
             </div><br>
            
             <div class="row">
              <div class="col-lg-2 col-md-2 col-sm-12" style="font-size: 0.9rem;"><b>Added By:</b></div>
              @if($datas->add_type == 'Volunteer')
              <div class="col-lg-6 col-md-2 col-sm-12" style="font-size: 0.9rem;">{{$datas->add_type}}({{$datas->add_name}},VL{{$datas->add_id}})</div>
              @elseif($datas->add_type == 'Subadmin')
              <div class="col-lg-6 col-md-2 col-sm-12" style="font-size: 0.9rem;">{{$datas->add_type}}({{$datas->add_name}},SA{{$datas->add_id}})</div>
              @else
              <div class="col-lg-6 col-md-2 col-sm-12" style="font-size: 0.9rem;">{{$datas->add_type}}({{$datas->add_name}},{{$datas->add_id}})</div>
              @endif
              <div class="col-lg-2 col-md-2 col-sm-12" style="font-size: 0.9rem;"><b>Profile:</b></div>
             <div class="col-lg-2 col-md-2 col-sm-12" style="font-size: 0.9rem;"><img src="{{$datas->cardholder_profile}}" style="height: 50px;width:50px;"></div>
            </div>
             </div><br>
             <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 text-center"><h3 class="heading_detail">Family Details:</h3></div>
             </div>
             <section class="content">
              <div class="container-fluid">
                <div class="row">
                  <div class="col-12">
                    <div class="card">
                      <!-- /.card-header -->
                      <div class="card-body">
                        <table id="Table_ID" class=" table table-responsive-sm table-striped table table-bordered table-hover ">
                          <thead>
                          <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Amritdhari</th>
                            <th>Age</th>
                            <th>Qualification</th>
                            <th>Job</th>
                            <th>Salary</th>
                          </tr>
                          </thead>
                          <tbody style="font-size: 0.9rem;">
                           @foreach($datasss as $value)
                            <tr>
                              <td></td>                            
                              <td>{{$value->fname}}</td>             
                              <td>{{$value->famritdhari}}</td>
                              <td>{{$value->fage}}</td>
                              @if($value->fjob == 'null')
                              <td>NA</td>
                              @else
                              <td>{{$value->fqualification}}</td>
                              @endif
                              @if($value->fjob == 'null')
                              <td>NA</td>
                              @else
                              <td>{{$value->fjob}}</td>
                              @endif
                              @if($value->fsalary == 'null')
                              <td>NA</td>
                              @else
                              <td>{{$value->fsalary}}</td>
                              @endif
                            </tr>
                       @endforeach
                          </tbody>
                        </table>
                      </div>
                      <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
          
                   
                    <!-- /.card -->
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
              <!-- /.container-fluid -->
            </section>
             <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 text-center"><h3 class="heading_detail">Children Details:</h3></div>
             </div>
             <section class="content">
              <div class="container-fluid">
                <div class="row">
                  <div class="col-12">
                    <div class="card">
                      <!-- /.card-header -->
                      <div class="card-body">
                        <table id="Table" class=" table table-responsive-sm table-striped table table-bordered table-hover ">
                          <thead>
                          <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Amritdhari</th>
                            <th>Age</th>
                            <th>Qualification</th>
                            <th>Job</th>
                            <th>Salary</th>
                          </tr>
                          </thead>
                          <tbody style="font-size: 0.9rem;">
                           @foreach($children as $child)
                            <tr>
                              <td></td>                            
                              <td>{{$child->cname}}</td>             
                              <td>{{$child->camritdhari}}</td>
                              <td>{{$child->cage}}</td>
                              @if($child->cqualification == 'null')
                              <td>NA</td>
                              @else
                              <td>{{$child->cqualification}}</td>

                              @endif
                            </tr>
                       @endforeach
                          </tbody>
                        </table>
                      </div>
                      <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
          
                   
                    <!-- /.card -->
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
              <!-- /.container-fluid -->
            </section>
             
            <!-- /.card -->

           
            <!-- /.card -->
          </div>
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

<!-- DataTables  & Plugins -->

<!-- AdminLTE App -->
<
<!-- Page specific script -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
  $(document).ready( function () {
    // alert('hh');
    var t = $('#Table_ID').DataTable({
        columnDefs: [
            {
                searchable: false,
                orderable: false,
                targets: 0,
            },
        ],
        order: [[0, 'desc']],
    });
 
    t.on('order.dt search.dt', function () {
        let i = 1;
 
        t.cells(null, 0, { search: 'applied', order: 'applied' }).every(function (cell) {
            this.data(i++);
        });
    }).draw();
    
  } );
  </script>
  <script>
    $(document).ready( function () {
      // alert('hh');
      var t = $('#Table').DataTable({
          columnDefs: [
              {
                  searchable: false,
                  orderable: false,
                  targets: 0,
              },
          ],
          order: [[0, 'desc']],
      });
   
      t.on('order.dt search.dt', function () {
          let i = 1;
   
          t.cells(null, 0, { search: 'applied', order: 'applied' }).every(function (cell) {
              this.data(i++);
          });
      }).draw();
      
    } );
    </script>
   <script> 
    
     function show(id) {
        //  alert(id);
         $.ajax({
             type: "Get",
             url:"{{url('Subadmin/change_status_customer')}}",
             data: {customer_id:id },
             success: function(data) {              
                //  if(data.status == 0){
                //    $.each(data.message, function (key, value) {
                //           $('#'+key).removeClass('d-none');
                //           $('#'+key).html(value[0]);
                //        });
                //    }
                //    if(data.status == 1){
                //        Swal.fire(
                //        'Good job!',
                //        'Status Changed!',
                //        'success'
                //      )
                   
                //    }
                   location.reload();
             }
         });
       }  
   </script>
@endsection


