<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserModel extends Model {
	protected $table = 'users';
	public $timestamps = false;

	public function products(){
		return $this->hasMany("App\ProductModel", "user_id");
	}
}
