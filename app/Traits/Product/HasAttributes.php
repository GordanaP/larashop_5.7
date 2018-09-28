<?php

namespace App\Traits\Product;

use App\Color;
use App\Size;

trait HasAttributes
{
    /**
     * Determine if the product has sizes.
     *
     * @return boolean
     */
    public function hasSizes()
    {
        $productSizes = $this->buyables->where('size_id', '!==', null);

        return $productSizes->isNotEmpty();
    }

    /**
     * Get the product sizes.
     *
     * @return array
     */
    public function getSizes()
    {
        $sizesIds = $this->buyables->pluck('size_id')->unique()->toArray();

        $sizes = Size::findMany($sizesIds);

        return $sizes;
    }

    /**
     * Determine if the product has colors.
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
        $colorsIds = $this->buyables->pluck('color_id')->unique()->toArray();

        $colors = Color::findMany($colorsIds);

        return $colors;
    }
}