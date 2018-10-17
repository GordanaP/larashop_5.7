<?php

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::namespace('Product')->group(function() {
    Route::get('/products/image/{product}', 'ProductController@showImage')->name('products.show.image');

    Route::resource('products', 'ProductController', [
        'only' => ['index', 'show']
    ]);

    Route::post('colors', 'ColorController@index')->name('colors.index');
});

Route::namespace('Cart')->group(function(){
    Route::prefix('my-cart')->as('carts.')->group(function(){
        Route::get('/', 'CartController@show')->name('show');
        Route::get('/empty', 'CartController@empty')->name('empty');
        Route::post('/{product}', 'CartController@store')->name('store');
        Route::get('/{rowId}', 'CartController@remove')->name('remove');
        Route::patch('/{rowId}', 'CartController@update')->name('update');
    });

    Route::resource('orders', 'OrderController', [
        'only' => ['create', 'store', 'show']
    ]);
});

Route::get('/orders/print-pdf/{order}', 'PDFController@pdfOrder')->name('pdf.order');
