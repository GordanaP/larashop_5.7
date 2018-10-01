<?php

namespace App\Observers;

use App\Order;

class OrderObserver
{
    /**
     * Listen to the Order creating event.
     *
     * @param  \App\Order  $order
     * @return void
     */
    public function creating(Order $order)
    {
        $order->number =  $order->generateNumericKey();
    }
}