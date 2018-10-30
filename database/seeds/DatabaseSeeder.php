<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * The migrations.
     *
     * @var array
     */
    protected $tables = [
        'users',
        'products',
        'customers',
        'shippings',
        'colors',
        'sizes',
        'inventories',
        'orders',
        'inventory_order',
        'categories',
        'category_product',
        'favorites'
    ];

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->cleanDatabase();

        $this->call(UsersTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
        $this->call(CustomersTableSeeder::class);
        $this->call(ShippingsTableSeeder::class);
        $this->call(ColorsTableSeeder::class);
        $this->call(SizesTableSeeder::class);
        $this->call(InventoriesTableSeeder::class);
        $this->call(OrdersTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(FavoritesTableSeeder::class);
    }

    /**
     * Truncate the tables.
     *
     * @return void
     */
    protected function cleanDatabase()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');

        foreach ($this->tables as $table)
        {
            DB::table($table)->truncate();
        }

        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}