<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserModel;
use App\ProductModel;
use DB;



class Admin extends Controller
{
    function showUsers(){
    	$users = UserModel::all();
		return view('showUsers')->with('users', $users);

    }

    function allproducts(){
    	$products = ProductModel::all()->where('status', 0);
		return view('showAdminProduct')->with('products', $products);
    }

    function activProduct(Request $r){
    $id = $r->prod_id;
    $product = ProductModel::where('id', $id)->update(['status'=> 1]);
    $user_id = $product->user_id;
    $email = UserModel::where('id',$user_id)->get('login');
    $data = 'Your product is activ.';
    //message uxarkel tvyal userin vor producty aktiv e
     
      DB::table('notification')->where('user_id', $user_id)->where('product', $id)->update(['note' => 'Your product is activ']);




	}

    function sendMessage(Request $r){
        //message uxarkel tvyal userin vor producty jnjvel e
        $product_id = $r->product_id; 
        $mess = $r->mess;

    }

	function deleteProduct(Request $r){
    $id = $r->prod_id;
    $product = ProductModel::where('id',$id)->delete();

	}

	function blockUser(Request $r){
		$user_id = $r->user_id;
		$user = UserModel::where('id',$user_id)->update(['block'=> 1]);
	}


}





// <?php

// namespace App;

// use Illuminate\Database\Eloquent\Model;

// class orderDetailsModel extends Model
// {
//     Protected $table   = "order_details";
//     Public $timestamps = false; 

//     public function product() {
//         return $this->belongsTo("App\ProductModel", "product_id");
//     }
// }



// <?php

// namespace App;

// use Illuminate\Database\Eloquent\Model;

// class noteModel extends Model
// {
//     Protected $table   = "notifications";
//     Public $timestamps = false; 

//     public function product() {
//         return $this->belongsTo("App\ProductModel", "product_id");
//     }
// }


// <?php

// namespace App;

// use Illuminate\Database\Eloquent\Model;

// class orderModel extends Model
// {
//     Protected $table   = "order";
//     Public $timestamps = false; 
// }




// <?php

// namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Session;

// use App\ProductModel;
// use App\cartModel;
// use App\orderDetailsModel;
// use App\orderModel;
// use DB;

// class orderShow extends Controller
// {
//     function show() {
//         $user = Session::get('user')->id;
//         $data = orderModel::where("user_id",$user)->get();
//         return view('orders')->with('result', $data);
//     }

//     function details($id) {
//         $data  = orderDetailsModel::where("order_id",$id)->get();
//         return view('orderdetails')->with('result', $data);
//     }

//     function fedback(Request $r) {
//         $fed  = $r->fedback;
//         $id   = $r->id;
//         $data = orderDetailsModel::where("id",$id)->get();
//         orderDetailsModel::where('id', $id)->update(['fedback' => $fed]);
//         $user = Session::get('user')->id;
//         $data = orderModel::where("user_id",$user)->get();
//         return view("orders")->with('result', $data);
//     }
// }
