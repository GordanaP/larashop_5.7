<?php

namespace App;

use App\Review;
use App\Traits\User\HasAccount;
use App\Traits\User\HasFavorite;
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
     * Get the favorites that belong to the user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function favorites()
    {
        return $this->belongsToMany(Product::class, 'favorites');
    }

    /**
     * Get the reviews that belong to the user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reviews()
    {
       return $this->hasMany(Review::class);
    }

    /**
     * Determine if the user is eligible to write a product's review.
     *
     * @param  \App\Product  $product
     * @return boolean
     */
    public function isEligibleToWriteAReview($product)
    {
        foreach ($this->customer->load('orders.inventories')->orders as $order)
        {
            if ($order->inventories->pluck('product_id')->contains($product->id))
            {
                return true;
            }
        }
    }

    /**
     * Get the user's review for a specific product.
     *
     * @param  \App\Product $product
     * @return \App\Review
     */
    public function getReview($product)
    {
        $review = $this->reviews->firstWhere('product_id', $product->id);

        return $review;
    }

    /**
     * The user saves the product's review.
     *
     * @param  \App\Product $product
     * @param  array $data
     * @return void
     */
    public function saveReview($product, $data)
    {
        $review = $this->getReview($product) ?: new Review;

        $review->stars = $data['stars'];
        $review->title = $data['title'];
        $review->body = $data['body'];
        $review->product()->associate($product);

        $this->reviews()->save($review);
    }
}