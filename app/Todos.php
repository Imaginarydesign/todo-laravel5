<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Todos extends Model {

  protected $fillable = [
    'name',
    'todolist_id'
  ];

	/**
   * Todo belongs to todolist
   */
  public function todolist()
    {
      return $this->belongsTo('App\Todolist');
    }

}
