<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('products', 'Product\ProductController');

Route::get('/my-cart', 'Product\\CartController@show')->name('carts.show');
