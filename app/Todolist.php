<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Todolist extends Model {

  /**
   * Todolist belongs to user
   */
	public function user()
    {
      return $this->belongsTo('App\User');
    }

}
