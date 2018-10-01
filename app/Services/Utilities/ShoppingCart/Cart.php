<?php

namespace App\Services\Utilities\ShoppingCart;

use App\Traits\Cart\HasContent;
use App\Traits\Cart\HasPrice;

class Cart
{
    use HasContent, HasPrice;

    /**
     * Add an item to the cart.
     *
     * @param \App\Product $product
     * @param integer $qty
     * @param string $cart
     * @return  void
     */
    public function addItem($product, $qty = 1, $cart = 'default')
    {
        $this->createCartContent($product, $qty, $cart);
    }

    /**

     * Get the cart content.
     *
     * @param string $cart
     * @return \Illuminate\Support\Collection
     */
    public function getItems($cart = 'default')
    {
        $items = $this->getCartContent($cart);

        return $items;
    }

    /**
     * Remove the item from the cart.
     *
     * @param string $rowId
     * @param string $cart
     * @return void
     */
    public function removeItem($rowId, $cart = 'default')
    {
        $this->removeFromCartContent($rowId, $cart);
    }

    /**
     * Update the cart content.
     *
     * @param string $rowId
     * @param integer  $qty
     * @param string $cart
     * @return void
     */
    public function updateItem($rowId, $qty, $cart = 'default')
    {
        $this->updateItemQuantity($rowId, $qty, $cart);
    }

    /**
     * Remove all items from the cart.
     *
     * @param string $cart
     * @return void
     */
    public function empty($cart = 'default')
    {
        $this->emptyCart($cart);
    }

    /**
     * Get the number of items in the cart.
     *
     * @param string $cart
     * @return integer
     */
    public function itemsCount($cart = 'default')
    {
        $items_count = $this->calculateCartItemsCount($cart);

        return $items_count;
    }

     /**
     * Get the cart subtotal (total - tax).
     *
     * @param string $cart
     * @return float
     */
    public function subtotal($cart = 'default')
    {
        $subtotal = $this->calculateCartSubtotal($cart);

        return $subtotal;
    }

    /**
     * Get the amount of tax calculated on cart subtotal.
     *
     * @param string $cart
     * @return float;
     */
    public function tax($cart = 'default')
    {
        $tax_amount = $this->calculateCartTax($cart);

        return $tax_amount;
    }

    /**
     * Get the cart total.
     *
     * @param string $cart
     * @return float
     */
    public function total($cart = 'default')
    {
        $total = $this->calculateCartTotal($cart);

        return $total;
    }
}