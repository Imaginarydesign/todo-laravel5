<?php namespace App\Providers;

use App\Todolist;
use App\User;
use Auth;

use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot()
	{
    
		view()->composer('*', function($view)
    {
      if (!Auth::guest()) {
        $user = User::find(Auth::user()->id);
        // $todolists = $user->todolists;
        $view->with('user', $user);
      }
    });
	}

	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register()
	{
		//
	}

}
