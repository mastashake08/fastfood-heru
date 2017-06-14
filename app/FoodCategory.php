<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FoodCategory extends Model
{
    //
    protected $fillable = ['name', 'photo','category'];
    public function resturants(){
      return $this->hasMany('App\Resturant');
    }
}
