<?php

namespace App\Traits\Inventory;

trait HasPrice
{
    /**
     * Get the inventory price.
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
     * Display the currency along with the inventory price.
     *
     * @return string
     */
    public function getPresentPriceAttribute()
    {
        $presented_price = presentPrice($this->price);

        return $presented_price;
    }

    /**
     * Get the inventory subtotal.
     *
     * @param  integer $qty
     * @return float
     */
    public function getSubtotal($qty)
    {
        $subtotal =  $this->price * $qty;

        $formatted_subtotal = formatNumber($subtotal);

        return $formatted_subtotal;
    }

    /**
     * Get the currency along with the inventory subtotal.
     *
     * @param  integer $qty
     * @return string
     */
    public function presentSubtotal($qty)
    {
        $subtotal = $this->getSubtotal($qty);

        $presented_subtotal = presentPrice($subtotal);

        return $presented_subtotal;
    }
}