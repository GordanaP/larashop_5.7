<?php

namespace App\Traits\Order;

trait HasPrice
{
    /**
     * Get the order subtotal.
     *
     * @param  integer $value
     * @return float
     */
    public function getSubtotalAttribute($value)
    {
        $subtotal = formatNumber($value/100);

        return $subtotal;
    }

    /**
     * Get the currency along with the order subtotal.
     *
     * @return string
     */
    public function getPresentSubtotalAttribute()
    {
        $presented_subtotal = presentPrice($this->subtotal);

        return $presented_subtotal;
    }

    /**
     * Get the order tax amount.
     *
     * @param  integer $value
     * @return float
     */
    public function getTaxAttribute($value)
    {
        $tax = formatNumber($value/100);

        return $tax;
    }

    /**
     * Get the currency along with the order tax amount.
     *
     * @return string
     */
    public function getPresentTaxAttribute()
    {
        $presented_tax = presentPrice($this->tax);

        return $presented_tax;
    }

    /**
     * Get the order total.
     *
     * @param  integer $value
     * @return float
     */
    public function getTotalAttribute($value)
    {
        $total = formatNumber($value/100);

        return $total;
    }

    /**
     * Get the currency along with the order total.
     *
     * @return sting
     */
    public function getPresentTotalAttribute()
    {
        $presented_total = presentPrice($this->total);

        return $presented_total;
    }
}