<?php

namespace App\Traits\Product;

trait Reviewable
{
    /**
     * Determine if the product has a review.
     *
     * @return boolean
     */
    public function hasReview()
    {
        return $this->total_reviews > 0;
    }

    /**
     *  Get the # of product's reviews
     *
     * @return integer
     */
    public function getTotalReviewsAttribute()
    {
        $reviewsCount = $this->reviews->count();

        return $reviewsCount;
    }

    /**
     * Get the product's rating attribute.
     *
     * @return integer
     */
    public function getRatingAttribute()
    {
        $rating = $this->hasHalfRating() ? formatNumber($this->full_rating, 1) : $this->full_rating;

        return $rating;
    }

    /**
     * Get the product's full rating attribute.
     *
     * @return integer
     */
    protected function getFullRatingAttribute()
    {
        $fullRating = $this->reviews->avg('stars');

        return $fullRating;
    }

    /**
     * Determine if the product has half rating attribute.
     *
     * @return boolean
     */
    protected function hasHalfRating()
    {
        $halfRating = strpos($this->full_rating,'.');

        return $halfRating;
    }
}