@extends('app')

@section('content')
  <h2>{{ $todolist->name }}</h2>
  <p><a href="{{ action('TodoListsController@edit', [$todolist->id]) }}">Rename</a></p>
@endsection