@extends('back-end.master')
@section('body')
    <div class="back-end-mainContent">
        <div class="main_heading">
            <h2>Department Head List</h2>
            <a href="{{ route('create-departmentHead') }}" class="btn btn-success btn-sm">Create department head</a>
        </div>
        <div class="main_content  bg-white">
            <?php $message = Session::get('message') ?>

            @if(isset($message))
                <div class="alert alert-success alert-dismissible fade show">
                    <button href="#" class="close" data-dismiss="alert" aria-label="close">&times;</button>
                    {{ $message }}
                </div>
            @endif
            <table id="table_id" class="display table table-bordered table-hover table-striped text-center">
                <thead class="bg-info text-white">
                <tr>
                    <th> # </th>
                    <th>Department Head Name</th>
                    <th>Head of Department</th>
                    <th>Head of Department Pin</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @php($i=1)
                @foreach($departmentHeads as $departmentHead)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $departmentHead->eName }}</td>
                        <td>{{ ucwords($departmentHead->department_name) }}</td>
                        <td>{{ $departmentHead->departmentHead_pin }}</td>
                        <td>{{ $departmentHead->publication_status == 1 ? 'Published' : 'Unpublished' }}</td>
                        <td>
                            <a href="{{ url('single-advertisement') }}" class="btn btn-info btn-sm" title="View">
                                <i class="fas fa-search-plus"></i>
                            </a>
                            <a onclick="return confirm('Are you sure to delete!'); "  href="{{ url('delete-advertisement' ) }}" class="btn btn-danger btn-sm" title="Delete">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
                <tbody>
            </table>

        </div>
    </div>
@endsection