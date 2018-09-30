<?php

namespace App;

use App\Facades\Cart;
use App\Traits\Order\IsPlaced;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use IsPlaced;

    /**
     * Get the customer who owns the order.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    /**
     * Get the products that have products.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function buyables()
    {
        return $this->belongsToMany(Buyable::class)->as('attribute')->withPivot('qty', 'price');
    }

    public function getSubtotalAttribute($value)
    {
        $subtotal = formatNumber($value/100);

        return $subtotal;
    }

    public function getPresentSubtotalAttribute()
    {
        $presented_subtotal = presentPrice($this->subtotal);

        return $presented_subtotal;
    }

    public function getTaxAttribute($value)
    {
        $tax = formatNumber($value/100);

        return $tax;
    }

    public function getPresentTaxAttribute()
    {
        $presented_tax = presentPrice($this->tax);

        return $presented_tax;
    }

    public function getTotalAttribute($value)
    {
        $total = formatNumber($value/100);

        return $total;
    }

    public function getPresentTotalAttribute()
    {
        $presented_total = presentPrice($this->total);

        return $presented_total;
    }

    public function getPlacedAtAttribute()
    {
        $placed_at = date_format($this->created_at,"d/m/Y");

        return $placed_at;
    }
}