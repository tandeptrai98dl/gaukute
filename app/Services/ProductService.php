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
                'description'       => $input['description'],
                'unit_price'        => $input['unit_price'],
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

    public static function delete($product)
    {
        DB::beginTransaction();
        try {
            $product->delete();
            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollback();
            return false;
        }
    }

}