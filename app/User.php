<?php

namespace App;

use App\Traits\Product\HasFavorite;
use App\Traits\User\HasAccount;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasAccount, HasFavorite, Notifiable;

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
     * Get the products that belong to the user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function favorites()
    {
        return $this->belongsToMany(Product::class, 'favorites');
    }
}