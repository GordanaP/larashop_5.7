<?php

namespace App\Filters\Product;

use App\Category;
use App\Color;
use App\Filters\Filters;
use App\Size;


class ProductFiltersMap extends Filters
{
    public static function mappings()
    {
        return [
            'category' => Category::all()->pluck('slug', 'name'),
            'color' => Color::all()->pluck('slug', 'name'),
            'size' => Size::all()->pluck('slug', 'name'),
        ];
    }
}