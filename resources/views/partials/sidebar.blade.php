<h4>Todo lists</h4>
<hr>
@foreach ($user->todolists as $todolist)
<p><a href="{{ action('TodoListsController@show', [$todolist->id]) }}"><span class="glyphicon glyphicon-list" aria-hidden="true"></span> {{ $todolist->name }} ({{ count($todolist->todos)}})</a></p>
@endforeach

<a href="/todolists/create"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Create new list</a>