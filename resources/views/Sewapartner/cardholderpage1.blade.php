@extends('Sewapartner.layouts.App')
@section('card','menu-open')
@section('viewcardholder','active')
<style>
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
          <div class="col-sm-6">
            <h1>CardHolder Details</h1>
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
              <div class="col-lg-2 col-md-2 col-sm-12"><b>Name:</b></div>
              <div class="col-lg-2 col-md-2 col-sm-12"> <input type="text" value={{$datas->name}} readonly></div>
              {{-- <div class="col-lg-2 col-md-2 col-sm-12"><b>Contact Number:</b></div> 
              <div class="col-lg-2 col-md-2 col-sm-12"><input type="text" value={{$datas->contact_number}} readonly></div>
              <div class="col-lg-2 col-md-2 col-sm-12"><b>Job:</b></div>
              <div class="col-lg-2 col-md-2 col-sm-12"><input type="text" value={{$datas->job}} readonly></div> --}}
             </div><br>
             <div class="row">
              <!-- <div class="col-lg-4 col-md-4 col-sm-12"><b>Address:</b></div>
              <div class="col-lg-4 col-md-4 col-sm-12"><input type="text" value={{$datas->address}} readonly></div> -->
              {{-- <div class="col-lg-2 col-md-2 col-sm-12"><b>Job:</b></div>
              <div class="col-lg-2 col-md-2 col-sm-12"><input type="text" value={{$datas->job}} readonly></div>
              <div class="col-lg-2 col-md-2 col-sm-12"><b>Annual Income:</b></div>
              <div class="col-lg-2 col-md-2 col-sm-12"><input type="text" value={{$datas->annual_income}} readonly></div>
              <div class="col-lg-2 col-md-2 col-sm-12"><b>Qualification:</b></div>
              <div class="col-lg-2 col-md-2 col-sm-12"><input type="text" value={{$datas->qualification}} readonly></div> --}}
             </div><br>
             <div class="row">
              <div class="col-lg-2 col-md-2 col-sm-12"><b>Aadhaar Number:</b></div>
              <div class="col-lg-2 col-md-2 col-sm-12"><input type="text" value={{$datas->adhaar_number}} readonly></div>
              {{-- <div class="col-lg-2 col-md-2 col-sm-12"><b>Verify Officer:</b></div>
              <div class="col-lg-2 col-md-2 col-sm-12"><input type="text" value={{$datas->verify_officer}} readonly></div>
              <div class="col-lg-2 col-md-2 col-sm-12"><b>Family head:</b></div>
              <div class="col-lg-2 col-md-2 col-sm-12"><input type="text" value={{$datas->family_head}} readonly></div> --}}
             </div><br>
             <div class="row">
              <div class="col-lg-2 col-md-2 col-sm-12"><b>Address:</b></div>
              <div class="col-lg-2 col-md-2 col-sm-12"><input type="text" value={{$datas->address}} readonly></div>
             </div><br>
             <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 text-center"><h3 class="heading_detail">Family Details:</h3></div>
             </div><br>
             <section class="content">
              <div class="container-fluid">
                <div class="row">
                  <div class="col-12">
                    <div class="card">
                      <!-- /.card-header -->
                      <div class="card-body">
                        <table id="Table_ID" class="table table-responsive-sm table-striped table table-bordered table-hover">
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
                          <tbody>
                           @foreach($datasss as $value)
                            <tr>
                              <td></td>                            
                              <td>{{$value->fname}}</td>             
                              <td>{{$value->famritdhari}}</td>
                              <td>{{$value->fage}}</td>
                              <td>{{$value->fqualification}}</td>
                              <td>{{$value->fjob}}</td>
                              <td>{{$value->fsalary}}</td>
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
             </div><br>
             <section class="content">
              <div class="container-fluid">
                <div class="row">
                  <div class="col-12">
                    <div class="card">
                      <!-- /.card-header -->
                      <div class="card-body">
                        <table id="Table" class="table table-responsive-sm table-striped table table-bordered table-hover">
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
                          <tbody>
                           @foreach($children as $child)
                            <tr>
                              <td></td>                            
                              <td>{{$child->cname}}</td>             
                              <td>{{$child->camritdhari}}</td>
                              <td>{{$child->cage}}</td>
                              <td>{{$child->cqualification}}</td>
                              <td>{{$child->cjob}}</td>
                              <td>{{$child->csalary}}</td>
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
  <footer class="main-footer">
    <strong>Copyright &copy; 2022 <a href="https://protolabzit.com/" target="_blank">Protolabz eServices</a>.</strong>
    All rights reserved.
    {{-- <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.2.0-rc
    </div> --}}
  </footer>

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
             url:"{{url('Admin/change_status_customer')}}",
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


