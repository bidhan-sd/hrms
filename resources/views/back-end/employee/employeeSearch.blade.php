@extends('back-end.master')
@section('body')
    <div class="back-end-mainContent">

        <div class="main_content  bg-white">
            <div class="search_box">

                {{ Form::open(['url'=>'singleSearchEmployee','method'=>'POST']) }}

                <div class="col-md-6">
                    <input type="text" name="employeeSearch" class="form-control" placeholder="Search Employee"/>
                </div>
                <br/>
                <div class="col-md-3">
                    <input type="submit" value="Submit"/>
                </div>
                <br/>
                {{ Form::close() }}

            </div>

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
                    <th> Pin </th>
                    <th>Name</th>
                    <th>Designation</th>
                    <th>Department</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>photo</th>
                </tr>
                </thead>
                <tbody>
                @php($i = 1)
                @foreach($employess as $employes)
                    <tr>
                        <td>{{ $employes->employee_pin }}</td>
                        <td>{{ $employes->full_name }}</td>
                        <td>{{ $employes->degination }}</td>
                        <td>{{ ucwords($employes->department_name) }}</td>
                        <td>0{{ $employes->mobile_number }}</td>
                        <td>{{ $employes->email_address }}</td>
                        <td><img width="50" src="{{ $employes->photo }}"/></td>
                    </tr>
                @endforeach
                <tbody>
            </table>
        </div>
    </div>
@endsection