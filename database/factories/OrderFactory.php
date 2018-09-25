<?php

use App\Customer;
use Faker\Generator as Faker;

$factory->define(App\Order::class, function (Faker $faker) {
    return [
        'customer_id' => Customer::all()->random()->id,
        'subtotal' => $subtotal = rand(1000, 100000),
        'tax' => $tax = $subtotal * config('cart.tax')/100,
        'total' => $subtotal + $tax,
    ];
});
