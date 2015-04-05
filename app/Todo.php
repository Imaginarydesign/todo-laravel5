<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model {

  protected $fillable = [
    'name',
    'todolist_id',
    'completed'
  ];

	/**
   * Todo belongs to todolist
   */
  public function todolist()
    {
      return $this->belongsTo('App\Todolist');
    }

}
