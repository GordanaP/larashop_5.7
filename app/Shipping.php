<?php

namespace App;

use Illuminate\Database\Eloquent\Concerns\HasAttributes;
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

            $shipping->first_name = $data['first_name'];
            $shipping->last_name = $data['last_name'];
            $shipping->country = $data['country'];
            $shipping->address = $data['address'];
            $shipping->postal_code = $data['postal_code'];
            $shipping->city = $data['city'];
            $shipping->phone = $data['phone'];

            $shipping->save();
        });
    }
}
