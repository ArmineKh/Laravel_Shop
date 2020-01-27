<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\User;
use App\Friends;
use App\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Input;

use Validator;



class UserController extends Controller
{
	

	public function postSignUp(Request $r)
	{
		$validator = Validator::make(

			[
				'email' => $r->email,
				'first_name' => $r->first_name,
				'password' => $r->password,
			],
			[
				'email' => 'required|email|unique:users',
				'first_name' => 'required',
				'password' => 'required|min:6',
			]
		);
		if ($validator->fails()) {

			return redirect('/')
			->withErrors($validator)
			->withInput();
		}
		$email = $r->email;
		$first_name = $r->first_name;
		$password = bcrypt($r->password);
		
		$user = new User();
		$user->email = $email;
		$user->first_name = $first_name;
		$user->password = $password;

		$user->save();
		Session::put("user", $user);

		return Redirect::to("dashboard");
	}

	
	public function postSignIn(Request $r)
	{
		$validator = Validator::make(

			[
				'email' => $r->email,
				'password' => $r->password,
			],
			[
				'password' => 'required|min:6',
				'email' => 'required|email',
			]
		);

		if ($validator->fails()) {
			return redirect('/loginpage')
			->withErrors($validator)
			->withInput();
		} else {
			$user = User::where("email", $r->email)->first();
			if (empty($user)) {
				return redirect('/loginpage')
				->withErrors($validator)
				->withInput();
			} else {
				if (password_verify($r->password, $user->password)) {
					Session::put("user", $user);
					return Redirect::to('dashboard');
				} else {
					return redirect('/loginpage')
					->withErrors($validator)
					->withInput();
				}

			}
		}
	}

	public function getAccount()
	{
		return view('account', ['user' => Session::get('user')]);
	}   

	public function postSaveAccount(Request $r)
	{
		$validator = Validator::make(
			[
				'first_name' => $r->first_name,
			],
			[
				'first_name' => 'required|max:120'
			]);
		if ($validator->fails()) 
		{
			return Redirect::to("/account")->withErrors($validator)
			->withInput();
		} else{
			$user = Session::get('user');
			$user->first_name = $r->first_name;
			$file = $r->file('image');
			$filename = $r->first_name.'-'.$user->id.'.jpg';
			$user->photo = $filename;
			$user->update();

			if ($file){
				$file->move('Images', $filename);
			}
			return Redirect::to('account');
		}
	}

	public function getUserImage($filename)
	{

		$file = Session::get('user')->photo;
		return Redirect::to('account');
	}

	public function logOut(){
		Session::flush();
		return Redirect::to('/loginpage');
	}

	public function search(Request $r)
	{
		$search = $r->search;
		$id = Session::get('user')->id;
		$data = User::where('first_name','LIKE',$search.'%')->get();
		
		$arr = [];
		$arr[] = $data; 
		foreach ($data as $key ) {
 
			$user_id = $key['id'];
			$req = Requests::where('my_id', $id)->where('user_id', $user_id)->where("is_requered", 1)->get();
			$friend = DB::table('friends')->where('my_id', $id)->where('friend_id', $user_id)->orWhere("is_friend", 1)->get();
			  
			if ($id==$user_id) {
				$key['status']	= 3;				
			}
			else if (!empty($req)) {
				$key['status']	= 2;				
			}
			else if (!empty($friend)) {
				$key['status']	= 1;				
			}
			else{
				$key['status']	= 0;				

			}

			$arr[]=$key;
			// return $req;
		}

		return $arr;

	}

	function getRequest(){
		$my_id = $_SESSION['user']['id'];
		$data = DB::table('friends')->where("user_id", "my_id")->get();
		print json_encode($data);
	}

	public function addFriendRequest(Request $r){
		$user_id = $r->id;
		$my_id = Session::get('user')->id;
		DB::table('requests')->insert([
			['user_id' => $user_id],
			['my_id'=> $my_id],
			["is_requered" => 1]
		]);


	}

	public function deleteRequest(){
		$friend_id = $_POST['friend_id'];
		$my_id = $_SESSION['user']['id'];
		DB::table('requests')->where('user_id', '=', "$my_id" )->where("my_id", "=", "$friend_id")->delete();
		

	}

}
