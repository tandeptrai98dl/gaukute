<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductType;
use App\Slide;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function getIndex(){
        $slide = Slide::all();
        $new_product =  Product::where('new',1)->paginate(4);
        $promo_product =  Product::where('promotion_price','<>',0)->paginate(8);
        return view('page.home',compact('slide','new_product','promo_product'));
    }

    public function getProductType($type){
        $products = Product::where('type_id',$type)->get();
        $related_products = Product::where('type_id','<>',$type)->inRandomOrder()->limit(3)->get();
        $product_type     = ProductType::where('id',$type)->first();
        $types = ProductType::all();

        return view('page.product_type',compact('products','related_products','types','product_type'));
    }

    public function getProductDetail($id){
        $detail = Product::where('id',$id)->first();
        $similar = Product::where('type_id',$detail->type_id)->inRandomOrder()->limit(3)->get();
        return view('page.product_detail',compact('detail','similar'));
    }

    public function getContact(){
        return view('page.contact');
    }

    public function getAbout(){
        return view('page.about');
    }
}
