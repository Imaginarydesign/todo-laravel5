@extends('app')

@section('content')
  
  @if(count($user->todolists) > 0)
  <h2 class="page-header">All tasks </h2>
  
  <table class="table table-hover">
    <tbody>
    @foreach ($user->todolists as $todolist)
      @foreach ($todolist->todos as $todo)
        <tr id="{{ $todo->id }}">
          @if ($todo->completed == 1) 
          <td style="width: 5%;"><input type="checkbox" name="completed" checked="checked"></td>
          @else
          <td style="width: 5%;"><input type="checkbox" name="completed" id="{{ $todo->id }}"></td>
          @endif
          <td>{{ $todo->name }}</td>
          <td><span class="text-muted"><em>{{ $todolist->name }}</em></span></td>
          <td style="text-align: right;"><a href="{{ action('TodosController@edit', [$todo->id]) }}">Edit</a> | <a href="javascript:deleteTodo({{$todo->id}});">Delete</a></td>
        </tr>
      @endforeach
    @endforeach
    </tbody>
  </table>
  @else
  <h2 class="page-header">You don't have any lists</h2>
  <p>Why don't you create one</p>
  @endif

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

</script>

@endsection
