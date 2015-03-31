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