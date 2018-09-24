<?php

use Faker\Generator as Faker;

$factory->define(App\Customer::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'address' => $faker->streetAddress,
        'postcode' => $faker->postcode,
        'city' => $faker->city,
        'phone' => $faker->phoneNumber,
        'email' => $faker->email,
    ];
});
