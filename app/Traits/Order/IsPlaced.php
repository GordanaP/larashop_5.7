<?php

namespace App\Traits\Order;

use App\Customer;
use App\Facades\Cart;
use App\Shipping;
use Illuminate\Support\Facades\Auth;
use Keygen\Keygen;

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
        $customer = optional(Auth::user())->customer ?: Customer::createNew($data);
        $shipping = ! request()->has('shipping') ? Shipping::createNew($data) : '';
        $inventories = Cart::getItems();

        $order = static::createNew($customer, $shipping);

        static::linkToInventories($order, $inventories);

        Cart::empty();

        return $order;
    }

    /**
     * Generate the order number.
     *
     * @param  integer $length
     * @return integer
     */
    public function generateNumericKey($length = 7)
    {
        $numeric_key = Keygen::numeric($length)->prefix(mt_rand(1, 9))->generate(true);

        return $numeric_key;
    }

    /**
     * Create a new order for the customer.
     *
     * @param  \App\Customer $customer
     * @return \App\Order
     */
    private static function createNew($customer, $shipping = null)
    {
        return tap(new static, function($order) use($customer, $shipping) {

            $order->subtotal = formatFloat(Cart::subtotal());
            $order->tax = formatFloat(Cart::tax());
            $order->total = formatFloat(Cart::total());
            $order->customer()->associate($customer);
            $shipping ? $order->shipping()->associate($shipping) : '';

            $order->save();
        });
    }

    /**
     * Link the placed order with inventories.
     *
     * @param  \App\Order $order
     * @param  array $inventories
     * @return void
     */
    private static function linkToInventories($order, $inventories)
    {
        foreach ($inventories as $inventory)
        {
            $order->inventories()->attach($inventory->id, [
                'qty' => $inventory->qty,
                'price' => formatFloat($inventory->price),
            ]);
        }
    }
}