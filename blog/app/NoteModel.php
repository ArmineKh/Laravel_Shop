<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NoteModel extends Model
{
     Protected $table   = "note";
    Public $timestamps = false; 

    public function product() {
    	return $this->belongsTo("App\ProductModel", "product_id");
    }
}
