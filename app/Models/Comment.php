<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Comment extends Model {


	public static $rules = [
		 'body' => 'required'
	];


	protected $fillable = ['body', 'moictati_id', 'user_id'];
	
	public function post()  {  
		return $this->belongsTo('App\Models\Moictati')->withTimestamps();
	 }
	 	 
	 public function commen()  {
	 	return $this->belongsTo('User')->withTimestamps();
	 }

}

