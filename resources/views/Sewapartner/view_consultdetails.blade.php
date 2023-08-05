@extends('Sewapartner.layouts.App')
@section('services','menu-open')
@section('viewconsultation','active')
<style>
    /* input#description_text {
        width: 84%;
        margin-left: 39px;
    }
    select.form-control {
        width: 126%;
    } */
    a.btn.btn-danger.invoice_class {
      color: white;
      width: 14%;
      margin-right: 26px !important;
    }
    a.btn.btn-danger.cancel_btn{
      margin-right: 16px !important;
      width: 14%;
    }
  .invoice_btn {
    text-align: center;
    }
  section.content.second_section {
      background-color: #F5DDBD;
  }
  section.content.third_section {
      background-color: #F5DDBD;
  }
  a.btn.btn-danger.invoice_class{
    color: black;    
  }
  th#detail_class {
      padding-left: 8%;
  }
  b#name_class {
    color:#0b528f !important;
  }
  b.family_data {
    color:#0b528f !important;
  }
  b.child_data {
    color:#0b528f !important;
  }
  /* select.form-control {
      width: 149%;
  } */
  h4{
    color:#0b528f !important;
  }
  button#submitForm12{
    background-color: #ED9B2D !important;
    color: black;    
    margin-right:20px;
  }
  button#submitForm {
    background-color: #ED9B2D !important;
    color: black;
    width: 14%;
    margin: 32px 20px 20px 20px;
    
  }
  #show_table_data, #show_detailss{
    display: none;
  }
  .showdetailsform{
    display: none;
  }
  a.btn.btn-danger.invoice_class {
            color: white;
            width: 14%;
  }
  th{
    color:#0b528f !important;
    font-size: 0.9rem;
    text-align: center !important;
  }

</style>
  <!-- Content Wrapper. Contains page content -->
  @section('main_section')
 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 style="color:#0b528f !important;">View Consultation Details</h1>
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
            
              <!-- /.card-header -->
              <!-- form start -->
              <form id="consultation-form">
                @csrf
                <div class="card-body">
                @if(session()->has('idmessage'))
                  <div class="alert alert-danger">
                      {{ session()->get('idmessage') }}
                  </div>
                @endif
                <div class="row cardholder-submit-row">
                  <div class="form-group">
                    <label for="email">Enter Cardholder Id:</label>
                    <input type="text" class="form-control"  placeholder="Enter Cardholder id" name="id" id="sewa_id">
                  </div>
                  <button type="submit" class="btn btn-primary"  id="submitForm">Submit</button>
                </div>
                
             
                <div class="showdetailsform ml-4">
                  <div class="row">
                    {{--  @if($cardholdersdatas)--}}
                    <div class="col-lg-3 col-md-3 col-sm-12">
                      <b id="name_class"> Name:</b>&nbsp;&nbsp;
                      <span class="name_age_data"></span>  
                    </div>
                    {{-- @endif--}}
                    {{-- @if($cardholdersdatas) --}}
                    <div class="col-lg-3 col-md-3 col-sm-12">
                      <b id="name_class">Address:</b>&nbsp;&nbsp;
                      <span class="address_data"></span> 
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                      <!-- <b id="name_class">Address:</b>&nbsp;&nbsp;
                      <span class="address_data"></span>  -->
                    </div>
                    {{-- @endif --}}
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-12 mb-1">
                      <label>Family Details</label>
                    </div>
                  </div>
                  <div class="row family-details">

                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-12 mb-1">
                      <label>Children Details</label>
                    </div>
                  </div>
                  <div class="row child-details">

                  </div>
                     
            </div>
                <!-- /.card-body -->
               
          
  </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
          <!-- right column -->
        
          <!--/.col (right) -->
        </div>
        </form>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <section class="content second_section">
      <div class="container-fluid">
        <div id="show_table_data">
      <div class="card">
      <div class="card-body">
      <form  method="post" action="{{url('Sewapartner/saveaccountdata')}}" id="account_form">
      <table id="tbody">
                    <tr>
                    
                      <!-- <th>Consulted By</th> -->
                      @if($get_consulted_by =='Hospital')
                        

                      <th>Consulted By</th>
                
                      @endif
                      <th id="detail_class">Detail</th>
                      <th>Charges</th>
                      <th>Discount</th>
                      <th>Balance</th>
                    </tr>
                    <tr>
                 
                      @csrf
                      <!-- {{$get_consulted_by}} -->
                        @if($get_consulted_by =='Hospital')
                         
                            
                            <td> <select name="doctor_name" class="form-control">
                              <option value="">Select</option>
                            @foreach($show_names as $name)
                            <option value="{{$name->name}}">{{$name->name}}</option>
                            @endforeach
                                </select></td>
                         
                      @endif
                   
                      <td><input type="text" name="description"  class="form-control" id="description_text"></td>
                      <td><input type="text" name="charges"  class="form-control num1" id="chargess" onkeypress="return isNumber(event)" ></td>
                      <td><input type="text" name="discount" class="form-control num2" id="discounts" onkeypress="return isNumber(event)" ></td>
                      <td><input type="text" name="balance" id="balances" class="form-control" readonly></td>
                      <!-- <td> <button class="btn btn-md btn-primary" id="addData" type="button">
                      <span class="material-symbols-outlined">
                        +
                      </span>

                        </button></td> -->
                      <!-- <button type="submit"  class="btn btn-primary" id="submitForm">Create Invoice</button> -->
                   </tr>
                  </table><br>
        <div class="invoice_btn">    
          {{-- <a href="{{url('Sewapartner/addaccountdetails')}}" class="btn btn-danger cancel_btn">Cancel</a> --}}
         
            <button type="submit"  class="btn btn-primary" id="submitForm12">Create Invoice</button>
            {{-- <a href="{{url('Sewapartner/generateinvoice/')}}" class="btn btn-danger invoice_class">Generate Invoice</a> --}}
         
        </div>
      </div>
      </div>
      </div>
      </div>
    </section>

    <section class="content third_section">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div id="show_detailss">
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                <h4 style="heading_classs">Past Cardholder History</h4>
                <table id="Table_ID" class="table table-bordered table-hover mt-4 table-responsive-sm w-100 ">
                  <thead>
                  <tr>
                    <th>S.No</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Charges</th>
                    <th>Discount</th>
                    <th>Balance</th>
                    <th>Date</th>
                  </tr>
                  </thead>
                  <tbody style="font-size: 0.9rem;">

                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- <div class="card-footer">
                    <div class="text-center mt-4">
                    <button type="submit"  class="btn btn-primary" id="submitForm">Create Invoice</button>
                
                    </div>
                </div> -->
            </div>
            <!-- /.card -->
  
           
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
 
  <!-- /.content-wrapper -->
  <!-- <footer class="main-footer">
    <strong>Copyright &copy; 2022 <a href="https://protolabzit.com/" target="_blank">Protolabz eServices</a>.</strong>
    All rights reserved.
    {{-- <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.2.0-rc
    </div> --}}
  </footer> -->

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

  <script>
    $(document).ready( function () {
      // alert('hh');
      var t = $('#Table_ID').DataTable({
        ajax: {
          url: '{{url('Sewapartner/viewinvoicedetails')}}',
        },
        columnDefs: [
          // {
          //   searchable: false,
          //   orderable: false,
          //   targets: 0,
          // },
          // {
          // targets:0,
          //   width:'5%',
          // },
        ],
        // order: [[0, 'desc']],
        columns: [
          {  
            render: function (data, type, row, meta) {
              return meta.row + meta.settings._iDisplayStart + 1;
            }
          },
          {  
              data:'doctor_name',
              name:'doctor_name'
          },
          {  
              data:'description',
              name:'description'
          },
          {  
              data:function data(row) {
                if(row.charges) {
                  return '<span> RS.'+row.charges+'</span>';
                } else {
                  return '';
                }
              },
              name:'charges'
          },
          {  
              data:function data(row) {
                if(row.discount) {
                  return '<span> Rs.'+row.discount+'</span>'
                } else {
                  return '';
                }
              },
              name:'discount'
          },
          {  
              data:function data(row) {
                if(row.balance) {
                  return '<span> Rs.'+row.balance+'</span>'
                } else {
                  return '';
                }
              },
              name:'balance'
          },
          {  
              data:'created_at',
              name:'created_at'
          },
            
        ],
      });
   
      t.on('order.dt search.dt', function () {
          let i = 1;
   
          t.cells(null, 0, { search: 'applied', order: 'applied' }).every(function (cell) {
              this.data(i++);
          });
      }).draw();
    } );
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
  
    </script>
    <script type="text/javascript">
  $('#consultation-form').on('submit', function(event){
    event.preventDefault();
    $(".error").remove();  
   
    var spinner = $('#loader');
            spinner.show();
 
  //  var sewa_id = $('#sewa_id').val();
  //  if (sewa_id.length < 1) {  
  //    $('#sewa_id').after('<span class="error">Cardholder id is required</span>');  
  //    return false;
  //  }
  
  //  var services = $('#services').val();
  //  if (services.length < 1) {  
  //    $('#services').after('<span class="error">Service is required</span>');  
  //    return false;
  //  }

   const fd = $('#consultation-form').serialize();
   // console.log(fd);
   // return false;
   $.ajax({
     type: "POST",
      url: "{{url('Sewapartner/addcardholderid')}}",
      dataType: 'json',
      data:fd,

         success: function(data) {
          $('.family-details').removeClass('justify-content-center');
          $('.family-details').html('');
          $('.child-details').removeClass('justify-content-center');
          $('.child-details').html('');


          if(data.status == 1)
          {
            spinner.hide();
            var cardholder_data = data.cardholder_data;
            var family_data = data.family_data;
            var child_data = data.child_data;
            var cardholder_name_age = cardholder_data.name+'('+cardholder_data.age+' yrs)';
            $('.name_age_data').text(cardholder_name_age);
            $('.address_data').text(cardholder_data.address);

            $("#show_detailss").show();
            $("#show_table_data").show();
            $(".showdetailsform").show();

            if((family_data && family_data.length > 0)) {
              // console.log(family_data);
              $.each(family_data, function(index, item) {
                if(item.fname) {
                  var html = `
                    <div class="col-sm-3">
                      <b class="family_data">Name:</b>&nbsp;&nbsp;
                      <span>${item.fname}</span>
                    </div>
                    <div class="col-sm-2">
                      <b class="family_data">Age:</b>&nbsp;&nbsp;
                      <span>${item.fage}</span>
                    </div>
                    <div class="col-sm-2">
                      <b class="family_data">Relation:</b>&nbsp;&nbsp;
                      <span>${item.frelation}</span>
                    </div>
                    <div class="col-sm-5">
                    </div>`
                  ; 
                  // console.log(html);
                  $('.family-details').append(html);
                }
              });

            } else {
              $('.family-details').addClass('justify-content-center');
              $('.family-details').html('<p>No Family Members Found</p>')
            }

            if((child_data && child_data.length > 0)) {
              // console.log(family_data);
              $.each(child_data, function(index, item) {
                if(item.cname) {
                  var html = `
                    <div class="col-sm-3">
                      <b class="child_data">Name:</b>&nbsp;&nbsp;
                      <span>${item.cname}</span>
                    </div>
                    <div class="col-sm-2">
                      <b class="child_data">Age:</b>&nbsp;&nbsp;
                      <span>${item.cage}</span>
                    </div>
                    <div class="col-sm-2">
                      <b class="child_data">Relation:</b>&nbsp;&nbsp;
                      <span>${item.crelation}</span>
                    </div>
                    <div class="col-sm-5">
                    </div>`
                  ; 
                  // console.log(html);
                  $('.child-details').append(html);
                }
              });

            } else {
              $('.child-details').addClass('justify-content-center');
              $('.child-details').html('<p>No  Children Data Found</p>')
            }
            // location.reload();
            // Swal.fire(
            //   'Good job!',
            //   'Data Added!',
            //   'success'
            // )
            // window.location({{url('Sewapartner/viewconsultation')}});
          }
          if(data.status == 0)
          {
            spinner.hide();
            toastr["error"](data.message, "Error");
            $("#show_detailss").hide();
            $("#show_table_data").hide();
            $(".showdetailsform").hide();
          }
      },
     });
    });
  </script>
  <script type="text/javascript">
$(document).ready(function () {
  $('#consultation-form').on('submit', function(event){
    // $(".error").remove();  
    var sewa_id = $('#sewa_id').val();
    if (sewa_id.length < 1) {  
     $('.cardholder-submit-row').after('<span class="text-danger">Cardholder id is required</span>');  
     return false;
    }
        
        
    });
});
</script>
<!-- <script>
    var rowIdx = 0;
    $('#addData').on('click', function () {
      // alert('here');
      // Adding a row inside the tbody.
      $('#tbody').append(`<tr id="R${++rowIdx}">
      @if($get_consulted_by =='Hospital')
                        

            <td class="row-index text-center">
                  <select name="doctor_name[]" class="form-control">
                          
                            @foreach($show_names as $name)
                            <option value="{{$name->name}}">{{$name->name}}</option>
                            @endforeach
                                </select></td>
      @endif
      <td class="row-index text-center">
      <input type="text" name="description[]"  class="form-control"></td>
      <td class="row-index text-center">
      <input type="text" name="charges[]"  class="form-control num1" id="chargess" ></td>
      <td class="row-index text-center">
      <input type="text" name="discount[]" class="form-control num2" id="discounts" ></td>
      <td class="row-index text-center">
      <input type="text" name="balance[]" id="balances" class="form-control"></td>
        </tr>`);
            //  alert("here");
  });
  // alert(description[]);

  </script> -->

</form>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script type="text/javascript">
  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
//   $(document).on("change", ".qty1", function() {
//     var sub = 0;
//     $(".qty1").each(function(){
//         sub -= -$(this).val();
//     });
//     $("#balances").val(sub);
// });
  // $('#account_form').on('submit', function(event){
  //   var charges = $('.num1').val();
  //     alert(charges);
  // });
  //     event.preventDefault();
  //     var charges = $('#chargess').val();
  //     alert(charges);
  //     $(".error").remove();  
  //   //   if (name.length < 1) {  
  //   //    $('#name').after('<span class="error">Name is required</span>');  
  //   //  } 
  //    var discount = $('#discounts').val();
  //    alert(discount);
  //   //  if (email.length < 1) {  
  //   //    $('#email').after('<span class="error">Email is required</span>');  
  //   //  } 
    
  //    const fd = $('#sub-admin-form').serialize();
  //    // console.log(fd);
  //    // return false;
  //    $.ajax({
  //      type: "POST",
  //       url: "{{url('Admin/addsubadminform')}}",
  //       dataType: 'json',
  //       data:new FormData(this),
  //       cache : false,
  //       processData: false,
  //       contentType: false,
  //          processData: false,
  //          success: function(data) {
  //           //  $("#show_response").html(response);
  //            if(data.status == 1)
  //           {
  //             // alert('hh');
  //             Swal.fire(
  //               'Good job!',
  //               'SubAdmin Added!',
  //               'success'
  //             )
  //             location.reload();
  //           }
  //           if(data.status == 0)
  //           {
  //             toastr["error"](data.message, "Error");
  //           }
  //       },
  //      });
  //     });
  //   </script>
    <script>
      $(document).ready(function() {

      $(function() {
       
      $("input[type='text'].num1, input[type='text'].num2").on("keydown keyup", sub);
      function sub() {
      $("#balances").val(Number($(".num1").val()) - Number($(".num2").val()));
      // alert($(".num1").val());
      }
      });    

     });
    </script> 
    <!-- <script>
      $(document).ready(function() {
  $(".num1, .num2").on("keydown keyup", function(event) {
    var tr = $(this).closest("input[type='text']"); //we will use this to restrict scope to the current table row
    tr.find(".balances").val(Number(tr.find(".num1").val()) - Number(tr.find(".num2").val()));
  });
});
      </script>  -->
   
    <script type="text/javascript">
  $(document).ready(function() {

    $('#account_form').on('submit', function (e) {
      // alert('hh');
      var spinner = $('#loader');
            spinner.show();
    e.preventDefault();
    var data = new FormData(this);
   
      $.ajax({
          type: 'POST',
          url: '{{url('Sewapartner/saveaccountdata')}}',
          dataType: 'json',
          data: data,  
          cache: false,
          contentType: false,
          processData: false,      
          success: function (data) {
            setTimeout(() => {
              console.log('inside ');
              window.location.reload();     
            }, 15000);
            // console.log(data);
            if(data.status == 1)
            {
              spinner.hide();
              Swal.fire(
                'Good job!',
                'Data Added!',
                'success'
              )
              $('#Table_ID').DataTable().ajax.reload();
              var account_id = data.account_id; 
              var  download_url = '{{url('Sewapartner/invoice_download')}}/'+account_id
              window.open(download_url, "_blank");

              // // window.location = '{{url('Sewapartner/generateinvoice')}}';
              // window.location.reload();
              // .done(generate_invoice_details);
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
@endsection
