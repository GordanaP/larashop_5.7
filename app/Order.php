<?php

namespace App;

use App\Traits\Order\HasPrice;
use App\Traits\Order\IsPlaced;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use IsPlaced, HasPrice;

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
     * Get the products that have inventories.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function inventories()
    {
        return $this->belongsToMany(Inventory::class)->as('attribute')->withPivot('qty', 'price');
    }
}