<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderModel extends Model
{
    protected $table = 'order';
	public $timestamps = false;
	public function product(){
		return $this->hasMany("App\OrderDelileModel", "order_id");
	}
}
