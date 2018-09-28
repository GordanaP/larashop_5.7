<?php

namespace App;

use App\Size;
use App\Traits\Buyable\HasPrice;
use Illuminate\Database\Eloquent\Model;

class Buyable extends Model
{
    use HasPrice;

    /**
     * Get the product that owns the byuable.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Get the color that owns the byuable.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function color()
    {
        return $this->belongsTo(Color::class);
    }

    /**
     * Get the size that owns the byuable.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function size()
    {
        return $this->belongsTo(Size::class);
    }

    /**
     * Get the orders that have buyables.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function orders()
    {
        return $this->belongsToMany(Order::class)->as('attribute')->withPivot('qty', 'price');
    }
}
