@extends('app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <h3>Edit todo list</h3>
      <hr>
      {!! Form::open(['action' => 'TodoListsController@update']) !!}
        <div class="form-group">
          {!! Form::label('name','Name:') !!}
          {!! Form::text('name', $todolist->name, ['class' => 'form-control']) !!}
          {!! Form::hidden('id', $todolist->id) !!}
        </div>
        <div class="form-group">
          {!! Form::submit('Save', ['class' => 'btn btn-success form-control']) !!}  
        </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>
@endsection