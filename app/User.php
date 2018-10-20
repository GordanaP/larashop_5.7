<?php

namespace App;

use App\Customer;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Get the customer that belongs to the user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function customer()
    {
        return $this->hasOne(Customer::class);
    }

    /**
     * Create a new user.
     *
     * @param  array $data
     * @return \App\User
     */
    public static function createNew($data)
    {
        $latestCustomer = Customer::latest()->first();

        // Check if the account already exists
        $user = User::whereEmail($latestCustomer->email)->first();

        if($user)
        {
            return false;
        }

        // Create user
        $user = new static;

        $user->name = $latestCustomer->first_name;
        $user->email = $latestCustomer->email;
        $user->password = Hash::make($data['password']);

        $user->save();

        // Associate the user with the customer
        $latestCustomer->user()->associate($user);
        $latestCustomer->save();

        return $user;
    }
}