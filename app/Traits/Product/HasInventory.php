<?php

namespace App\Traits\Product;

use App\Color;
use App\Size;

trait HasInventory
{
    /**
     * Find the model by its attributes.
     *
     * @param  integer $productId
     * @param  integer $size
     * @param  integer $color
     * @return \App\Buyable
     */
    public function findInventory($productId, $size, $color)
    {
        $inventory = $this->inventories
            ->where('product_id', $productId)
            ->where('size_id', $size)
            ->where('color_id', $color)
            ->first();

        return $inventory;
    }

    /**
     * Collect the inventory attribute's values.
     *
     * @param  string $attribute
     * @return collection
     */
    public function collectInventoryAttrValues($attribute)
    {
        return $this->inventories->pluck($attribute);
    }

    /**
     * The product has sizes.
     *
     * @return boolean
     */
    public function hasSizes()
    {
        $sizes = $this->inventories->where('size_id', '!==', null);

        return $sizes->isNotEmpty();
    }

    /**
     * Get the product sizes.
     *
     * @return array
     */
    public function getSizes()
    {
        $sizes_ids = $this->collectInventoryAttrValues('size_id')->unique()->toArray();

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
        $colors = $this->inventories->where('color_id', '!==', null);

        return $colors->isNotEmpty();
    }

    /**
     * Get the product colors.
     *
     * @return array
     */
    public function getColors()
    {
        $colors_ids = $this->collectInventoryAttrValues('color_id')->unique()->toArray();

        $colors = Color::findMany($colors_ids);

        return $colors;
    }
}