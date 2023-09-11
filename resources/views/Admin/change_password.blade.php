@extends('Admin.layouts.App')
@section('change_password', 'active')
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
                    <div class="col-12 ">
                        <div class="heading mb-3 text-center">
                            <h1 class="mb-4 ">Change Password</h1>
                            
                        </div>
                        <form id="change_password_form">
                            @csrf
                            @if(session()->has('message'))
                                <div class="alert alert-success">
                                    {{ session()->get('message') }}
                                </div>
                            @endif
                            <div class="row justify-content-center ">
                                <div class="col-md-8">
                                    <div class="card ">
                                        <div class="card-body">
                                            <div class="row ">
                                                <div class="col-12 form-group">
                                                    <label for="current_password">Current Password: <span class="text-danger">*</span></label>
                                                    <input type="password" class="form-control" name="current_password" id="current_password" placeholder="Current Password">
                                                    
                                                    <i class="material-icons toggle-password" id="togglePassword" style="position:absolute;top: 57%;right: 4%;cursor: pointer;">visibility</i>
                                                </div>
                                                <div class="col-12 form-group">
                                                    <label for="new_password">New Password: <span class="text-danger">*</span></label>
                                                    <input type="password" class="form-control" name="new_password" id="new_password" placeholder="New Password">
                                                    <i class="material-icons toggle-password" id="togglePassword" style="position:absolute;top: 57%;right: 4%;cursor: pointer;">visibility</i>
                                                </div>
                                                <div class="col-12 form-group">
                                                    <label for="new_password_confirmation">Confirm New Password: <span class="text-danger">*</span></label>
                                                    <input type="password" class="form-control" name="new_password_confirmation" id="new_password_confirmation" placeholder="Confirm New Password">
                                                    <i class="material-icons toggle-password" id="togglePassword" style="position:absolute;top: 57%;right: 4%;cursor: pointer;">visibility</i>
                                                </div>
                                            </div>
                                        </div>
                                    
                                    </div>
                                </div>
                            </div>
                           
                            
                            <div class="text-center mt-4">                          
			                    <button type="submit" class="btn btn-primary">Change Password</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    

    <script type="text/javascript">

        const togglePasswordButtons = document.querySelectorAll('.toggle-password');
        
        togglePasswordButtons.forEach((button) => {
            const passwordInput = button.previousElementSibling; 

            let passwordVisible = false;

            button.addEventListener('click', () => {
            passwordVisible = !passwordVisible;
            if (passwordVisible) {
                passwordInput.setAttribute('type', 'text');
                button.textContent = 'visibility_off'; 
            } else {
                passwordInput.setAttribute('type', 'password');
                button.textContent = 'visibility'; 
            }
            });
        });




        $('#change_password_form').on('submit', function(event){
            event.preventDefault();
            var spinner = $('#loader');
            spinner.show();
           
            $.ajax({
                type: "POST",
                url: "{{url('Admin/change_password')}}",
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
                            'Password Changed!',
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
