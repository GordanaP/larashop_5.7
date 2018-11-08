<?php

namespace App;

use App\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Review extends Model
{
    protected $dates = ['created_at'];

    /**
     * Get the product that owns the review.
     *
     * @return  \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Get the user that owns the review.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the review's date of creation.
     *
     * @param  timestsmp $value
     * @return string
     */
    public function getCreatedAtAttribute($value)
    {
        $created_at = Carbon::parse($value)->format('d M Y');

        return $created_at;
    }
}