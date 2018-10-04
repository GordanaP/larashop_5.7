<?php

namespace App;

use App\Traits\Product\HasInventory;
use App\Traits\Product\HasPrice;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasInventory, HasPrice;

     protected $appends = ['max_price'];

     public function getMaxPriceAttribute()
     {
         $max_price = $this->inventories->pluck('price')->max();

         return $max_price;
     }

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

    /**
     * Get the categories that have many products.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    /**
     * Scope a query to include filtered products only.
     *
     * @param \App\Filters\Filters  $filters
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
    */
    public function scopeFilter($query, $filters)
    {
        return $filters->apply($query);  //App\Filters\Filters.php - apply(Builder $builder);
    }

}