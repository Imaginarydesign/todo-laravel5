@extends('app')

@section('content')
  
  <div class="row">
    
    <div class="col-md-12">
      <h2 class="page-header">Edit todo list</h2>
    </div>

    <div class="col-md-12">
      
      {!! Form::open(['action' => 'TodoListsController@update', 'method' => 'patch']) !!}
        <div class="form-group">
          {!! Form::label('name','Name:') !!}
          {!! Form::text('name', $todolist->name, ['class' => 'form-control']) !!}
          {!! Form::hidden('id', $todolist->id) !!}
        </div>
        <div class="form-group">
          {!! Form::submit('Save', ['class' => 'btn btn-info']) !!}  
        </div>
      {!! Form::close() !!}
    </div>
  </div>

@endsection