@extends('app')

@section('content')
  <h2 class="page-header">{{ $todolist->name }}</h2>
  <p><a href="{{ action('TodoListsController@edit', [$todolist->id]) }}">Rename</a></p>

  <table class="table">
    <tbody>
      <tr>
        <td>Checkbox</td>
        <td>Buy milk</td>
        <td style="text-align: right;">Edit | Delete</td>
      </tr>
      <tr>
        <td>Checkbox</td>
        <td>Buy milk</td>
        <td style="text-align: right;">Edit | Delete</td>
      </tr>
      <tr>
        <td>Checkbox</td>
        <td>Buy milk</td>
        <td style="text-align: right;">Edit | Delete</td>
      </tr>
      <tr>
        <td>Checkbox</td>
        <td>Buy milk</td>
        <td style="text-align: right;">Edit | Delete</td>
      </tr>
    </tbody>
  </table>

@endsection