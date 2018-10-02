<?php

namespace App;

use App\Traits\Product\HasInventory;
use App\Traits\Product\HasPrice;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasInventory, HasPrice;

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
     * Get the inventories that belong to the product.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function inventories()
    {
        return $this->hasMany(Inventory::class);
    }
}