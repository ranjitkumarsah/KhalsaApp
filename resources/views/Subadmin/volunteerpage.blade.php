@extends('Subadmin.layouts.App')
@section('volunteers','menu-open')
@section('viewvolunteer','active')
<head>
</head>
<style>
  button.openmodal.myBtn {
    display: none;
  }
  section.content {
    background-color: #F5DDBD;
  } 
  a.btn.btn-primary.back_btn{
    background-color:#ED9B2D;
    color:black;
  }
  .modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}
.modal1 {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}
.modal-content {
  /* background-color: #fefefe; */
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width: 32% !important;

}




/* The Close Button */
.close {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}
  b {
    font-weight: 500;
    color: black;
  }
  .col-lg-4.col-md-4.col-sm-12 {
    font-weight: 400;
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
  .content-wrapper {
    background-color: #ffffff !important;
}





  *{
    margin: 0%;
    padding: 0%;
    box-sizing: border-box;
    font-family: 'Roboto', sans-serif;
}
.container {
    width: 100%;
    max-width: 1053px;
    padding: 0px 15px;
    margin: 0px auto;
}

.content-div .row {
  display: flex;
  justify-content: space-between;
  align-items: center;
  width: 100%;       
  background-color: #ff7600;
  padding: 10px;
  margin: 0px auto;  
  box-shadow: 0px 1px 6px -2px #777777;
  border-radius: 0.25rem;
}

.content-div .row .img-div {
    width: 17%;
   
}

.content-div .row .img-div img {
    height: 125px;
    width: 125px;
    border-radius: 50%;
}

.content-div .name-div h3 {
    color: white;
}
/* second section */


/* .detail-div .row {
  display: grid;
    width: 100%;
    margin-left: 0px;  
    gap: 20px;
    grid-template-columns: auto auto;
    margin-top: 20px;
} */
.detail-div .row .box-1:hover {
    background-color: #ededed;
}
  .detail-div .row .box-1 { 
    background-color:white;
    border: 1px solid #ededed;
    padding: 20px;
    box-shadow: 0px 1px 6px -2px #777777;
    height: 100%;
  }

.detail-div .row .first-detail {
    width: 100%;
}
/* .detail-div .row .image-detail {
    width: 100%;
    display: grid;
    grid-template-columns: auto auto;
} */
.detail-div .row .img-space img {
    width: 46%;
    height: 120px;
    cursor: pointer;
}

.detail-div .row .first-detail h3 ,.detail-div .row .image-detail h3 {
    font-weight: 700;
    font-size: 14px;
    line-height: 26px;
}

.detail-div .row .first-detail span ,.detail-div .row .image-detail span {
    color: #000000;
    font-weight: 400;
    padding-left: 6px;
    height: 250px;
    
}
/* .detail-div .row .image-detail span .img-space {
    width: 35%;
} */

@media screen and (min-width:375px) and (max-width:566px){
    .detail-div .row {
        grid-template-columns: auto;
    }
    .content-div .name-div h3 {
        font-size: 16px;
    }
}
@media screen and (min-width:0px) and (max-width:375px){
    .content-div .name-div h3 {
        font-size: 16px;
    }
    .detail-div .row {
        grid-template-columns: auto;
    }
}

  body, .content-wrapper {
    background: #F5DDBD !important;
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
            <h1>{{$name}} (1469-{{1000000+$datas->id}})</h1>
          </div>
          <div class="col-6 col-sm-6 text-right">
            <a href="{{url('Subadmin/view_volunteer')}}"class="btn btn-primary back_btn">Back</a>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
   





    <section class="content-div">
      <div class="container-fluid">
          <div class="row">
              <div class="img-div">
                  <img src="{{$profile}}">
              </div>
              <div class="name-div mr-4">
                  <h3>{{$name}}</h3>
                  
              </div>
      </div>
  </section>
  <!-- second section -->
  <div class="detail-div pb-5">
      <div class="container-fluid">
          <div class="row mt-5">
            <div class="col-sm-6">
              <div class="box-1">
                <div class="first-detail">
                  <!-- <h3>Name:<span>{{$name}}</span></h3> -->
                  <h3>UserName:<span>{{$datas->username}}</span></h3>
                  <h3>Email:<span>{{$email}}</span></h3>
                  <h3>Contact Number:<span>{{$contact_number}}</span></h3>
                  <h3>Address:<span>{{$address}}</span></h3>
                </div>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="box-1">
                <div class="first-detail">
                  <h3>Village/City:<span> {{$datas->village}}</span></h3>
                  <h3>Landmark:<span>{{$datas->landmark}}</span></h3>
                  <!-- <h3>UserName:<span>{{$datas->username}}</span></h3> -->
                  <h3>Registered On:<span>{{$datas->created_at}}</span></h3>
                </div>
              </div>
            </div>
          </div>
          <div class="row mt-3 pb-5">
            <div class="col-sm-6">
              <div class="box-1">
                <div class="image-detail">
                  <h3>Voter Card:</h3><span><div class="img-space"><img src="{{$voter_card}}" class="openmodal myBtn"></div></span>
                    
                </div>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="box-1">
                <div class="image-detail">
                  <h3>Aadhar Card: </h3>
                  <span>
                    <div class="img-space">
                      <img src="{{$aadhaar_card_front}}" class="openmodal myBtn">
                      <img src="{{$aadhaar_card_back}}" style="float:right;" class="openmodal myBtn">
                    </div>
                  </span>
                  
                </div>
              </div>
            </div>
          </div>
            <div id="myModal1" class="modal">

              <!-- Modal content -->
              <div class="modal-content">
                <span class="close">&times;</span>
                <img src="{{$voter_card}}" style="height:300px;">
              </div>
              
              </div>
                            
                               </div>
              
                           </div><br>
                          
                         
                <!-- Trigger the modal with a button -->
                <!-- <button class="openmodal myBtn">Open Modal</button> -->
              
              <!-- The Modal -->
              <div class="modal myModal">
              
              <!-- Modal content -->
              <div class="modal-content">
              <span class="close">&times;</span>
              <img src="{{$aadhaar_card_front}}" style="height:300px;">
              </div>
              </div>
              <button class="openmodal myBtn">Open Modal</button>
              
              <!-- The Modal -->
              <div class="modal showmodal">
              
              <!-- Modal content -->
              <div class="modal-content">
              <span class="close">&times;</span>
                <img src="{{$aadhaar_card_back}}"  style="height:300px;">
              </div>
              </div>
              
              <div class="modal myModal">
              
              <!-- Modal content -->
              <div class="modal-content">
              <span class="close">&times;</span>
              <p>Some text in the Modal2</p>
              </div>
              </div>
              
                <!-- Modal -->
                <div id="newModal" class="modal1">
              
              <!-- Modal content -->
              <div class="modal-content">
                <span class="close">&times;</span>
                <img src="{{$aadhaar_card_front}}" >
              </div>
              
              </div>
                
          </div>
      </div>
  </div>
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



<script>
// Get the modal
 var modal = document.getElementById("newModal");

// Get the button that opens the modal
var btn = document.getElementById("aadhar_image");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal1) {
    modal.style.display = "none";
  }
}
</script> 

<!-- <script>
// Get the modal
var modal = document.getElementById("myModal1");

// Get the button that opens the modal
var btn = document.getElementById("voter_image");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script> --> -->
<script>
  var modals = document.getElementsByClassName('modal');
// Get the button that opens the modal
var btns = document.getElementsByClassName("openmodal");
var spans=document.getElementsByClassName("close");
for(let i=0;i<btns.length;i++){
    btns[i].onclick = function() {
        modals[i].style.display = "block";
    }
}
for(let i=0;i<spans.length;i++){
    spans[i].onclick = function() {
        modals[i].style.display = "none";
    }
}
</script>





@endsection


