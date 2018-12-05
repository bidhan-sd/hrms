@extends('back-end.master')
@section('body')
    <div class="back-end-mainContent">
        <div class="main_heading">
            <h2>Edit Role</h2>
            <a href="{{ route('manage-role') }}" class="btn btn-success btn-sm">Manage Role</a>
        </div>
        <div class="main_content">
            <?php $message = Session::get('message') ?>
            @if(isset($message))
                <div class="alert alert-success alert-dismissible fade show">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    {{ $message }}
                </div>
            @endif
            {{ Form::open(['route'=>'update-role-info','method'=>'POST','class'=>'form-horizontal','name'=>'roleEditForm','id'=>'roleEditForm']) }}
            <div class="form-group row">
                <div class="col-md-6 offset-3">
                    <label for="role_name">Role Name <span class="required text-danger">*</span></label>
                    <input type="text" id="role_name" name="role_name"  class="form-control" value="{{ $singleRole->role_name }}" placeholder="Role Name">
                    <input type="hidden" id="id" name="id"  class="form-control" value="{{ $singleRole->id }}" placeholder="Role Name">
                    <span id="role_name_error" class="text-danger">{{ $errors->has('role_name') ? $errors->first('role_name') : ' ' }}</span>
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
                    <input class="btn btn-md btn-success" type="submit" name="btn" value="Update Department"/>
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </div>
    <script>
        document.forms['roleEditForm'].elements['publication_status'].value = '{{ $singleRole->publication_status}}';
    </script>
@endsection