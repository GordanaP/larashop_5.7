<?php

use Faker\Generator as Faker;

$factory->define(App\Customer::class, function (Faker $faker) {
    return [
        'email' => $faker->email,
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'country' => $faker->country,
        'address' => $faker->streetAddress,
        'postcode' => $faker->postcode,
        'city' => $faker->city,
        'country_code' => rand(100, 999),
        'local_code' => rand(10, 99),
        'phone' => $faker->randomNumber($nbDigits = 6),
    ];
});
