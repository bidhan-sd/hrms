@extends('front-end.master')
@section('body')
    <div class="front-end-content">
        <table class="table table-bordered table-striped text-center table-hover">
            <thead class="bg-info">
            <tr>
                <th scope="col">SL No</th>
                <th scope="col">Post Name</th>
                <th scope="col">Details</th>
                <th scope="col">Apply</th>
            </tr>
            </thead>
            <tbody>
            @php($i = 1)
            @foreach($advertisements as $advertisement)
            <tr>
                <th>{{ $i++ }}</th>
                <td>{{ $advertisement->post_name }}</td>
                <td><a href="{{ route('advertisement-single',['id' => $advertisement->id ]) }}" class="btn btn-outline-success">View</a></td>
                <td><a href="{{ route('apply-online',['id' => $advertisement->id ]) }}" class="btn btn-outline-success">Apply Online</a></td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
