<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $appends = ['full_name'];

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
     * Get the user who owns the customer.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->belongsTo(User::class);
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

        $customer->email = $data['email'];
        $customer->first_name = $data['first_name'];
        $customer->last_name = $data['last_name'];
        $customer->country = $data['country'];
        $customer->address = $data['address'];
        $customer->postcode = $data['postcode'];
        $customer->city = $data['city'];
        $customer->country_code = $data['country_code'];
        $customer->local_code = $data['local_code'];
        $customer->phone = $data['phone'];
        \Auth::user() ? $customer->user()->associate(\Auth::user()) : '';

        $customer->save();

        return $customer;
    }

    /**
     * Get the customer fuul name.
     *
     * @return string
     */
    public function getFullNameAttribute()
    {
        $full_name = $this->first_name .' '.$this->last_name;

        return $full_name;
    }

    /**
     * Get the postcode along with the customer city.
     *
     * @return string
     */
    public function getFullCityAttribute()
    {
        $full_city = $this->postcode .' '.$this->city;

        return $full_city;
    }

    /**
     * Get the customer phone number.
     *
     * @return string
     */
    public function getFullPhoneAttribute()
    {
        $full_phone = $this->country_code . ' ' . $this->local_code . ' ' . $this->phone;

        return $full_phone;
    }
}