@extends('Sewapartner.layouts.App')
@section('view_notification','menu-open')
@section('view_notification','active')
<style>
   th{
    color:#0b528f !important;
    font-size: 1.4rem;
    text-align: center !important;
  }
  a.btn.btn-primary {
    color: white;
    background-color: #007bff;
    width: 16%;
    font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,"Noto Sans",sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";
    font-size: 15px;
  }
  p.paracolor {
    font-size: 16px !important;
  }
  h1#notification_heading{
    font-size:26px !important;
    font-weight: 400 !important;
  }
  hr{
	    border-top: 1px solid rgba(0,0,0,.1) !important;
	}
  aside.main-sidebar.sidebar-dark-primary.elevation-4 {
		font-family: "Source Sans Pro",-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol" !important;
		font-size: 16px;
	}
  section.content {
    background-color: #F5DDBD;
  } 
  a.btn.btn-primary.back_btn{
    background-color:#ED9B2D;
    color:black;
  }
  #active{
    border: none;color: blue;font-size: 22px;
  }
  #inactive{
    border: none;color: red;font-size: 22px;
  }
 div#Table_ID_filter {
    margin-top: 10px;
}
@media(min-width:280px) and (max-width:767px) {
    .table-responsive-sm {
    display: block;
    width: 100%;
    overflow-x: auto;
    -webkit-overflow-scrolling: touch;
    }
    table#Table_ID {
        overflow-x: scroll;
    }
    div#Table_ID_wrapper {
        overflow-y: scroll;
    }
        }
        div#show_image_popup {
    display: none;
    top:50%;
    left:37%;
    position:absolute;
    z-index: 1000; /  adobe all elements   /
  transform: translate(-50%, -50%); /  make center   /

}
[class*=sidebar-dark-] .sidebar a:hover {
    background-color: #0b528f  !important;
}
a.btn.btn-primary {
    color: white;
    background-color: #007bff;
    width: 15%;
}
h1 {
    font-size: 28px !important;
    color: #0b528f !important;
} 
  </style>
  <!-- Content Wrapper. Contains page content -->
  @section('main_section')
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- Content Wrapper. Contains page content -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 id="notification_heading">View Notifications</h1>
          </div>
          <div class="col-6 col-sm-6 text-right">
            <a href="{{url('Sewapartner/dashboard')}}"class="btn btn-primary back_btn">Back</a>
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
               {{-- <a href="{{url('Sewapartner/addnotifications')}}" class="btn btn-primary" style="float:right;">Add Notification</a><br><br> --}}
                <table id="Table_ID" class="table table-responsive-sm table table-bordered table-hover" >
                  <thead>
                  <tr>
                    <th style="width: 15px;">#</th>
                    {{-- <th style="width: 15px;">Category</th> --}}
                    <th style="width: 15px;">Title</th>                     
                    <th class="desc_table" style="width: 15px;">Description</th>                  
                    <th style="width: 70px;">Image</th>
                    <th style="width: 70px;">City</th>

                    <th style="width: 70px;">Date</th>
                  </tr>
                  </thead>
                  <tbody style="font-size: 1.4rem;">
                    <?php 
                    $id=1;
                    ?>
                    @foreach ($notifications as $notification)
                    <tr>
                    <td>{{$id++}}</td> 
                    {{-- <td>{{$notification->category}}</td>       --}}
                      <td> <a href="#" class="dynamic_view" data-toggle="modal" data-target="#viewModal" data-id="{{$notification->id}}" data-image="{{$notification->image}}" data-title="{{$notification->title}}" data-description="{{$notification->description}}">{{$notification->title}}</a></td>                    
                      <td class="desc_table">{{$notification->description}}</td>                     
                      <td><img src="{{$notification->image}}" style="height: 50px;width:50px;" class="dynamic_image" data-toggle="modal" data-target="#myModal" data-id="{{$notification->id}}" data-image="{{$notification->image}}"></td>
                      <div id="show_image_popup">
                        <div class="close-btn-area">
                        <img src="{{$notification->image}}" id="profile_image" style="height: 290px; width:100%;" >
                          <button id="close-btn">X</button> <!--     close btn -->
                        </div>
                        </div>
                        <td>{{$notification->location}}</td> 

                        <td>{{$notification->created_at}}</td> 
                    
                      
                    </tr>
                    @endforeach                  
                  </tbody>
                </table>
                <div class="container">
  {{-- <h2>Modal Example</h2> --}}
  <!-- Trigger the modal with a button -->
  <!-- <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button> -->

  <!-- Modal -->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          {{-- <h4 class="modal-title" id="myModalLabel">Modal title</h4> --}}

        </div>
        <div class="modal-body">
          <p><span class="roomNumbers">

          </span>.</p>                               
        </div>
        {{-- <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div> --}}
      </div>
    </div>
  </div>

  <div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="viewModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
        <h4 class="modal-title float-left" id="viewModalLabel"><b>Notifications</b></h4> 
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
           

        </div>
        <div class="modal-body">
          <p><span class="roomNumbers">

          </span>.</p>                               
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
        </div> 
      </div>
    </div>
  </div>
  
</div>
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
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <!-- <footer class="main-footer">
    <strong>Copyright &copy; 2022 <a href="https://protolabzit.com/" target="_blank">Protolabz eServices</a>.</strong>
    All rights reserved.
    {{-- <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.2.0-rc
    </div> --}}
  </footer> -->

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
<!-- Page specific script -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
  $(document).ready( function () {
    var dataSrc = [];
    var t = $('#Table_ID').DataTable({
      'initComplete': function(){
         var api = this.api();

         // Populate a dataset for autocomplete functionality
         // using data from first, second and third columns
         api.cells('tr', [0, 1, 2]).every(function(){
            // Get cell data as plain text
            var data = $('<div>').html(this.data()).text();           
            if(dataSrc.indexOf(data) === -1){ dataSrc.push(data); }
         });
         
         // Sort dataset alphabetically
         dataSrc.sort();
        
         // Initialize Typeahead plug-in
         $('.dataTables_filter input[type="search"]', api.table().container())
            .typeahead({
               source: dataSrc,
               afterSelect: function(value){
                  api.search(value).draw();
               }
            }
         );
      },
        columnDefs: [
            {
                // searchable: false,
                // orderable: false,
                // targets: 0,
            },
        ],
        // order: [[0, 'desc']],
    });
 
    // t.on('order.dt search.dt', function () {
    //     let i = 1;
 
    //     t.cells(null, 0, { search: 'applied', order: 'applied' }).every(function (cell) {
    //         this.data(i++);
    //     });
    // }).draw();
    
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
              
                   location.reload();
             }
         });
       }  
   </script>
   <script>
    $("#notification_image").click(function(){
      // $("#show_image_popup").fadeIn();
      $("#show_image_popup").show()
    });
    $("#close-btn").click(function(){
  // $("#show_image_popup").fadeOut()
  $("#show_image_popup").hide()
  });
  
   </script>
   <script>
//     $('#dynamic_image').click(function(){
    
//     var id = $(this).attr('data-id')  ;
//     alert(id);
// });
$('.dynamic_image').click(function() {

  // $('#myModal').on('show.bs.modal', function(e) {
  // var myRoomNumber = $(this).attr('data-id');
  var myRoomNumber = $(this).attr('data-image');
  // alert(myImage);
  $('#myModal').find('.roomNumbers').html('<img src="'+myRoomNumber+'"  width="450" height="300"/>');
// });
});

$('.dynamic_view').click(function() {

    // $('#myModal').on('show.bs.modal', function(e) {
    // var myRoomNumber = $(this).attr('data-id');
    var title = $(this).attr('data-title');
    var description = $(this).attr('data-description');
    var image = $(this).attr('data-image');

    // alert(myImage);
    var html = 
    '<table>'+
      '<tr>'+
        '<th style="color:#212529 !important; text-align:left !important; padding-bottom: 25px;">Title:</th>'+
        '<td style="width:60%; padding-bottom: 25px;">'+title+'</td>'+
      '</tr>'+
      '<tr>'+
        '<th style="color:#212529 !important; text-align:left !important; padding-bottom: 25px;">Description:</th>'+
        '<td style="width:60%; padding-bottom: 25px;">'+description+'</td>'+
      '</tr>'+
      '<tr>'+
        '<th style="color:#212529 !important; text-align:left !important;">Image:</th>'+
        '<td style="width:60%;">'+'<img src="'+image+'"  width="100" height="100"/>'+'</td>'+
      '</tr>'+
    '</table>';   
        
    $('#viewModal').find('.roomNumbers').html(html);
    // });
});
   </script>
@endsection


