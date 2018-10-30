<?php

use App\Color;
use App\Product;
use App\Size;
use Faker\Generator as Faker;

$factory->define(App\Inventory::class, function (Faker $faker) {
    return [
        'product_id' => Product::inRandomOrder()->first()->id,
        'color_id' => Color::inRandomOrder()->first()->id,
        'size_id' => Size::inRandomOrder()->first()->id,
        'price' => rand(10, 100)
    ];
});