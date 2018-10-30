<?php

use App\Product;
use App\User;
use Illuminate\Database\Seeder;

class FavoritesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = Product::available()->inRandomOrder()->first();

        User::inRandomOrder()->first()->favorites()->attach($product->id);
    }
}
