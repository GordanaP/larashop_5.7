<?php

use App\Customer;
use Faker\Generator as Faker;

$factory->define(App\Order::class, function (Faker $faker) {
    return [
        'customer_id' => Customer::all()->random()->id,
        'amount' => rand(1000, 100000),
    ];
});
