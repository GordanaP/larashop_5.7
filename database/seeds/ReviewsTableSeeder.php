<?php

use App\Product;
use App\User;
use Illuminate\Database\Seeder;

class ReviewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = Product::available()->inRandomOrder()->first();

        factory('App\Review')->create([
            'product_id' => $product->id,
        ]);
    }
}
