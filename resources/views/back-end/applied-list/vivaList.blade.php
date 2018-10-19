@extends('back-end.master')
@section('body')
    <div class="back-end-mainContent">
        <div class="main_heading">
            <h2>Viva List</h2>
        </div>
        <div class="main_content  bg-white">
            <?php $message = Session::get('message') ?>

            @if(isset($message))
                <div class="alert alert-success alert-dismissible fade show">
                    <button href="#" class="close" data-dismiss="alert" aria-label="close">&times;</button>
                    {{ $message }}
                </div>
            @endif

            {{ Form::open(['route'=>'save-finalList','method'=>'POST','name'=>'finalListForm','id'=>'finalListForm']) }}

            <table id="table_id" class="display table table-bordered table-hover table-striped text-center">
                <thead class="bg-info text-white">
                <tr>
                    <th>All <input type="checkbox" id="checkAll" /> </th>
                    <th>Unique Id</th>
                    <th>Post Name</th>
                    <th>Total Exp.</th>
                    <th>Skills</th>
                    <th>Photo</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($vivaLists as $vivaList)
                    <tr>
                        <td><input type="checkbox" name="checkSingle[]" id="singleCheckAll" value="{{ $vivaList->id }}"/></td>
                        <td>{{ $vivaList->unique_apply_id }}</td>
                        <td>{{ $vivaList->post_name }}</td>
                        <td>@if($vivaList->totalExperince == '') 0 @else {{ $vivaList->totalExperince }} @endif</td>
                        <td>{{ $vivaList->skills }}</td>
                        <td><img src="{{ asset($vivaList->photo) }}" width="50" alt="Applicant Image"/></td>

                        <td>
                            <a href="{{ url('single-advertisement',['id' => $vivaList->id ]) }}" class="btn btn-info btn-sm" title="View">
                                <i class="fas fa-search-plus"></i>
                            </a>
                            <a onclick="return confirm('Are you sure to delete!'); "  href="{{ url('delete-advertisement',['id' => $vivaList->id] ) }}" class="btn btn-danger btn-sm" title="Delete">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
                <p class="text-right">
                    <input class="btn btn-success btn-sm showHidden" type="submit" name="final_list" id="short_list" value="Final List"/>
                </p>
                <tbody>
            </table>

            {{ Form::close() }}
        </div>
    </div>
@endsection