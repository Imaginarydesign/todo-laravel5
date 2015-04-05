@extends('app')

@section('content')

  <h2 class="page-header">{{ $todolist->name }} </h2>

  <table class="table">
    <tbody>
      @foreach ($todos as $todo)
      <tr>
        @if ($todo->completed == 1) 
        <td><input type="checkbox" name="completed" id="{{ $todo->id }}" checked="checked"></td>
        @else
        <td><input type="checkbox" name="completed" id="{{ $todo->id }}"></td>
        @endif
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

@section('scripts')

<script type="text/javascript">
  $(function() {


    $(":checked").parent().parent().addClass('completed');

    // Mark todo as complete
    $("input[name='completed']").click(function(){
      var todo_id = $(this).attr('id');
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

@endsection
