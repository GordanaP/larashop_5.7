<?php

namespace App;

use App\Traits\Address\HasAttributes;
use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    use HasAttributes;

    /**
     * Get the orders that belong to the shipping address.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    /**
     * Create the new shipping address.
     *
     * @param  array $data
     * @return \App\Shipping
     */
    public static function createNew($data)
    {
        return tap(new static, function($shipping) use ($data) {

            $shipping->first_name = $data['first_name_s'];
            $shipping->last_name = $data['last_name_s'];
            $shipping->country = $data['country_s'];
            $shipping->address = $data['address_s'];
            $shipping->postal_code = $data['postal_code_s'];
            $shipping->city = $data['city_s'];
            $shipping->phone = $data['phone_s'];

            $shipping->save();
        });
    }
}