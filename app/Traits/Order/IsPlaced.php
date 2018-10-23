<?php

namespace App\Traits\Order;

use App\Customer;
use App\Facades\Cart;
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

        $inventories = Cart::getItems();

        $order = static::createNew($customer);

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
     * Display # along with the order number.
     *
     * @return string
     */
    public function getPresentNumberAttribute()
    {
        $presented_number = '#' . $this->number;

        return $presented_number;
    }

    /**
     * Create a new order for the customer.
     *
     * @param  \App\Customer $customer
     * @return \App\Order
     */
    private static function createNew($customer)
    {
        return tap(new static, function($order) use($customer) {

            $order->subtotal = formatFloat(Cart::subtotal());
            $order->tax = formatFloat(Cart::tax());
            $order->total = formatFloat(Cart::total());
            $order->customer()->associate($customer);

            $order->save();
        });
    }

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

    /**
     * Get the date of the order placement.
     *
     * @return string
     */
    public function getPlacedAtAttribute()
    {
        $placed_at = date_format($this->created_at,"d/m/Y");

        return $placed_at;
    }
}