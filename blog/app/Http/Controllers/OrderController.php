<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\OrderModel;
use App\OrderDelileModel;
use Illuminate\Support\Facades\Session;
use DB;

class OrderController extends Controller
{
    
    function show() {
        $user = Session::get('user')->id;
        $data = OrderModel::where("user_id",$user)->get();
        return view('orders')->with('result', $data);
    }

     function details($id) {
        // $data  = OrderDelilsModel::where("order_id",$id)->get(); 
        $data = DB::table('order_detile')->where("order_id",$id)->get();
        return view('orderdetails')->with('result', $data);
    }

     function fedback(Request $r) {
        $fed  = $r->fedback;
        $id   = $r->id;

        // var_dump("vars"); die();
        // $data = OrderDelilsModel::where("id",$id)->get();
        $data = DB::table('order_detile')->where("id",$id)->get();
        // OrderDelilsModel::where('id', $id)->update(['fedback' => $fed]);
        DB::table('order_detile')->where('id', $id)->update(['fedback' => $fed]);
        $user = Session::get('user')->id;
        $data = OrderModel::where("user_id",$user)->get();
        return view("orders")->with('result', $data);
    }

    
}
