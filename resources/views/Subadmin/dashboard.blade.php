@extends('Subadmin.layouts.App')
@section('dashboard','menu-open')
{{-- @section('dashboard_active','active') --}}
  <!-- Content Wrapper. Contains page content -->
  @section('main_section')
  
  <style>
    h1.m-0 {
      color: white; 
    }
    .highcharts1-figure, .highcharts1-data-table table{
      /* margin-left:0px; */
    }

    figure.highcharts1-figure {
      /* margin-left: 1.3%; */
    }

      figure.highcharts-figure {
      /* margin-left: 2%; */
    }

    .content-header{
      background-color: #0b528f;
    }
    section.content {
    background-color: #0b528f;
    }
    .chart_class {
        margin-left: 101px;
    }
    figure.highcharts2-figure { 
    /* width: 34%; */ 
      /* margin-left:14px; */
    } 
    figure.highcharts3-figure {
        /* margin-left: 2%; */
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


    /* .highcharts-figure,.highcharts-data-table table {
      min-width: 432px;
      max-width: 800px;
      margin: 20px auto;
    } */

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




    /* .highcharts1-figure,
    .highcharts1-data-table table {
      min-width: 432px;
      max-width: 800px;
      margin: 1em auto;
    } */

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
    /* .h-100 {
        height: 100%!important;
    }
    .w-100 {
        width: 100%!important;
    } */
    .mb-5, .my-5 {
        margin-bottom: 0rem!important;
    }
    .text-secondary {
        color: yellow !important;
    }

    .content-wrapper, .icons-dashboard {
      background-color:#0b528f;
    }
    .charts-dashboard #container, 
    .charts-dashboard #container1, 
    .charts-dashboard #container2,
    .charts-dashboard #container4 {
      border-radius: 14px;
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
    <div class="container-fluid icons-dashboard">
      <div class="row ">
        <div class="col-xl-2 col-md-6 col-6">
          <a href="{{url('Subadmin/view_doctor')}}" class="box" >
            <div class="box-body text-center">
              <div class="bg-danger-light rounded10 p-20 mx-auto w-100 h-100">
                <img src="../public/images/icons/doctor-alt.svg" class="mt-3" alt="" style="width: 21%;" />
              </div>
              <p class="text-fade mt-15 mb-5" style="font-size: 0.8rem;line-height: 21px;">Total Doctor</p>
              <h2 class="mt-0">{{$doctor}}</h2>
            </div>
          </a>
        </div>
        <div class="col-xl-2 col-md-6 col-6">
          <a href="{{url('Subadmin/view_volunteer')}}" class="box" >
            <div class="box-body text-center">
              <div class="bg-warning-light rounded10 p-20 mx-auto w-100 h-100">
                  <img src="../public/images/icons/workers-group.svg" class="mt-3" alt=""  />
              </div>
              <p class="text-fade mt-15 mb-5" style="font-size: 0.8rem;line-height: 21px;">Total Volunteers</p>
              <h2 class="mt-0">{{$volunteers}}</h2>
            </div>
          </a>
        </div>
        <div class="col-xl-2 col-md-6 col-6">
          <a href="{{url('Subadmin/sewapartner')}}" class="box" >
            <div class="box-body text-center">
              <div class="bg-info-light rounded10 p-20 mx-auto w-100 h-100">
                  <img src="../public/images/icons/hospital.svg" class="mt-3" alt="" style="width: 24%;" />
              </div>
              <p class="text-fade mt-15 mb-5" style="font-size: 0.8rem;line-height: 21px;">Total Sewapartner</p>
              <h2 class="mt-0">{{$sewapartners}}</h2>
            </div>
          </a>
        </div>
        <div class="col-xl-2 col-md-6 col-6">
          <a href="{{url('Subadmin/viewcardholder')}}" class="box" >
            <div class="box-body text-center">
              <div class="bg-info-light rounded10 p-20 mx-auto w-100 h-100">
                  <img src="../public/images/icons/id-card.svg" class="mt-3" alt="" style="width: 24%;"/>
              </div>
              <p class="text-fade mt-15 mb-5" style="font-size: 0.8rem;line-height: 21px;">Total Cardholder</p>
              <h2 class="mt-0">{{$cardholder}}</h2>
            </div>
          </a>
        </div>
        <div class="col-xl-2 col-md-6 col-6">
          <a href="{{url('Subadmin/reports')}}" class="box" >
            <div class="box-body text-center">
              <div class="bg-info-light rounded10 p-20 mx-auto w-100 h-100">
                <img src="../public/images/icons/copy-invert.svg" class="mt-3" alt="" style="width: 20.5%;"/>
              </div>
              <p class="text-fade mt-15 mb-5" style="font-size: 0.8rem;line-height: 21px;">Total Invoices</p>
              <h2 class="mt-0">{{$invoices}}</h2>
            </div>
          </a>
        </div>
        <div class="col-xl-2 col-md-6 col-6">
          <a  href="{{url('Subadmin/view_active_cardholder')}}" class="box">
            <div class="box-body text-center">
              <div class="bg-primary-light rounded10 p-20 mx-auto w-100 h-100">
                <img src="../public/images/icons/Group 15.svg" class="text-secondary mt-3" alt="" style="width: 31%;"/>
              </div>
              <p class="text-fade mt-15 mb-5" style="font-size: 0.8rem;line-height: 21px;">Active Cardholder</p>
              <h2 class="mt-0">{{$active_cardholder}}</h2>
            </div>
          </a>
        </div>
      </div>
      <div class="row " >
        
        <div class="col-xl-2 col-md-6 col-6">
          <a  href="{{url('Subadmin/view_deactive_cardholder')}}" class="box" >
            <div class="box-body text-center">
              <div class="bg-danger-light rounded10 p-20 mx-auto w-100 h-100">
                <img src="../public/images/icons/Group 16.svg" class="mt-3" alt="" style="width: 31%;" />
              </div>
              <p class="text-fade mt-15 mb-5" style="font-size: 0.8rem;line-height: 21px;">Deactive Cardholder</p>
              <h2 class="mt-0">{{$deactive_cardholder}}</h2>
            </div>
          </a>
        </div>
        <div class="col-xl-2 col-md-6 col-6">
          <a  href="{{url('Subadmin/pending_blood_request')}}" class="box" >
            <div class="box-body text-center">
              <div class="bg-warning-light rounded10 p-20 mx-auto w-100 h-100">
                <img src="../public/images/icons/blood-donation-icon.svg" class="mt-3" alt="" style="width: 24.5%;" />
              </div>
              <p class="text-fade mt-15 mb-5" style="font-size: 0.8rem;line-height: 21px;">Pending Blood Request</p>
              <h2 class="mt-0">{{$pending_blood}}</h2>
            </div>
          </a>
        </div>
        <div class="col-xl-2 col-md-6 col-6">
          <a href="{{url('Subadmin/view_feedback')}}" class="box" >
            <div class="box-body text-center">
              <div class="bg-info-light rounded10 p-20 mx-auto w-100 h-100">
                <img src="../public/images/icons/online-survey-icon.svg" class="mt-3" alt="" style="width: 20.5%;"/>
              </div>
              <p class="text-fade mt-15 mb-5" style="font-size: 0.8rem;line-height: 21px;">Total Feedback</p>
              <h2 class="mt-0">{{$feedback}}</h2>
            </div>
          </a>
        </div>
        <div class="col-xl-2 col-md-6 col-6">
          <a  href="{{url('Subadmin/pending_business')}}" class="box" >
            <div class="box-body text-center">
              <div class="bg-info-light rounded10 p-20 mx-auto w-100 h-100">
                <img src="../public/images/icons/computer-report-icon.svg" class="mt-3" alt="" style="width: 25.5%;"/>
              </div>
              <p class="text-fade mt-15 mb-5" style="font-size: 0.8rem;line-height: 21px;">Pending Business Request</p>
              <h2 class="mt-0">{{$pending_business}}</h2>
            </div>
          </a>
        </div>
        <div class="col-xl-2 col-md-6 col-6">
          <a href="{{url('Subadmin/pending_notifications')}}" class="box">
            <div class="box-body text-center">
              <div class="bg-info-light rounded10 p-20 mx-auto w-100 h-100">
                <img src="../public/images/icons/remove-bell-notification-icon.svg" class="mt-3" alt="" style="width: 24.5%;"/>
              </div>
              <p class="text-fade mt-15 mb-5" style="font-size: 0.8rem;line-height: 21px;">Pending Notification</p>
              <h2 class="mt-0">{{$pending_notification}}</h2>
            </div>
          </a>
        </div>
      </div>
    </div>

    <!-- Main content -->
    <section class="content pb-5">
      <div class="container-fluid charts-dashboard">
       
        <!-- Small boxes (Stat box) -->
        {{-- <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-dark">
              <div class="inner">
                <h3>{{$volunteers}}</h3>

                <p>Volunteer</p>
              </div>
              <div class="icon">
                <i class="fas fa-users new" style="font-size:60px;"></i>
              </div>
              <a href="{{url('Subadmin/view_volunteer')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
         
         
         
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner" style="height: 114px;">
                <h3>{{$sewapartners}}</h3>
              
                <p>Sewa Partners</p>
              </div>
              <div class="icon">
              <i class="fa fa-user-md new" style="font-size:60px;"></i>
              </div>
              <a href="{{url('Subadmin/sewapartner')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div> 
          <!-- ./col -->
          <div class="col-lg-3 col-6">
          
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{$cardholder}}</h3>

                <p>Cardholder</p>
              </div>
              <div class="icon">
                <i class="far fa-address-card new" style="font-size:50px;"></i>
              </div>
              <a href="{{url('Subadmin/viewcardholder')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div> --}}
        <!-- /.row -->
        <!-- Main row -->
        {{-- <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-dark">
              <div class="inner">
                <h3>{{$doctor}}</h3>

                <p>Doctor</p>
              </div>
              <div class="icon">
                <i class="fa fa-stethoscope" style="font-size:50px;"></i>
              </div>
              <a href="{{url('Subadmin/view_doctor')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div> --}}
        
        <div class="row ">
          <div class="col-sm-6">
            <figure class="highcharts2-figure">
              <div id="container2" ></div>  
            </figure>
          </div>
          <div class="col-sm-6">
            <figure class="highcharts-figure">
              <div id="container" ></div>  
            </figure>
          </div>
        
        </div>
        <!-- <div class="chart_class"> -->

        <div class="row">
          <div class=" col-sm-6 ">
            <figure class="highcharts1-figure">
                <div id="container1" ></div>  
            </figure>
          </div>
          <div class="col-sm-6 ">
            <figure class="highcharts4-figure" >
              <div id="container4" ></div>  
            </figure>
          </div>
        </div>
        <!-- </div> -->
        <input type="hidden" id="user" value="{{$data}}">
        <input type="hidden" id="volunt" value="{{$volunt}}">
        <input type="hidden" id="discount" value="{{$discount}}">
        <input type="hidden" id="blood" value="{{$blood}}">
          <!-- Left col -->
          
          <!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
         
          <!-- right col -->
        {{-- </div> --}}
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
  </div>
  <!-- /.content-wrapper -->
  {{-- <footer class="main-footer">
    <strong>Copyright &copy; 2022 <a href="https://protolabzit.com/" target="_blank">Social Simba</a>.</strong>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/echarts/4.1.0/echarts-en.common.min.js"></script>

<script>
  $(document).ready(function(){
    Highcharts.chart('container', {
      chart: {
          plotBackgroundColor: null,
          plotBorderWidth: null,
          plotShadow: false,
          type: 'pie',
          
      },
      // title: {
      //     text: 'How To Create Pie Chart In Laravel 9 Using Highcharts - Websolutionstuff'
      // },  
      title: {
          text: 'Sewa Partners'
      },
      subtitle: {
        align: 'center',
        text: 'Sewapartner Categories'
      },
      tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
      },
      accessibility: {
        point: {
          valueSuffix: '%'
        }
      },
      plotOptions: {
        pie: {
        allowPointSelect: true,
        cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>: {point.percentage:.1f} %'
            },
            colors: ['#50B432', '#ED561B', '#DDDF00', '#24CBE5', '#64E572', '#FF9655', '#FFF263', '#6AF9C4']
        }
      },
      series: [{
        name: 'Sewapartner',
        colorByPoint: true,
        data: [{
            name: 'Hospital',
            y: {{$hospital}},
            sliced: true,
            selected: true
          }, {
            name: 'Clinic',
            y: {{$clinic}},
          },  {
            name: 'Laboratory',
            y: {{$laboratory}},
          }, {
            name: 'Medicalstore',
            y: {{$medicalstore}},
        
          
          }]
        }]
      });
      
    });
</script>

<script>
  $(document).ready(function(){
    var userDat = $('#user').val();
    // alert(userDat);
    var userData = JSON.parse( userDat );
      // console.log(userData);
    Highcharts.chart('container1', {
      chart: {
      backgroundColor: '#FFFFFF',
      polar: true,
      type: 'line',
    },
        // title: {
        // text: 'How To Create Line Chart In Laravel 9 Using Highcharts - Websolutionstuff'
        // },
        title: {
              text: 'Cardholders'
          },

        subtitle: {
        text: 'Cardholder Growth by Month'
        },

        yAxis: {
        title: {
            text: 'Number of Cardholder'
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
              name: 'Cardholder',
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

<script>
  $(document).ready(function(){
    var userDat = $('#volunt').val();
    var userData = JSON.parse( userDat );
      // console.log(userData);
    Highcharts.chart('container2', {
      chart: {
        backgroundColor: '#FFFFFF',
        polar: true,
        type: 'line',
      },
        // title: {
        // text: 'How To Create Line Chart In Laravel 9 Using Highcharts - Websolutionstuff'
        // },
        title: {
            text: 'Volunteers'
        },
        subtitle: {
        text: 'Volunteers Growth by Month'
        },
  
        yAxis: {
        title: {
            text: 'Number of Volunteer'
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
              name: 'Volunteers',
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

<script>
    $(document).ready(function(){
      var userDat = $('#discount').val();
      var userData = JSON.parse( userDat );
        // console.log(userData);
      Highcharts.chart('container3', {
      
          // title: {
          // text: 'How To Create Line Chart In Laravel 9 Using Highcharts - Websolutionstuff'
          // },

          title: {
            text: 'Discounts'
          },
    
          subtitle: {
          text: 'Discount Growth by Month'
          },
    
          yAxis: {
          title: {
              text: 'Discount'
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
                name: 'Discount',
               
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

<script>
  $(document).ready(function(){
      // var userDat = $('#blood').val();
      // var userData = JSON.parse( userDat );
      var userData = <?php echo json_encode($blood); ?>;
      // console.log(userData);
      //       Highcharts.setOptions({
      //   colors: ['#67BCE6'],
      //   chart: {
      //     style: {
      //       fontFamily: 'sans-serif',
      //       color: '#fff'
      //     }
      //   }
      // }); 

    Highcharts.chart('container4', {
      chart: {
        type: 'column',
        backgroundColor: '#FFFFFF'
      },
      title: {
        text: 'Blood Group',
        style: {  
        color: '#000000'
        }
      },
      xAxis: {
        tickWidth: 0,
        labels: {
        style: {
          color: '#000000',
          
          }
        },
        // categories: [
        //   'A+', 
        //   'A-', 
        //   'AB+', 
        //   'AB-', 
        //   'B+', 
        //   'B-', 
        //   'O+',
        //   'O-',
          
        // ]
        categories: Object.keys(userData),
      },
      yAxis: {
        gridLineWidth: .5,
        gridLineDashStyle: 'dash',
        gridLineColor: 'black',
        title: {
          text: '',
          style: {
          color: '#000000'
          }
        },
        labels: {
          formatter: function() {
            return Highcharts.numberFormat(this.value, 0, '', ',');
          },
          style: {
            color: '#000000',
          }
        }
      },
      legend: {
        enabled: false,
      },
      credits: {
        enabled: false
      },
      tooltip: {
        valuePrefix: ''
      },
      plotOptions: {
        column: {
          borderRadius: 0,
          pointPadding: 0,
          groupPadding: 0.05,
          colorByPoint: true
        },
        colors: ['#50B432', '#ED561B', '#DDDF00', '#24CBE5', '#64E572', '#FF9655', '#FFF263', '#6AF9C4'] 
      },
      series: [{
        name: 'People',
        data: Object.values(userData),
        pointWidth: 15
      
      }]
    });
  });
</script>
<!-- jQuery -->

