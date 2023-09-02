@extends('Sewapartner.layouts.App')
@section('dashboard','menu-open')
{{-- @section('dashboard_active','active') --}}
  <!-- Content Wrapper. Contains page content -->
  @section('main_section')
  <style>
    .content-wrapper{ background-color:#77b6e1 !important }
    h1.m-0 {
      color: white; 
    }
    .highcharts1-figure, .highcharts1-data-table table{
      margin-left:0px;
    }

    figure.highcharts1-figure {
    margin-left: 1.3%;
}

      figure.highcharts-figure {
    margin-left: 2%;
}
    
    .content-header{
      background-color: #77b6e1;
    }
    section.content {
    background-color: #77b6e1;
    }
    .chart_class {
        margin-left: 101px;
    }
    /* figure.highcharts2-figure { 
    width: 34%; 
      margin-left:14px;
    }  */
    figure.highcharts3-figure {
        margin-left: 2%;
    }
          .small-box.bg-info {
        background-color: #bf6305!important;
      }
      .small-box.bg-dark {
          background-color: #4761c3!important;
      } 
      .small-box.bg-danger {
          background-color: #87c178!important;
      }
    /* .small-box.bg-dark {
    width: 179px;
    } */
    @media(min-width:280px) and (max-width:767px) {
    .small-box.bg-info {
          padding-top: 7px;
      }
      
    }
    @media (max-width:992px) {
    .small-box.bg-dark {
    width: 167px;
      }
    }
    .highcharts2-figure #container2 {
      border-radius: 14px;
    }

      .highcharts-figure,
        .highcharts-data-table table {
        min-width: 432px;
        max-width: 800px;
        margin: 20px auto;
        }

        .highcharts-data-table table {
        font-family: Verdana, sans-serif;
        border-collapse: collapse;
        border: 1px solid #ebebeb;
        margin: 10px auto;
        text-align: center;
        width: 100%;
        max-width: 500px;
        }

        .highcharts-data-table caption {
        padding: 1em 0;
        font-size: 1.2em;
        color: #555;
        }

        .highcharts-data-table th {
        font-weight: 600;
        padding: 0.5em;
        }

        .highcharts-data-table td,
        .highcharts-data-table th,
        .highcharts-data-table caption {
        padding: 0.5em;
        }

        .highcharts-data-table thead tr,
        .highcharts-data-table tr:nth-child(even) {
        background: #f8f8f8;
        }

        .highcharts-data-table tr:hover {
        background: #f1f7ff;
        }

        input[type="number"] {
        min-width: 50px;
        }




        .highcharts1-figure,
            .highcharts1-data-table table {
            min-width: 432px;
            max-width: 800px;
            /* margin: 1em auto; */
            }

            .highcharts1-data-table table {
            font-family: Verdana, sans-serif;
            border-collapse: collapse;
            border: 1px solid #ebebeb;
            margin: 10px auto;
            text-align: center;
            width: 100%;
            max-width: 500px;
            }

            .highcharts1-data-table caption {
            padding: 1em 0;
            font-size: 1.2em;
            color: #555;
            }

            .highcharts1-data-table th {
            font-weight: 600;
            padding: 0.5em;
            }

            .highcharts1-data-table td,
            .highcharts1-data-table th,
            .highcharts1-data-table caption {
            padding: 0.5em;
            }

            .highcharts1-data-table thead tr,
            .highcharts1-data-table tr:nth-child(even) {
            background: #f8f8f8;
            }

            .highcharts1-data-table tr:hover {
            background: #f1f7ff;
            }
            /* .content-wrapper, .icons-dashboard {
      background-color:#0b528f;
    } */
    .box {
      position: relative;
      margin-bottom: 1.5rem;
      width: 100%;
      background-color: #ffffff;
      border-radius: 10px;
      padding: 0px;
      -webkit-transition: .5s;
      transition: .5s;
      display: -ms-flexbox;
      display: flex;
      -ms-flex-direction: column;
      flex-direction: column;
      -webkit-box-shadow: 0 3px 5px 1px rgba(0, 0, 0, 0.05);
      box-shadow: 0 3px 5px 1px rgba(0, 0, 0, 0.05);
      text-decoration:none !important;
      color:#212529;
    }
    .icons-dashboard .row {
      padding: 0 0.5rem;
    }
    .rounded10 img {
      width:25%;
      margin-bottom: 0.5rem;
    }
  </style>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
         <!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content pb-5">
      <div class="container-fluid icons-dashboard">
        <div class="row ">
          <div class="col-xl-2 col-md-6 col-6">
            <a href="{{url('Sewapartner/notification_request')}}" class="box" >
              <div class="box-body text-center">
                <div class="bg-primary-light rounded10 p-20 mx-auto ">
                  <img src="../public/images/icons/remove-bell-notification-icon.svg" class="text-secondary mt-3" alt="" style="width: 24.5%;" />
                </div>
                <p class="text-fade mt-15 " style="font-size: 0.8rem;line-height: 21px;">Total Notifications</p>
                <h2 class="mt-0">{{$notifications}}</h2>
              </div>
            </a>
          </div>
          <div class="col-xl-2 col-md-6 col-6">
            <a href="{{url('Sewapartner/pending_notification')}}" class="box" >
              <div class="box-body text-center">
                <div class="bg-danger-light rounded10 p-20 mx-auto w-100 h-100">
                  <img src="../public/images/icons/remove-bell-notification-icon.svg" class="mt-3" alt="" style="width: 24.5%;" />
                </div>
                <p class="text-fade mt-15 " style="font-size: 0.8rem;line-height: 21px;">Pending Notifications</p>
                <h2 class="mt-0">{{$pending_notification}}</h2>
              </div>
            </a>
          </div>
        </div>
      </div>
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        {{-- <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>10</h3>

                <p>Cardholders</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="{{url('Sewapartner/viewcardholder')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div> --}}


          <!-- ./col -->
         
         
         
          {{-- <div class="col-lg-3 col-6">
           
            <div class="small-box  bg-dark">
              <div class="inner" style="height: 114px;">
                <h3>12</h3>
                
                <p>Sewa Partners</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="{{url('Admin/view_drivers')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>  --}}
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row ml-2">
          <!-- Left col -->
          <div class="col-sm-6">
            <figure class="highcharts2-figure">
              <div id="container2"></div>  
            </figure>
          </div>
          

          <!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
         
          <!-- right col -->
        </div>

        <input type="hidden" id="volunt" value="{{$volunt}}">

        <!-- /.row (main row) -->
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
<!-- ./wrapper -->
@endsection
<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<script>
  $(document).ready(function(){
    var userDat = $('#volunt').val();
    var userData = JSON.parse( userDat );
      // console.log(userData);
    Highcharts.chart('container2', {
    
        // title: {
        // text: 'How To Create Line Chart In Laravel 9 Using Highcharts - Websolutionstuff'
        // },
        title: {
            text: 'Invoices'
        },
        subtitle: {
        text: 'Invoices Growth by Month'
        },
  
        yAxis: {
        title: {
            text: 'Number of Invoices'
        }
        },
  
        xAxis: {
          // accessibility: {
          //     rangeDescription: 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September',
          //         'October', 'November', 'December'
          // }
         
            categories:  ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September',
                  'October', 'November', 'December'
              ]
          
        },
  
        legend: {
        layout: 'vertical',
        align: 'right',
        verticalAlign: 'middle'
        },
  
        plotOptions: {
          series: {
          
                  allowPointSelect: true
              }
        },
  
        series: [{
              name: 'Invoices',
              data: userData
          }],
  
        responsive: {
        rules: [{
            condition: {
            maxWidth: 500
            },
            chartOptions: {
            legend: {
                layout: 'horizontal',
                align: 'center',
                verticalAlign: 'bottom'
            }
            }
        }]
        }
  
    });
  });
  </script>

