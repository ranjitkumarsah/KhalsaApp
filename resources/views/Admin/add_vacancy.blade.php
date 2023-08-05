@extends('Admin.layouts.App')
@section('card','menu-open')
@section('vacancies','active')
<style>
        .select2-container--default .select2-selection--single {
      background-color: #fff ;
      border: 1px solid #0b528f !important;
      border-radius: 4px;
      height: 38px !important;
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
      /* margin-top: 2px; */
      height: 68%;
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
@section('main_section')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Add Vacancy</h1>
                    </div>
                    <div class="col-6 col-sm-6 text-right">
                        <a href="{{url('Admin/vacancies')}}"class="btn btn-primary back_btn">Back</a>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <section class="content pb-5">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form id="form">
                                    @if(session()->has('message'))
                                        <div class="alert alert-success">
                                            {{ session()->get('message') }}
                                        </div>
                                    @endif
                                
                                    <div class="card-body">
                                        @csrf
                                        
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label for="title">Title: <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" id="title" placeholder="Enter  Title" name="title">
                                                </div> 
                                                <div class="form-group">
                                                    <label for="eligibility">Eligibility: <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" id="eligibility" placeholder="Enter  eligibility" name="eligibility">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                                            
                                                    <label for="description">Description: <span class="text-danger">*</span></label>
                                                    <textarea  id="description" placeholder="Enter  Description" class="rounded form-control" name="description" rows="5"></textarea>
                                                </div> 
                                            </div>
                                            
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label for="location">Location: <span class="text-danger">*</span> </label>
                                                    <!-- <input type="text" name="location" id="location" class="form-control" placeholder="Enter location"> -->

                                                    <select name="location" class="form-control" placeholder="Select Location" id="location">
                                                        <option value="">Select city</option>
                                                        @foreach($cities as $name)
                                                        <option value="{{$name->city}}">{{$name->city}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label for="salary">Salary: <span class="text-danger">*</span></label>
                                                    <input type="number"  name="salary" id="salary" class="form-control" placeholder="Enter salary">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer text-center">                          
                                        <button type="submit" class="btn btn-primary" style="margin-left: 20px;">Add Vacancy</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script type="text/javascript">

        $('#form').on('submit', function(event){
            event.preventDefault();
            var spinner = $('#loader');
            spinner.show();
            let formData = $(this).serialize();

            $.ajax({
                type: "POST",
                url: "{{url('Admin/save_vacancy')}}",
                dataType: 'json',
                data:formData,
                success: function(data) {
                    if(data.status == 1) {
                        spinner.hide();
                        Swal.fire(
                            'Good job!',
                            'Vacancy Added!',
                            'success'
                        )
                        location.reload();
                    }
                    if(data.status == 0) {
                        spinner.hide();
                        toastr["error"](data.message, "Error");
                    }
                },
            });
        });
        $('#location').select2({
      placeholder:'Select City',
      minimumResultsForSearch:1,
    });
    </script>
@endsection    