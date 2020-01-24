@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <img src="/storage/cover_images/{{ $post->cover_image }}" class="img-fluid" />
                    <h1>{{ $post->title }}</h1>
                </div>
                <div class="card-body">
                    @foreach ($cat as $category)
                        <a href="/blog/category/{{ $category[0]->URI }}">{{ $category[0]->name }}</a>
                    @endforeach
                    {!! $post->body !!}
                </div>
                <div class="card-footer">
                    Created @ {{ $post->created_at }}
                    <br>
                    Updated @ {{ $post->updated_at }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
