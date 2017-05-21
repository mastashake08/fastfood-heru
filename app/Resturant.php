<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resturant extends Model
{
    //
    protected $guarded = [];
    public function category(){
      return $this->belongsTo('App\FoodCategory','food_category_id');
    }
    public function items(){
      return $this->hasMany('App\MenuItem', 'resturant_id');
    }
}
