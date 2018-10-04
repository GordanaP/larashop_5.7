<?php

namespace App\Providers;

use App\Category;
use App\Color;
use App\Inventory;
use App\Observers\CategoryObserver;
use App\Observers\ColorObserver;
use App\Observers\InventoryObserver;
use App\Observers\OrderObserver;
use App\Observers\ProductObserver;
use App\Observers\SizeObserver;
use App\Order;
use App\Product;
use App\Size;
use Illuminate\Support\ServiceProvider;

class ObserverServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Category::observe(CategoryObserver::class);
        Inventory::observe(InventoryObserver::class);
        Order::observe(OrderObserver::class);
        Product::observe(ProductObserver::class);
        Color::observe(ColorObserver::class);
        Size::observe(SizeObserver::class);
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
