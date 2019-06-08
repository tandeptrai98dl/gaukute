<?php

//Route::get('/', function () {
//    return view('welcome');
//});

Route::resources([
    'admin'    => 'AdminController'
]);

Route::get('/' ,
[
    'as'=>'home',
    'uses'=>'PageController@getIndex'
]);

Route::get('search',[
    'as'=>'search',
    'uses'=>'PageController@getSearch'
]);

Route::get('product-type/{type}', 'PageController@getProductType');
Route::get('product-detail/{id}', 'PageController@getProductDetail');
Route::get('add-to-cart/{id}', 'PageController@addToCart');
Route::get('delete-cart/{id}', 'PageController@deleteItemCart');

Route::post('edit-product/{id}', 'AdminController@update');
Route::get('delete-product/{id}', 'AdminController@destroy');

Route::get('contact', 'PageController@getContact');
Route::get('about', 'PageController@getAbout');

Route::get('login', 'PageController@getLogin');
Route::post('login', 'PageController@postLogin');
Route::get('signup', 'PageController@getSignup');
Route::post('signup', 'PageController@postSignup');
Route::get('logout', 'PageController@getLogout');

route::get('checkout', 'PageController@getCheckout');
route::post('checkout', 'PageController@postCheckout');