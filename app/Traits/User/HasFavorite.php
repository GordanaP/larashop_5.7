<?php

namespace App\Traits\User;

trait HasFavorite
{
    /**
     * Add/remove the product to/from favorites.
     *
     * @param \App\Product $product
     * @return void
     */
    public function toggleFavorite($product)
    {
        $this->favorites()->toggle($product);
    }

    /**
     * The user has favorited the product.
     *
     * @param  \App\Product  $product
     * @return boolean
     */
    public function hasFavorited($product)
    {
        $favorite = $this->favorites->firstWhere('id', $product->id);

        return $favorite;
    }

    /**
     * The total # of favorites.
     *
     * @return integer
     */
    public function favoritesCount()
    {
        $count = $this->favorites->count();

        return $count;
    }
}