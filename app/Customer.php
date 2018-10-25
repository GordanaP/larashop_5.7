<?php

namespace App;

use App\Services\Utilities\Customer\Country;
use App\Traits\Address\HasAttributes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Customer extends Model
{
    use HasAttributes;

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['full_name'];

    /**
     * Get the orders that belong to the customer.
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
     * Create the new customer.
     *
     * @param  array $data
     * @return \App\Customer
     */
    public static function createNew($data)
    {
        return tap(new static, function($customer) use ($data) {

            $customer->email = $data['email'] ?: Auth::user()->email;
            $customer->first_name = $data['first_name'];
            $customer->last_name = $data['last_name'];
            $customer->country = $data['country'];
            $customer->address = $data['address'];
            $customer->postal_code = $data['postal_code'];
            $customer->city = $data['city'];
            $customer->phone = $data['phone'];
            Auth::user() ? $customer->user()->associate(Auth::user()) : '';

            $customer->save();
        });
    }

    public function saveChanges($data)
    {

        $this->first_name = $data['first_name'];
        $this->last_name = $data['last_name'];
        $this->country = $data['country'];
        $this->address = $data['address'];
        $this->postal_code = $data['postal_code'];
        $this->city = $data['city'];
        $this->phone = $data['phone'];

        $this->save();
    }
}