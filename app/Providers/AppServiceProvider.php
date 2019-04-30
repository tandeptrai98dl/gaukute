<?php

namespace App\Providers;

use App\Cart;
use App\ProductType;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('header',function ($view){
           $teddy   = ProductType::where('kind','teddy')->get();
           $animal  = ProductType::where('kind','animal')->get();
           $another = ProductType::where('kind','another')->get();
           $cartoon = ProductType::where('kind','cartoon')->get();
           $hot     = ProductType::where('kind','hot')->get();
           $pillow  = ProductType::where('kind','pillow')->get();
           $nani    = ProductType::where('kind','nani')->get();

           $data = array(
               'teddy'      => $teddy,
               'animal'     => $animal,
               'another'    => $another,
               'cartoon'    => $cartoon,
               'hot'        => $hot,
               'pillow'     => $pillow,
               'nani'       => $nani
           );
           $view->with('data',$data);
        });

        view()->composer('header',function ($view){
            if(Session('cart')){
                $old_cart = Session::get('cart');
                $cart     = new Cart($old_cart);
                $view->with('product_cart',$cart->items);
            }
        });
        
    }
}
