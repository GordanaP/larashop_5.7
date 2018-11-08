<?php

namespace App\Traits\User;

trait HasReview
{
    /**
     * Determine if the user is eligible to write a product's review.
     *
     * @param  \App\Product  $product
     * @return boolean
     */
    public function isEligibleToWriteAReview($product)
    {
        foreach ($this->customer->load('orders.inventories')->orders as $order)
        {
            if ($order->inventories->pluck('product_id')->contains($product->id))
            {
                return true;
            }
        }
    }

    /**
     * Get the user's review for a specific product.
     *
     * @param  \App\Product $product
     * @return \App\Review
     */
    public function getReview($product)
    {
        $review = $this->reviews->firstWhere('product_id', $product->id);

        return $review;
    }

    /**
     * The user saves the product's review.
     *
     * @param  \App\Product $product
     * @param  array $data
     * @return void
     */
    public function saveReview($product, $data)
    {
        $review = $this->getReview($product) ?: new Review;

        $review->stars = $data['stars'];
        $review->title = $data['title'];
        $review->body = $data['body'];
        $review->product()->associate($product);

        $this->reviews()->save($review);
    }
}