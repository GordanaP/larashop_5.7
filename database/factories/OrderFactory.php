<?php

use App\Customer;
use App\Shipping;
use Faker\Generator as Faker;

$factory->define(App\Order::class, function (Faker $faker) {
    return [
        'customer_id' => Customer::first()->id,
        'shipping_id' => Shipping::first()->id,
        'subtotal' => $subtotal = rand(1000, 100000),
        'tax' => $tax = $subtotal * config('cart.tax')/100,
        'total' => $subtotal + $tax,
    ];
});
