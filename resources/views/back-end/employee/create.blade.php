@extends('back-end.master')
@section('body')
    <div class="back-end-mainContent">
        <div class="main_heading">
            <h2>Create Employee</h2>
            <a href="{{ route('manage-employee') }}" class="btn btn-success btn-sm">Manage Employee</a>
        </div>
        <div class="main_content">
            <?php $message = Session::get('message') ?>
            @if(isset($message))
                <div class="alert alert-success alert-dismissible fade show">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    {{ $message }}
                </div>
            @endif
            {{ Form::open(['route'=>'save-employee-info','method'=>'POST','class'=>'form-horizontal','name'=>'employeeInfoForm','id'=>'employeeInfoForm']) }}
                <div class="form-group row">
                    <div class="col-md-6 offset-3">
                        <label for="employee_name">Employee Name <span class="required text-danger">*</span></label>
                        <input type="text" readonly id="employee_name" name="employee_name" value="{{ $name }}" class="form-control" placeholder="Employee Name">
                        <input type="hidden" id="id" name="id" value="{{ $id }}" class="form-control" placeholder="Employee Name">
                        <span id="employee_name_error" class="text-danger">{{ $errors->has('employee_name') ? $errors->first('employee_name') : ' ' }}</span>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-6 offset-3">
                        <label for="degination">Degination <span class="required text-danger">*</span></label>
                        <input type="text" readonly id="degination" name="degination" value="{{ $degination }}" class="form-control" placeholder="Degination">
                        <span id="degination_error" class="text-danger">{{ $errors->has('degination') ? $errors->first('degination') : ' ' }}</span>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-6 offset-3">
                        <label for="department_name">Department Name <span class="required text-danger">*</span></label>
                        <select name="department_name" id="department_name" class="form-control">
                            <?php $department_names = App\Department::select('department_name')->where('publication_status',1)->get() ?>
                            @foreach($department_names as $department_name)
                                <option value="{{ strtolower($department_name->department_name) }}">{{ ucfirst($department_name->department_name) }}</option>
                            @endforeach
                        </select>
                        <span id="department_name_error" class="text-danger">{{ $errors->has('department_name') ? $errors->first('department_name') : ' ' }}</span>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-6 offset-3">
                        <label for="joining_date">Joining Date <span class="required text-danger">*</span></label>
                        <input type="date" class="form-control" name="joining_date" id="joining_date"/>
                        <span id="joining_date_error" class="text-danger">{{ $errors->has('joining_date') ? $errors->first('joining_date') : ' ' }}</span>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-6 offset-3">
                        <label for="employee_pin">Employee Pin <span class="required text-danger">*</span></label>
                        <input type="text" class="form-control" name="employee_pin" id="employee_pin" placeholder="Pin will 4 digit"/>
                        <span id="employee_pin_error" class="text-danger">{{ $errors->has('employee_pin') ? $errors->first('employee_pin') : ' ' }}</span>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-6 offset-3">
                        <input class="btn btn-md btn-success" type="submit" name="btn" value="Create Employee"/>
                    </div>
                </div>
            {{ Form::close() }}
        </div>
    </div>
@endsection