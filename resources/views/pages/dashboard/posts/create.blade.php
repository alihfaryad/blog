@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10">
            {!! Form::open(['action' => ['PostController@store'], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                <div class="form-group">
                    {{ Form::label('title', 'Title') }}
                    {{ Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Post Title...'])  }}
                </div>
                <div class="form-group">
                    {{ Form::label('body', 'Body') }}
                    {{ Form::textarea('body', '', ['class' => 'form-control', 'placeholder' => 'Post Body...', 'id' => 'article-ckeditor'])  }}
                </div>
                <div class="form-group">
                    {{ Form::label('cover_image', "Cover Image") }}<br>
                    {{ Form::file('cover_image') }}
                </div>
                {{ Form::submit('Submit', ['class' => 'btn btn-primary']) }}
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
