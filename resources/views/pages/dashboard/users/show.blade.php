@extends('layouts.app')

@section('content')
@if (!Auth::guest())
<div class="container">
    <div class="row">
        <div class="col-12">
            <a href="/dashboard/users/{{ $user->id }}/edit" class="btn btn-success">Edit</a>
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal">
                Delete
            </button>
        </div>
    </div>
</div>
@endif
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1>{{ $user->name }}</h1>
                </div>
                <div class="card-body">
                    {!! $user->email !!}
                </div>
                <div class="card-footer">
                    Created @ {{ $user->created_at }}
                    <br>
                    Updated @ {{ $user->updated_at }}
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Are You Sure You Want To Delete?</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            {!! Form::open(['action' => ['UserController@destroy', $user->id], 'method' => 'POST']) !!}
                {{ Form::hidden('_method', 'DELETE') }}
                {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
            {!! Form::close() !!}
        </div>
      </div>
    </div>
  </div>
@endsection
