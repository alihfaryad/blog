@extends('layouts.app')

@section('content')
    @foreach ($posts as $post)
        <li><a href="{{ url($post->URI) }}">{{ $post->title }}</a></li>
    @endforeach
@endsection
