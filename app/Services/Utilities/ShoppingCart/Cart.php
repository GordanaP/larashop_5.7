<?php

namespace App\Services\Utilities\ShoppingCart;

use App\Services\Utilities\ShoppingCart\CartItem;
use App\Traits\Cart\HasContent;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Session;

class Cart
{
    use HasContent;

    /**
     * Add an item to the cart.
     *
     * @param int $id
     * @param string $name
     * @param int $qty
     * @param float $price
     * @return void
     */
    public function addItem($id, $name, $qty, $price, $cart = 'default')
    {
        // Create a cart item  from its attributes
        $cartItem = $this->createCartItem($id, $name, $qty, $price);

        // Create a cart with its content
        $this->createCartContent($cartItem, $cart);
    }
}