<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



	Route::get('/', function () {
    return view('welcome');
	});
	Route::get('/loginpage', function(){
		return view('login');
	});
	
	Route::post('/signup', 'UserController@postSignUp');

	Route::post('/signin', 'UserController@postSignIn');

	Route::get('/dashboard', 'PostController@getDashboard')->middleware('chackLogin');

	Route::post('/createpost', 'PostController@postCreatePost')->middleware('chackLogin');

	Route::get('/delete/{post_id}', 'PostController@getDeletePost')->middleware('chackLogin');

	Route::get('/logout', 'UserController@logOut')->middleware('chackLogin');

	Route::post('/edit', 'PostController@postEditPost')->middleware('chackLogin');

	Route::get('/account', 'UserController@getAccount')->middleware('chackLogin');

	Route::post('/accountSave', 'UserController@postSaveAccount')->middleware('chackLogin');
	
	Route::get('/accountImage', 'UserController@getUserImage')->middleware('chackLogin');
  
  Route::post('/like', 'PostController@postLikePost')->middleware('chackLogin');

  Route::any('/search', 'UserController@search');

  Route::any('/addFriend', 'UserController@addFriendRequest');

  Route::any("/getRequest", "UserController@getRequest");

  Route::any("/deleteRequest", "UserController@deleteRequest");
  

