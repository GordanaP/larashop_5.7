<?php

namespace App;

use App\Facades\Cart;
use App\Traits\Order\IsPlaced;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use IsPlaced;

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
     * Get the products that have products.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function products()
    {
        return $this->belongsToMany(Product::class)->as('attribute')->withPivot('qty', 'price');
    }
}