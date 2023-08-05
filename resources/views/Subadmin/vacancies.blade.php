@extends('Subadmin.layouts.App')
@section('card','menu-open')
@section('vacancies','active')
<style>
  section.content {
    background-color: #F5DDBD;
  } 
  a.btn.btn-primary.back_btn{
    background-color:#ED9B2D;
    color:black;
  }
  #active{
    border: none;color: blue;font-size: 22px;
  }
  #inactive{
    border: none;color: red;font-size: 22px;
  }
 div#Table_ID_filter {
    margin-top: 10px;
  }
  @media(min-width:280px) and (max-width:767px) {
    .table-responsive-sm {
    display: block;
    width: 100%;
    overflow-x: auto;
    -webkit-overflow-scrolling: touch;
    }
    table#Table_ID {
        overflow-x: scroll;
    }
    div#Table_ID_wrapper {
        overflow-y: scroll;
    }
        }
        th{
    color:#0b528f !important;
    font-size: 0.9rem;
    text-align: center !important;
  }
  div#Table_ID_filter {
    margin-top: 0px !important;
    margin-bottom: 16px;
  }
</style>
@section('main_section')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Manage Vacancies</h1>
                    </div>
                    <div class="col-6 col-sm-6 text-right">
                        <a href="{{url('Subadmin/dashboard')}}"class="btn btn-primary back_btn">Back</a>
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
                                <div class="row" style="float: right;margin-bottom: 5px;">
                                    <a href="{{url('Subadmin/add_vacancy')}}" class="btn btn-primary" style="margin-right:10px;height: 36px; font-size: 0.9rem;">Add vacancy</a><br><br>
                                </div>
                                <table id="Table_ID" class="table table-responsive-sm table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th >#</th>
                                            <th >Title</th>
                                            <th >Description</th>  
                                            <th >Eligibility</th>                   
                                            <th >Location</th>                   
                                            <th >Salary</th>                  
                                            <th >Date</th>                  
                                            <!-- <th >Verify</th> -->
                                            <th >Action</th>
                                        </tr>
                                    </thead>
                                    <tbody style="font-size: 0.9rem;">
                                        <?php $i=1;?>
                                        @foreach ($vacancies as $value)
                                        <tr style="text-align:center">
                                            <td>{{$i++}}</td> 
                                            <td>{{$value->title}}</td>      
                                            <td>{{$value->description}}</td>                    
                                            <td>{{$value->eligibility}}</td>                     
                                            <td>{{$value->location}}</td>    
                                            <td>{{$value->salary}}</td>    
                                            {{--<td>  
                                                @if($value->status == 1 )
                                                    <button class="on" id="active" onclick="show({{$value->id}})"><i class="fa-solid fa-toggle-on" ></i></button>
                                                @else
                                                    <button class="on" id="inactive" onclick="show({{$value->id}})"><i class="fa-solid fa-toggle-off"></i></button>
                                                @endif
                                            
                                                
                                            </td>--}}
                                            <td>{{$value->created_at}}</td>    
                                            <td>
                                                <a href="{{url('Subadmin/edit_vacancy')}}/{{$value->id}}"><i class="fa-solid fa-square-pen" style="font-size:25px;"></i>
                                                </a>
                                                <a href="{{url('Subadmin/delete_vacancy',$value->id)}}"><i class="fa-solid fa-trash-can" style="color:red; font-size:23px;margin-left:3px;" onclick="return confirm('Are you sure to delete this?')"></i></a>
                                            </td>
                                        
                                        </tr>
                                        @endforeach   
             
                                    </tbody>
                                </table>
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
        $(document).ready( function () {
            var t = $('#Table_ID').DataTable({
            dom: 'Bfrtip',
            buttons: [
                {
                extend: 'excelHtml5',
                exportOptions: {
                    columns: ':visible'
                }
                },
                {
                extend: 'pdfHtml5',
                exportOptions: {
                    columns: ':visible'
                }
                },
                {
                extend: 'print',
                exportOptions: {
                    columns: ':visible'
                }
                },
                'colvis',
            ],
            columnDefs: [
                { 
                    width: "30%", 
                    targets: [2] ,
                },
                { 
                    width: "10%", 
                    targets: [6] ,
                },
                { 
                    width: "5%", 
                    targets: [7] ,
                },
            ],
            
            });
        });
    </script>
@endsection