<?php

namespace App\Traits\Product;

trait HasPrice
{
    /**
     * Get the product's minimum price.
     *
     * @return float
     */
    public function getMinPriceAttribute()
    {
        $min_price = $this->inventories->map->price->min();

        return $min_price;
    }

    /**
     * Get the product's maximum price.
     *
     * @return float
     */
    public function getMaxPriceAttribute()
    {
        $max_price = $this->inventories->map->price->max();

        return $max_price;
    }

    /**
     * Get the currency along with the price.
     *
     * @return string
     */
    public function getPresentPriceAttribute()
    {
        if($this->min_price == $this->max_price)
        {
            $presented_price = presentPrice($this->min_price);
        }
        else
        {
            $presented_price  = 'From ' .presentPrice($this->min_price);
        }

        return $presented_price;
    }
}