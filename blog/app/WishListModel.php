<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class WishListModel extends Model
{
    protected $table = 'wishlist';
	public $timestamps = false;

	public function product(){
		return $this->belongsTo("App\ProductModel", "product_id");
	}
}
