<?php

namespace App\Http\Controllers;

use App\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Mail;
use Hash;
use Validator;

class User extends Controller {
	function registration(Request $r) {

		return view("registration");
	}

	function avelacnel(Request $r) {
		$validator = Validator::make(

			[
				'name' => $r->name,
				'surname' => $r->surname,
				'password' => $r->password,
				'login' => $r->login,
			],
			[
				'name' => 'required',
				'surname' => 'required',
				'password' => 'required|min:6',
				'login' => 'required|email|unique:users',
			]
		);

		if ($validator->fails()) {

			  return redirect('/registration')
                        ->withErrors($validator)
                        ->withInput();
			// Session::flash("errors", $validator->errors()->all());
		}
		$obj = new UserModel();
		$obj->name = $r->name;
		$obj->surname = $r->surname;
		$obj->login = $r->login;
		$obj->password = Hash::make($r->password);

		$obj->save();

		$user_id = $obj->id;
		$email = $obj->login;
		$hash = md5($user_id.$email);
		 $data = array('name'=>$obj->name,
						'hash' => $hash,
						'id'=> $obj->id);
   
      Mail::send('mail', $data, function($message) use($email) {
         $message->to($email, "Shop's admin")->subject
            ('Laravel Basic Testing Mail');
         $message->from('arminekhachatryan02@gmail.com',"Shop's admin");
      });
      
		return Redirect::to("/registration")->with("message", "You are registred. Check your inbox.");
	}

	function verify($hash, $id){

		$user = UserModel::find($id);
		if ($user && md5($id.$user->login)==$hash) {
			DB::table('users')->where('id', $user->id)->update(['verify' => 1]);
		}
	}


	function login(Request $r) {
		$validator = Validator::make(

			[
				'password' => $r->password,
				'login' => $r->login,
			],
			[
				'password' => 'required|min:6',
				'login' => 'required|email',
			]
		);

		if ($validator->fails()) {
			Session::flash("errors", $validator->errors()->all());
			return Redirect::to("/logIn");
		} else {
			$user = UserModel::where("login", $r->login)->first();
			if (empty($user)) {
				Session::flash("errors", ["The login is wrong"]);
				return Redirect::to("/logIn");

			}
			else if ($user->verify != 1) {
				Session::flash("errors", ["Verify your email"]);
				return Redirect::to("/logIn");
			} else {
				if (password_verify($r->password, $user->password)) {
					Session::put("user", $user);
					return Redirect::to("/profile");
				} else {
					Session::flash("errors", ["The password is wrong"]);
					return Redirect::to("/logIn");
				}

			}

		}
	}

	function forgot(){
		return view('forgotPassword');
	}

	function forgotpassw(Request $r){
		$email = $r->email;
		$user = UserModel::where('login',$email)->first();
//
if (!$user) {
	Session::flash("errors", ["Incorrect email"]);
	
} else{
	$user_id = $user['id'];
		$hash = md5($user_id.$email);
		$data = array(
						'hash' => $hash,
						);
		UserModel::where('login',$email)->update(['emailcode'=>$hash]);
   
	    Mail::send('mailPassword', $data, function($message) use($email) {
	        $message->to($email, "Shop's admin")->subject
	            ("Your email code" );
	        $message->from('arminekhachatryan02@gmail.com',"Shop's admin");
	    });
	}
	}

	function comparCode(Request $r){
		$code = $r->code;
		$password = $r->password;
		$hash = UserModel::where(['emailcode'=>$hash]);
		//hamematel codn u hashy

	}

	function updatePhoto(Request $r) {
		if ($r->has("avatar")) {
			$file = uniqid() . md5(time()) . time() . ".jpg";
			$r->avatar->move("uploads", $file);
		}

		Session::get("user")->photo = $file;
		$u = UserModel::find(Session::get('user')->id);
		$u->photo = $file;
		$u->save();
		return Redirect::to("/profile");
	}
	function signin() {
		return view("logIn");
	}
	function showimages() {

		if ($r->has('file')) {

			$file = $r->file;
			$name = time() . ".jpg";
			$file->move('photos', $name);
		}

		Session::get('user')->photo = $name;
// baseum pntrel gtnel photon

		return Redirect::to("/profile");
	}
	function showprofile() {
		return view('profile');
	}

	

    public function edit(Request $r)
    { 
         $obj = UserModel::find(Session::get('user')->id);
        $obj->name = $r->name;
        $obj->surname = $r->surname;
        $obj->login = $r->login;
        $obj->password = Hash::make($r->password);
        $obj->save();

        Session::get('user')->name = $r->name;
        Session::get('user')->surname = $r->surname;
        Session::get('user')->login = $r->login;
        Session::get('user')->password = $r->password;

        return Redirect::to('/profile')->with('success', 'Your changes are successfully saved');
    }

    function logOut(){
    	unset($_SESSION);
    	// session_destroy();
    	return Redirect::to('logIn');
    }
    

}
