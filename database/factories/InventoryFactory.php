<?php

use App\Color;
use App\Product;
use App\Size;
use Faker\Generator as Faker;

$factory->define(App\Inventory::class, function (Faker $faker) {
    return [
        'product_id' => Product::all()->random()->id,
        'color_id' => Color::all()->random()->id,
        'size_id' => Size::all()->random()->id,
        'price' => rand(10, 100)
    ];
});
