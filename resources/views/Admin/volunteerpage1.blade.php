@extends('Admin.layouts.App')
@section('volunteers','menu-open')
@section('viewvolunteers','active')
<style>
  img#profile_image {
    border: 2px solid black;
  }
  img#aadharcard_image{
    border: 2px solid black;
  }
  img#votercard_image{
    border: 2px solid black;
  }


  section.content {
    background-color: #F5DDBD;
} 
  div#show_image_popup {
    display: none;
    top:50%;
    left:37%;
    position:absolute;
    z-index: 1000; /  adobe all elements   /
  transform: translate(-50%, -50%); /  make center   /

}
div#show_aadhar_popup {
    display: none;
    top:50%;
    left:37%;
    position:absolute;
    z-index: 1000; /  adobe all elements   /
  transform: translate(-50%, -50%); /  make center   /
}
div#show_voter_popup {
    display: none;
    top:50%;
    left:37%;
    position:absolute;
    z-index: 1000; /  adobe all elements   /
  transform: translate(-50%, -50%); /  make center   /

}
  #active{
    border: none;color: blue;font-size: 22px;
  }
  #inactive{
    border: none;color: red;font-size: 22px;
  }
  .first_row {
    background-color: #ff7600;
    width: 100%;
    height: 160px;
  }
  img#show_profile_image {
		height: 125px;
		width: 12%;
		margin-left: 61px;
		margin-top: -84px;
		border-radius: 50%;
		border: 2px solid #ff6a00;
	}
  .name_class.ml-2 {
    margin-top: -15px;
}
.close-btn-area {
    background-color: white;
  }
  #show_image_popup{
  position: absolute; /  so that not take place   /
  top: 50%;
  left: 50%;
  z-index: 1000; /  adobe all elements   /
  transform: translate(-50%, -50%); /  make center   /
  display: none; /  to hide first time   /
  }
 
  button#close-btn {
    float: right;
}
button#close-btns {
    float: right;
}
button#close-btnss {
    float: right;
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
            <h1>Volunteer Details</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content pb-5">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
              <!-- /.card-body -->
              <div class="row">
                <div class="first_row">
                <!-- <img src="{{$profile}}" style="height: 70px;width:15%;" > -->
                </div>
              </div><br>
              <div class="row">
              <img src="{{$aadhaar_card}}" id="show_profile_image">
              <div class="row">
              <div class="name_class ml-2"><b>{{$name}}</b></div>
              </div>
              </div><br><br>
             <div class="row ml-5">
              <div class="col-lg-4 col-md-4 col-sm-12"><b>Email:</b></div>
              <div class="col-lg-4 col-md-4 col-sm-12">{{$email}}</div>
             </div><br>
             <div class="row ml-5">
              <div class="col-lg-4 col-md-4 col-sm-12"><b>Contact Number:</b></div>
              <div class="col-lg-4 col-md-4 col-sm-12">{{$contact_number}}</div>
             </div><br>
             <div class="row ml-5">
              <div class="col-lg-4 col-md-4 col-sm-12"><b>Address:</b></div>
              <div class="col-lg-4 col-md-4 col-sm-12">{{$address}}</div>
             </div><br>
             <div class="row ml-5">
              <div class="col-lg-4 col-md-4 col-sm-12"><b>Profile:</b></div>
              <div class="col-lg-4 col-md-4 col-sm-12">
             
       
                <img src="{{$profile}}" id="profile_image" style="height: 50px;width:50px;" >
                {{-- <a href="{{$profile}}" target="_blank"> View Image</a> --}}
              </div>
             </div><br>
             <div class="row">
              <div id="show_image_popup">
   <div class="close-btn-area">
   <img src="{{$profile}}" id="profile_image" style="height: 290px; width:100%;" >
     <button id="close-btn">X</button> <!--     close btn -->
   </div>
   </div>
   </div>
             <div class="row ml-5">
              <div class="col-lg-4 col-md-4 col-sm-12"><b>Aadhaar Card:</b></div>
              <div class="col-lg-4 col-md-4 col-sm-12">
                <img src="{{$aadhaar_card}}" style="height: 50px;width:50px;" id="aadharcard_image" >
               
              </div>
             </div><br>
             <div id="show_aadhar_popup">
            <div class="close-btn-area">
            <img src="{{$aadhaar_card}}" id="profile_image" style="height: 290px;" >
              <button id="close-btns">X</button> <!--     close btn -->
            </div>
            </div>
        
             <div class="row ml-5">
              <div class="col-lg-4 col-md-4 col-sm-12"><b>Voter Card:</b></div>
              <div class="col-lg-4 col-md-4 col-sm-12">
                <img src="{{$voter_card}}" style="height: 50px;width:50px;" id="votercard_image">
                 <!-- <a href="{{$aadhaar_card}}" target="_blank"> View Image</a> -->
              </div>
              <div id="show_voter_popup">
            <div class="close-btn-area">
            <img src="{{$voter_card}}" id="profile_image" style="height: 290px;" >
              <button id="close-btnss">X</button> <!--     close btn -->
            </div>
            </div>
            </div>
              
             </div>
          
            </div>
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
<script>
  $("#profile_image").click(function(){
    // $("#show_image_popup").fadeIn();
    $("#show_image_popup").show()
  });
  $("#close-btn").click(function(){
// $("#show_image_popup").fadeOut()
$("#show_image_popup").hide()
});

 </script>
 <script>
  $("#aadharcard_image").click(function(){
    // $("#show_image_popup").fadeIn();
    $("#show_aadhar_popup").show()
  });
  $("#close-btns").click(function(){
// $("#show_image_popup").fadeOut()
$("#show_aadhar_popup").hide()
});
</script>
<script>
  $("#votercard_image").click(function(){
    // $("#show_image_popup").fadeIn();
    $("#show_voter_popup").show()
  });
  $("#close-btnss").click(function(){
// $("#show_image_popup").fadeOut()
$("#show_voter_popup").hide()
});



 </script>
@endsection


