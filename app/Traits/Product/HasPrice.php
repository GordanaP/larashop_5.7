<?php

namespace App\Traits\Product;

trait HasPrice
{
    /**
     * Get the product price provided that all buyables have the same price.
     *
     * @return float
     */
    public function getPriceAttribute()
    {
        $price = $this->buyables->pluck('price')->unique()->first();

        return $price;
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