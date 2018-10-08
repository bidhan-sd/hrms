@extends('back-end.master')
@section('body')
    <div class="back-end-mainContent">
        <div class="main_heading">
            <h2>Advertisement List</h2>
            <a href="{{ route('create-advertisement') }}" class="btn btn-success btn-sm">Create Advertisement</a>
        </div>
        <div class="main_content  bg-white">
            <?php $message = Session::get('message') ?>
            @if(isset($message))
                <div class="alert alert-success alert-dismissible fade show">
                    <button href="#" class="close" data-dismiss="alert" aria-label="close">&times;</button>
                    {{ $message }}
                </div>
            @endif
            <table id="table_id" class="table table-bordered table-hover table-striped text-center">
                <thead class="bg-info text-white">
                <tr>
                    <th>#</th>
                    <th>Post Name</th>
                    <th>Open date</th>
                    <th>Deadline</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @php($i=1)
                @foreach($advertisements as $advertisement)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $advertisement->post_name }}</td>
                    <td>{{ Carbon\Carbon::parse($advertisement->advertisement_date)->format('F d, Y') }}</td>
                    <td>{{ Carbon\Carbon::parse($advertisement->deadline)->format('F d, Y') }}</td>
                    <td>
                        <a href="{{ route('single-advertisement',['id' => $advertisement->id ]) }}" class="btn btn-info btn-sm" title="View">
                            <i class="fas fa-search-plus"></i>
                        </a>
                        @if($advertisement->publication_status == 1)
                        <a href="{{ route('unpublished-advertisement',['id' => $advertisement->id] ) }}" class="btn btn-info btn-sm" title="Published">
                            <i class="fas fa-arrow-up"></i>
                        </a>
                        @else
                        <a href="{{ route('published-advertisement',['id' => $advertisement->id] ) }}" class="btn btn-danger btn-sm" title="Unpublished">
                            <i class="fas fa-arrow-down"></i>
                        </a>
                        @endif
                        <a href="{{ route('edit-advertisement',['id' => $advertisement->id] ) }}" class="btn btn-success btn-sm" title="Edit">
                            <span class="fas fa-edit"></span>
                        </a>
                        <a onclick="return confirm('Are you sure to delete!'); "  href="{{ route('delete-advertisement',['id' => $advertisement->id] ) }}" class="btn btn-danger btn-sm" title="Delete">
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