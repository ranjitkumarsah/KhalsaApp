$(document).ready(function() {
    $('#createUser').submit(function (event) {
        event.preventDefault();
        $.ajax({
            url: createUserUrl,
            type: 'POST',
            data: $(this).serialize(),
            success: function success(result) {
                if (result.success) {
                    displaySuccessMessage(result.message);
                    $('#createUserModal').modal('hide');
                    $('#usersTable').DataTable().ajax.reload();
                }
            },
            error: function error(result) {
                printErrorMessage('#validationErrorsBox', result);
            },
        });
    }); 

    $('#createUserModal').on('hidden.bs.modal', function () {
        resetModalForm('#createUser', '#validationErrorsBox');
    });


    let usersTable = new DataTable('#usersTable', {
        ajax: {
            url: '../Admin/dashboard',
        },
        columnDefs: [
            {
                'targets': [5],
                'className': 'text-center',
            },
        ],
        columns: [
            
            {  
                data:'Sno',
                name:'sno'
            },
            {  
                data:'name',
                name:'name'
            },
            {  
                data:'email',
                name:'email'
            },
            {  
                data:'create_date',
                name:'create_date'
            },
            {  
                data:'name',
                name:'name'
            },
            {  
                data: function data(row) {
                    var checked = '';
                    if(row.role == 'Admin') {
                        checked = 'checked';
                    }
                    return `
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" id="is_admin" ${checked}>
                        </div>`;
                },
                name:'name'
            },
            {  
                data: function data(row) {
                    return '<a title="Edit" class="btn action-btn btn-primary btn-sm text-light edit_btn" data-id="' + row.id + '">' + '<i class="fa fa-pencil"></i>' + '</a>' + '<a title="Delete" class="ms-1 btn action-btn text-light btn-danger btn-sm delete_btn" data-id="' + row.id + '">' + '<i class="fa fa-trash" ></i></a>';
                },
                name:'name'
            },
            
        ],
    });

    $(document).on('click', '.delete_btn', function (event) {
        var id = $(event.currentTarget).data('id');
        deleteItem('../Admin/deleteUser/' + id, '#usersTable', 'User');
    });


    //Create Data Source
    $('#createDataSource').submit(function (event) {
        event.preventDefault();
        $.ajax({
            url: createDataSourceUrl,
            type: 'POST',
            data: $(this).serialize(),
            success: function success(result) {
                if (result.success) {
                    displaySuccessMessage(result.message);
                    $('#createDataSourceModal').modal('hide');
                    location.reload();
                }
            },
            error: function error(result) {
                printErrorMessage('#validationErrorsBoxDS', result);
            },
        });
    }); 

    $('#createDataSourceModal').on('hidden.bs.modal', function () {
        resetModalForm('#createDataSource', '#validationErrorsBoxDS');
    });

    $(document).on('click','.data_sources_name',function(){
        var id = $(this).attr('id');
        $('.data_sources').css('background-color','#fff');
        $('#data_sources'+id).css('background-color','#C8D0D5');

        $.ajax({
            url: 'getDataSourceType/'+id,
            type: 'GET',
            success: function success(result) {
                if (result.success) {
                    var data = result.data;
                    var resp_data ="";
                    $.each(data, function(key, val) {
                        // console.log(val.id);
                        // console.log(val.data_source_type);
                       resp_data+= `<div class="row data_source_field" id="data_source_field${val.id}">
                           <div class="col" style="cursor:pointer;">
                               <p class="data_source_type"  id="${val.id}">${val.data_source_type}</p>
                           </div>
                           <div class="col">
                                <a href="#" id="${val.id}">
                                    <i class="fa fa-pencil float-end mt-1"></i>
                                </a>
                           </div>
                       </div>`
                    })
                    $('.data_field').html(resp_data);
                }
            },
            // error: function error(result) {
            //     printErrorMessage('#validationErrorsBox', result);
            // },
        });
    });


    //Create Data Source Type
    $('#createDataSourceType').submit(function (event) {
        event.preventDefault();
        $.ajax({
            url: createDataSourceTypeUrl,
            type: 'POST',
            data: $(this).serialize(),
            success: function success(result) {
                if (result.success) {
                    displaySuccessMessage(result.message);
                    $('#createDataSourceTypeModal').modal('hide');
                    location.reload();
                }
            },
            error: function error(result) {
                printErrorMessage('#validationErrorsBoxDST', result);
            },
        });
    }); 

    $('#createDataSourceTypeModal').on('hidden.bs.modal', function () {
        resetModalForm('#createDataSourceType', '#validationErrorsBoxDST');
    });

    $(document).on('click','.data_source_type',function(){
        var id = $(this).attr('id');
        $('.data_source_field').css('background-color','#fff');
        $('#data_source_field'+id).css('background-color','#C8D0D5');

        $.ajax({
            url: 'getDataSourceOption/'+id,
            type: 'GET',
            success: function success(result) {
                if (result.success) {
                    var data = result.data;
                    var resp_data ="";
                    $.each(data, function(key, val) {
                        // console.log(val.id);
                        // console.log(val.data_source_type);
                        resp_data+= `<div class="row data_source_option" id="data_source_option${val.id}">
                            <div class="col" style="cursor:pointer;">
                                <p class="data_source_options" data-val="${val.option_value}" id="${val.id}">${val.option_name}</p>
                            </div>
                            <div class="col">
                                <a href="#" id="${val.id}">
                                    <i class="fa fa-pencil float-end mt-1"></i>
                                </a>
                            </div>
                        </div>`
                    })
                    $('.data_options').html(resp_data);
                }
            },
            // error: function error(result) {
            //     printErrorMessage('#validationErrorsBox', result);
            // },
        });

        
        var text = $(this).text();
        $("#result").val(function() {
            if($(this).val() == '') {
                return text;
            } else {
                return text;
            }
        });
    });

    $(document).on('click','.data_source_options',function (event) {
        event.preventDefault();
        var text = $(this).attr('data-val');

        $("#result").val(function() {
            if($(this).val()) {
                return this.value + '|' + text;
            } else {
                return text;
            }
        });
    });

    $(document).on('change','.change_data_source',function(){
        var id = $(this).val();
        var selectOpt = $("#change_data_type_id");
        selectOpt.val([]).trigger("change");  // reset value of Modules 

        $.ajax({
            url:'getDataSourceType/'+id,
            method: "GET",
            success: function(response){
                result=response.data;
                var firstOpt = $('#change_data_type_id :first-child'); 
                firstOpt.nextAll().remove(); //Removes previous selection if any

                $.each(result, function(i) {
                    selectOpt.append('<option value="' + result[i].id + '">' + result[i].data_source_type + '</option>')
                });
            }
        });
    });


    //Create Data Source Option
    $('#createDataSourceOption').submit(function (event) {
        event.preventDefault();
        $.ajax({
            url: createDataSourceOptionUrl,
            type: 'POST',
            data: $(this).serialize(),
            success: function success(result) {
                if (result.success) {
                    displaySuccessMessage(result.message);
                    $('#createDataSourceOptionModal').modal('hide');
                    location.reload();
                }
            },
            error: function error(result) {
                printErrorMessage('#validationErrorsBoxDSO', result);
            },
        });
    }); 

    $('#createDataSourceOptionModal').on('hidden.bs.modal', function () {
        resetModalForm('#createDataSourceOption', '#validationErrorsBoxDSO');
    });


    // Getting Data Source Options By Option Type
    $(document).on('click','.field_option_icon',function(){
        var id = $(this).attr('data-id');

        $.ajax({
            url: 'getDataSourceOptionByType/'+id,
            type: 'GET',
            success: function success(result) {
                if (result.success) {
                    var data = result.data;
                    var resp_data ="";
                    $.each(data, function(key, val) {
                        resp_data+= `<div class="row data_source_option" id="data_source_option${val.id}">
                            <div class="col" style="cursor:pointer;">
                                <p class="data_source_options" data-val="${val.option_value}" id="${val.id}">${val.option_name}</p>
                            </div>
                            <div class="col">
                                <a href="#" id="${val.id}">
                                    <i class="fa fa-pencil float-end mt-1"></i>
                                </a>
                            </div>
                        </div>`
                    })
                    $('.data_options').html(resp_data);
                }
            },
           
        });
    });










    // Functions 
    window.printErrorMessage = function (selector, errorResult) {
        $(selector).show().html('');
        console.log(errorResult.responseJSON.error)
        $(selector).text(errorResult.responseJSON.error);
    };
      
    window.resetModalForm = function (formId, validationBox) {
        $(formId)[0].reset();
        $(validationBox).hide();
    };
    window.displaySuccessMessage = function (message) {
        $.toast({
          heading: 'Success',
          text: message,
          showHideTransition: 'slide',
          icon: 'success',
          position: 'top-right'
        });
    };
    window.deleteItem = function (url, tableId, header) {
        var callFunction = arguments.length > 3 && arguments[3] !== undefined ? arguments[3] : null;
        swal({
          title: 'Delete !',
          text: 'Are you sure you want to delete this "' + header + '" ?',
          type: 'warning',
          showCancelButton: true,
          closeOnConfirm: false,
          showLoaderOnConfirm: true,
          confirmButtonColor: '#5cb85c',
          cancelButtonColor: '#d33',
          cancelButtonText: 'No',
          confirmButtonText: 'Yes'
        }, function () {
          deleteItemAjax(url, tableId, header, callFunction = null);
        });
    };

    function deleteItemAjax(url, tableId, header) {
        var callFunction = arguments.length > 3 && arguments[3] !== undefined ? arguments[3] : null;
        $.ajax({
          url: url,
          type: 'get',
          dataType: 'json',
          success: function success(obj) {
            if (obj.success) {
                $(tableId).DataTable().ajax.reload(null, false);
            }
      
            swal({
              title: 'Deleted!',
              text: header + ' has been deleted.',
              type: 'success',
              timer: 2000
            });
      
            if (callFunction) {
              eval(callFunction);
            }
          },
          error: function error(data) {
            swal({
              title: '',
              text: data.responseJSON.message,
              type: 'error',
              timer: 5000
            });
          }
        });
    }
});