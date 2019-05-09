<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    function Customers(){
         return $this->hasMany('App\Customer');
    }
}
