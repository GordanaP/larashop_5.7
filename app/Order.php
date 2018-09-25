<?php

namespace App;

use App\Facades\Cart;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /**
     * Get the customer who owns the order.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public static function placeNew($data)
    {
        $customer = Customer::createNew($data);

        static::createNew($customer);

        Cart::emptyContent();
    }

    public static function createNew($customer)
    {
        $order = new static;

        $order->subtotal = Cart::subtotal() * 100;
        $order->tax = Cart::taxAmount() * 100;
        $order->total = Cart::total() * 100;
        $order->customer()->associate($customer);

        $order->save();
    }
}

