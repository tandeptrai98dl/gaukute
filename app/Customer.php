<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = "customer";

    public function bill_detail(){
        return $this->hasMany('App\Bill','customer_id','id');
    }
}
