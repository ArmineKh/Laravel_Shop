<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Validator;
use App\NoteModel;

use App\UserModel;
use App\ProductModel;
use DB;



class Admin extends Controller
{
    function isadmin(){
        $type = Session::get('user')->type;
        if ($type == 'admin') {
           return Redirect::to('/admin/users/');
        } else {
            Session::flash("er", ["You are not admin"]);
            return Redirect::to('/profile');
        }
        

    }
    function showUsers(){
    	$users = UserModel::all();
		return view('showUsers')->with('users', $users);

    }

    function allproducts(){
    	$products = ProductModel::all()->where('status', 0);
		return view('showAdminProduct')->with('products', $products);
    }

    function activProduct($id){
         $user_id = ProductModel::where('id',$id)->first();
        DB::update("update product set type='Yes' where id = $id");
        $obj = new NoteModel();
        $obj ->user_id     = $user_id->user_id;
        $obj ->product_id  = $id;
        $obj ->note        = 'Activ';
        $obj ->save();
        $data = ProductModel::all();
        return view("showAdminProduct")->with("products", $data);
   
	}

    

    function delete($id) {
        $data = ProductModel::where("id", $id)->first();
        return view("deleteproduct")->with("result", $data);
    }


	function deleteproduct(Request $r){
        $id = $r->id;
        echo($id);

        $data  = DB::table('product')->where('id', $id)->first();
var_dump($data);

        $valid = Validator::make([
                                    'deletereason'     => $r->deletereason,
                                ],                                
                                [
                                    'deletereason'     => 'required',
                                ]);

        if($valid->fails()){
            Session::flash("errors", $valid->errors()->all());
            return view("/deleteproduct")->with("result", $data);
        }
        
       $data  = DB::table('product')->where('id', $id)->first();
       
        $obj               = new NoteModel();
        $obj->user_id     = $data->user_id;
        $obj->product_id  = $id;
        $obj->note        = $r->deletereason;
        $obj->save();
        DB::delete("delete from product where id = $id");
        return view("showAdminProduct")->with("products", $data);

	}

	function blockUser($id){
		$user = UserModel::where('id',$id)->first();
         
        return view("blockinp")->with("result", $user);

	}

  function blockd(Request $r) {
        $id   = $r ->id;
        $data = UserModel::where("id", $id)->first();
        $valid = Validator::make([ 
                                    'blocktime'     => $r->blocktime,
                                ],                                
                                [
                                    'blocktime'     => 'required',
                                ]);

        if($valid->fails()){
            Session::flash("errors", $valid->errors()->all());
            return view("/blockinp")->with("result", $data);
        }
        $time = $r ->blocktime*60+time();
        DB::update("update users set blocktime=$time where id=$id");
        return view("/blockinp")->with("result", $data);
    }


}





