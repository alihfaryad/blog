@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{$title}}</div>

                <div class="card-body">
                    @if (count($posts) > 0)
                        @foreach ($posts as $post)
                        <li><a href="/dashboard/posts/{{ $post->id }}">{{ $post->title }}</a></li>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
