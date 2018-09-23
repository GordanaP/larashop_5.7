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
     * @param  int $id
     * @param  string $name
     * @param  int $qty
     * @param  float $price
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
     * @param  \App\Services\Utilities\ShoppingCart\CartItem $cartItem
     * @param  string $cart
     * @return  void
     */
    protected function createCartContent($cartItem, $cart)
    {
        // Get the content
        $content = $this->getCartContent($cart);

        // Add an item to the cart
        $this->addToCart($content, $cartItem);

        // Update the content
        $this->updateCartContent($content, $cart);
    }

    /**
     * Get the cart content or an empty collection.
     *
     * @param  string $cart
     * @return \Illuminate\Support\Collection
     */
    protected function getCartContent($cart)
    {
        $content = Session::has($cart) ? Session::get($cart) : new Collection;

        return $content;
    }

    /**
     * Find products by item ids.
     *
     * @param  string $cart
     * @return \Illuminate\Support\Collection
     */
    protected function findProducts($cart)
    {
        $items = $this->getCartContent($cart);

        $ids = $items->pluck('id')->toArray();

        $products = Product::findMany($ids);

        return $products;
    }

    /**
     * Add an item to the cart.
     *
     * @param \Illuminate\Support\Collection $cartContent
     * @param \App\Services\Utilities\ShoppingCart\CartItem $cartItem
     * @return  void
     */
    private function addToCart($cartContent, $cartItem)
    {
        $cartContent->put($cartItem->rowId, $cartItem);
    }

    /**
     * Update the cart content.
     *
     * @param \Illuminate\Support\Collection $cartContent
     * @param  string $cart
     * @return void
     */
    private function updateCartContent($cartContent, $cart)
    {
        Session::put($cart, $cartContent);
    }
}