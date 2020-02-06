@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-10 col-md-12">
            <div class="card">
                <div class="card-header">
                    <small class="text-muted">You are here: <a href="/">Home</a> / <a href="/blog">Blog</a> / {{ $post->title }}</small>
                </div>
                <div class="card-body">
                    <div id="post-header">
                        <h1>{{ $post->title }}</h1>
                        <ul class="list-inline" id="post-initial-data">
                            <li class="list-inline-item">
                                <img src="/storage/images/watch.png" width="15" class="img-fluid" alt="Post Date" /> 
                                <span>{{ Carbon\Carbon::parse($post->created_at)->format('jS \\of F\\, Y') }} /</span>
                            </li>
                            <li class="list-inline-item">
                                <img src="/storage/images/read-glasses.png" width="15" class="img-fluid" alt="Post Read Minutes" />
                                <span>{{ $post->read_time }} min read /</span>
                            </li>
                            <li class="list-inline-item">
                                <img src="/storage/images/typewritter.png" width="15" class="img-fluid" alt="Post Author" />
                                <span>{{ $author->name }}</span>
                            </li>
                        </ul>
                        <ul class="list-inline" id="post-categories">
                            <li class="list-inline-item">
                                <i class="fas fa-hashtag"></i>
                            </li>
                            @foreach ($cat as $category)
                                <li class="list-inline-item">
                                    <a href="/blog/category/{{ $category[0]->URI }}" class="btn btn-secondary">{{ $category[0]->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                        <img src="/storage/cover_images/{{ $post->cover_image }}" class="img-fluid post-cover-image" alt="{{ $post->title }}" />
                    </div>
                    @php
                        $social_links = Share::load('http://127.0.0.1/blog/'.$post->URI, $post->title)->services('facebook', 'twitter', 'reddit', 'pinterest');
                    @endphp
                    {{-- <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <ul class="list-inline d-flex justify-content-center" id="post-social-links">
                                <li class="list-inline-item">
                                    <a href="{{ $social_links['facebook'] }}" class="facebook" target="_blank">Facebook</a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="{{ $social_links['twitter'] }}" class="twitter" target="_blank">Twitter</a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="{{ $social_links['reddit'] }}" class="reddit" target="_blank">Reddit</a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="{{ $social_links['pinterest'] }}" class="pinterest" target="_blank">Pinterest</a>
                                </li>
                            </ul>
                        </div>
                    </div> --}}
                    <div class="post-body">{!! $post->body !!}</div>
                </div>
                <div class="card-footer">
                    {{-- <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <ul class="list-inline d-flex justify-content-center" id="post-social-links">
                                <li class="list-inline-item">
                                    <a href="{{ $social_links['facebook'] }}" class="facebook" target="_blank">Facebook</a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="{{ $social_links['twitter'] }}" class="twitter" target="_blank">Twitter</a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="{{ $social_links['reddit'] }}" class="reddit" target="_blank">Reddit</a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="{{ $social_links['pinterest'] }}" class="pinterest" target="_blank">Pinterest</a>
                                </li>
                            </ul>
                        </div>
                    </div> --}}
                    <div class="row justify-content-center" id="author-card">
                        <div class="col-lg-8">
                            <div id="disqus_thread"></div>
                            @push('scripts')
                            <script>
                            var URI = "/blog/"+{!! json_encode($post->URI) !!};
                            // var disqus_config = function () {
                            //     this.page.url = URI; 
                            //     this.page.identifier = {!! json_encode($post->URI) !!};
                            // };
                            (function() {
                            var d = document, s = d.createElement('script');
                            s.src = 'https://ali-hassan-1.disqus.com/embed.js';
                            s.setAttribute('data-timestamp', +new Date());
                            (d.head || d.body).appendChild(s);
                            })();
                            </script>
                            @endpush
                            @stack('scripts')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
