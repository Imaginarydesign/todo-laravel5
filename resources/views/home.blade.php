@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Home</div>
				<div class="panel-body">
					You are logged in!
				</div>
			</div>
      <h3>Todo lists</h3>
      <table class="table">
        <tbody>
          @foreach ($todolists as $todolist)
          <tr>
            <td>{{ $todolist->name }}</td>
            <td><a href="todolists/{{ $todolist->id }}">Edit</a> | Delete</td>
          </tr>
          @endforeach
        </tbody>
      </table>
      <a href="/todolists/create">Create a new todo list!</a>
		</div>
	</div>
</div>
@endsection
