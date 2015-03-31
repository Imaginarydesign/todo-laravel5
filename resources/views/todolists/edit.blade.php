@extends('app')

@section('content')

  <h3>Edit todo list</h3>
  <hr>
  {!! Form::open(['action' => 'TodoListsController@update', 'method' => 'patch']) !!}
    <div class="form-group">
      {!! Form::label('name','Name:') !!}
      {!! Form::text('name', $todolist->name, ['class' => 'form-control']) !!}
      {!! Form::hidden('id', $todolist->id) !!}
    </div>
    <div class="form-group">
      {!! Form::submit('Save', ['class' => 'btn btn-success form-control']) !!}  
    </div>
  {!! Form::close() !!}

@endsection