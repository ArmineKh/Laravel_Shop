<?php

namespace App\Http\Controllers;

use App\AccountModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class Account extends Controller {
	function login() {
		// print 'Hasar tex';
		$x = array('PHP', 'JS', 'C#', 'Java');
		return view('grancum')->with('name', 'Gago')
			->with('anunner', $x);

	}
	function cucak() {
		$data = AccountModel::all();
		// dd($data);
		return view('mardik')->with('result', $data);
	}
	function avelacnelUser(Request $r) {
		$obj = new AccountModel();
		$obj->name = $r->name;
		$obj->surname = $r->surname;
		$obj->age = $r->age;
		$obj->save();
		return Redirect::to("/list");
	}
}
