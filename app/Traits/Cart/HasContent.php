<?php

namespace App\Traits\Cart;

use App\Product;
use App\Services\Utilities\ShoppingCart\CartItem;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Session;

trait HasContent
{
    /**
     * Create the cart item.
     *
     * @param  int  $id
     * @param  string  $name
     * @param  int  $qty
     * @param  float  $price
     * @return \App\Services\Utilities\ShoppingCart\CartItem
     */
    protected function createCartItem($id, $name, $qty, $price)
    {
        $item = CartItem::fromAttributes($id, $name, $price);

        $item->setQuantity($qty);

        return $item;
    }

    /**
     * Create a cart with its content.
     *
     * @param  \App\Services\Utilities\ShoppingCart\CartItem  $item
     * @param  string  $cart
     * @return  void
     */
    protected function createCartContent($item, $cart)
    {
        // Get the content
        $content = $this->getCartContent($cart);

        // Add an item to the cart
        $this->addToCart($content, $item);

        // Update the content
        $this->updateCartContent($content, $cart);
    }

    /**
     * Get the cart content or an empty collection.
     *
     * @param  string  $cart
     * @return  \Illuminate\Support\Collection
     */
    protected function getCartContent($cart)
    {
        $content = Session::has($cart) ? Session::get($cart) : new Collection;

        return $content;
    }

    /**
     * Find products by item ids.
     *
     * @param  string  $cart
     * @return  \Illuminate\Support\Collection
     */
    protected function findProducts($cart)
    {
        $items = $this->getCartContent($cart);

        $ids = $items->pluck('id')->toArray();

        $products = Product::findMany($ids);

        return $products;
    }

    /**
     * Get the cart item.
     *
     * @param  string  $rowId
     * @param  string  $cart
     * @return  \App\Services\Utilities\ShoppingCart\CartItem
     */
    protected function getItem($rowId, $cart)
    {
        $content = $this->getCartContent($cart);

        $item = $content->get($rowId);

        return $item;
    }

    /**
     * Remove the item from the cart.
     *
     * @param  \App\Services\Utilities\ShoppingCart\CartItem  $item
     * @param  string  $cart
     * @return  void
     */
    protected function removeFromCart($item, $cart)
    {
        $content = $this->getCartContent($cart);

        $this->removeFromCartContent($content, $item);

        $this->updateCartContent($content, $cart);
    }

    /**
     * Remove an item from the cart content.
     *
     * @param  \Illuminate\Support\Collection  $content
     * @param  \App\Services\Utilities\ShoppingCart\CartItem $item
     * @return  void
     */
    private function removeFromCartContent($content, $item)
    {
        $content->pull($item->rowId);
    }

    /**
     * Add an item to the cart.
     *
     * @param  \Illuminate\Support\Collection  $content
     * @param  \App\Services\Utilities\ShoppingCart\CartItem  $item
     * @return  void
     */
    private function addToCart($content, $item)
    {
        $content->put($item->rowId, $item);
    }

    /**
     * Update the cart content.
     *
     * @param  \Illuminate\Support\Collection  $content
     * @param  string  $cart
     * @return void
     */
    private function updateCartContent($content, $cart)
    {
        Session::put($cart, $content);
    }
}