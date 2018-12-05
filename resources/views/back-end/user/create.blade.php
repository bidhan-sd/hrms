@extends('back-end.master')
@section('body')
    <div class="back-end-mainContent">
        <div class="main_heading">
            <h2>Manage User</h2>
            <a href="{{ route('manage-user') }}" class="btn btn-success btn-sm">Manage User</a>
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
                        <label for="employee_pin">Employee Pin <span class="required text-danger">*</span></label>
                        <input class="form-control" v-model ="employee_pin" v-on:keyup="keymonitor" />
                        <span id="employee_pin_error" class="text-danger">{{ $errors->has('employee_pin') ? $errors->first('employee_pin') : ' ' }}</span>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-6 offset-3">
                        <label for="user_name">Name<span class="required text-danger">*</span></label>
                        <input type="text" name="user_name" readonly id="user_name" class="form-control"/>
                        <span id="user_name_error" class="text-danger">{{ $errors->has('user_name') ? $errors->first('user_name') : ' ' }}</span>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-6 offset-3">
                        <label for="user_email">Email<span class="required text-danger">*</span></label>
                        <input type="text" name="user_email" readonly id="user_email" class="form-control"/>
                        <span id="user_email_error" class="text-danger">{{ $errors->has('user_email') ? $errors->first('user_email') : ' ' }}</span>
                    </div>
                </div>


                <div class="form-group row">
                    <div class="col-md-6 offset-3">
                        <label for="password">Password<span class="required text-danger">*</span></label>
                        <input type="password" name="password" id="password" class="form-control"/>
                        <span id="password_error" class="text-danger">{{ $errors->has('password') ? $errors->first('password') : ' ' }}</span>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-6 offset-3">
                        <label for="supervisor_name">Supervisor Name <span class="required text-danger">*</span></label>
                        <?php $roles =  App\Role::select('id','role_name')->where('publication_status',1)->get() ?>

                        <select class="form-control" name="role">
                            @foreach($roles as $role)
                                <option value="{{ $role->id }}">{{ ucwords($role->role_name) }}</option>
                            @endforeach
                        </select>
                        <span id="supervisor_name_error" class="text-danger">{{ $errors->has('supervisor_name') ? $errors->first('supervisor_name') : ' ' }}</span>

                    </div>
                </div>
            <div class="form-group row">
                <div class="col-md-6 offset-3">
                    <input class="btn btn-md btn-success" type="submit" name="btn" value="Create User"/>
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </div>
@endsection