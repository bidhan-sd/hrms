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
                            <a href="{{ url('single-advertisement',['id' => $employes->id ]) }}" class="btn btn-info btn-sm" title="View" data-toggle="modal" data-target="#mymodal{{ $i }}">
                                <i class="fas fa-search-plus"></i>
                            </a>
                            <a onclick="return confirm('Are you sure to delete!'); "  href="{{ url('delete-advertisement',['id' => $employes->id] ) }}" class="btn btn-danger btn-sm" title="Delete">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                        </td>
                    </tr>

                    <!-- Modal -->
                    <div class="modal fade" id="mymodal{{ $i }}" tabindex="-1" role="dialog" aria-labelledby="myModalTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <?php $suppervisors = App\supervisor::where('department_name',$employes->department_name)->orderBy('id','DESC')->get() ?>
                                    @foreach($suppervisors as $suppervisor)
                                        <p>{{ $suppervisor->supervisor_pin }}</p>
                                    @endforeach
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save changes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal End -->
                @endforeach


                <tbody>
            </table>
        </div>
    </div>
@endsection