<?php

namespace App\Traits\Address;

trait HassAttributes
{
    /**
     * Get the address customer's full name.
     *
     * @return string
     */
    public function getFullNameAttribute()
    {
        $full_name = $this->first_name .' '.$this->last_name;

        return $full_name;
    }

    /**
     * Get the postal_code along with the city.
     *
     * @return string
     */
    public function getFullCityAttribute()
    {
        $full_city = $this->postal_code .' '.$this->city;

        return $full_city;
    }

    /**
     * Get the country name related to the country code.
     *
     * @param  string $value
     * @return string
     */
    public function getCountryAttribute($value)
    {
        $country = array_search($value, Country::all());

        return $country;
    }
}