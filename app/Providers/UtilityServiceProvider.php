<?php

namespace App\Providers;

use App\Services\Utilities\ShoppingCart\Cart;
use Illuminate\Support\ServiceProvider;

class UtilityServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        /**
         * Register a binding of the the cart class with the related container.
         */
        $this->app->bind('cart', function()
        {
            return new Cart;
        });
    }
}
