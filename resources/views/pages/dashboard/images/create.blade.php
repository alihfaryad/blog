@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10">
            {!! Form::open(['action' => ['ImageController@store'], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                <div class="form-group">
                    {{ Form::label('name', 'Name') }}
                    {{ Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Image Name...'])  }}
                </div>
                <div class="form-group">
                    {{ Form::label('post_image', "Post Image") }}<br>
                    {{ Form::file('post_image') }}
                </div>
                {{ Form::submit('Submit', ['class' => 'btn btn-primary']) }}
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
