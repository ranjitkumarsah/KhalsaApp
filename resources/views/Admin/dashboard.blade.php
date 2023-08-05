@extends('Admin.layouts.App')
@section('dashboard','menu-open')
{{-- @section('dashboard_active','active') --}}
  <!-- Content Wrapper. Contains page content -->
  @section('main_section')
  <style>
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
      margin-left:14px;
    } 
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


    .highcharts-figure,
        .highcharts-data-table table {
        min-width: 432px;
        max-width: 800px;
        /* margin: 20px auto; */
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
    <section class="content">
      <div class="container-fluid">
        
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
              <a href="{{url('Admin/view_volunteer')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
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
              <a href="{{url('Admin/sewapartner')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div> 
          <!-- ./col -->
          <div class="col-lg-3 col-6">
           
            <div class="small-box bg-dark">
              <div class="inner">
                <h3>{{$subadmin}}</h3>

                <p>Subadmin</p>
              </div>
              <div class="icon">
              <i class="fa fa-credit-card new" style="font-size:50px;"></i>
              </div>
              <a href="{{url('Admin/subadmin')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
          
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{$cardholder}}</h3>

                <p>Cardholder</p>
              </div>
              <div class="icon">
                <i class="far fa-address-card new" style="font-size:50px;"></i>
              </div>
              <a href="{{url('Admin/viewcardholder')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
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
              <a href="{{url('Admin/view_doctor')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div> --}}
          <div class="row">
          <!-- <figure class="highcharts-figure">
            <div id="container"></div>  
        </figure> -->
        <figure class="highcharts2-figure">
        <div id="container2"></div>  
    </figure>
    <figure class="highcharts-figure">
            <div id="container"></div>  
        </figure>
        <!-- <figure class="highcharts1-figure">
          <div id="container1"></div>  
      </figure> -->
          </div>
          <!-- <div class="chart_class"> -->

      <div class="row">
      <figure class="highcharts1-figure">
          <div id="container1"></div>  
      </figure>
      
    {{-- <figure class="highcharts3-figure">
      <div id="container3"></div>  
  </figure> --}}
  <figure class="highcharts4-figure" style="margin-left: 24px;">
    <div id="container4"></div>  
</figure>
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


  


    <!-- /.content -->
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
        type: 'pie'
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
            }
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
      var userDat = $('#blood').val();
      var userData = JSON.parse( userDat );
      console.log(userData);
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
    backgroundColor: '#fff'
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
    categories: [
      'A+', 
      'A-', 
      'AB+', 
      'AB-', 
      'B+', 
      'B-', 
      'O+',
      'O-',
      
    ]
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
      groupPadding: 0.05
    } 
  },
  series: [{
    name: 'People',
    data: userData
  }]
});
});
</script>
<!-- jQuery -->

