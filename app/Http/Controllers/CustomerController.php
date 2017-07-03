<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User as Customer;
class CustomerController extends Controller
{


  public function __construct(){
    \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
  }

  public function updatePayment(Request $request){
    try {
  // Use Stripe's bindings...

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

} catch(\Stripe\Error\Card $e) {
  // Since it's a decline, \Stripe\Error\Card will be caught
  // /dd($e->getMessage());
  abort(422, $e->getMessage());
} catch (\Stripe\Error\RateLimit $e) {
  // Too many requests made to the API too quickly
} catch (\Stripe\Error\InvalidRequest $e) {
  // Invalid parameters were supplied to Stripe's API
} catch (\Stripe\Error\Authentication $e) {
  // Authentication with Stripe's API failed
  // (maybe you changed API keys recently)
} catch (\Stripe\Error\ApiConnection $e) {
  // Network communication with Stripe failed
} catch (\Stripe\Error\Base $e) {
  // Display a very generic error to the user, and maybe send
  // yourself an email
} catch (Exception $e) {
  // Something else happened, completely unrelated to Stripe
}

  }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $user = Customer::findOrFail($id);
        $user->fill($request->all());
        $user->save();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
