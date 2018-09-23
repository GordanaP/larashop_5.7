<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('products', 'Product\ProductController');

Route::get('/my-cart', 'Product\\CartController@show')->name('carts.show');
Route::get('/my-cart/empty', 'Product\\CartController@empty')->name('carts.empty');
Route::post('/my-cart/{product}', 'Product\\CartController@store')->name('carts.store');
