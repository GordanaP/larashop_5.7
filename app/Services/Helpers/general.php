<?php

/**
 * Format number to float.
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
 * Format float to integer.
 *
 * @param  float  $float
 * @return integer
 */
function formatFloat($float)
{
    $decimalsCount = strlen(substr(strrchr($float, "."), 1));

    $formatted_float = $float * (10 ** $decimalsCount);

    return $formatted_float;
}

/**
 * Display currency along with the price.
 *
 * @param  string $currency
 * @param  float $price
 * @return string
 */
function presentPrice($price)
{
    return config('app.currency') . $price;
}

/**
 * Respond to an if statement.
 *
 * @param  string $value1
 * @param  string $value2
 * @return string
 */
function getIfStat($value1, $value2, $response)
{
    return $value1 === $value2 ? $confirm : '';
}