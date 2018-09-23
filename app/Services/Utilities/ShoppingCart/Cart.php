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
     * @param  int  $id
     * @param  string  $name
     * @param  int  $qty
     * @param  float  $price
     * @param  string  $cart
     * @return  void
     */
    public function addItem($id, $name, $qty, $price, $cart = 'default')
    {
        // Create a cart item  from its attributes
        $item = $this->createCartItem($id, $name, $qty, $price);

        // Create a cart with its content
        $this->createCartContent($item, $cart);
    }

    /**
     * Get the cart content.
     *
     * @param  string  $cart
     * @return  \Illuminate\Support\Collection
     */
    public function getItems($cart = 'default')
    {
        $items = $this->getCartContent($cart);

        return $items;
    }

    /**
     * Get the products related to cart items.
     *
     * @param  string  $cart
     * @return  \Illuminate\Support\Collection
     */
    public function getProducts($cart = 'default')
    {
        $products = $this->findProducts($cart);

        return $products;
    }

    /**
     * Remove the item from the cart.
     *
     * @param  string  $rowId
     * @param  string  $cart
     * @return  void
     */
    public function removeItem($rowId, $cart = 'default')
    {
        // Get the item by its rowId
        $item = $this->getItem($rowId, $cart);

        // Remove from cart
        $this->removeFromCart($item, $cart = 'default');
    }

    /**
     * Remove all items from the cart.
     *
     * @param  string  $cart
     * @return  void
     */
    public function empty($cart = 'default')
    {
        $this->emptyCart($cart);
    }

    /**
     * Update the item quantity.
     *
     * @param  string  $rowId
     * @param  int  $qty
     * @param  string  $cart
     * @return void
     */
    public function updateContent($rowId, $qty, $cart = 'default')
    {
        $this->updateItemQuantity($rowId, $qty, $cart);
    }
}