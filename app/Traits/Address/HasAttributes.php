<?php

namespace App\Traits\Address;

use App\Services\Utilities\Customer\Country;

trait HasAttributes
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
    public function getCountryCodeAttribute()
    {
        $country_code = $this->country;

        return $country_code;
    }

    public function getCountryNameAttribute()
    {
        $country_name = array_search($this->country_code, Country::all());

        return $country_name;
    }
}