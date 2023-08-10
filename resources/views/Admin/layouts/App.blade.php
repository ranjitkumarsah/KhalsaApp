<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>KhalsaApp</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{url('public/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- IonIcons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{url('public/dist/css/adminlte.min.css')}}">
  <link rel="stylesheet" href="{{url('public/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{url('public/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{url('public/plugins/jqvmap/jqvmap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{url('public/dist/css/adminlte.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{url('public/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{url('public/plugins/daterangepicker/daterangepicker.css')}}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{url('public/plugins/summernote/summernote-bs4.min.css')}}">
  <link href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css">
  <link href="https://cdn.materialdesignicons.com/4.9.95/css/materialdesignicons.min.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"/>
  <link  rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" integrity="sha512-c42qTSw/wPZ3/5LBzD+Bw5f7bSF2oxou6wEb+I/lqeaKV5FDIfMvvRp772y4jcJLKuGUOpbJMdg/BTl50fJYAw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.1.9/sweetalert2.min.css" integrity="sha512-cyIcYOviYhF0bHIhzXWJQ/7xnaBuIIOecYoPZBgJHQKFPo+TOBA+BY1EnTpmM8yKDU4ZdI3UGccNGCEUdfbBqw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/2.1.24/daterangepicker.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.dataTables.min.css"/>
  {{-- <link rel="stylesheet" href="{{url('public/theme/main/css/vendors_css.css')}}">  
  <link rel="stylesheet" href="{{url('public/theme/main/css/style.css')}}">
  <link rel="stylesheet" href="{{url('public/theme/main/css/skin_color.css')}}"> --}}

  <link rel="stylesheet" href="/icofont/css/icofont.min.css">

  {{-- <link rel="shortcut icon" href="/public/theme2/assets/images/favicon.png" type="image/x-icon" />
  <!-- For iPhone -->
  <link rel="apple-touch-icon-precomposed" href="/public/theme2/assets/images/apple-touch-icon-57-precomposed.png">
  <!-- For iPhone 4 Retina display -->
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/public/theme2/assets/images/apple-touch-icon-114-precomposed.png">
  <!-- For iPad -->
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/public/theme2/assets/images/apple-touch-icon-72-precomposed.png">
  <!-- For iPad Retina display -->
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="/public/theme2/assets/images/apple-touch-icon-144-precomposed.png">

  <!-- CORE CSS FRAMEWORK - START -->
  <link href="/public/theme2/assets/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css" media="screen" />
  <link href="/public/theme2/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link href="/public/theme2/assets/plugins/bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css" />
  <link href="/public/theme2/assets/fonts/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css" />
  <link href="/public/theme2/assets/fonts/webfont/cryptocoins.css" rel="stylesheet" type="text/css" />
  <link href="/public/theme2/assets/css/animate.min.css" rel="stylesheet" type="text/css" />
  <link href="/public/theme2/assets/plugins/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" type="text/css" />
  
  <link href="/public/theme2/assets/css/style.css" rel="stylesheet" type="text/css" />
  <link href="/public/theme2/assets/css/responsive.css" rel="stylesheet" type="text/css" /> --}}
  {{-- <link rel="stylesheet" href="/public/theme2/CSS/main.css">
  <!-- font awesome cdn -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- google font roboto -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
  <!-- google font open sans -->
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet"> --}}
<style>
  

  [class*=sidebar-dark-] .nav-treeview>.nav-item>.nav-link:focus, [class*=sidebar-dark-] .nav-treeview>.nav-item>.nav-link{
    background-color: #ED9B2D;
    border:0px !important;
  }
  [class*=sidebar-dark-] .nav-treeview>.nav-item>.nav-link:focus, [class*=sidebar-dark-] .nav-treeview>.nav-item>.nav-link:hover {
    background-color: #ED9B2D;
  }
  i.far.fa-circle.nav-icon {
    color: white !important;
  }
  p.paracolor {
    font-size: 15px !important;
  }
  i.material-icons.opacity-10 {
    font-size: 17px;
}
  span.material-icons.new {
    font-size: 17px;
}
.nav-pills .nav-link.active, .nav-pills .show>.nav-link {
    background-color: #0b528f !important;
}
  i.right.fas.fa-angle-left {
    display: none;
`}
  /* .menu-open{
    background-color:blue;
  } */
  .nav-item:hover:{
    background-color: rgb(57, 58, 58);
  }
  [class*=sidebar-dark-] .nav-treeview>.nav-item>.nav-link.active:hover
  {
    background-color: #FB9407;
  }
     
  

[class*=sidebar-dark-] .sidebar a:hover{
    color: white !important;
  }
  [class*=sidebar-dark-] .sidebar a:hover p {
    color: white;
  } 
  [class*=sidebar-dark-] .sidebar a {
    color: black;
  }
  .nav-sidebar .nav-item>.nav-link:hover {
      position: relative;
      color: white;
  }
  /* .menu-open .new:hover{
    color:white !important;
  } */

  .menu-open .paracolor{
    color:white !important;
  }
  p.paracolor:hover {
    color: white;
  }
  [class*=sidebar-dark-] .nav-treeview>.nav-item>.nav-link:focus, [class*=sidebar-dark-] .nav-treeview>.nav-item>.nav-link:hover {
    background-color: #d97b0f;
  }
  aside.main-sidebar.sidebar-dark-primary.elevation-4 {
    background-color: #ED9B2D;
    }
  p.admin_para {
    text-align:center;
    background-color: #ED9B2D !important;
    font-size: 23px;
  }
  .user-panel.mt-3.pb-3.d-flex {
        display: none !important;
    }
   .content-wrapper {
        background-color: #F5DDBD;
    }
    h1{
      color:#0b528f;
      font-family:inherit;
    }
    label{
      color:#0b528f;
      font-family:inherit;
    }
    .sidebar {
        background-color: #ED9B2D;
    }
    li.nav-item p {
        color: black;
    }
    .form-control{
      border: 1px solid #0b528f;
    }
  .user-panel.mt-3.pb-3.d-flex {
    padding: 20px !important;
}
.user-panel {
    text-align: center;
    padding: 0px !important;
}
  aside.main-sidebar.sidebar-dark-primary.elevation-4 {
  position: fixed;
  /* overflow-y: scroll;   */
  }
  body:not(.layout-fixed) .main-sidebar{
    height:1px !important;
  }
  .user-panel {
        height: 74px !important;
    }
  [class*=sidebar-dark-] .nav-sidebar>.nav-link, [class*=sidebar-dark-] .nav-sidebar>.nav-link, [class*=sidebar-dark-] .nav-sidebar>.nav-item>.nav-link:focus
  {
     /* background-color: #E13C06; */
  }
  [class*=sidebar-dark-] .nav-treeview>.nav-item>.nav-link.active, [class*=sidebar-dark-] .nav-treeview>.nav-item>.nav-link.active:focus, [class*=sidebar-dark-] .nav-treeview>.nav-item>.nav-link.active:hover
  {
    background-color: #c6cbebc7;
    
  }
  
  .nav-item:hover:{
    background-color: rgb(57, 58, 58);
  }
  
    [class*=sidebar-dark-] .nav-sidebar>.nav-item.menu-open>.nav-link, [class*=sidebar-dark-] .nav-sidebar>.nav-item:hover>.nav-link, [class*=sidebar-dark-] .nav-sidebar>.nav-item>.nav-link:focus
  {
    background-color: #0b528f;
  } 
  
  
.alert {
  padding: 20px;
  background-color: #f44336; / Red /
  color: white;
  margin-bottom: 15px;
}
/ The close button /
.closebtn {
  margin-left: 15px;
  color: white;
  font-weight: bold;
  float: right;
  font-size: 22px;
  line-height: 20px;
  cursor: pointer;
  transition: 0.3s;
}
/ When moving the mouse over the close button /
.closebtn:hover {
  color: black;
}
/*FIDDLE*/
#hideMe {
    -moz-animation: cssAnimation 0s ease-in 3s forwards;
    / Firefox /
    -webkit-animation: cssAnimation 0s ease-in 3s forwards;
    / Safari and Chrome /
    -o-animation: cssAnimation 0s ease-in 3s forwards;
    / Opera /
    animation: cssAnimation 0s ease-in 3s forwards;
    -webkit-animation-fill-mode: forwards;
    animation-fill-mode: forwards;
}
@keyframes cssAnimation {
    to {
        width:0;
        height:0;
        overflow:hidden;
    }
}
@-webkit-keyframes cssAnimation {
    to {
        width:0;
        height:0;
        visibility:hidden;
    }
  }
  aside.main-sidebar.sidebar-dark-primary.elevation-4 {
    position: fixed;
    overflow-y: scroll;
}
/* .main-footer {
  position: sticky;
  bottom:0;
} */

p.paracolor {
    font-size: 14px !important;
}
footer.main-footer {
    position: fixed;
    width: 100%;
    bottom:0;
    font-size:11px;
}
    #loader {
      display: none;
      position: fixed;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      width: 100%;
      /* background: rgb(96 96 96 / 75%) url(../public/images/loading_gif.gif) no-repeat center center; */
      z-index: 10000;
      background-size: 5% !important;
    }
  </style>
</head>
<!--
`body` tag options:

  Apply one or more of the following classes to to the body tag
  to get the desired effect

  * sidebar-collapse
  * sidebar-mini
-->
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  
  <div id="loader" style=" background: rgb(96 96 96 / 75%) url('{{asset('public/images/loading_gif.gif')}}') no-repeat center center;"></div>

  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    {{-- <a href="index3.html" class="brand-link">
      <img src="{{url('public/images/VIPILOGO.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">VIPI</span>
    </a> --}}

    <div class="user-panel" style="background: white;">
      <img src="{{url('public/images/sikh.png')}}" alt="AdminLTE Logo" style="width: 100px; margin-bottom: 7px; margin-top: -10px;">
    </div>

    <div class="admin_section mt-2">
      <p class="admin_para">Admin</p>
    </div>
    <hr>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 d-flex">
        {{-- <div class="image">
          <img src="{{url('public/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image" >
        </div> --}}
        <div class="info" style="margin-bottom: -15px;">
          <a href="#" class="d-block" style="left: 90px;">Admin</a>
        </div>
      </div>

     

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
           {{-- <li class="nav-item list_class @yield('dashboard')">
            <a href="{{url('Admin/dashboard')}}" class="nav-link @yield('dashboard_item')">
              <i class="material-icons opacity-10 new" style="vertical-align: middle;">dashboard</i>
              <p style="margin-left: 10px;" class="paracolor">
                Dashboard
                
              </p>
            </a>        
          </li>  --}}
          <!-- <li class="nav-item list_class"> -->
          <li class="new">
          <a href="{{url('Admin/dashboard')}}"  class="nav-link  ">
          <i class="material-icons opacity-10 new" style="vertical-align: middle;">dashboard</i>
              <p style="margin-left: 10px;" class="paracolor">
                Dashboard
              </p>
            </a>
         </li>
         {{-- <li class="new">
          <a href="{{url('Admin/dashboard1')}}"  class="nav-link  ">
          <i class="material-icons opacity-10 new" style="vertical-align: middle;">dashboard</i>
              <p style="margin-left: 10px;" class="paracolor">
                Dashboard1
              </p>
            </a>
         </li> --}}
         <li class="nav-item @yield('reports')">
          <a href="#" class="nav-link ">
            <i class="material-icons opacity-10 new" style="vertical-align: middle;">dashboard</i>
            <p style="margin-left: 10px;" class="paracolor">
              Manage Reports
              <i class="fa fa-angle-down ml-4"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{url('Admin/reports')}}" class="nav-link @yield('addreports')">
                <i class="far fa-circle nav-icon" style="margin-left: 30px;color:white;"></i>
                <p class="paracolor">View Invoice</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{url('Admin/invoices')}}" class="nav-link @yield('addinvoices')">
                <i class="far fa-circle nav-icon"  style="margin-left: 30px;"></i>
                <p class="paracolor">View Revenue</p>
              </a>
            </li>
          </ul>
        </li>
         {{-- <li class="new">
          <a href="{{url('Admin/reports')}}"  class="nav-link  ">
          <i class="material-icons opacity-10 new" style="vertical-align: middle;">dashboard</i>
              <p style="margin-left: 10px;" class="paracolor">
                Manage Reports
              </p>
            </a>
         </li> --}}
  
          <!-- <li class="nav-item"> -->
          <li class="new">
          <a href="{{url('Admin/subadmin')}}"  class="nav-link @yield('viewsubadmin')">
            <i class="fa fa-credit-card new"></i>
              <p style="margin-left: 10px;" class="paracolor">
                 Manage Sub-admin
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
        </li>

        {{-- <li class="new">
            <a href="{{url('Admin/sewapartner')}}"  class="nav-link @yield('viewsewapartner')">
            <i class="fa fa-user-md new" style="font-size:20px;"></i>
              <p style="margin-left: 10px;" class="paracolor">
                 Manage Sewa-partner
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
        </li> --}}
        <li class="new">
          <a href="{{url('Admin/sewapartner1')}}"  class="nav-link @yield('viewsewapartner1') ">
          <i class="fa fa-user-md new" style="font-size:20px;"></i>
            <p style="margin-left: 10px;" class="paracolor">
               Manage Sewa-partner
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
      </li>

      <li class="new">
          <a href="{{url('Admin/view_doctor')}}"  class="nav-link @yield('viewdoctor')">
          <i class="fa fa-stethoscope" style="font-size:16px;"></i>
            <p style="margin-left: 10px;" class="paracolor">
                Manage Doctor
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
        </li>

        <li class="new">
          <a href="{{url('Admin/services')}}"  class="nav-link @yield('viewservices')">
            <span class="material-icons new">
              list_alt
            </span>
            <p style="margin-left: 10px;" class="paracolor">
                Manage Services
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
        <li>

      <li class="new">
        <a href="{{url('Admin/view_volunteer')}}"  class="nav-link @yield('viewvolunteer')">
        <i class='fas fa-users new' style='font-size:14px;'></i>
          <p style="margin-left: 10px;" class="paracolor">
              Manage Volunteer
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
      </li>

      <li class="new">
        <a href="{{url('Admin/viewcardholder')}}"  class="nav-link @yield('viewcardholder')">
        <i class='far fa-address-card new' style='font-size:16px;'></i>
          <p style="margin-left: 10px;" class="paracolor">
              Manage Cardholder
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
      </li>

        {{-- <li class="new">
          <a href="{{url('Admin/viewkhalsamember')}}"  class="nav-link @yield('viewkhalsamember')">
          <i class='far fa-address-card new' style='font-size:16px;'></i>
            <p style="margin-left: 10px;" class="paracolor">
               Manage Khalsa Member
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
      </li> --}}




            <li class="new">
            <a href="{{url('Admin/view_notifications')}}"  class="nav-link @yield('view_notifications')">
            <i class="fa fa-bell new" style="font-size:16px;"></i> 
              <p style="margin-left: 10px;" class="paracolor">
                 Manage Notifications
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
        </li>
        <li class="new">
          <a href="{{url('Admin/view_business')}}"  class="nav-link @yield('view_business')">
          <i class="fas fa-business-time" style="font-size:14px;"></i> 
            <p style="margin-left: 10px;" class="paracolor">
               Manage Business Listing
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
        </li>
        <li class="new">
          <a href="{{url('Admin/vacancies')}}"  class="nav-link @yield('vacancies')">
          <i class="fas fa-business-time" style="font-size:14px;"></i> 
            <p style="margin-left: 10px;" class="paracolor">
               Manage Vacancies
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
        </li>
      <li class="new">
        <a href="{{url('Admin/view_feedback')}}"  class="nav-link ">
        <i class="	fas fa-file-alt" style="font-size:21px;"></i> 
          <p style="margin-left: 10px;" class="paracolor">
             Manage Feedback
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
    </li>
    <li class="new">
      <a href="{{url('Admin/blood_donor')}}"  class="nav-link ">
      <i class="fa fa-heartbeat" style="font-size:13px;"></i> 
        <p style="margin-left: 10px;" class="paracolor">
           Manage Blood Donor
          <i class="right fas fa-angle-left"></i>
        </p>
      </a>
  </li>
  <li class="new">
    <a href="{{url('Admin/blood_request')}}"  class="nav-link ">
    <i class="	fa fa-heartbeat" style="font-size:13px;"></i> 
      <p style="margin-left: 10px;" class="paracolor">
         Manage Blood Request
        <i class="right fas fa-angle-left"></i>
      </p>
    </a>
  </li>
  <li class="new">
    <a href="{{url('Admin/youtube_channel')}}"  class="nav-link ">
    <i class="fa fa-play"  style="font-size:17px;"></i> 
      <p style="margin-left: 10px; display:inline-flex;" class="paracolor">
         Manage Youtube Channel
        <i class="right fas fa-angle-left"></i>
      </p>
    </a>
  </li>
  <li class="new">
    <a href="{{url('Admin/support_number')}}"  class="nav-link ">
    <i class="fa fa-phone"  style="font-size:17px;"></i> 
      <p style="margin-left: 10px;" class="paracolor">
        Support Number
        <i class="right fas fa-angle-left"></i>
      </p>
    </a>
  </li>
  <li class="new">
    <a href="{{url('Admin/khalsa_pariwar_link')}}"  class="nav-link ">
    <i class="fa fa-link"  style="font-size:17px;"></i> 
      <p style="margin-left: 10px;" class="paracolor">
        Khalsa Pariwar Link
        <i class="right fas fa-angle-left"></i>
      </p>
    </a>
  </li>
  <li class="new">

    <a href="{{url('Admin/about')}}"  class="nav-link ">
      <i class="material-icons opacity-10" style="vertical-align: middle;">diversity_3</i>
      <p style="margin-left: 10px;" class="paracolor">
        About Us
        <!-- <i class="right fas fa-angle-left"></i> -->
      </p>
    </a>
  </li>

  <li class="new">

      <a href="{{url('Admin/logout')}}"  class="nav-link ">
      <i class="material-icons opacity-10" style="vertical-align: middle;">power_settings_new</i>
        <p style="margin-left: 10px;" class="paracolor">
            Logout
          <!-- <i class="right fas fa-angle-left"></i> -->
        </p>
      </a>
  </li>

  <li class="new">

    <a href="{{url('Admin/logout')}}"  class="nav-link ">
    {{-- <i class="material-icons opacity-10" style="vertical-align: middle;">power_settings_new</i> --}}
      <p style="margin-left: 10px;" class="paracolor">
          {{-- Logout --}}
        <!-- <i class="right fas fa-angle-left"></i> -->
      </p>
    </a>
  </li>
        <!-- </li> -->

                <!-- <a href="{{url('Sewapartner/viewconsultation')}}"  class="nav-link ">
              <i class="material-icons opacity-10" style="vertical-align: middle;">table_view</i>
              <p style="margin-left: 10px;">
                Manage Invoice 
                <i class="right fas fa-angle-left"></i>
              </p>
            </a> -->
            <!-- <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('Admin/subadmin_register')}}" class="nav-link @yield('addsubadmins')">
                  <i class="far fa-circle nav-icon"  style="margin-left: 30px;color:white; "></i>
                  <p>Add Subadmin</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('Admin/subadmin')}}" class="nav-link @yield('viewsubadmins')">
                  <i class="far fa-circle nav-icon"  style="margin-left: 30px;color:white;"></i>
                  <p>View Subadmin</p>
                </a>
              </li>
            </ul> -->
          <!-- </li>
          <li class="nav-item @yield('sewapartners')">
            <a href="#" class="nav-link ">
            <i class="fa fa-user-md new" style="font-size:20px;"></i>
              <p style="margin-left: 10px;" class="paracolor">
                 Manage Sewapartner
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('Admin/register')}}" class="nav-link @yield('addsewapartners')">
                  <i class="far fa-circle nav-icon"  style="margin-left: 30px;color:white;"></i>
                  <p>Add Sewapartner</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('Admin/sewapartner')}}" class="nav-link @yield('viewsewapartners')">
                  <i class="far fa-circle nav-icon"  style="margin-left: 30px;color:white;"></i>
                  <p>View Sewapartner</p>
                </a>
              </li> -->
              {{-- <li class="nav-item">
                <a href="{{url('Admin/doctordata')}}" class="nav-link @yield('doctordatan')">
                  <i class="far fa-circle nav-icon"  style="margin-left: 30px;color:white;"></i>
                  <p>Add Doctor</p>
                </a>
              </li> --}}
            <!-- </ul>
          </li> -->
          <!-- <li class="nav-item @yield('volunteers')">
            <a href="#" class="nav-link ">
            <i class='fas fa-users new' style='font-size:20px;'></i>
              <p style="margin-left: 10px;" class="paracolor">
                 Manage Volunteer
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            
              <li class="nav-item">
                <a href="{{url('Admin/volunteer')}}" class="nav-link @yield('addvolunteers')">
                  <i class="far fa-circle nav-icon"  style="margin-left: 30px;color:white;"></i>
                  <p>Add Volunteer</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('Admin/view_volunteer')}}" class="nav-link @yield('viewvolunteers')">
                  <i class="far fa-circle nav-icon"  style="margin-left: 30px;"></i>
                  <p>View Volunteer</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item @yield('card')">
            <a href="#" class="nav-link ">
            <i class='far fa-address-card new' style='font-size:20px;'></i>
              <p style="margin-left: 10px;" class="paracolor">
                Manage Card Holder 
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('Admin/cardholder')}}" class="nav-link @yield('addcard')">
                  <i class="far fa-circle nav-icon" style="margin-left: 30px;color:white;"></i>
                  <p>Add Cardholder</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('Admin/viewcardholder')}}" class="nav-link @yield('viewcardholder')">
                  <i class="far fa-circle nav-icon"  style="margin-left: 30px;"></i>
                  <p>View Cardholder</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item @yield('doctors')">
            <a href="#" class="nav-link ">
            <i class="fa fa-stethoscope" style="font-size:20px;"></i>
              <p style="margin-left: 10px;" class="paracolor">
                Manage Doctor 
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('Admin/doctor')}}" class="nav-link @yield('adddoctors')">
                  <i class="far fa-circle nav-icon" style="margin-left: 30px;color:white;"></i>
                  <p>Add Doctor</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('Admin/view_doctor')}}" class="nav-link @yield('viewdoctors')">
                  <i class="far fa-circle nav-icon"  style="margin-left: 30px;"></i>
                  <p>View Doctor</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item @yield('services')">
            <a href="#" class="nav-link ">
            <span class="material-icons new">
              list_alt
              </span>

              <p style="margin-left: 10px;" class="paracolor">
                Manage Services 
                <i class="right fas fa-angle-left new"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('Admin/services')}}" class="nav-link @yield('addservices')">
                  <i class="far fa-circle nav-icon" style="margin-left: 30px;color:white;"></i>
                  <p>Add Services</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item @yield('notification')">
            <a href="#" class="nav-link ">
            <i class="fa fa-bell new" style="font-size:21px;"></i> 
              <p style="margin-left: 10px;" class="paracolor">
                Manage Notification 
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('Admin/notifications')}}" class="nav-link @yield('addnotification')">
                  <i class="far fa-circle nav-icon" style="margin-left: 30px;color:white;"></i>
                  <p>Add Notification</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('Admin/view_notifications')}}" class="nav-link @yield('viewnotifications')">
                  <i class="far fa-circle nav-icon"  style="margin-left: 30px;"></i>
                  <p>View Notification</p>
                </a>
              </li>
            </ul>
          </li>
          
          <li class="nav-item @yield('logout')">
            <a href="{{url('Admin/logout')}}" class="nav-link @yield('dashboard_item')">
              <i class="material-icons opacity-10" style="vertical-align: middle;">power_settings_new</i>
              <p style="margin-left: 10px;" class="paracolor">
                Logout
               
              </p>
            </a>
          </li>
        
          </li>
        </ul> -->
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

 
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
  <img src="/public/images/icntogge.png" alt="toggle" class="toggle_icon-wraps">
  <!-- Main Footer -->
  @yield('main_section')
  <footer class="main-footer">
    <strong>Copyright © 2023 <a href="#" target="_blank">Khalsa Card & Social Simba</a>,</strong>
    All rights reserved.
    
  </footer>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{url('public/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap -->
<script src="{{url('public/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE -->
<script src="{{url('public/dist/js/adminlte.js')}}"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="{{url('public/plugins/chart.js/Chart.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
{{-- <script src="{{url('public/dist/js/demo.js')}}"></script> --}}
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{url('public/dist/js/pages/dashboard3.js')}}"></script>
<script src="{{url('public/plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
<script src="{{url('public/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{url('plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{url('public/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{url('public/plugins/moment/moment.min.js')}}"></script>
<script src="{{url('public/plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{url('public/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{url('public/plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{url('public/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
{{-- <script src="{{url('dist/js/adminlte.js')}}"></script> --}}
<!-- AdminLTE for demo purposes -->
{{-- <script src="{{url('public/dist/js/demo.js')}}"></script> --}}
<script src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.1.9/sweetalert2.all.min.js" integrity="sha512-IZ95TbsPTDl3eT5GwqTJH/14xZ2feLEGJRbII6bRKtE/HC6x3N4cHye7yyikadgAsuiddCY2+6gMntpVHL1gHw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{url('public/dist/js/pages/dashboard.js')}}"></script>
<script src="../../plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="../../plugins/jquery-validation/additional-methods.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>  --}}

<script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.colVis.min.js"></script>

@yield('main_script')

<!-- ./wrapper -->

  <style>

    .toggle_icon-wraps {
        width: 30px;
        cursor: pointer;
        position: absolute;
        right: 20px;
        top: 20px;
        z-index: 9;
    }
    
    .open_sidebar{
      margin-left: 0px;
    }
    
    @media (min-width: 768px) and (max-width: 1024px){
      .card{
            box-shadow:none !important;
          }
      .small-box.bg-info {
          margin-left: 241px;
      }
            }
    @media (min-width: 768px){
      img.toggle_icon-wraps{
        display:none;
      }
    }
    .dt-buttons button {
      background: #E78400;
      color: #fff;
    }
    .dt-buttons button:hover {
      background: #E78420 !important;

    }
    .dt-button-collection .active {
      color:#000;
    }
    .dt-button-collection .buttons-columnVisibility:hover {
      color:#fff;
    }
    span.dt-down-arrow {
      color:#fff !important;
    }
  </style>
  
  <script type="text/javascript">
    jQuery(document).ready(function(){
      jQuery(".toggle_icon-wraps").click(function(){
        
        jQuery(".main-sidebar").toggleClass('open_sidebar');
    });
    jQuery(".content-wrapper").click(function(){
        jQuery(".main-sidebar").removeClass('open_sidebar');
    });
    });
  </script>
  <!-- <script>
    $(document).ready(function(){
      jQuery('.new').on('click', function(){
        // alert("here");
        jQuery(this).removeClass('menu-open');
        jQuery(this).addClass('menu-open');
      });
    });
  </script> -->
<!-- </div> -->
  <script>
    jQuery(function ($) {
    $("ul.nav-sidebar a")
        .click(function(e) {
            var link = $(this);

            var item = link.parent("li");
            
            if (item.hasClass("active")) {
                item.removeClass("active").children("a").removeClass("active");
            } else {
                item.addClass("active").children("a").addClass("active");
            }

            if (item.children("ul").length > 0) {
                var href = link.attr("href");
                link.attr("href", "#");
                setTimeout(function () { 
                    link.attr("href", href);
                }, 300);
                e.preventDefault();
            }
        })
        .each(function() {
            var link = $(this);
            if (link.get(0).href === location.href) {
                link.addClass("active").parents("li").addClass("active");
                return false;
            }
        });
    });
  </script>

</body>
</html>