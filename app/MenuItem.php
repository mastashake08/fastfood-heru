<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    //
    protected $guarded = [];
    public function resturant(){
      return $this->belongsTo('App\Resturant');
    }
}
