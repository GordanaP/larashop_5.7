<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    /**
     * Get the buyables that belong to the color.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function buyables()
    {
        return $this->hasMany(Buyable::class);
    }
}
