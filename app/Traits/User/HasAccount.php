<?php

namespace App\Traits\User;

use App\Customer;
use Illuminate\Support\Facades\Hash;

trait HasAccount
{
    /**
     * Register the customer after an order has been placed.
     *
     * @param  array $data
     * @return void
     */
    public static function signUp($data)
    {
        $latestCustomer = Customer::latest()->first();

        $user = static::createNew($latestCustomer, $data);

        $latestCustomer->user()->associate($user)->save();
    }

    /**
     * Create the new user.
     *
     * @param  \App\Customer $latestCustomer
     * @param  array $data
     * @return \App\User
     */
    protected static function createNew($latestCustomer, $data)
    {
        if(! static::theUserExists($latestCustomer)) {

            return tap(new static, function($user) use($latestCustomer, $data) {

                $user->name = $latestCustomer->first_name;
                $user->email = $latestCustomer->email;
                $user->password = Hash::make($data['password']);

                $user->save();
            });
        }
    }

    /**
     * Determine if the user exists.
     *
     * @param  \App\Customer $latestCustomer
     * @return \App\User
     */
    protected static function theUserExists($latestCustomer)
    {
        $user = static::whereEmail($latestCustomer->email)->first();

        return $user;
    }
}