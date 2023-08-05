@extends('Admin.layouts.App')
@section('notification','menu-open')
@section('view_notifications','active')

<!-- Content Wrapper. Contains page content -->
@section('main_section')
<style>
      .select2-container--default .select2-selection--single {
      background-color: #fff;
      border: 1px solid #0b528f;
      border-radius: 4px;
      height: 38px;
    }
  span.select2-selection.select2-selection--multiple {
    height: 100%;
    border: 1px solid #0b528f;
  }

  .select2-container--default .select2-selection--multiple .select2-selection__choice__display {
    padding: 15px !important
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

  .card-footer {
    background-color: white !important;
  }

  a.btn.btn-primary.back_btn {
    background-color: #ED9B2D;
    color: black;
  }

  textarea#description {
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
  <blade media|%20(max-width%3A992px)%20%7B>form#sub-admin-form {
    margin-left: 244px;
  }
  }

  <blade media|(min-width%3A280px)%20and%20(max-width%3A767px)%20%7B>textarea#description {
    width: 100%;
    height: 40px !important;
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

  span.select2-selection__choice__display {
    /* background-color: #E13C06 !important; */
    color: #000
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
          <a href="{{ url('Admin/view_notifications') }}" class="btn btn-primary back_btn">Back</a>
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
                      <label for="email">Title: <span class="text-danger">*</span></label>
                      <input type="text" class="form-control" id="title" placeholder="Enter  Title" name="title">
                    </div>
                  </div>

                  {{-- <div class="col=lg-6 col-md-6 col-sm-12">
                        <div class="form-group">
                          <label for="email">Select Category: </label><br>
                          <select name="category" id="category" placeholder="Select Category" style="width: 100%;height: 37px;">
                          <option value="">Select</option>
                          <option value="Subadmin">Subadmin</option>
                          <option value="Sewapartner">Sewapartner</option>
                          <option value="Volunteer">Volunteer</option>
                          <option value="Card_Holder">Card Holder</option>
                          </select>
                       </div>
                      </div> --}}

                  <div class="col=lg-6 col-md-6 col-sm-12">
                    <div class="form-group">
                      <label for="email">Select Category: <span class="text-danger">*</span></label><br>
                      <select class="form-control js-example-basic-multiple" name="category[]"
                        placeholder="Select Category" multiple="multiple" style="width: 100%;height:37px;">
                        {{-- <option value="All">All</option> --}}
                        <option value="Subadmin">Subadmin</option>
                        <option value="Sewapartner">Sewapartner</option>
                        <option value="Volunteer">Volunteer</option>
                        <option value="Card_Holder">Card Holder</option>

                      </select>
                    </div>
                  </div>

                </div>

                <div class="row">
                  <div class="col=lg-6 col-md-6 col-sm-12">

                    <label>Description: <span class="text-danger">*</span></label>
                    <textarea id="description" placeholder="Enter  Description" name="description" rows="10" cols="30"
                      style="height:116px;"></textarea>

                  </div>
                  <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                      <label for="pwd">Image(1000 × 1000):</label>
                      <input type="file" class="form-control" id="image" name="image">
                    </div>
                    <div class="form-group">
                      <label for="location">Location:</label>
                      <select name="location" class="form-control" placeholder="Select location" id="location">
                        <option value="">Select Location</option>
                        @foreach($cities as $name)
                          <option value="{{ $name->city }}">{{ $name->city }}</option>
                        @endforeach
                      </select>
                      <!-- <input type="text"  placeholder="Enter location" class="form-control" id="location"  name="location"> -->
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
  $('#location').select2({
      placeholder:'Select City',
      minimumResultsForSearch:1,
    });
  $('.js-example-basic-multiple').select2();
  $('#sub-admin-form').on('submit', function (event) {
    event.preventDefault();
    var spinner = $('#loader');
            spinner.show();
    const fd = $('#sub-admin-form').serialize();
    // console.log(fd);
    // return false;
    $.ajax({
      type: "POST",
      url: "{{ url('Admin/savenotifications') }}",
      dataType: 'json',
      data: new FormData(this),
      cache: false,
      processData: false,
      contentType: false,
      processData: false,
      success: function (data) {
        //  $("#show_response").html(response);
        if (data.status == 1) {
          // alert('hh');
          spinner.hide();
          Swal.fire(
            'Good job!',
            'Notication Added!',
            'success'
          )
          location.reload();
        }
        if (data.status == 0) {
          spinner.hide();
          toastr["error"](data.message, "Error");
        }
      },
    });
  });
</script>
@endsection