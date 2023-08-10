@extends('Admin.layouts.App')
@section('volunteers','menu-open')
@section('viewvolunteer','active')

  <!-- Content Wrapper. Contains page content -->
  @section('main_section')
  <style>
      a.btn.btn-primary.back_btn{
        background-color:#ED9B2D;
        color:black;
      }
     button.btn.btn-primary {
          background-color: #ED9B2D !important;
          color: black;
          width: 22%;
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
     }
 </style>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Volunteer</h1>
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
              <form action="/Admin/updatevolunteer" method="POST" enctype="multipart/form-data" id="form">
                @csrf
                <div class="card-body">
                <div class="row">
                      <div class="col=lg-6 col-md-6 col-sm-12">
                        <div class="form-group">
                          <label for="name">Name <span class="text-danger">*</span></label>
                          <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" value="{{$volunteer->name}}" onkeypress="return inputOnlyText(event)">
                          @error('name')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                          </span>
                          @enderror
                        </div>
                        <input type="hidden" name="volunteer_id" class="form-control " id="volunteer_id" value="{{$volunteer->id}}">
                      </div>

                      <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group">
                          <label for="name_punjabi">ਨਾਮ <span class="text-danger">*</span></label>
                          <input type="text" name="name_punjabi" class="form-control @error('name_punjabi') is-invalid @enderror" id="name_punjabi" placeholder="ਨਾਮ ਦਰਜ ਕਰੋ" value="{{$volunteer->name_punjabi}}" onkeypress="return inputOnlyText(event)"> 
                          @error('name')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('name_punjabi') }}</strong>
                          </span>
                          @enderror
                        </div>
                      </div>

                     
                </div>

                <div class="row">
                <div class="col=lg-6 col-md-6 col-sm-12">
                      <div class="form-group">
                      <label for="name">Email <span class="text-danger">*</span></label>
                      <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" value="{{$volunteer->email}}">
                      @error('email')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                      </span>
                      @enderror
                    </div>
                      </div>
                      <div class="col=lg-6 col-md-6 col-sm-12">
                      <div class="form-group">
                      <label for="name">Password <span class="text-danger">*</span></label>
                      <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" value="{{$volunteer->numpassword}}">
                      @error('password')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                      </span>
                      @enderror
                    </div>
                      </div>
                      
                </div>

                <div class="row">
                <div class="col=lg-6 col-md-6 col-sm-12">
                      <div class="form-group">
                    <label for="name">Contact Number <span class="text-danger">*</span></label>
                    <input type="text" name="contact_number" class="form-control @error('contact_number') is-invalid @enderror" id="contact_number" value="{{$volunteer->contact_number}}" onkeypress="return validatePhone(event)">
                    @error('contact_number')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $errors->first('contact_number') }}</strong>
                    </span>
                    @enderror
                  </div>
                      </div>
                  <div class="col=lg-3 col-md-3 col-sm-12">
                    <div class="form-group">
                      <label for="name">Aadhaar Card Front Side <span class="text-danger">*</span></label>
                      <input type="file" name="newaadhaar_card_front" class="form-control @error('aadhaar_card_front') is-invalid @enderror" id="aadhaar_card_front" value="{{$volunteer->aadhaar_card_front}}" accept="image/*">
                      <input type="hidden" value ="{{$volunteer->aadhaar_card_front}}" name="oldaadhaar_card_front"/>
                      <a href="{{$volunteer->aadhaar_card_front}}" target="_blank" rel="noopener noreferrer">
                         <img src="{{$volunteer->aadhaar_card_front}}" alt=""  style="height: 50px; width: 50px;padding-top: 12px;">
                      </a>
                      @error('aadhaar_card_front')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('aadhaar_card_front') }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>
                  <div class="col=lg-3 col-md-3 col-sm-12">
                    <div class="form-group">
                      <label for="name">Aadhaar Card Back Side <span class="text-danger">*</span></label>
                      <input type="file" name="newaadhaar_card_back" class="form-control @error('aadhaar_card_back') is-invalid @enderror" id="aadhaar_card_back" value="{{$volunteer->aadhaar_card_back}}" accept="image/*">
                      <input type="hidden" value ="{{$volunteer->aadhaar_card_back}}" name="oldaadhaar_card_back"/>
                      <a href="{{$volunteer->aadhaar_card_back}}" target="_blank" rel="noopener noreferrer">
                      <img src="{{$volunteer->aadhaar_card_back}}" alt=""  style="height: 50px; width: 50px;padding-top: 12px;">
                       </a>
                      @error('aadhaar_card_back')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('aadhaar_card_back') }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>

                     
                </div>

                <div class="row">
                <div class="col=lg-6 col-md-6 col-sm-12">
                      <div class="form-group">
                    <label for="name">Voter Card <span class="text-danger">*</span></label>
                    <input type="file" name="newvote_card" class="form-control @error('vote_card') is-invalid @enderror" id="vote_card" value="{{$volunteer->vote_card}}" accept="image/*">
                    <input type="hidden" value ="{{$volunteer->vote_card}}" name="oldvote_card"/>
                    <a href="{{$volunteer->vote_card}}" target="_blank" rel="noopener noreferrer">
                    <img src="{{$volunteer->vote_card}}" alt=""  style="height: 50px; width: 50px;padding-top: 12px;">
                   </a>
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
                          <input type="file" name="newprofile_pic" class="form-control @error('profile_pic') is-invalid @enderror" id="profile_pic" value="{{$volunteer->profile_pic}}" accept="image/*">
                          <input type="hidden" value ="{{$volunteer->profile_pic}}" name="oldprofile_pic" />
                    <a href="{{$volunteer->profile_pic}}" target="_blank" rel="noopener noreferrer">

                          <img src="{{$volunteer->profile_pic}}" alt=""  style="height: 50px; width: 50px;padding-top: 12px;">
                   </a>
                          @error('profile_pic')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('profile_pic') }}</strong>
                          </span>
                          @enderror
                        </div>
                      </div>
                      
                </div>

                <div class="row">
                <div class="col=lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                            <label for="name">City <span class="text-danger">*</span></label>

                          <!-- <input type="text" name="village" class="form-control @error('village') is-invalid @enderror" id="village" value="{{$volunteer->village}}"> -->
                          

                          <select name="village" class="form-control @error('village') is-invalid @enderror" placeholder="Select village/city" id="village">
                              <option value="">Select city</option>
                            @foreach($cities as $name)
                            <option value="{{$name->city}}" <?php if($name->city == $volunteer->village) { ?> selected="selected"<?php } ?> >{{$name->city}}</option>
                            @endforeach
                                </select>
                          
                          
                          @error('village')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('village') }}</strong>
                          </span>
                          @enderror
                        </div>
                      </div>
                      <div class="col=lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                              <label for="name">Landmark <span class="text-danger">*</span></label>
                            <input type="text" name="landmark" class="form-control @error('landmark') is-invalid @enderror" id="landmark" value="{{$volunteer->landmark}}">
                            @error('landmark')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('landmark') }}</strong>
                            </span>
                            @enderror
                          </div>
                      </div>
                      <div class="col=lg-6 col-md-6 col-sm-12">
                      <div class="form-group">
                        <label for="name">Address <span class="text-danger">*</span></label>
                      <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" id="address" value="{{$volunteer->address}}">
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
                    <input type="text" name="address_punjabi" placeholder="ਪਤਾ ਦਰਜ ਕਰੋ" class="form-control @error('address_punjabi') is-invalid @enderror" id="address_punjabi" value="{{$volunteer->address_punjabi}}">
                    @error('address_punjabi')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('address_punjabi') }}</strong>
                    </span>
                    @enderror
                    </div>
                  </div>
                </div>
                
                </div>
                <!-- /.card-body -->
                <div class="card-footer text-center">
                  <button type="submit" class="btn btn-primary"  id="submitForm">Update</button>
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
  $(document).ready(function() {
  
    $('#form').on('submit', function (e) {
      // alert('hh');
    e.preventDefault();
    var spinner = $('#loader');
            spinner.show();
    var data = new FormData(this);
     id = $("#volunteer_id").val();
      $.ajax({
          type: 'POST',
          url: '{{url('Admin/updatevolunteer')}}' + '/' + id,
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
                'Volunteer Updated!',
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
  function inputOnlyText(event) {
      
      var keyCode = event.keyCode || event.which;

           
      if ((keyCode >= 65 && keyCode <= 90) ||  // A-Z
          (keyCode >= 97 && keyCode <= 122) || // a-z
          keyCode === 32 || // Space
          keyCode === 8 ||  // Backspace
          keyCode === 46) { // Delete
            return true;
      } else {
        event.preventDefault();
        return false;
      }
    }

    function validatePhone(event) {
            // Get the pressed key code
            var keyCode = event.keyCode || event.which;

            // Allow only digits (0-9)
            if (keyCode >= 48 && keyCode <= 57) {
                // Check the length of the input value
                var inputValue = event.target.value;
                if (inputValue.length >= 10) {
                    event.preventDefault();
                    return false;
                }
            } else {
                event.preventDefault();
                return false;
            }
    }
  </script>
@endsection
