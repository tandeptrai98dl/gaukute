<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = "product";

    protected $fillable = [
        'id',
        'name',
        'type_id',
        'description',
        'unit_price',
        'promotion_price',
        'image'
    ];

    protected $primaryKey = 'id';
    public $timestamps = false;

    public function type_product(){
        return $this->belongsTo('App\ProductType','type_id','id');
    }

    public function bill_detail(){
        return $this->hasMany('App\BillDetail','product_id','id');
    }
}
