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
     * @return \App\Order
     */
    public static function placeNew($data)
    {
        $customer = Customer::createNew($data);

        $buyables = Cart::getItems();

        $order = static::createNew($customer);

        static::linkToBuyables($order, $buyables);

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
        $order->tax = formatFloat(Cart::tax());
        $order->total = formatFloat(Cart::total());
        $order->customer()->associate($customer);

        $order->save();

        return $order;
    }

    /**
     * Link the order to the products.
     *
     * @param  \App\Order $order
     * @param  \Illuminate\Support\Collection $buyables
     * @return void
     */
    private static function linkToBuyables($order, $buyables)
    {
        foreach ($buyables as $buyable)
        {
            $order->buyables()->attach($buyable->id, [
                'qty' => $buyable->qty,
                'price' => formatFloat($buyable->price),
            ]);
        }
    }
}