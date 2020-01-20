@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10">
            {!! Form::open(['action' => ['CategoryController@store'], 'method' => 'POST']) !!}
                <div class="form-group">
                    {{ Form::label('name', 'Name') }}
                    {{ Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Category Name...'])  }}
                </div>
                {{ Form::submit('Submit', ['class' => 'btn btn-primary']) }}
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
