<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->type == 'admin'){
          $with = [
            'categories' => \App\FoodCategory::paginate(10),
            'resturants' => \App\Resturant::paginate(10)
          ];
          return view('admin.home')->with($with);
        }
        else{
          $with = [
            'categories' => \App\FoodCategory::paginate(10),
            'customer' => \Stripe\Customer::retrieve(auth()->user()->customer_id),
            'user' => auth()->user()
          ];
          return view('customer.home')->with($with);
        }
    }
}
