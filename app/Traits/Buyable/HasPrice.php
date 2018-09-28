<?php

namespace App\Traits\Buyable;

trait HasPrice
{
    /**
     * Get the product price.
     *
     * @param  int $value
     * @return float
     */
    public function getPriceAttribute($value)
    {
        $price = $value/100;

        $formatted_price = formatNumber($price);

        return $formatted_price;
    }

    /**
     * Display the currency along with the product price.
     *
     * @return string
     */
    public function getPresentPriceAttribute()
    {
        $presented_price = presentPrice($this->price);

        return $presented_price;
    }
}