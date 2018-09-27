<?php

namespace App\Traits\Order;

use App\Customer;
use App\Facades\Cart;

trait IsPlaced
{
    /**
     * Place a new order.
     *
     * @param  array $data
     * @return void
     */
    public static function placeNew($data)
    {
        $customer = Customer::createNew($data);

        $cartItems = Cart::getItems();

        $order = static::createNew($customer);

        static::linkToItems($order, $cartItems);

        Cart::empty();

        return $order;
    }

    /**
     * Create a new order for the customer.
     *
     * @param  \App\Customer $customer
     * @return \App\Order
     */
    private static function createNew($customer)
    {
        $order = new static;

        $order->subtotal = formatFloat(Cart::subtotal());
        $order->tax = formatFloat(Cart::taxAmount());
        $order->total = formatFloat(Cart::total());
        $order->customer()->associate($customer);

        $order->save();

        return $order;
    }

    /**
     * Link the order to the products
     *
     * @param  \App\Order $order
     * @param  \App\Services\Utilities\ShoppingCart\Cart $cartItems
     * @return void
     */
    private static function linkToItems($order, $cartItems)
    {
        foreach ($cartItems as $item)
        {
            $order->products()->attach($item->id, [
                'qty' => $item->qty,
                'price' => formatFloat($item->price),
            ]);
        }
    }
}