@extends('Admin.layouts.App')
@section('volunteers','menu-open')
@section('viewvolunteer','active')

  <!-- Content Wrapper. Contains page content -->
  @section('main_section')
  
  <style>

.select2-container--default .select2-selection--single {
      background-color: #fff;
      border: 1px solid #0b528f;
      border-radius: 4px;
      height: 38px;
    }
     a.btn.btn-primary.back_btn{
      background-color:#ED9B2D;
      color:black;
    }
      button#submitForm {
        background-color: #ED9B2D;
        color:black;
      }
      @media only screen and (min-width: 1200px) {
        button#submitForm {
            width: 22%;
        }
      }
      @media (max-width:992px) {
     form#form {
     margin-left: 243px;
     }
    }
    @media(min-width:280px) and (max-width:767px) {
     form#form{
           margin-left: 0px !important;
         }
    .card-body {
        width: 100% !important;
        }
    button#submitForm {
        width: 40%;
    }
     }
 </style>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Volunteer</h1>
          </div>
            <div class="col-6 col-sm-6 text-right">
              <a href="{{url('Admin/view_volunteer')}}"class="btn btn-primary back_btn">Back</a>
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
    <section class="content pb-5">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary" style="font-size: 0.9rem;">
            
              <!-- /.card-header -->
              <!-- form start -->
              <form action="/Admin/savevolunteer" method="POST" enctype="multipart/form-data" id="form">
                @csrf
                <div class="card-body">
                <div class="row">
                  <div class="col=lg-6 col-md-6 col-sm-12">
                    <div class="form-group">
                      <label for="name">Name <span class="text-danger">*</span></label>
                      <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Enter name" >
                      @error('name')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('name') }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="form-group">
                      <label for="name_punjabi">ਨਾਮ <span class="text-danger">*</span></label>
                      <input type="text" name="name_punjabi" class="form-control @error('name_punjabi') is-invalid @enderror" id="name_punjabi" placeholder="ਨਾਮ ਦਰਜ ਕਰੋ" >
                      @error('name')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('name_punjabi') }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="form-group">
                      <label for="name">Username <span class="text-danger">*</span></label>
                      <input type="text" name="username" class="form-control" id="username" placeholder="Enter username">
                      <!-- <label for="name">Email</label>
                      <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" >
                      @error('email')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                      </span>
                      @enderror -->
                    </div>
                  </div>
                  <div class="col=lg-6 col-md-6 col-sm-12">
                    <div class="form-group">
                      <label for="name">Contact Number <span class="text-danger">*</span></label>
                      <input type="text" name="contact_number" placeholder="Enter Contact number" class="form-control @error('contact_number') is-invalid @enderror" id="contact_number" onkeypress="return isNumber(event)" maxlength="10">
                      @error('contact_number')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('contact_number') }}</strong>
                        </span>
                      @enderror
                      <!-- <label for="name">Email</label>
                      <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" >
                      @error('email')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                      </span>
                      @enderror -->
                    
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col=lg-6 col-md-6 col-sm-12">
                    <div class="form-group">
                      <!-- <label for="name">Password</label>
                      <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" >
                      @error('password')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                      </span>
                      @enderror -->
                      <label for="name">Email <span class="text-danger">*</span></label>
                      <input type="email" name="email" placeholder="Enter email" class="form-control @error('email') is-invalid @enderror" id="email" >
                      @error('email')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                      </span>
                      @enderror
                      <!--  -->
                    </div>
                  </div>
                  <div class="col=lg-6 col-md-6 col-sm-12">
                    <div class="form-group">
                    <label for="name">Password <span class="text-danger">*</span></label>
                    <input type="password" name="password" placeholder="Enter password" class="form-control @error('password') is-invalid @enderror" id="password" >
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $errors->first('password') }}</strong>
                    </span>
                    @enderror
                    <!-- <label for="name">Aadhaar Card</label>
                    <input type="file" name="aadhaar_card" class="form-control @error('aadhaar_card') is-invalid @enderror" id="aadhaar_card" >
                    @error('aadhaar_card')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $errors->first('aadhaar_card') }}</strong>
                    </span>
                    @enderror -->
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col=lg-6 col-md-6 col-sm-12">
                    <div class="form-group">
                      <label for="name">Voter Card <span class="text-danger">*</span></label>
                      <input type="file" name="vote_card" class="form-control @error('vote_card') is-invalid @enderror" id="vote_card" accept="image/*">
                      @error('vote_card')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('vote_card') }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>
                  <div class="col=lg-6 col-md-6 col-sm-12">
                    <div class="form-group">
                    <label for="name">Profile Picture </label>
                    <input type="file" name="profile_pic" class="form-control @error('profile_pic') is-invalid @enderror" id="profile_pic" accept="image/*">
                    @error('profile_pic')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $errors->first('profile_pic') }}</strong>
                    </span>
                    @enderror
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-3 col-sm-12">
                    <label for="name">Aadhaar Card Front Side <span class="text-danger">*</span></label>
                    <input type="file" name="aadhaar_card_front" class="form-control @error('aadhaar_card_front') is-invalid @enderror" id="aadhaar_card_front" accept="image/*">
                    @error('aadhaar_card_front')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('aadhaar_card_front') }}</strong>
                      </span>
                    @enderror
                  </div>
                  <div class="col-lg-3 col-md-3 col-sm-12">
                    <label for="name">Aadhaar Card Back Side <span class="text-danger">*</span></label>
                    <input type="file" name="aadhaar_card_back" class="form-control @error('aadhaar_card_back') is-invalid @enderror" id="aadhaar_card_back" accept="image/*">
                    @error('aadhaar_card_back')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('aadhaar_card_back') }}</strong>
                      </span>
                    @enderror
                  </div>
                  <div class="col=lg-6 col-md-6 col-sm-12">
                    <div class="form-group">
                      <label for="name">Address <span class="text-danger">*</span></label>
                    <input type="text" name="address" placeholder="Enter address" class="form-control @error('address') is-invalid @enderror" id="address" >
                    @error('address')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('address') }}</strong>
                    </span>
                    @enderror
                    </div>
                  </div>
                  <div class="col=lg-6 col-md-6 col-sm-12">
                    <div class="form-group">
                      <label for="name">ਪਤਾ <span class="text-danger">*</span></label>
                    <input type="text" name="address_punjabi" placeholder="ਪਤਾ ਦਰਜ ਕਰੋ" class="form-control @error('address_punjabi') is-invalid @enderror" id="address_punjabi" >
                    @error('address_punjabi')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('address_punjabi') }}</strong>
                    </span>
                    @enderror
                    </div>
                  </div>
                  <div class="col=lg-6 col-md-6 col-sm-12">
                    <div class="form-group">
                      <label for="name">Landmark <span class="text-danger">*</span></label>
                      <input type="text" name="landmark" placeholder="Enter landmark" class="form-control @error('landmark') is-invalid @enderror" id="landmark">
                      @error('landmark')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('landmark') }}</strong>
                      </span>
                      @enderror
                    </div>

                  </div>
			            
                  <div class="col=lg-6 col-md-6 col-sm-12">
                    <div class="form-group">
                      <label for=""> Referred By</label>
                      <select class="form-control" name="reference" id="reference">
                        <option value="">Select</option>
                        @foreach($volunteers as $volunteer)
                        <option value="{{$volunteer->name}}">{{$volunteer->name}}</option>
                        @endforeach
                          
                      </select>
                    </div>
                  </div>
                      
                  <div class="col=lg-6 col-md-6 col-sm-12">
                    <div class="form-group">
                    <label for="name">City <span class="text-danger">*</span></label>
                    <!-- <input type="text" name="village" placeholder="Enter village/city" class="form-control @error('village') is-invalid @enderror" id="village"> -->
                    
                    <select name="village" class="form-control @error('village') is-invalid @enderror" placeholder="Select village/city" id="village">
                          <option value="">Select city</option>
                        @foreach($cities as $name)
                        <option value="{{$name->city}}">{{$name->city}}</option>
                        @endforeach
                            </select>
                    
                      @error('village')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('village') }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>
                </div>

                 <div class="text-center">
                  <button type="submit" class="btn btn-primary"  id="submitForm">Submit</button>
                </div>

              
                </div>
                <!-- /.card-body -->
               
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
  $(document).ready(function() {
  
    $('#form').on('submit', function (e) {
      // alert('hh');
      var spinner = $('#loader');
            spinner.show();
    e.preventDefault();
    var data = new FormData(this);
   
      $.ajax({
          type: 'POST',
          url: '{{url('Admin/savevolunteer')}}',
          dataType: 'json',
          data: data,  
          cache: false,
          contentType: false,
          processData: false,      
          success: function (data) {
            
            if(data.status == 1)
            {
              spinner.hide();
              // location.reload();
              Swal.fire(
                'Good job!',
                'Volunteer Added!',
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
          error: function (data) {
              // alert(data);
          }
      });
    });
  });
  </script>
   <script>
    function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}
$('#village').select2({
      placeholder:'Select City',
      minimumResultsForSearch:1,
    });
  </script>
@endsection
