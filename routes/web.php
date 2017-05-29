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

Route::get('/about', function(){
  return view('about');
});

Route::get('/how-does-it-work', function(){
  return view('how-does-it-work');
});

Route::resource('category', 'FoodCategoryController');
Route::resource('resturant', 'ResturantController');
Route::resource('menu-item', 'MenuItemController');
Route::post('place-order','OrderController@placeOrder');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('charge','OrderController@charge');
Route::get('charge','OrderController@charge');
Route::group(['prefix' => 'customer'],function(){
  Route::post('update-payment','CustomerController@updatePayment');
});
Route::get('/privacy', function(){
  return view('privacy');
});
Route::get('/terms',function(){
  return view('/terms');
});
Route::resource('customer','CustomerController');
