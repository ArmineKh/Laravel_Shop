<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\OrderModel;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    
    public function showMyOrders(){
    	$id = Session::get('user')->id;
    	$orders = OrderModel::where(['user_id'=> $id])->get();
		return view('showOrders')->with('orders', $orders);
    }

      function fedback(Request $r) {
        $fed  = $r->fedback;
        $id   = $r->id;
        $data = OrderModel::where("id",$id)->get();
        OrderModel::where('id', $id)->update(['fedback' => $fed]);
        $user = Session::get('user')->id;
        $data = orderModel::where("user_id",$user)->get();
        return view("showfedback")->with('result', $data);
    }
}
