@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a href="{{ url('dashboard/users/create') }}" class="btn btn-primary">Create User</a>
        </div>
    </div>
    <br>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{$title}}</div>
                <div class="card-body">
                    @if (count($users) > 0)
                        @foreach ($users as $user)
                        <li><a href="/dashboard/users/{{ $user->id }}">{{ $user->name }}</a></li>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
