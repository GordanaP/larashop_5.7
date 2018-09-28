<?php

use App\Color;
use App\Product;
use App\Size;
use Faker\Generator as Faker;

$factory->define(App\Buyable::class, function (Faker $faker) {
    return [
        'product_id' => Product::all()->random()->id,
        'color_id' => Color::all()->random()->id,
        'size_id' => Size::all()->random()->id,
        'name' => $faker->sentence(3),
        'price' => rand(1000, 10000)
    ];
});
