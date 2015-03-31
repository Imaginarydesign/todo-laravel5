<?php namespace App\Http\Controllers;

// use View;
use App\Todolist;
use App\Http\Requests;
use App\Http\Controllers\Controller;

// use Illuminate\Http\Request;
use Request;

class TodoListsController extends Controller {

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
		return view('todolists/create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
    $input = Request::all();

    $todolist = new Todolist;
    $todolist->name = $input['name']; // or Request::get('name');
    $todolist->user_id = $input['user_id'];
    $todolist->save();

    // Alternatively
    // Todolist::create($input);

    return redirect('home');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$todolist = Todolist::find($id);
    $data = [];
    $data['todolist'] = $todolist;
    // $data['todolists'] = Todolist::all();
    return view('todolists.show', $data);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
    $todolist = Todolist::find($id);
    $data = [];
    $data['todolist'] = $todolist;

    // view()->share();
    // View::share($data);

		return view('todolists/edit', $data);
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
		$todolist = Todolist::find($id);

    $todolist->name = Request::get('name');
    $todolist->save();

    return redirect('home');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{

    $todolist = Todolist::find($id);

    $todolist->delete();

    return redirect('home');
	}

}
