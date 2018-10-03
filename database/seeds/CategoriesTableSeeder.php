<?php

use App\Product;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ['women', 'men', 'kids', 'accesories'];

        foreach ($categories as $categoryName)
        {
            $products = Product::inRandomOrder()->take(5)->get();

            $category = factory(App\Category::class)->create([
                'name' => $categoryName
            ]);

            $category->products()->saveMany($products);
        }
    }
}
