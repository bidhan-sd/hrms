@extends('back-end.master')
@section('body')
    <div class="back-end-mainContent">
        <div class="main_heading">
            <h2>Employee List</h2>
            <a href="{{ route('create-advertisement') }}" class="btn btn-success btn-sm">Create Employee</a>
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
                    <th>Name</th>
                    <th>Degination</th>
                    <th>Employee Pin</th>
                    <th>Department</th>
                    <th>Photo</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @php($i = 1)
                @foreach($employess as $employes)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $employes->employee_name }}</td>
                        <td>{{ $employes->degination }}</td>
                        <td>{{ $employes->employee_pin }}</td>
                        <td>{{ ucwords($employes->department_name) }}</td>
                        <td><img width="50" src="{{ asset($employes->ePhoto) }}"/></td>
                        <td>
                            <a href="{{ url('single-advertisement',['id' => $employes->id ]) }}" class="btn btn-info btn-sm" title="View">
                                <i class="fas fa-search-plus"></i>
                            </a>
                            <a onclick="return confirm('Are you sure to delete!'); "  href="{{ url('delete-advertisement',['id' => $employes->id] ) }}" class="btn btn-danger btn-sm" title="Delete">
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