<?php

namespace App\Http\Controllers;

use App\Product;
use App\Slide;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function getIndex(){
        $slide = Slide::all();
        $new_product =  Product::where('new',1)->get();
        return view('page.home',compact('slide','new_product'));
    }

    public function getProductType(){
        return view('page.product_type');
    }

    public function getProductDetail(){
        return view('page.product_detail');
    }

    public function getContact(){
        return view('page.contact');
    }

    public function getAbout(){
        return view('page.about');
    }
}
