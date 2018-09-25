<?php

namespace App\Services\Utilities\ShoppingCart;

use App\Traits\Cart\HasContent;
use App\Traits\Cart\HasPrice;
use App\Traits\Cart\HasQuantity;


class Cart
{
    use HasContent, HasPrice, HasQuantity;

    /**
     * Add an item to the cart.
     *
     * @param  int  $id
     * @param  string  $name
     * @param  int  $qty
     * @param  float  $price
     * @param  array  $options
     * @param  string  $cart
     * @return  void
     */
    public function addItem($id, $name, $qty, $price, $options = [], $cart = 'default')
    {
        // Create a cart item  from its attributes
        $item = $this->createCartItem($id, $name, $qty, $price, $options);

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
        $this->removeFromCart($item, $cart);
    }

    /**
     * Remove all items from the cart.
     *
     * @param  string  $cart
     * @return  void
     */
    public function emptyContent($cart = 'default')
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

    /**
     * Get the number of cart items.
     *
     * @param string $cart
     * @return int
     */
    public function countItems($cart = 'default')
    {
        return $this->countCartItems($cart);
    }

    /**
     * Get the cart subtotal (total - taxAmount).
     *
     * @param  string  $cart
     * @return float
     */
    public function subtotal($cart = 'default')
    {
        return $this->calculateCartSubtotal($cart);
    }

    /**
     * Get the amount of tax calculated on cart subtotal.
     *
     * @param  string  $cart
     * @return  float;
     */
    public function taxAmount($cart = 'default')
    {
        return $this->calculateTaxAmount($cart);
    }

    /**
     * Get the total price of the cart.
     *
     * @param  string  $$cart
     * @return float
     */
    public function total($cart = 'default')
    {
        return $this->calculateCartTotal($cart);
    }
}