@extends('back-end.master')
@section('body')
    <div class="back-end-mainContent">
        <div class="main_heading">
            <h2>Create Supervisor</h2>
            <a href="{{ route('manage-supervisor') }}" class="btn btn-success btn-sm">Manage Supervisor</a>
        </div>
        <div class="main_content" id="app">
            <?php $message = Session::get('message') ?>
            @if(isset($message))
                <div class="alert alert-success alert-dismissible fade show">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    {{ $message }}
                </div>
            @endif
            {{ Form::open(['route'=>'save-supervisor-info','method'=>'POST','class'=>'form-horizontal','name'=>'supervisorInfoForm','id'=>'supervisorInfoForm']) }}
            <div class="form-group row">
                <div class="col-md-6 offset-3">
                    <label for="supervisor_name">Supervisor Name <span class="required text-danger">*</span></label>
                    <?php $employees =  App\Employee::select('employee_name')->get() ?>

                    <input type="text" v-model="name" class="form-control"/>
                    <span>@{{ name }}</span>

                    <select name="supervisor_name" id="supervisor_name" class="form-control" v-model ="category" v-on:change="onChange()">
                        @foreach($employees as $employee)
                            <option value="{{ strtolower($employee->employee_name) }}">{{ ucwords($employee->employee_name) }}</option>
                        @endforeach
                    </select>
                    <span id="supervisor_name_error" class="text-danger">{{ $errors->has('supervisor_name') ? $errors->first('supervisor_name') : ' ' }}</span>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-6 offset-3">
                    <label for="department_name">Department Name <span class="required text-danger">*</span></label>
                    <input name="department_name" id="department_name" class="form-control"/>
                    <span id="department_name_error" class="text-danger">{{ $errors->has('department_name') ? $errors->first('department_name') : ' ' }}</span>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-6 offset-3">
                    <label for="supervisor_pin">Supervisor Pin <span class="required text-danger">*</span></label>
                    <input class="form-control" name="supervisor_pin" id="supervisor_pin"/>
                    <span id="supervisor_pin_error" class="text-danger">{{ $errors->has('supervisor_pin') ? $errors->first('supervisor_pin') : ' ' }}</span>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-6 offset-3">
                    <input class="btn btn-md btn-success" type="submit" name="btn" value="Create Supervisor"/>
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </div>
@endsection