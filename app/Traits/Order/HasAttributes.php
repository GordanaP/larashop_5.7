<?php

namespace App\Traits\Order;

trait HasAttributes
{
    /**
     * Display # along with the order number.
     *
     * @return string
     */
    public function getPresentNumberAttribute()
    {
        $presented_number = '#' . $this->number;

        return $presented_number;
    }

    /**
     * Get the date of the order placement.
     *
     * @return string
     */
    public function getPlacedAtAttribute()
    {
        $placed_at = date_format($this->created_at,"d/m/Y");

        return $placed_at;
    }
}