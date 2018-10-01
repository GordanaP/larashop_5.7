<?php

namespace App\Providers;

use App\Observers\OrderObserver;
use App\Observers\ProductObserver;
use App\Order;
use App\Product;
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
        Product::observe(ProductObserver::class);
        Order::observe(OrderObserver::class);
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
