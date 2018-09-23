<?php

/**
 * Format numebr.
 *
 * @param  integer  $number
 * @param  integer $decimals
 * @return float
 */
function formatNumber($number, $decimals = 2)
{
    $formatted_number = number_format($number, $decimals);

    return $formatted_number;
}

/**
 * Display currency along with the price.
 *
 * @param  string $currency
 * @param  float $price
 * @return string
 */
function presentPrice($currency, $price)
{
    return $currency . $price;
}

