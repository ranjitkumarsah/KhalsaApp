@extends('Sewapartner.layouts.App')
@section('customer_support','menu-open')
@section('customer_support','active')

  <!-- Content Wrapper. Contains page content -->
  @section('main_section')
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
            <h1>Customer Support</h1>
          </div>
          <div class="col-6 col-sm-6 text-right">
            <a href="{{url('Sewapartner/dashboard')}}"class="btn btn-primary back_btn">Back</a>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            
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
            <div class="card card-primary">
            
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
                          <label for="email">Contact Number:</label>
                          {{-- <input type="number" class="form-control" id="title"  name="contact_number" value="{{$support->phone_number}}" readonly> --}}
                          <a href="tel:{{@$support->phone_number}}" style="margin-left: 42px;font-size: xx-large">{{$support->phone_number}}</a>
                        </div> 
                      </div>
                     
                    

                     
                    </div>

                  
                    

                  
                    </div>

	             <div class="card-footer text-center">                          
			 {{-- <button type="submit" class="btn btn-primary" style="margin-left: 20px;">Send</button> --}}
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
        url: "{{url('Sewapartner/saveblood_request')}}",
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
                'Blood Request Added!',
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
