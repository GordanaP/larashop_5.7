<?php

namespace App;

use App\Size;
use App\Traits\Inventory\HasPrice;
use Illuminate\Database\Eloquent\Model;
use Keygen\Keygen;

class Inventory extends Model
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

    /**
     * Generate the inventory SKU.
     *
     * @return string
     */
    public function generateSku()
    {
        return Keygen::bytes()->generate(
            function($key) {

                // Generate a random numeric key
                $random = Keygen::numeric()->generate();

                // Manipulate the random bytes with the numeric key
                return substr(md5($key . $random . strrev($key)), mt_rand(0,8), 8);
            },

            'strtoupper'
        );
    }

    /**
     * Generate the inventory name.
     *
     * @return string.
     */
    public function generateName()
    {
        $product_name = $this->product->name;

        $inventory_size = optional($this->size)->name ?: '';

        $inventory_color = optional($this->color)->name ?: '';

        $inventory_name = $product_name . ' '. $inventory_size . ' ' . $inventory_color;

        return $inventory_name;
    }
}