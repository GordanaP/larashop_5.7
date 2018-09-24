<?php

namespace App\Contracts;

interface Buyable
{
    /**
     * Get the identifier of the Buyable item identifier.
     *
     * @return int
     */
    public function getBuyableIdentifier($options = null);

    /**
     * Get the Buyable item name.
     *
     * @return string
     */
    public function getBuyableName($options = null);

    /**
     * Get the Buyable item price.
     *
     * @return float
     */
    public function getBuyablePrice($options = null);
}