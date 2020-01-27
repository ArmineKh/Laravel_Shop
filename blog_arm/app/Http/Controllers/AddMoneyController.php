<?php
namespace App\Http\Controllers;
use App\Http\Requests;
use Illuminate\Http\Request;
use Validator;
use URL;
use Session;
use Redirect;
use Input;
use App\User;
use Stripe\Error\Card;
use Cartalyst\Stripe\Stripe;
use App\ProductModel;
use App\CardModel;
use App\OrderModel;
use DB;
class AddMoneyController extends Controller
{
	public function payWithStripe()
	{
		$user_id = Session::get('user')->id;
		$cards = CardModel::where('user_id',$user_id)->get();
		$totalPrice = 0;
		foreach ($cards as $item) {
			$count = $item['count'];
			$price = ProductModel::where(['id'=>$item['product_id']])->first('price')->price;
			$totalPrice += $count * $price;
 		}
		 
		
		return view("paywithstripe")->with('totalPrice',$totalPrice);
	}
	public function postPaymentWithStripe(Request $request)
	{
		$validator = Validator::make($request->all(), [
			"card_no" => "required",
			"ccExpiryMonth" => "required",
			"ccExpiryYear" => "required",
			"cvvNumber" => "required",
 //"amount" => "required",

		]);
		$input = $request->all();
		if ($validator->passes()) { 
			$input = array_except($input,array("_token"));
			$stripe = Stripe::make("sk_test_wCkKbHu6LrPLB1hzvqS5fmHn00ItnoU8LK");
			try {
				$token = $stripe->tokens()->create([
					"card" => [
						"number" => $request->get("card_no"),
						"exp_month" => $request->get("ccExpiryMonth"),
						"exp_year" => $request->get("ccExpiryYear"),
						"cvc" => $request->get("cvvNumber"),
					],
				]);
 // $token = $stripe->tokens()->create([
 // "card" => [
 // "number" => "4242424242424242",
 // "exp_month" => 10,
 // "cvc" => 314,
 // "exp_year" => 2020,
 // ],
 // ]);
				if (!isset($token["id"])) {
					return redirect()->route("addmoney.paywithstripe");
				}

				$user_id = Session::get('user')->id;
				$cards = CardModel::where('user_id',$user_id)->get();
				$totalPrice = 0;
				foreach ($cards as $item) {
					$count = $item['count'];
					$price = ProductModel::where(['id'=>$item['product_id']])->first('price')->price;
					$totalPrice += $count * $price;
		 		}



				$charge = $stripe->charges()->create([
					"card" => $token["id"],
					"currency" => "USD",
					"amount" => $totalPrice,
					"description" => "Add in wallet",
				]);


					$order = new OrderModel();
					$order->sum = $count * $price;
					$order->user_id = $user_id;
					$order->save();
					$order_id =$order->id;

				foreach ($cards as $item) {
					DB::table('order_detile')->insert(['order_id' => $order_id, 'product_id' => $item['product_id'], 'price'=> ($item['product']->price) , 'count'=> $item['count']]);
					DB::table('card')->where('user_id', '=', $user_id)->where('product_id', '=', $item['product_id'])->delete();
				}
		
		
				
				if($charge["status"] == "succeeded") {
 /**
 * Write Here Your Database insert logic.
 */

 return redirect('/myOrders');
} else {
	\Session::put("error","Money not add in wallet!!");
	return redirect()->route("addmoney.paywithstripe");
}
} catch (Exception $e) {
	\Session::put("error",$e->getMessage());
	return redirect()->route("addmoney.paywithstripe");
} catch(\Cartalyst\Stripe\Exception\CardErrorException $e) {
	\Session::put("error",$e->getMessage());
	return redirect()->route("addmoney.paywithstripe");
} catch(\Cartalyst\Stripe\Exception\MissingParameterException $e) {
	\Session::put("error",$e->getMessage());
	return redirect()->route("addmoney.paywithstripe");
}
}
}
}