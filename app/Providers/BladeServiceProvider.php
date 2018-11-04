<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class BladeServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::component('components.cart.price', 'price');
        Blade::component('components.order.summary', 'summary');
        Blade::component('components.order.include', 'incl');
        Blade::component('components.buttons.shopping', 'shop');
        Blade::component('components.buttons.checkout', 'checkout');
        Blade::component('components.buttons.emptycart', 'emptycart');
        Blade::component('components.buttons.backtocart', 'back');
        Blade::component('components.product.rating.stars', 'stars');
        Blade::component('components.product.rating.writereview', 'writereview');
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
