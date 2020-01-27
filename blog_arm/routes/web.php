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
// Route::get('/login', function(){
// 	return view('grancum');
// });

Route::get('/login', 'Account@login');

Route::get('/list', 'Account@cucak');
Route::post('/avelacnel', 'Account@avelacnelUser');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/registration', 'User@registration');
Route::post('/registration', 'User@avelacnel');

Route::get('/logIn', 'User@signin');
Route::post('/tryLogin', 'User@login');

Route::get('/logOut', "User@logOut");

Route::get('/profile', 'User@showprofile')->middleware('chackLogin');
Route::post('photo', 'User@showimages')->middleware('chackLogin');

Route::get('/addproduct', 'ProductController@addprod')->middleware('chackLogin');
Route::post('/addProductData', "ProductController@avelacnelApranq")->middleware('chackLogin');

Route::post("/changePic", "User@updatePhoto")->middleware('chackLogin');
Route::get('/showproduct', 'ProductController@showproduct');

Route:: get('/editProfile','User@edit')->middleware('chackLogin');
// Route::get('/editProf','User@update');

Route::get('/addToCard/{id}', 'ProductController@addToCard')->middleware('chackLogin');
Route::get('/card', "CardController@show")->middleware('chackLogin');

Route::get('/card/remove/{id}/{user}', 'CardController@remove')->middleware('chackLogin');
Route::get('/card/countUp/{id}/{user}', 'CardController@countUp')->middleware('chackLogin');
Route::get('/card/countDown/{id}/{user}', 'CardController@countDown')->middleware('chackLogin');
Route::get('/card/moveWishList/{id}/{user}/{count}', 'CardController@addToWishList')->middleware('chackLogin');

Route::get('/addToWish/{id}', 'ProductController@addToWish');
Route::get('/wish', "WishListController@showWishList");

Route::get('/wish/remove/{id}/{user}', 'WishListController@remove');
Route::get('/wish/countUp/{id}/{user}', 'WishListController@countUp');
Route::get('/wish/countDown/{id}/{user}', 'WishListController@countDown');
Route::get('/wish/moveCard/{id}/{user}/{count}', 'WishListController@addToCard');

Route::get('/myProducts/', 'ProductController@showMyProducts');
Route::get('/deleteProduct/{id}/', 'ProductController@deleteMyProduct');
Route::get('/editProduct/{id}/', 'ProductController@editMyProduct');
Route::post('/editProduct/{id}', 'ProductController@saveEdition');


Route::any('/search', 'ProductController@searchProduct');

Route::get('/admin/users/', 'Admin@showUsers');
Route::get('/admin/products', 'Admin@allproducts');
Route::post('/admin/activ', 'Admin@activProduct');

Route::post('/admin/delete', 'Admin@deleteProduct');
Route::post('/admin/block', 'Admin@blockUser');


Route::get('/verify/{hash}/{id}', "User@verify");
Route::get('/user/verify', "User@forgot");
Route::post('/user/forgotpassw', 'User@forgotpassw');
Route::post('/user/emailcode', 'User@comparCode');

Route::post('/admin/sendMess', 'Admin@sendMessage');

Route::get("addmoney/stripe/", array("as" => "addmoney.paywithstripe","uses" => "AddMoneyController@payWithStripe"));
Route::post('addmoney/stripe', array('as' => 'addmoney.stripe','uses' => 'AddMoneyController@postPaymentWithStripe'));

Route::get('/myOrders', 'OrderController@showMyOrders');
Route::get("/fedback","OrderController@fedback");



// Route::get("/orders", "orderShow@show");
// Route::get("/orderdetails/{id}","orderShow@details");
// Route::get("/seefedbacks/{id}","ProductController@fedbacks");
