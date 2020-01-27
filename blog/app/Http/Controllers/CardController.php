<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductModel;
use App\CardModel;
use App\WishListModel;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Validator;
use DB;
class CardController extends Controller
{
    function show(){
    	$user = Session::get('user')->id;
    	$data = CardModel::where('user_id', $user)->get();
    	return view('showCard')->with('cart', $data);
    	// return $data;
    }

    function remove($id, $user){
    	// $user_id = $user;
    	// $product_id = $id;
    	DB::delete("delete from card where product_id = $id and user_id = $user");
    	return Redirect::to("/card");
    }

    function countUp($id, $user){
    	$item = CardModel::where('user_id',$user)->where('product_id', $id)->get()->first();
    	if ($item->count>=$item->product->count) {
            Session::flash('error1', 'There are not so many products in the store');
            return Redirect::to("/card");
    		
    	}else{
    	DB::update( "update card set count = count+1 where product_id = $id and user_id = $user");
    	return Redirect::to("/card");
    }

    	
    }

    function countDown($id, $user){
    	
        $item = CardModel::where('user_id',$user)->where('product_id', $id)->get()->first();
        if ($item->count<=1){
            DB::delete("delete from card where product_id = $id and user_id = $user");
            return Redirect::to("/card"); 
        } else{
           DB::update( "update card set count = count-1 where product_id = $id and user_id = $user");
        return Redirect::to("/card");

        }
    }

    function addToWishList($id, $user, $count){
        DB::delete("delete from card where product_id = $id and user_id = $user");
        $item = WishListModel::where('user_id',$user)->where('product_id', $id)->get()->first();
        if($item){
            DB::update( "update wishlit set count = count+$count where product_id = $id and user_id = $user");
        }
       DB::insert( "insert into wishlist (user_id, product_id, count) values ($user, $id, $count)");
        return Redirect::to("/wish");
        

    }

   
}
