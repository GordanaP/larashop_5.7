<?php

Route::get('/', function () {
    return view('welcome');
});

//Route::view('/test', 'test');

Route::namespace('User')->group(function () {
    Route::prefix('my-profile')->as('customers.')->group(function () {
        Route::get('/', 'CustomerController@show')->name('show');
        Route::patch('/', 'CustomerController@update')->name('update');
        Route::post('/', 'CustomerController@store')->name('store');
    });

    Route::prefix('my-settings/account')->as('accounts.')->group(function () {
        Route::get('/', 'AccountController@show')->name('show');
        Route::post('/', 'AccountController@store')->name('store');
        Route::patch('/', 'AccountController@update')->name('update');
    });

    Route::prefix('my-favorites')->as('favorites.')->group(function () {
        Route::get('/', 'FavoriteController@index')->name('index');
        Route::post('/{product}', 'FavoriteController@store')->name('store');
    });
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::namespace('Product')->group(function() {
    Route::get('/products/image/{product}', 'ProductController@showImage')->name('products.show.image');

    Route::resource('products', 'ProductController', [
        'only' => ['index', 'show']
    ]);

    Route::post('colors', 'ColorController@index')->name('colors.index');

    Route::prefix('reviews')->as('reviews.')->group(function () {
        Route::get('/{product}', 'ReviewController@index')->name('index');
        Route::get('/{product}/save', 'ReviewController@create')->name('create');
        Route::post('/{product}', 'ReviewController@store')->name('store');
        Route::put('/{product}', 'ReviewController@update')->name('update');
    });
});

Route::namespace('Cart')->group(function() {
    Route::prefix('my-cart')->as('carts.')->group(function() {
        Route::get('/', 'CartController@show')->name('show');
        Route::get('/checkout', 'CartController@checkout')->name('checkout');
        Route::get('/empty', 'CartController@empty')->name('empty');
        Route::post('/{product}', 'CartController@store')->name('store');
        Route::get('/{rowId}', 'CartController@remove')->name('remove');
        Route::patch('/{rowId}', 'CartController@update')->name('update');
    });
});


Route::get('/orders/print-pdf/{order}', 'PDFController@pdfOrder')->name('orders.pdf');

Route::resource('orders', 'Order\OrderController', [
    'only' => ['index', 'create', 'store', 'show']
]);

Route::get('/shippings/create', 'AjaxController@createShipping')->name('shippings.create');
Route::get('/order/create', 'AjaxController@createOrder')->name('order.create');
Route::get('/product/{product}', 'AjaxController@showProduct')->name('product.show');