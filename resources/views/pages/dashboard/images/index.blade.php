@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a href="{{ url('dashboard/images/create') }}" class="btn btn-primary">Upload Image</a>
        </div>
    </div>
    <br>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{$title}}</div>
                <div class="card-body">
                    <table class="table table-striped">
                    @if (count($images) > 0)
                        <tr>
                            <th>Name</th>
                            <th>URI</th>
                        </tr>
                        @foreach ($images as $image)
                        <tr>
                            <td><a href="/storage/post_image/{{ $image->URI }}">{{ $image->name }}</a></td>
                            <td>/storage/post_image/{{ $image->URI }}</td>
                        </tr>
                        @endforeach
                    @endif
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
