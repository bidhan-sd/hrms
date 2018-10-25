@extends('back-end.master')
@section('body')
    <div class="back-end-mainContent">
        <div class="main_heading">
            <h2>Create Department Head</h2>
            <a href="{{ route('manage-departmentHead-setup') }}" class="btn btn-success btn-sm">Manage Department Head</a>
        </div>
        <div class="main_content" id="app">
            <?php $message = Session::get('message') ?>
            @if(isset($message))
                <div class="alert alert-success alert-dismissible fade show">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    {{ $message }}
                </div>
            @endif
            {{ Form::open(['route'=>'save-departmentHead-info','method'=>'POST','class'=>'form-horizontal','name'=>'departmentHeadInfoForm','id'=>'departmentHeadInfoForm']) }}
            <div class="form-group row">
                <div class="col-md-6 offset-3">
                    <label for="supervisor_name">Department Head Name <span class="required text-danger">*</span></label>
                    <?php $employees =  App\Employee::select('employee_name','id')->where('department_head',0)->get() ?>

                    <select class="form-control" v-model ="employee_id" v-on:change="onChange(employee_id)">
                        @foreach($employees as $employee)
                            <option value="{{ strtolower($employee->id) }}">{{ ucwords($employee->employee_name) }}</option>
                        @endforeach
                    </select>

                    <span id="supervisor_name_error" class="text-danger">{{ $errors->has('supervisor_name') ? $errors->first('supervisor_name') : ' ' }}</span>

                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-6 offset-3">
                    <label for="department_name">Department Name <span class="required text-danger">*</span></label>
                    <input type="text" name="department_name" readonly id="department_name" v-model="employee.department_name" class="form-control"/>
                    <input type="hidden" name="id" readonly  v-model="employee.id" class="form-control"/>
                    <span id="department_name_error" class="text-danger">{{ $errors->has('department_name') ? $errors->first('department_name') : ' ' }}</span>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-6 offset-3">
                    <label for="departmentHead_pin">Supervisor Pin <span class="required text-danger">*</span></label>
                    <input class="form-control" name="departmentHead_pin" id="departmentHead_pin" readonly v-model="employee.employee_pin"/>
                    <span id="departmentHead_pin_error" class="text-danger">{{ $errors->has('departmentHead_pin') ? $errors->first('departmentHead_pin') : ' ' }}</span>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-6 offset-3">
                    <input class="btn btn-md btn-success" type="submit" name="btn" value="Create Department Head"/>
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </div>
@endsection