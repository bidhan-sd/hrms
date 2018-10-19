@extends('front-end.master')
@section('body')
    <div class="front-end-content">
        <?php $message = Session::get('message') ?>
        @if(isset($message))
            <div class="alert alert-success alert-dismissible fade show">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                {{ $message }}
            </div>
        @endif
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
                <td><a href="{{ route('apply-online',['id' => $advertisement->id, 'post_name'=> $advertisement->post_name ]) }}" class="btn btn-outline-success">Apply Online</a></td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
