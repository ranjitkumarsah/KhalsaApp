@extends('Sewapartner.layouts.App')
@section('notification','menu-open')
@section('view_notifications','active')

  <!-- Content Wrapper. Contains page content -->
  @section('main_section')
  <style>
    .select2-container--default .select2-selection--multiple .select2-selection__choice__display {
      padding: 15px !important;
    }
    span.select2-selection.select2-selection--multiple {
    height: 38px;
    border: 1px solid #0b528f;
}
    textarea#description {
    width: 100%;
  }
    select#category {
      border: 1px solid #0b528f;
  }
  textarea#description {
      border: 1px solid #0b528f;
  }
    .card-footer{
      background-color:white !important;
    }
    a.btn.btn-primary.back_btn{
      background-color:#ED9B2D;
      color:black;
    }
    textarea#description{
      margin-top: 2px;
      height: 37px;
    }
    form#sub-admin-form {
        margin-left: 20px;
        margin-right: 20px;
    }
    button.btn.btn-primary {
        width: 22%;
        background-color: #ED9B2D
    }
    /* ui design */
    @media (max-width:992px) {
    form#sub-admin-form {
        margin-left: 244px;
    }
  }
  @media(min-width:280px) and (max-width:767px) {
    textarea#description {
      width: 100%;
      height:40px !important;
    }
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
  span.select2-selection__choice__display  {
      background-color: #E13C06 !important;
    }
    .select2-container--default .select2-selection--single {
            background-color: #fff;
            border: 1px solid #0b528f;
            border-radius: 4px;
            height: 38px;
        }
    /* ui design */
  </style>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-md-6 col-sm-6">
            <h1>Add Notification</h1>
          </div>
          <div class="col-6 col-sm-6 text-right">
            <a href="{{url('Sewapartner/notification_request')}}"class="btn btn-primary back_btn">Back</a>
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
                          <label for="email">Title:</label>
                          <input type="text" class="form-control" id="title" placeholder="Enter  Title" name="title">
                        </div> 
                      </div>
                     
                      {{-- <div class="col=lg-6 col-md-6 col-sm-12">
                        <div class="form-group">
                          <label for="email">Select Category:</label><br>
                          <select name="category" id="category" style="width: 100%;height: 37px;">
                          <option value="">Select</option>
                          <option value="Subadmin">Subadmin</option>
                          <option value="Sewapartner">Sewapartner</option>
                          <option value="Volunteer">Volunteer</option>
                          <option value="Card_Holder">Card Holder</option>
                          </select>
                       </div>
                      </div> --}}
                      
                      <div class="col=lg-6 col-md-6 col-sm-12">
                         
                        <label >Description:</label>
                        <textarea  id="description" placeholder="Enter  Description" name="description" rows="10"   cols="30" style="height:116px;"></textarea>
                       
                    </div>

                    </div>

                    <div class="row">
                      
                      <div class="col-md-6 col-sm-12">
                          <div class="form-group">
                          <label for="pwd">Image(1000 × 1000):</label>
                          <input type="file" class="form-control" id="image"  name="image" accept="image/*">
                        </div>
                      </div>
                      <div class="col=lg-6 col-md-6 col-sm-12">
                        <div class="form-group">
                          <label for="email">Location:</label>
                          <select name="location" class="form-control" placeholder="Select location" id="location">
                        <option value="">Select Location</option>
                        @foreach($cities as $name)
                          <option value="{{ $name->id }}">{{ $name->city }}</option>
                        @endforeach
                      </select>
                       
                        </div> 
                      </div>
                    </div>
                  
                  
                    </div>

	             <div class="card-footer text-center">                          
			 <button type="submit" class="btn btn-primary" style="margin-left: 20px;">Send Notification</button>
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
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script type="text/javascript">
  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
  $('.js-example-basic-multiple').select2();
  $('#location').select2({
    placeholder:'Select Location',
    minimumResultsForSearch:1,
  });
  $('#sub-admin-form').on('submit', function(event){
      event.preventDefault();
      var spinner = $('#loader');
            spinner.show();
     const fd = $('#sub-admin-form').serialize();
     // console.log(fd);
     // return false;
     $.ajax({
       type: "POST",
        url: "{{url('Sewapartner/saveaddnotifications')}}",
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
              // alert('hh');
              spinner.hide();
              Swal.fire(
                'Good job!',
                'Notication Added!',
                'success'
              )
              location.reload();
            }
            if(data.status == 0)
            {
              spinner.hide();
              if(data.message == 'The image has invalid image dimensions.') {
                toastr["error"]('The image has invalid dimensions.', "Error");
              } else {
                toastr["error"](data.message, "Error");
              }
            }
        },
       });
      });
    </script>
@endsection
