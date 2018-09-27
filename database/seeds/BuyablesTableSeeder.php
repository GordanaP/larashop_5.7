<?php

use Illuminate\Database\Seeder;

class BuyablesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\Buyable', 15)->create();
    }
}
