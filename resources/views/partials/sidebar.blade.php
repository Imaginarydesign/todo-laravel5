<h4>Todo lists</h4>
<hr>
@foreach ($todolists as $todolist)
<p><a href="{{ action('TodoListsController@show', [$todolist->id]) }}"><span class="glyphicon glyphicon-list" aria-hidden="true"></span> {{ $todolist->name }} ({{ count($todolist->todos)}})</a></p>
@endforeach

<?php /*
<ul class="nav nav-sidebar">
  <li class="active">
    <a href="#">Lists</a>
    <ul>
      @foreach ($todolists as $todolist)
      <li><a href="{{ action('TodoListsController@show', [$todolist->id]) }}">{{ $todolist->name }}</a></li>
      @endforeach
    </ul>
  </li>
</ul>
*/ ?>

<a href="/todolists/create">+ Create new list</a>