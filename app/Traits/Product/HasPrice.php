<?php

namespace App\Traits\Product;

trait HasPrice
{
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
        $price = $this->price;

        return presentPrice($price);
    }
}