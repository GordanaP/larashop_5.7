<?php

Route::get('/', function () {
    return view('welcome');
});

//Route::view('/test', 'test');

Route::resource('users', 'User\AccountController', [
    'only' => ['store']
]);

Route::get('my-profile', 'User\CustomerController@show')->name('customers.show');
Route::patch('my-profile', 'User\CustomerController@update')->name('customers.update');
Route::post('my-profile', 'User\CustomerController@store')->name('customers.store');
Route::get('/settings/account', 'User\AccountController@show')->name('accounts.show');
Route::patch('/settings/account', 'User\AccountController@update')->name('accounts.update');

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
        Route::get('/checkout', 'CartController@checkout')->name('checkout');
        Route::get('/empty', 'CartController@empty')->name('empty');
        Route::post('/{product}', 'CartController@store')->name('store');
        Route::get('/{rowId}', 'CartController@remove')->name('remove');
        Route::patch('/{rowId}', 'CartController@update')->name('update');
    });

    Route::resource('orders', 'OrderController', [
        'only' => ['index', 'create', 'store', 'show']
    ]);
});

Route::get('/orders/print-pdf/{order}', 'PDFController@pdfOrder')->name('orders.pdf');

Route::get('/shippings/create', 'AjaxController@createShipping')->name('shippings.create');
Route::get('/order/create', 'AjaxController@createOrder')->name('order.create');
Route::get('/product/{product}', 'AjaxController@showProduct')->name('product.show');