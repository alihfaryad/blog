@extends('layouts.app')

@section('content')
<?php
$str = $post->body;
$str = preg_replace_callback(
    '|(?s)(?<=<code>).*?(?=</code>)|',
    function ($matches) {
        return str_replace('<', '&lt;', str_replace('>', '&gt;', $matches[0]));
    },
    $str
);
$str = preg_replace_callback(
    '|(?s)(?<=<pre class="prettyprint">).*?(?=</pre>)|',
    function ($matches) {
        return str_replace('<', '&lt;', str_replace('>', '&gt;', $matches[0]));
    },
    $str
);
?>
<div class="container">
    <div class="row">
        {{ $str }}
        <div class="col-md-10">
            {!! Form::open(['action' => ['PostController@update', $post->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                <div class="form-group">
                    {{ Form::label('title', 'Title') }}
                    {{ Form::text('title', $post->title, ['class' => 'form-control'])  }}
                </div>
                <div class="form-group">
                    {{ Form::label('body', 'Body') }}
                    {{ Form::textarea('body', htmlentities($str), ['class' => 'form-control', 'id' => 'article-ckeditor'])  }}
                </div>
                <div class="form-group">
                    {{ Form::label('categories', 'Categories') }}
                    {{ Form::text('categories', $post->categories, ['class' => 'form-control', 'placeholder' => 'Post Categories...'])  }}
                </div>
                <div class="form-group">
                    {{ Form::label('cover_image', "Cover Image") }}<br>
                    {{ Form::file('cover_image') }}
                </div>
                {{ Form::hidden('_method', 'PUT') }}
                {{ Form::submit('Update', ['class' => 'btn btn-primary']) }}
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
