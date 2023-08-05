@extends('Subadmin.layouts.App')
@section('card','menu-open')
@section('vacancies','active')
<style>
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
                        <h1>Edit Vacancy</h1>
                    </div>
                    <div class="col-6 col-sm-6 text-right">
                        <a href="{{url('Subadmin/vacancies')}}"class="btn btn-primary back_btn">Back</a>
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
                                                    <label for="title">Title:</label>
                                                    <input type="text" class="form-control" id="title" placeholder="Enter  Title" name="title" value="{{$vacancy->title}}" />
                                                    <input type="hidden" name="id" id="vacancy_id" value="{{$vacancy->id}}">
                                                </div> 
                                                <div class="form-group">
                                                    <label for="eligibility">Eligibility:</label>
                                                    <input type="text" class="form-control" id="eligibility" placeholder="Enter  eligibility" name="eligibility" value="{{$vacancy->eligibility}}" />
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                                            
                                                    <label for="description">Description:</label>
                                                    <textarea  id="description" placeholder="Enter  Description" class="rounded form-control" name="description" rows="5">{{$vacancy->description}}</textarea>
                                                </div> 
                                            </div>
                                            
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label for="location">Location</label>
                                                    
                                                    <select name="location" class="form-control " placeholder="Select location" id="location">
                              <option value="">Select location</option>
                            @foreach($cities as $name)
                            <option value="{{$name->city}}" <?php if($name->city == $vacancy->location) { ?> selected="selected"<?php } ?>>{{$name->city}}</option>
                            @endforeach
                                </select>
                                                    <!-- <input type="text" name="location" id="location" class="form-control" placeholder="Enter location" value="{{$vacancy->location}}"/> -->
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label for="salary">Salary</label>
                                                    <input type="number"  name="salary" id="salary" class="form-control" placeholder="Enter salary" value="{{$vacancy->salary}}"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer text-center">                          
                                        <button type="submit" class="btn btn-primary" style="margin-left: 20px;">Update Vacancy</button>
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
    <script type="text/javascript">

        $('#form').on('submit', function(event){
            event.preventDefault();
            var id = $('#vacancy_id').val();
            let formData = $(this).serialize();
            var spinner = $('#loader');
            spinner.show();
            $.ajax({
                type: "POST",
                url: "{{url('Subadmin/update_vacancy')}}" + '/' + id,
                dataType: 'json',
                data:formData,
                success: function(data) {
                    if(data.status == 1) {
                        spinner.hide();
                        Swal.fire(
                            'Good job!',
                            'Vacancy Updated!',
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
    </script>
@endsection    