<?php

namespace App;

use App\Traits\Product\HasPrice;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasPrice;

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * Get the orders that have products.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function orders()
    {
        return $this->belongsToMany(Order::class)->as('attribute')->withPivot('qty', 'price');
    }

    /**
     * Get the buyables that belong to the product.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function buyables()
    {
        return $this->hasMany(Buyable::class);
    }
}