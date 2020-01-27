<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model {
	protected $table = 'product';
	public $timestamps = false;

	public function user(){
		return $this->belongsTo("App\UserModel", "user_id");
	}
}
