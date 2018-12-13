<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Moictati extends Model {
	//protected $fillable = [];
	protected $guarded = array('id');
	protected $table = 'moictati';

	 public function comments()  {   
	 	return $this->hasMany('App\Models\Comment');
	  }

}
