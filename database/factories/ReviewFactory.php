<?php

use App\Product;
use App\User;
use Faker\Generator as Faker;

$factory->define(App\Review::class, function (Faker $faker) {
    return [
        'user_id' => User::inRandomOrder()->first()->id,
        'product_id' => Product::inRandomOrder()->first()->id,
        'stars' => rand(1,5),
        'title' => $faker->sentence(3),
        'body' => $faker->paragraph(3),
    ];
});
