@extends('back-end.master')
@section('body')
    <div class="back-end-mainContent">
        <div class="main_heading">
            <h2>Applied List</h2>
        </div>
        <div class="main_content  bg-white">
            <?php $message = Session::get('message') ?>

                @if(isset($message))
                    <div class="alert alert-success alert-dismissible fade show">
                        <button href="#" class="close" data-dismiss="alert" aria-label="close">&times;</button>
                        {{ $message }}
                    </div>
                @endif

                {{ Form::open(['route'=>'save-shortList','method'=>'POST','name'=>'shortListForm','id'=>'shortListForm']) }}

                <table id="table_id" class="display table table-bordered table-hover table-striped text-center">
                <thead class="bg-info text-white">
                    <tr>
                        <th>All <input type="checkbox" id="checkAll"/> </th>
                        <th>Unique Id</th>
                        <th>Post Name</th>
                        <th>Total Exp.</th>
                        <th>Skills</th>
                        <th>Photo</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($applied_lists as $applied_list)
                    <tr>
                        <td><input type="checkbox" name="checkSingle[]" id="singleCheckAll" value="{{ $applied_list->id }}"/></td>
                        <td>{{ $applied_list->unique_apply_id }}</td>
                        <td>{{ $applied_list->post_name }}</td>
                        <td>@if($applied_list->totalExperince == '') 0 @else {{ $applied_list->totalExperince }} @endif</td>
                        <td>{{ $applied_list->skills }}</td>
                        <td><img src="{{ asset($applied_list->photo) }}" width="50" alt="Applicant Image"/></td>

                        <td>
                            <a href="{{ url('single-advertisement',['id' => $applied_list->id ]) }}" class="btn btn-info btn-sm" title="View">
                                <i class="fas fa-search-plus"></i>
                            </a>
                            <a onclick="return confirm('Are you sure to delete!'); "  href="{{ url('delete-advertisement',['id' => $applied_list->id] ) }}" class="btn btn-danger btn-sm" title="Delete">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
                    <p class="text-right">
                        <input class="btn btn-success btn-sm showHidden" type="submit" name="short_list" id="short_list" value="Short List"/>
                    </p>
                <tbody>
            </table>

            {{ Form::close() }}
        </div>
    </div>
@endsection