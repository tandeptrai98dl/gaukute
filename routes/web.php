<?php

//Route::get('/', function () {
//    return view('welcome');
//});

Route::resources([
    'admin'    => 'AdminController',
]);

Route::get('/', 'PageController@getIndex');
Route::get('product-type/{type}', 'PageController@getProductType');
Route::get('product-detail/{id}', 'PageController@getProductDetail');
Route::get('contact', 'PageController@getContact');
Route::get('about', 'PageController@getAbout');
Route::get('add-to-cart/{id}', 'PageController@addToCart');
Route::get('delete-cart/{id}', 'PageController@deleteItemCart');
Route::get('login', 'PageController@getLogin');
Route::get('signup', 'PageController@getSignup');
Route::post('signup', 'PageController@postSignup');