<?php

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', 'PageController@getIndex');
Route::get('product-type/{type}', 'PageController@getProductType');
Route::get('product-detail/{id}', 'PageController@getProductDetail');
Route::get('contact', 'PageController@getContact');
Route::get('about', 'PageController@getAbout');