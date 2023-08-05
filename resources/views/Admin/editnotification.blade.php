@extends('Admin.layouts.App')
@section('notification','menu-open')
@section('view_notifications','active')

  <!-- Content Wrapper. Contains page content -->
  @section('main_section')
  <style>
    a.btn.btn-primary.back_btn{
      background-color:#ED9B2D;
      color:black;  
    }
    textarea#description{
      margin-top: 2px;
      width:100%;
    }
    .card-footer{
      border:0px;
      background-color:white;
    }
    form#sub-admin-form {
        margin-left: 20px;
        margin-right: 20px;
    }

    button.btn.btn-primary {
      background-color: #ED9B2D !important;
      color: black;
      width: 22%;
  }
    /* ui design */
    @media (max-width:992px) {
    form#sub-admin-form {
        margin-left: 244px;
    }
  }
  @media(min-width:280px) and (max-width:767px) {
    button.btn.btn-primary {
        width: 40%;
    }
    form#sub-admin-form {
      margin-left: 0px;
  }
form#sub-admin-form {
    margin-right: 0px !important;
} 
  .card-body {
    width: 100% !important;
    }

  }
  @media only screen 
  and (min-device-width: 320px) 
  and (max-device-width: 480px){
	textarea#description {
		width: 100%;
	}
} /* ui design */
  </style>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-md-6 col-sm-6">
            <h1>Edit Notification</h1>
          </div>
          <div class="col-6 col-sm-6 text-right">
            <a href="{{url('Admin/view_notifications')}}"class="btn btn-primary back_btn">Back</a>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              {{-- <li class="breadcrumb-item"><a href="#">Home</a></li> --}}
              {{-- <li class="breadcrumb-item active">Validation</li> --}}
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary" style="font-size: 0.9rem;">
            
              <!-- /.card-header -->
              <!-- form start -->
              <form id="sub-admin-form">
                @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                @endif
                {{-- <h4 style="text-align:center;">Sub Admin Register</h4> --}}
                <div class="card-body">
                    @csrf

                    <div class="row">
                      <div class="col=lg-6 col-md-6 col-sm-12">
                        <div class="form-group">
                          <label for="email">Select Category: <span class="text-danger">*</span></label><br>
                          <select name="category" id="category" style="width: 100%;height: 37px;">
                          <option value="">Select</option>
                          <option value="Subadmin" {{$notification->category == "Subadmin"  ? 'selected' : ''}}>Subadmin</option>
                          <option value="Sewapartner" {{$notification->category == "Sewapartner"  ? 'selected' : ''}}>Sewapartner</option>
                          <option value="Volunteer" {{$notification->category == "Volunteer"  ? 'selected' : ''}}>Volunteer</option>
                          <option value="Card_Holder" {{$notification->category == "Card_Holder"  ? 'selected' : ''}}>Card Holder</option>
                          </select>
                      </div>
                      </div>
                      <div class="col=lg-6 col-md-6 col-sm-12">
                        <div class="form-group">
                          <label for="email">Title: <span class="text-danger">*</span></label>
                          <input type="text" class="form-control" id="title" placeholder="Enter  Title" name="title" value="{{$notification->title}}">
                        </div> 
                      </div>
                    </div>

                    <input type="hidden"  id="notification_id" placeholder="Enter  Title" name="notification_id" value="{{$notification->id}}">

                    <div class="row">
                      <div class="col=lg-6 col-md-6 col-sm-12">
                         
                          <label >Description: <span class="text-danger">*</span></label>
                          <textarea  id="description" placeholder="Enter  Description" value="{{$notification->description}}" name="description" rows="5"   cols="65" style="margin-top: 2px;">{{$notification->description}}</textarea>
                         
                      </div>
                      <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                          <label for="pwd">Image:</label>
                          <input type="file" class="form-control" id="image"  name="newimage">
                          <input type="hidden" class="form-control" id="image"  name="oldimage" value="{{$notification->image}}">
                          <!-- <img src="{{$notification->image}}" style="height:50px;width:50px;"> -->
                        </div>
                        <div class="form-group">
                          <label for="location">Location:</label>
                          {{-- <input type="text" class="form-control" id="location" placeholder="Enter  Location" name="location" value="{{$notification->location}}"> --}}
                          <select name="location" class="form-control" placeholder="Select location" id="location">
                        <option value="">Select Location</option>
                        @foreach($cities as $name)
                          <option value="{{ $name->city }}" <?php if($name->city==$notification->location){ echo 'selected';}else{ echo '';}?>>{{ $name->city }}</option>
                        @endforeach
                      </select>
                        </div>
                      </div>
                    </div>

                  
                    </div>

	             <div class="card-footer text-center">                          
			 <button type="submit" class="btn btn-primary" style="margin-left: 20px;">Update</button>
                     </div>
                    
            
                </div>
                  
                </form>      
            </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">

          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
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

<!-- jQuery -->

<!-- Page specific script -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script type="text/javascript">
  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
 
  $('#sub-admin-form').on('submit', function(event){
      event.preventDefault();
      var spinner = $('#loader');
            spinner.show();
     const fd = $('#sub-admin-form').serialize();
    var id = $('#notification_id').val();
    // alert(id);
     $.ajax({
       type: "POST",
        url: "{{url('Admin/updatenotification')}}" + '/' + id,
        dataType: 'json',
        data:new FormData(this),
        cache : false,
        processData: false,
        contentType: false,
           processData: false,
           success: function(data) {
            //  $("#show_response").html(response);
             if(data.status == 1)
            {
              spinner.hide();
              // alert('hh');
              Swal.fire(
                'Good job!',
                'Notication Updated!',
                'success'
              )
              location.reload();
            }
            if(data.status == 0)
            {
              spinner.hide();
              toastr["error"](data.message, "Error");
            }
        },
       });
      });
    </script>
@endsection
