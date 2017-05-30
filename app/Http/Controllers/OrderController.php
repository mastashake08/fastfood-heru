<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function __construct(){
      setlocale(LC_MONETARY, 'en_US.UTF-8');
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

    public function placeOrder(Request $request){
      $price=0;
      $message = '';
      $resturant = null;
      $item_count = 0;
      $type_price = 0;
      foreach($request->order as $key => $value){
        $item = \App\MenuItem::findOrFail($key);
        if($value > 0){
        $price += $item->price * $value;
        $message .=  "{$item->name} x {$value} \n";
        $resturant = $item->resturant;
        $item_count +=1;
      }
      }
      if($item_count >=1 && $item_count <5 ){
        $type_price += ceil($price * 0.08);
      }
      elseif($item_count >=5 && $item_count <10){
        $type_price += ceil($price * 0.06);
      }
      elseif($item_count > 10){
        $type_price += ceil($price * 0.05);
      }
      $with = [
        'price' => $price + $type_price,
        'message' => $message,
        'resturant' => $resturant
      ];

      return view('confirm-order')->with($with);
    }

    public function charge(Request $request){
      // Set your secret key: remember to change this to your live secret key in production
// See your keys here: https://dashboard.stripe.com/account/apikeys
\Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

// Token is created using Stripe.js or Checkout!
// Get the payment token submitted by the form:
if($request->user() != null){
    $customer = $request->user()->customer_id;
    // Charge the user's card:
    $charge = \Stripe\Charge::create(array(
      "amount" => $request->price * 100,
      "currency" => "usd",
      "description" => $request->message,
      "metadata" => [
        'address' => $request->user()->address,
        'resturant_id' => $request->resturant
      ],
      "customer" => $customer,
    ));

}
else{
  $token = $request->input('reservation.stripe_token');
  // Charge the user's card:
  $charge = \Stripe\Charge::create(array(
    "amount" => $request->price * 100,
    "currency" => "usd",
    "description" => $request->message,
    "metadata" => [
      'address' => $request->address,
      'resturant_id' => $request->resturant
    ],
    "source" => $token,
  ));

}

// notify admins
$admins = \App\User::where('type','admin')->get();
$admins->each(function($item,$value) use($charge){
  $item->notify(new \App\Notifications\NewOrder($charge));
});
$resturant = \App\Resturant::find($request->resturant);
$resturant->notify(new \App\Notifications\NewOrder($charge));
$with = [
  'charge' => $charge,
  'resturant' => $resturant
];
return view('order-success')->with($with);
    }
}
