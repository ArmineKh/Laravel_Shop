<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CardModel extends Model
{
    protected $table = 'card';
	public $timestamps = false;

	public function product(){
		return $this->belongsTo("App\ProductModel", "product_id");
	}
}
