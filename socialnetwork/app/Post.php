<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';
    public function user()
    {
    	return $this->belongsTo('App\User', "user_id");
    }
    public function likse(){
    	return $this->hasMany('App\Like', 'post_id');
    }
}
