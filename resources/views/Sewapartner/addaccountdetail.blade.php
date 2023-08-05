@extends('Sewapartner.layouts.App')
@section('card','menu-open')
@section('viewconsultation','active')

  <!-- Content Wrapper. Contains page content -->
  @section('main_section')
<style>
  .sub-entry {
    width: 50%;
    float:left;
}

    .hide {
            display: none;
        }
        .show {
            display: block;
        }
    input#popup {
        height: 39px;
        width: 100%;
    }
    @media (max-width:992px) {
     
   }
   @media only screen and (min-width: 1200px) {
    form#sewa-form {
        margin-left: 20px;
        margin-right: 20px;
    }
  }
   @media(min-width:280px) and (max-width:767px) {
    /* form#sewa-form {
          margin-left: 16px;
      }
    */
    
  }

  </style>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Consultation</h1>
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
            <div class="card card-primary">
              
              <div class="sub-entry">

              <form id="accountdetail_form" action="{{route('accountdetail.update',[$editdata->id])}}" method="post">
                @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                @endif
                <div class="card-body">
                    @csrf

                    <div class="row">
                      <div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="form-group">
                          <label for="pwd">Description:</label>
                         
                          </div>
                      </div>
                      <div class="col-lg-8 col-md-8 col-sm-12">
                      <input type="text" class="form-control" id="description" placeholder="Enter description" name="description">
                      </div>
                     
                    </div>

                    <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-12">
                          <div class="form-group">
                          <label for="email">Charges:</label>
                         
                          </div>
                      </div>
                      <div class="col-lg-8 col-md-8 col-sm-12">
                    <input type="text" class="form-control" id="charges" placeholder="Enter  charges" name="charges" >
                    </div>
                    </div>
                   

                    <div class="row">
                      <div class="col-lg-4 col-md-4 col-sm-12">
                          <div class="form-group">
                          <label for="email">Discount:</label>
                          
                        </div>
                      </div>
                      <div class="col-lg-8 col-md-8 col-sm-12">
                      <input type="text" class="form-control" id="discount" placeholder="Enter discount" name="discount">
                    </div>
                     
                    </div>
                   
                    <div class="row">
                      <div class="col-lg-4 col-md-4 col-sm-12">
                          <div class="form-group">
                          <label for="email">Balance:</label>
                          
                        </div>
                      </div>
                      
                      <div class="col-lg-8 col-md-8 col-sm-12">
                      <input type="text" class="form-control" id="balance" name="balance"  readonly>
                    </div>
                     
                    </div>

                      <div class="row">
                      <div class="col-lg-8 col-md-6 col-sm-12">
                          <div class="form-group">
                          <!-- <label for="subject">Balance:</label> -->
                          <input type="hidden" class="form-control" id="balance" placeholder="Enter landmark" name="balance" >
                          </div>
                      </div>
                     
                    </div>

	             <div class="text-left">                          
			 <button type="submit" class="btn btn-primary">Submit</button>
                     </div>
                </div>
                </form> 
              </div>
             </div><br>
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
  <footer class="main-footer">
    <strong>Copyright &copy; 2022 <a href="https://protolabzit.com/" target="_blank">Protolabz eServices</a>.</strong>
    All rights reserved.
    {{-- <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.2.0-rc
    </div> --}}
  </footer>

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

  
 
@endsection
