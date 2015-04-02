@extends('app')

@section('content')
  <h3>Todo lists</h3>
  <table class="table table-striped">
    <tbody>
      @foreach ($todolists as $todolist)
      <tr>
        <td><a href="{{ action('TodoListsController@show', [$todolist->id]) }}">{{ $todolist->name }}</a></td>
        <td style="text-align: right;"><a href="{{ action('TodoListsController@edit', [$todolist->id]) }}">Edit</a> | <a href="{{ action('TodoListsController@destroy', [$todolist->id]) }}">Delete</a></td>
        <?php 
        /*
         * Alternative ways of linking to route
         *
        <td><a href="/articles/{{ $todolist->id }}">Edit</a> | Delete</td>
        <td><a href="{{ url('/articles', $todolist->id) }}">Edit</a> | Delete</td>
        */ ?>
      </tr>
      @endforeach
    </tbody>
  </table>
  <a href="{{ action('TodoListsController@create') }}">Create a new todo list!</a>
@endsection
