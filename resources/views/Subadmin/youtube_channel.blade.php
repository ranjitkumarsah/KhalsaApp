@extends('Subadmin.layouts.App')
@section('youtube_channel','menu-open')
@section('youtube_channel','active')

  <!-- Content Wrapper. Contains page content -->
  @section('main_section')
  <style>
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
    /* ui design */
  </style>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-md-6 col-sm-6">
            <h1>Add Youtube Channel</h1>
          </div>
          <div class="col-6 col-sm-6 text-right">
            <a href="{{url('Subadmin/dashboard')}}"class="btn btn-primary back_btn">Back</a>
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
                          <label for="email">Youtube Channel Link:</label>
                          <input type="text" class="form-control" id="title" placeholder="Enter  Link" name="link" value="{{@$youtube->youtube_link}}">
                        </div> 
                      </div>
                      <div class="col=lg-6 col-md-6 col-sm-12">
                        <div class="form-group">
                          <label for="pwd">Image(512 × 512):</label>
                          <input type="file" class="form-control" id="image"  name="image">
                          <img src="{{@$youtube->image}}" style="height:50px;width:50px;">
                        </div>
                      </div>
                    </div>

                    {{-- <div class="row">
                      <div class="col=lg-6 col-md-6 col-sm-12">
                         
                          <label >Description:</label>
                          <textarea  id="description" placeholder="Enter  Description" name="description" rows="4"   cols="65" ></textarea>
                         
                      </div>
                      <div class="col-md-6 col-sm-12">
                          <div class="form-group">
                          <label for="pwd">Image:</label>
                          <input type="file" class="form-control" id="image"  name="image">
                        </div>
                      </div>
                    </div> --}}

                  
                    </div>

	             <div class="card-footer text-center">                          
			 <button type="submit" class="btn btn-primary" style="margin-left: 20px;">Submit</button>
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
   
     $.ajax({
       type: "POST",
        url: "{{url('Subadmin/saveyoutube_channel')}}",
        dataType: 'json',
        data:new FormData(this),
        cache : false,
        processData: false,
        contentType: false,
           processData: false,
           success: function(data) {
           
             if(data.status == 1)
            {
              // alert('hh');
              spinner.hide();
              Swal.fire(
                'Good job!',
                'Youtube Channel Link Added!',
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
