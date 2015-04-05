<?php namespace App\Http\Controllers;

use App\Todo;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\TodoListsController;
use Auth;

// use Illuminate\Http\Request;
use Request;

class TodosController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return 'Create a todo form';
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Request::all();

    $todo = new Todo;
    $todo->name = $input['name']; // or Request::get('name');
    $todo->todolist_id = $input['todolist_id'];
    $todo->save();

    // Alternatively
    // Todolist::create($input);

    return redirect()->back();
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$todo = Todo::find($id);
    $data = [];
    $data['todo'] = $todo;
    $data['todolist'] = $todo->todolist_id;

    // Check if user is logged in
    if (!Auth::guest()) {
      return view('todos/edit', $data);
    } else {
      return redirect('home');
    }
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
    $id = Request::get('id');
		$todolist_id = Request::get('todolist_id');
    $todo = Todo::find($id);

    if (Request::get('name')) {
      $todo->name = Request::get('name');
    }
    if (Request::get('completed')) {
      $todo->completed = 1;
    } else {
      $todo->completed = 0;
    }
    $todo->save();

    return redirect()->action('TodoListsController@show', ['todolist_id' => $todolist_id]);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$id = Request::get('id');
    $todolist_id = Request::get('todolist_id');
    $todo = Todo::find($id);
    $todo->delete();

    return redirect()->action('TodoListsController@show', ['todolist_id' => $todolist_id]);
    // return redirect()->back();
	}

}
