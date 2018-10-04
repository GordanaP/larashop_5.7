<?php

namespace App\Filters\Product;

use App\Category;
use App\Color;
use App\Filters\Filters;
use App\Size;

class ProductFilters extends Filters
{
    /**
     * Filter name.
     *
     * @var array
     */
    protected $filters = ['category', 'color', 'size'];

    /**
     * Sort products by category.
     *
     * @param  string $slug
     * @return \App\Product
     */
    protected function category($slug) //$slug = request()->category
    {
        $category = Category::whereSlug($slug)->first();

        if($category)
        {
            $this->builder->whereHas('categories', function($query) use($slug) {
                $query->where('slug', $slug);
            });
        }
    }

    /**
     * Sort products by color.
     *
     * @param  string $name
     * @return \App\Product
     */
    protected function color($slug) //$name = request()->color
    {
        $color = Color::whereSlug($slug)->first();

        if($color)
        {
            $this->builder->whereHas('inventories.color', function($query) use($slug) {
                $query->whereSlug($slug);
            });
        }
    }

    /**
     * Sort products by size.
     *
     * @param  string $name
     * @return \App\Product
     */
    protected function size($slug)
    {
        $size = Size::whereSlug($slug)->first();

        if($size)
        {
            $this->builder->whereHas('inventories.size', function($query) use($slug) {
                $query->whereSlug($slug);
            });
        }
    }
}