<?php

namespace App\Services\Utilities\Inventory;

class Status
{
    /**
     * A list of inventory's statuses.
     *
     * @var array
     */
    protected static $statuses = [
        'active' => "Offered for purchase",
        'sold_out' => "Sold out",
        'on_sale' => "On Sale",
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