<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Todolist extends Model {

  protected $fillable = [
    'name',
    'user_id'
  ];

  /**
   * Todolist belongs to user
   */
	public function user()
    {
      return $this->belongsTo('App\User');
    }

  public function todos()
    {
      return $this->hasMany('App\Todo');
    }

}
