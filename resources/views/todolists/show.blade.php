@extends('app')

@section('content')

  <h2 class="page-header">{{ $todolist->name }} </h2>

  <table class="table">
    <tbody>
      @foreach ($todos as $todo)
      <tr>
        <td>Checkbox</td>
        <td>{{ $todo->name }}</td>
        <td style="text-align: right;"><a href="{{ action('TodosController@edit', [$todo->id]) }}">Edit</a> | Delete</td>
      </tr>
      @endforeach
    </tbody>
  </table>

  <hr>

  <p>Create new todo</p>

  {!! Form::open(['action' => 'TodosController@store']) !!}
    <div class="form-group">
      {{-- {!! Form::label('name','Name:') !!} --}}
      {!! Form::text('name', null, ['class' => 'form-control']) !!}
      {!! Form::hidden('todolist_id', $todolist->id) !!}
    </div>
    <div class="form-group">
      {!! Form::submit('Save', ['class' => 'btn btn-info']) !!}  
    </div>
  {!! Form::close() !!}

  <hr>
  <p class="pull-right"><a href="{{ action('TodoListsController@edit', [$todolist->id]) }}">Rename list</a></p>

@endsection