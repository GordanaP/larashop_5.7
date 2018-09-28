<?php

namespace App;

use App\Traits\Product\HasAttributes;
use App\Traits\Product\HasPrice;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasAttributes, HasPrice;

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
     * Get the buyables that belong to the product.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function buyables()
    {
        return $this->hasMany(Buyable::class);
    }
}