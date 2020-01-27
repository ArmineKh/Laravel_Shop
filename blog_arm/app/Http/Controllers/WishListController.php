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

class WishListController extends Controller
{
     function showWishList(){
        $user = Session::get('user')->id;
    	$data = WishListModel::where('user_id', $user)->get();
    	return view('showWishList')->with('wishes', $data);
    }

    function remove($id, $user){
    	DB::delete("delete from wishlist where product_id = $id and user_id = $user");
    	return Redirect::to("/wish");
    }

    function countUp($id, $user){
    	$item = WishListModel::where('user_id',$user)->where('product_id', $id)->get()->first();
    	if ($item->count>=$item->product->count) {
            Session::flash('error1', 'There are not so many products in the store');
            return Redirect::to("/wish");
    		
    	}else{
            DB::update( "update wishlist set count = count+1 where product_id = $id and user_id = $user");
    	return Redirect::to("/wish");
    }

    	
    }

    function countDown($id, $user){
        $item = WishListModel::where('user_id',$user)->where('product_id', $id)->get()->first();
        if ($item->count<=1){
            DB::delete("delete from wishlist where product_id = $id and user_id = $user");
            return Redirect::to("/wish"); 
        } else{
             DB::update( "update wishlist set count = count-1 where product_id = $id and user_id = $user");
        return Redirect::to("/wish");

        }
    }

    function addToCard($id, $user, $count){

    	 DB::delete("delete from wishlist where product_id = $id and user_id = $user");
        $item = CardModel::where('user_id',$user)->where('product_id', $id)->get()->first();
       DB::insert( "insert into card (user_id, product_id, count) values ($user, $id, $count)");
        return Redirect::to("/card");
    }

}
