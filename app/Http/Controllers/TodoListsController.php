<?php namespace App\Http\Controllers;

// use View;
use App\Todolist;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Redirect;
use App\Http\Requests\CreateTodolistRequest;
use Auth;

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
	public function store(CreateTodolistRequest $request)
	{
    $input = Request::all();

    $todolist = new Todolist;
    $todolist->name = $input['name']; // or Request::get('name');
    $todolist->user_id = $input['user_id'];
    $todolist->save();

    // Alternatively
    // Todolist::create($input);
    
    $lastInserted = $todolist->id;

    return redirect()->action('TodoListsController@show', ['id' => $lastInserted]);
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

    // Check if todolist exist
    if ($todolist) {
      $data = [];
      $data['todolist'] = $todolist;

      // If current user is loggedin
      if (!Auth::guest()) {
        // Check if Todolist belongs to loggedin user
        if ($todolist->user_id == Auth::user()->id) {
          return view('todolists.show', $data);
        }
      } else {
        // Redirect to home
        return redirect('home');
      }
      die('Not yours');
    } else {
      return redirect('home');
    }
    
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

    if (!Auth::guest()) {
      // Check if Todolist belongs to logged in user
      if ($todolist->user_id == Auth::user()->id) {
  		  return view('todolists/edit', $data);
      } else {
        return view('home');
      }
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
		$todolist = Todolist::find($id);

    $todolist->name = Request::get('name');
    $todolist->save();

    \Session::flash('flash_message', 'List updated');

    return redirect()->action('TodoListsController@show', ['id' => $id]);
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
