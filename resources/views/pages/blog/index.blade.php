@extends('layouts.app')

@section('content')
    <div class="container" id="blog">
        <div class="row" id="top-head">
            <div class="col-sm-6">
                <h1 class="big-heading">Blog .</h1>
            </div>
            <div class="col-sm-6 my-auto text-right">
                <h3>{{ Carbon\Carbon::now()->format('l\\, jS \\of F') }}</h3>
            </div>
        </div>
        <div class="row">
            @foreach ($posts as $post)
                <div class="col-sm-6 blog-card">
                    <div class="blog-card-main">
                        <div class="blog-card-header text-right">
                            <img src="/storage/cover_images/{{ $post->cover_image }}" class="img-fluid" alt="{{ $post->title }}" />
                        </div>
                        <div class="blog-card-body">
                            <h1 class="small-heading"><a href="{{ url('/blog/'.$post->URI) }}"><span></span>{{ $post->title }}</a></h1>
                            <p>{!! str_replace('<h2 style="font-style:italic">', '', Str::words($post->body, 15, '...')) !!}</p>
                        </div>
                        <div class="blog-card-footer text-right">
                            <span>{{ $post->read_time }} minutes read</span>
                            <button class="btn btn-primary">Read More +</button>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="col-12">
                {{ $posts->links() }}
            </div>
        </div>
    </div>
@endsection
