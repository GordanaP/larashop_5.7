<?php

namespace App\Services\Utilities\Product;

class Status
{
    /**
     * A list of product's statuses.
     *
     * @var array
     */
    protected static $statuses = [
        'active' => "Offered for purchase",
        'inactive' => "Not dispatched to market",
        'sold_out' => "Sold out",
        'coming_soon' => "Coming soon",
        'new_arrival' => "New arrival",
        'on_sale' => "Sale",
        'archived' => 'Archived',
    ];

    /**
     * Get all statuses.
     *
     * @return array
     */
    public static function all()
    {
        return static::$statuses;
    }
}