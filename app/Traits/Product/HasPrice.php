<?php

namespace App\Traits\Product;

trait HasPrice
{
    /**
     * Get the product price provided that all inventories have the same price.
     *
     * @return float
     */
    public function getPriceAttribute()
    {
        $price = $this->inventories->pluck('price')->unique()->first();

        return $price;
    }



    public function getMinPriceAttribute()
    {
        $min_price = $this->inventories->pluck('price')->min();

        return $min_price;
    }

    /**
     * Get the currency along with the price.
     *
     * @return string
     */
    public function getPresentPriceAttribute()
    {
        $presented_price = presentPrice($this->price);

        return $presented_price;
    }
}