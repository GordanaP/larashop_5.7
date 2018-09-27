<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    /**
     * Get the buyables that belong to the size.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function buyables()
    {
        return $this->hasMany(Buyable::class);
    }
}
