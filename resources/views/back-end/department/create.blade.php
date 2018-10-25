@extends('back-end.master')
@section('body')
    <div class="back-end-mainContent">
        <div class="main_heading">
            <h2>Create Department</h2>
            <a href="{{ route('manage-department') }}" class="btn btn-success btn-sm">Manage Department</a>
        </div>
        <div class="main_content">
            <?php $message = Session::get('message') ?>
            @if(isset($message))
                <div class="alert alert-success alert-dismissible fade show">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    {{ $message }}
                </div>
            @endif
            {{ Form::open(['route'=>'save-department-info','method'=>'POST','class'=>'form-horizontal','name'=>'departmentsForm','id'=>'department_form']) }}
            <div class="form-group row">
                <div class="col-md-6 offset-3">
                    <label for="post_name">Department Name <span class="required text-danger">*</span></label>
                    <input type="text" id="department_name" name="department_name"  class="form-control" placeholder="Department Name">
                    <span id="department_name_error" class="text-danger">{{ $errors->has('department_name') ? $errors->first('department_name') : ' ' }}</span>
                </div>
                <div class="col-md-6 offset-3">
                    <label for="publication_status">Publication Staus <span class="required text-danger">*</span></label>
                    <select name="publication_status" id="publication_status" class="form-control">
                        <option value="1">Published</option>
                        <option value="0">Unpublished</option>
                    </select>
                    <span id="department_name_error" class="text-danger">{{ $errors->has('publication_status') ? $errors->first('publication_status') : ' ' }}</span>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-6 offset-3">
                    <input class="btn btn-md btn-success" type="submit" name="btn" value="Save Department"/>
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </div>
@endsection