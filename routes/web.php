<?php

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', 'PageController@getIndex');
Route::get('product-type', 'PageController@getProductType');
Route::get('product-detail', 'PageController@getProductDetail');
Route::get('contact', 'PageController@getContact');
Route::get('about', 'PageController@getAbout');