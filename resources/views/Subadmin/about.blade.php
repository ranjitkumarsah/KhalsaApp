@extends('Subadmin.layouts.App')
@section('about', 'active')
@section('main_section')
    <style>
        button.btn.btn-primary, a.btn-primary{
            background-color: #ED9B2D !important;
            color:black;
        }
    </style>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2 pb-5">
                    <div class="col-12 text-center">
                        <div class="heading mb-3">
                            <h1 class="mb-4 d-inline">About Us</h1>
                            <a href="{{url('about-us')}}" target="_blank" class="btn btn-primary float-right">View Page</a>
                        </div>
                        <form id="about-form">
                            @csrf
                            @if(session()->has('message'))
                                <div class="alert alert-success">
                                    {{ session()->get('message') }}
                                </div>
                            @endif
                            <textarea id="editor" name="about">{!! @$about->about !!}</textarea>
                            <div class="text-center mt-4">                          
			                    <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    
    <script src="https://cdn.ckeditor.com/ckeditor5/38.0.1/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .then( editor => {
            // console.log( editor );
        })
        .catch( error => {
            console.error( error );
        });
    </script>
    <script type="text/javascript">
        $('#about-form').on('submit', function(event){
            event.preventDefault();
            var spinner = $('#loader');
            spinner.show();
            $.ajax({
                type: "POST",
                url: "{{url('Subadmin/about_save')}}",
                dataType: 'json',
                data:$(this).serialize(),
                success: function(data) {
                    //  $("#show_response").html(response);
                    if(data.status == 1)
                    {
                        // alert('hh');
                        spinner.hide();
                        Swal.fire(
                            'Good job!',
                            'About Added!',
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
