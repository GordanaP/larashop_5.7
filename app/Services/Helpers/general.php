<?php

/**
 * Get the query string.
 *
 * @param  array  $query
 * @return  array
 */
function getQueryString(array $query)
{
    $queryString = array_merge( request()->query(), $query);

    $filteredQuery = array_except($queryString, ['page']);

    return $filteredQuery;
}

/**
 * Remove the query string.
 *
 * @param  string $filter
 * @return  array
 */
function removeQueryString($filter)
{
    $queryString = request()->query();

    $filteredQuery = array_except($queryString, [$filter, 'page']);

    return $filteredQuery;
}

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
 * Transform number to integer.
 *
 * @param  mixed  $number
 * @param  integer $decimals
 * @return integer
 */
function floatToInteger($number, $decimals = 2)
{
    $formatted_float = formatNumber($number, $decimals);

    $decimalsCount = strlen(substr(strrchr($formatted_float, "."), 1));

    $integer = $formatted_float * (10 ** $decimalsCount);

    return $integer;
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
    return $value1 == $value2 ? $response : '';
}

/**
 * Get active class.
 *
 * @param  string $value1
 * @param  string $value2
 * @return string
 */
function getActiveClass($value1, $value2)
{
    return $value1 == $value2 ? 'active' : '';
}

/**
 * Get the selected option.
 *
 * @param  string $value1
 * @param  string $value2
 * @return string
 */
function getSelected($value1 , $value2)
{
    return $value1 == $value2 ? 'selected' : '';
}

/**
 * Get the checked option.
 *
 * @param  string $value1
 * @param  string $value2
 * @return string
 */
function getChecked($value1 , $value2)
{
    return $value1 == $value2 ? 'checked' : '';
}

/**
 * Get alert message.
 *
 * @param  string $message
 * @param  string $type
 * @return array
 */
function getAlert($message, $type)
{
    $alert['message'] = $message;
    $alert['type'] = $type;

    return $alert;
}

/**
 * Display rating stars.
 *
 * @param  integer|float $number
 * @return array
 */
function showStars($number)
{
    $stars = [];

    $float = strpos($number,'.');
    $min = $float ? 1 : 0;

    for ($i = $min; $i < $number; $i++) {
        array_push($stars, getStars()['orange']);
    }

    if($float)
    {
        array_push($stars, getStars()['half']);
    }

    for ($i = $min; $i < (5 - $number); $i++) {
        array_push($stars, getStars()['grey']);
    }

    return $stars;
}

/**
 * Get the stars.
 *
 * @return array
 */
function getStars()
{
    $stars['orange'] = '<i class="fa fa-star text-orange"></i>';
    $stars['half'] = '<i class="fa fa-star-half-o text-orange"></i>';
    $stars['grey'] = '<i class="fa fa-star-o text-orange-dark"></i>';

    return $stars;
}