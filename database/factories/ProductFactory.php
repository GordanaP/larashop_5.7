<?php

use App\Services\Utilities\Product\Status;
use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {
    return [
        'name' => $name = $faker->sentence(3),
        'description' => $faker->paragraph(1),
        // 'image' => $faker->imageUrl($width = 640, $height = 640),
        'status' => array_random(array_keys(Status::all())),
    ];
});
