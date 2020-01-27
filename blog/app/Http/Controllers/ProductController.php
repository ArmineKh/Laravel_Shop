<?php

namespace App\Http\Controllers;

use App\ProductModel;
use App\CardModel;
use App\WishListModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Validator;
use DB;
use App\Http\Controllers\Input;

class ProductController extends Controller {
	function addProd() {
		return view("product");
	}
	function avelacnelApranq(Request $r) {
		$validator = Validator::make(

			[
				'name' => $r->name,
				'price' => $r->price,
				'count' => $r->count,
			],
			[
				'name' => 'required',
				'price' => 'required',
				'count' => 'required',
			]
		);

		if ($validator->fails()) {
			Session::flash("error", $validator->errors()->all());
			return Redirect::to("/addproduct");
		}
		$obj = new ProductModel();
		$obj->name = $r->name;
		$obj->price = $r->price;
		$obj->count = $r->count;
		$obj->user_id = Session::get('user')->id;

		if ($r->has("photo")) {
			$name = uniqid() . time() . ".jpg";
			$r->photo->move("uploads", $name);
			$obj->photo = $name;
		}
		$obj->save();

		return Redirect::to("/showproduct");
	}
	function showproduct() {
		$product = ProductModel::all();
		return view('showProduct')->with('products', $product); 
	}

	function addToCard($id){

		$user_id = Session::get("user")->id;
		$product_id = $id;
		$count = 1;
		$ka = CardModel::where(array(
			"user_id" => $user_id,
			"product_id" => $product_id
		))->get()->first();
		if(!$ka){
			$card = new CardModel();
			$card->user_id = $user_id;
			$card->product_id = $product_id;
			$card->count = $count;
			$card->save();			
		}else{
			$item = CardModel::where('user_id',$user_id)->where('product_id', $product_id)->get()->first();
			$card = CardModel::where(array(
				"user_id" => $user_id,
				"product_id" => $product_id))
			->get()->first();
			$productCount = $item->count;
			if(($card->count+1) > $productCount){
				Session::flash('error1', 'There are not so many products in the store');
            	return Redirect::to("/card");
			} else {
			DB::update("update card set count = count+1 where product_id = $product_id and user_id = $user_id");
		}
		}
		// $productPrice = CardModel::where(array(
		// 	"user_id" => $user_id,
		// 	"product_id" => $product_id
		// ))->get("count")->first() * ProductModel::where(['id' =>$product_id])->get()->first();
		return Redirect::to("/card");
	}
	function addToWish($id){
		$user_id = Session::get("user")->id;
		$count = 1;
		$product_id = $id;
		$card = new WishListModel();
		$card->user_id = $user_id;
		$card->product_id = $product_id;
		$card->count = $count;
		$card->save();
		return Redirect::to("/wish");
	}
 
 	function showMyProducts(){
    	$user_id = Session::get("user")->id;
    	$products = ProductModel::where('user_id', $user_id)->get();
    	return view('showMyProducts')->with('products', $products);
    }

	function deleteMyProduct($id){
    	$user_id = Session::get("user")->id;
		$product_id = $id;
		DB::delete("delete from product where id = $id");
    	return Redirect::to("/myProducts/");

	}
	function editMyProduct($id){
		$product_id = $id;
		$user = Session::get("user");
    	$product = ProductModel::where('id', $product_id)->get()->first();
    	return view('editProduct')->with('product', $product)->with('user', $user);
	}
	function saveEdition(Request $r,$product_id){
		$product = ProductModel::where('id', $product_id)->get()->first();
		$product->name = $r->name;
		$product->price = $r->price;
		$product->count = $r->count;
			//photon poxel movov u db-um photoi anuny poxel
		if ($r->has("file")) {
			$file = $r->file('file');
			$name = time() . ".jpg";
			$file->move("uploads", $name);
			$product->photo = $name;
			ProductModel::where("id", $product_id)->update(["photo"=>$name]);
			
			// $img = Image::make($file);
			// $img->save($name);

			// DB::update("update product set photo = '$name' where id = $product_id");

		}
		$product->save();
		return Redirect::to("/myProducts");


	}

	function searchProduct(Request $r){ 
    $q = $r->param1;
    $min = $r->min;
    $max = $r->max;
    $product = ProductModel::where('name','LIKE','%'. $q.'%')->whereBetween('price', [$min, $max])->get();

    $products = [];
    foreach ($product as $key) {
    	$key['user'] = $key->user;
    	$products[]=$key;
    }
    if(count($products) > 0)
        return $products;
    
}

	function showUserProduct($id){
		$user_id = $id;
    	$products = ProductModel::where('user_id', $user_id)->get();
    	return view('showMyProducts')->with('products', $products);
	}

	function fedbacks($id) {
		$data = DB::table('order_detile')->where("product_id",$id)->get();
        // $data = OrderDelilsModel::where("product_id",$id)->get();
        return view("productfedbacks") -> with("result", $data);
    }
	

}
