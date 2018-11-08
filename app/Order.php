<?php

namespace App;

use App\Traits\Order\HasAttributes;
use App\Traits\Order\HasPrice;
use App\Traits\Order\IsPlaced;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use IsPlaced, HasAttributes, HasPrice;

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'number';
    }

    /**
     * Get the customer who owns the order.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    /**
     * Get the shipping address that owns the order.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function shipping()
    {
        return $this->belongsTo(Shipping::class);
    }

    /**
     * Get the inventories that have orders.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function inventories()
    {
        return $this->belongsToMany(Inventory::class)->as('attribute')->withPivot('qty', 'price');
    }
}