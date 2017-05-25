<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    //
    public function __construct(){
      \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
    }

    public function updatePayment(Request $request){
      $exp = explode("/",$request->cardExpiry);
      $token = \Stripe\Token::create(array(
        "card" => array(
          "number" => $request->cardNumber,
          "exp_month" => $exp[0],
          "exp_year" => $exp[1],
          "cvc" => $request->cardCVC
        )
      ));
      $customer = \Stripe\Customer::retrieve(auth()->user()->customer_id);
      $customer->source = $token;
      $customer->save();
      return back();
    }
}
