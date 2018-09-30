<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    /**
     * Get the orders that belong to the customer
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    /**
     * Create the new customer from an array of attributes.
     *
     * @param  array $data
     * @return \App\Customer
     */
    public static function createNew($data)
    {
        $customer = new static;

        $customer->first_name = $data['first_name'];
        $customer->last_name = $data['last_name'];
        $customer->address = $data['address'];
        $customer->postcode = $data['postcode'];
        $customer->city = $data['city'];
        $customer->phone = $data['phone'];
        $customer->email = $data['email'];

        $customer->save();

        return $customer;
    }

    public function getFullNameAttribute()
    {
        $full_name = $this->first_name .' '.$this->last_name;

        return $full_name;
    }

    public function getFullCityAttribute()
    {
        $full_city = $this->postcode .' '.$this->city;

        return $full_city;
    }
}