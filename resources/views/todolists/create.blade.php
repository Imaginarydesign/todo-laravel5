@extends('app')

@section('content')
  
  <div class="row">
    
  <div class="col-md-12">
    <h2 class="page-header">New todo list</h2>
  </div>

    <div class="col-md-12">

      {!! Form::open(['action' => 'TodoListsController@store']) !!}
        <div class="form-group">
          {!! Form::label('name','Name:') !!}
          {!! Form::text('name', null, ['class' => 'form-control']) !!}
          {!! Form::hidden('user_id', Auth::user()->id) !!}
        </div>
        <div class="form-group">
          {!! Form::submit('Save', ['class' => 'btn btn-info']) !!}  
        </div>
      {!! Form::close() !!}

      @if ($errors->any())
        <ul class="alert alert-danger">
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      @endif

    </div>
  </div>

@endsection