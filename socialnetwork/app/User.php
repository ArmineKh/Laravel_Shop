<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
// use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Model 
{
	// use Illuminate\Auth\Authenticatable;
	// use Authenticatable;

    protected $table = 'users';
    
    public function posts(){
    	return $this->hasMany('App\Post', "user_id");
    }
     public function likes(){
    	return $this->hasMany('App\Like');
    }
    public function requests(){
    	return $this->hasMany('App\Requests');
    }
    public function friends(){
    	return $this->hasMany('App\Friends'); 
    }
}
