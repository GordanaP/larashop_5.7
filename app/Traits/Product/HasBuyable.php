<?php

namespace App\Traits\Product;

use App\Color;
use App\Size;

trait HasBuyable
{
    /**
     * Find a specific product buyable by its attributes.
     *
     * @param  array $data
     * @return \App\Buyable
     */
    // public function findBuyable($data)
    // {
    //     $buyable = $this->buyables
    //         ->where('product_id', $this->id)
    //         ->where('size_id', $data['size_id'])
    //         ->where('color_id', $data['color_id'])
    //         ->first();

    //     return $buyable;
    // }

    public function findBuyable($productId, $size, $color)
    {
        $buyable = $this->buyables
            ->where('product_id', $productId)
            ->where('size_id', $size)
            ->where('color_id', $color)
            ->first();

        return $buyable;
    }

    /**
     * Collect the buyable-related attribute values.
     *
     * @param  string $attribute
     * @return collection
     */
    public function collectBuyableAttrValues($attribute)
    {
        return $this->buyables->pluck($attribute);
    }

    /**
     * The product has sizes.
     *
     * @return boolean
     */
    public function hasSizes()
    {
        $sizes = $this->buyables->where('size_id', '!==', null);

        return $sizes->isNotEmpty();
    }

    /**
     * Get the product sizes.
     *
     * @return array
     */
    public function getSizes()
    {
        $sizes_ids = $this->collectBuyableAttrValues('size_id')->unique()->toArray();

        $sizes = Size::findMany($sizes_ids);

        return $sizes;
    }

    /**
     * The product has colors.
     *
     * @return boolean
     */
    public function hasColors()
    {
        $colors = $this->buyables->where('color_id', '!==', null);

        return $colors->isNotEmpty();
    }

    /**
     * Get the product colors.
     *
     * @return array
     */
    public function getColors()
    {
        $colors_ids = $this->collectBuyableAttrValues('color_id')->unique()->toArray();

        $colors = Color::findMany($colors_ids);

        return $colors;
    }

}