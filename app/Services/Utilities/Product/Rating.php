<?php

namespace App\Services\Utilities\Product;

class Rating
{
    /**
     * A list of product's statuses.
     *
     * @var array
     */
    protected static $ratings = [
        '1' => "Awful",
        '2' => "Bad",
        '3' => "Average",
        '4' => "Good",
        '5' => "Awesome",
    ];

    /**
     * Get all statuses.
     *
     * @return array
     */
    public static function all()
    {
        return static::$ratings;
    }
}