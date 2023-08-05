@extends('Subadmin.layouts.App')
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
            <h1>Edit Volunteers</h1>
          </div>
          <div class="col-6 col-sm-6 text-right">
            <a href="{{url('Subadmin/view_volunteer')}}"class="btn btn-primary back_btn">Back</a>
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
            <div class="card card-primary" style="font-size: 0.9rem">
            
              <!-- /.card-header -->
              <!-- form start -->
              <form action="/SubAdmin/updatevolunteer" method="POST" enctype="multipart/form-data" id="form">
                @csrf
                <div class="card-body">
                <div class="row">
                      <div class="col=lg-6 col-md-6 col-sm-12">
                        <div class="form-group">
                          <label for="name">Name</label>
                          <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" value="{{$volunteer->name}}">
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
                          <label for="name_punjabi">ਨਾਮ</label>
                          <input type="text" name="name_punjabi" class="form-control @error('name_punjabi') is-invalid @enderror" id="name_punjabi" placeholder="ਨਾਮ ਦਰਜ ਕਰੋ" value="{{$volunteer->name_punjabi}}">
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
                      <label for="name">Email</label>
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
                      <label for="name">Password</label>
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
                    <label for="name">Contact Number</label>
                    <input type="number" name="contact_number" class="form-control @error('contact_number') is-invalid @enderror" id="contact_number" value="{{$volunteer->contact_number}}">
                    @error('contact_number')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $errors->first('contact_number') }}</strong>
                    </span>
                    @enderror
                  </div>
                      </div>
                  <div class="col=lg-3 col-md-3 col-sm-12">
                    <div class="form-group">
                      <label for="name">Aadhaar Card Front Side</label>
                      <input type="file" name="newaadhaar_card_front" class="form-control @error('aadhaar_card_front') is-invalid @enderror" id="aadhaar_card_front" value="{{$volunteer->aadhaar_card_front}}">
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
                      <label for="name">Aadhaar Card Back Side</label>
                      <input type="file" name="newaadhaar_card_back" class="form-control @error('aadhaar_card_back') is-invalid @enderror" id="aadhaar_card_back" value="{{$volunteer->aadhaar_card_back}}">
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
                    <label for="name">Voter Card</label>
                    <input type="file" name="newvote_card" class="form-control @error('vote_card') is-invalid @enderror" id="vote_card" value="{{$volunteer->vote_card}}">
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
                          <input type="file" name="newprofile_pic" class="form-control @error('profile_pic') is-invalid @enderror" id="profile_pic" value="{{$volunteer->profile_pic}}">
                          <input type="hidden" value ="{{$volunteer->profile_pic}}" name="oldprofile_pic"/>
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
                            <label for="name">City</label>

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
                              <label for="name">Landmark</label>
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
                        <label for="name">Address</label>
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
                      <label for="name">ਪਤਾ</label>
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
          url: '{{url('Subadmin/updatevolunteer')}}' + '/' + id,
          dataType: 'json',
          data: data,  
          cache: false,
          contentType: false,
          processData: false,      
          success: function (data) {
            
            if(data.status == 1)
            {
              // location.reload();
              spinner.hide();
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
  $('#village').select2({
      placeholder:'Select City',
      minimumResultsForSearch:1,
    });
  </script>
@endsection
