<?php

namespace App\Services;
use App\Product;
use DB;

class ProductService
{
    public static function create($input){
        DB::beginTransaction();
        try {
            $product = Product::create( [
                'name'              => $input['name'],
                'type_id'           => $input['type_id'],
                'unit_price'        => $input['price'],
                'promotion_price'   => $input['promotion_price'],
                'image'             => $input['image']
            ] );

            DB::commit();
            return $product;

        } catch (\Exception $e) {
            DB::rollback();
            die($e->getMessage());
            return false;
        }
    }

}