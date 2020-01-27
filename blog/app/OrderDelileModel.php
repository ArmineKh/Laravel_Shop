<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDelileModel extends Model
{
    protected $table = 'order_delile';
	public $timestamps = false;
	public function product() {
    	return $this->belongsTo("App\ProductModel", "product_id");
    }
}
