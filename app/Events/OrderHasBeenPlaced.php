<?php

namespace App\Events;

use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;

class OrderHasBeenPlaced
{
    use Dispatchable, SerializesModels;

    public $order;

    public $invoice;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($order, $invoice)
    {
        $this->order = $order;

        $this->invoice = $invoice;
    }
}
