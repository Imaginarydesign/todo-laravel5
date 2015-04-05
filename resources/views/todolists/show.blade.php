@extends('app')

@section('content')

  <h2 class="page-header pull-left">{{ $todolist->name }} </h2>
  <p class="pull-right" style="line-height: 55px;"><a href="{{ action('TodoListsController@edit', [$todolist->id]) }}"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Edit list</a> | <a href="javascript:deleteTodoList({{$todolist->id}});"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Delete list</a></p>
  <table class="table table-hover">
    <tbody>
      @foreach ($todolist->todos as $todo)
      <tr id="{{ $todo->id }}">
        @if ($todo->completed == 1) 
        <td style="width: 5%;"><input type="checkbox" name="completed" checked="checked"></td>
        @else
        <td style="width: 5%;"><input type="checkbox" name="completed" id="{{ $todo->id }}"></td>
        @endif
        <td>{{ $todo->name }}</td>
        <td style="text-align: right;"><a href="{{ action('TodosController@edit', [$todo->id]) }}">Edit</a> | <a href="javascript:deleteTodo({{$todo->id}});">Delete</a></td>
      </tr>
      @endforeach
    </tbody>
  </table>

  <hr>

  {{-- <p>+ Create new task</p> --}}
  {!! Form::open(['action' => 'TodosController@store', 'class' => 'form-horizontal']) !!}
  <div class="row">
    <div class="col-md-6">
      <div class="input-group">
        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => '+ Create new task...']) !!}
        {!! Form::hidden('todolist_id', $todolist->id) !!}
        <span class="input-group-btn">
          {!! Form::submit('Create', ['class' => 'btn btn-info']) !!}
        </span>
      </div>
    </div>
  </div>
  {!! Form::close() !!}

@endsection

@section('scripts')

<script type="text/javascript">
  $(function() {
    // Mark todo as complete
    $("input[name='completed']").click(function(){
      var todo_id = $(this).parent().parent().attr('id');
      if ($(this).is(':checked')) {
        var todo_completed = $(this).val();
        $(this).parent().parent().addClass('completed');
      } else {
        $(this).parent().parent().removeClass('completed');
      }
      var url = '/todos/' + todo_id;
      var token = "{!!  csrf_token()   !!}";
      $.ajax({
        type: "POST",
        url: url,
        data: { id: todo_id, _token: token,  _method:"PATCH", completed: todo_completed },
        success: function(data){
          console.log("completed "+ todo_id);
        }
      });
    });
  });
</script>

<script type="text/javascript">

// Add class to checked todos
$(":checked").parent().parent().addClass('completed');

// Delete todo
function deleteTodo(id) {
if (confirm('Really delete?')) {
    var token = "{!!  csrf_token()   !!}";
    var todo = $('#' +  id);
    console.log(todo);
    $.ajax({
      type: "POST",
      data: {_token: token, id: id, _method:"DELETE"},
      url: '/todos/' + id,
      success: function(result) {
        console.log("deleted ");
        todo.remove();
      }
    });
  }
}

// Delete todolist
function deleteTodoList(id) {
if (confirm('Really delete?')) {
    var token = "{!!  csrf_token()   !!}";
    var todolist = id;
    console.log(todolist);
    $.ajax({
      type: "POST",
      data: {_token: token, id: id, _method:"DELETE"},
      url: '/todolists/' + id,
      success: function(result) {
        console.log("deleted ");
        window.location = 'home';
      }
    });
  }
}
</script>

@endsection





