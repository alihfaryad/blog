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
            @include('includes.post-card')
            <div class="col-12">
                {{ $posts->links() }}
            </div>
        </div>
    </div>
@endsection
