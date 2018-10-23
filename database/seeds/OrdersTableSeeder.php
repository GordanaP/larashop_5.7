<?php

use App\Inventory;
use App\Order;
use Illuminate\Database\Seeder;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\Order', 1)->create();

        $order = Order::first();
        $inventories = Inventory::take(2)->inRandomorder()->get();

        foreach ($inventories as $inventory) {

            $order->inventories()->attach($inventory->id, [
                'qty' => rand(1,5),
                'price' => $inventory->price,
            ]);
        }
    }
}
