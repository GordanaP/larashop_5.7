<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    /**
     * Get the inventories that belong to the size.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function inventories()
    {
        return $this->hasMany(Inventory::class);
    }

    /**
     * Get the size's name.
     *
     * @param  string $value
     * @return string
     */
    public function getNameAttribute($value)
    {
        return ucfirst($value);
    }
}
