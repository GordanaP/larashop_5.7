<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
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
        $presented_price = presentPrice(config('app.currency'), $this->price);

        return $presented_price;
    }
}