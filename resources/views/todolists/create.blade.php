@extends('app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <h3>Create a new to do list</h3>
      <hr>
      {!! Form::open(['url' => 'todolists']) !!}
        <div class="form-group">
          {!! Form::label('name','Name:') !!}
          {!! Form::text('name', null, ['class' => 'form-control']) !!}
          {!! Form::hidden('user_id', Auth::user()->id) !!}
        </div>
        <div class="form-group">
          {!! Form::submit('Save', ['class' => 'btn btn-success form-control']) !!}  
        </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>
@endsection