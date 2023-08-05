<!-- Create Data Source Modal -->
<div class="modal fade" id="createDataSourceModal" tabindex="-1" aria-labelledby="createDataSourceModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createDataSourceModalLabel">Create Data Source</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            {!! Form::open(['id'=>'createDataSource']) !!}
                <div class="modal-body">
                    <div class="alert alert-danger" style="display: none" id="validationErrorsBoxDS"></div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="name">Name of Data Source</label>
                                <input type="text" name="name" id="name" class="form-control" required>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer ">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>

<!-- Create Data Source Type Modal -->
<div class="modal fade" id="createDataSourceTypeModal" tabindex="-1" aria-labelledby="createDataSourceTypeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createDataSourceTypeModalLabel">Create Data Source Type</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            {!! Form::open(['id'=>'createDataSourceType']) !!}
                <div class="modal-body">
                    <div class="alert alert-danger" style="display: none" id="validationErrorsBoxDST"></div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="name">Name of Data Source</label>
                                <select name="data_source_id" id="data_source_id" class="form-control" required>
                                    <option value="">Select</option>
                                    @foreach($dataSources as $data)
                                    <option value="{{$data->id}}">{{$data->name}}</option>
                                    @endforeach

                                </select>

                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="data_source_type">Type of Data Source</label>
                                <input type="text" name="data_source_type" id="data_source_type" class="form-control" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer ">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>


<!-- Create Data Source Option Modal -->
<div class="modal fade" id="createDataSourceOptionModal" tabindex="-1" aria-labelledby="createDataSourceOptionModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createDataSourceOptionModalLabel">Create Data Source Option</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            {!! Form::open(['id'=>'createDataSourceOption']) !!}
                <div class="modal-body">
                    <div class="alert alert-danger" style="display: none" id="validationErrorsBoxDSO"></div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="name">Name of Data Source</label>
                                <select name="data_source_id" id="data_source_id" class="form-control change_data_source" required>
                                    <option value="">Select</option>
                                    @foreach($dataSources as $data)
                                    <option value="{{$data->id}}">{{$data->name}}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="data_source_type">Type of Data Source</label>
                                <select name="data_source_type_id" id="change_data_type_id" class="form-control">
                                    <option value="">Select</option>
                                </select>
                                
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="option_type">List field Options Type</label>
                                <select name="option_type" id="option_type" class="form-control" required> 
                                    <option value="">Select</option>
                                    <option value="Text">Text</option>
                                    <option value="Numbers">Numbers</option>
                                    <option value="Phones">Phones</option>
                                    <option value="Calendar">Calendar</option>
                                    <option value="Repeat">Repeat</option>
                                    <option value="Logic">Logic</option>
                                    <option value="Grammar">Grammar</option>
                                    <option value="Images">Images</option>
                                    <option value="Sale & Purchase">Sale & Purchase</option>
                                    <option value="Sort">Sort</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="option_name">List field Options Name</label>
                                <input type="text" name="option_name" id="option_name" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="option_value">List field Options Value</label>
                                <input type="text" name="option_value" id="option_value" class="form-control" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer ">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>


<script>
    let createDataSourceUrl = "{{route('createDataSource')}}";
    let createDataSourceTypeUrl = "{{route('createDataSourceType')}}";
    let createDataSourceOptionUrl = "{{route('createDataSourceOption')}}";
</script>


