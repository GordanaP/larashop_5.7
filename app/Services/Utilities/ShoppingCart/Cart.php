<?php

namespace App\Services\Utilities\ShoppingCart;

use App\Product;
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

    /**
     * Get the cart content.
     *
     * @return \Illuminate\Support\Collection
     */
    public function getItems($cart = 'default')
    {
        $items = $this->getCartContent($cart);

        return $items;
    }

    /**
     * Get the products related to cart items.
     *
     * @param  string $cart [description]
     * @return \Illuminate\Support\Collection
     */
    public function getProducts($cart = 'default')
    {
        $products = $this->findProducts($cart);

        return $products;
    }
}