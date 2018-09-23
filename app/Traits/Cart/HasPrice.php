<?php

namespace App\Traits\Cart;

trait HasPrice
{
    /**
     * Get the cart subtotal (without tax and shipping)
     *
     * @param  string $cart
     * @return float
     */
    protected function calculateCartSubtotal($cart)
    {
        $content = $this->getCartContent($cart);

        $subtotal = $content->reduce(function ($subtotal, $item)
        {
            return $subtotal + $item->subtotal;
        });

        return formatNumber($subtotal);
    }

    /**
     * Get the total price of the cart (subtotal + taxAmount).
     *
     * @param  string $cart
     * @param  int $taxRate
     * @return float
     */
    protected function calculateCartTotal($cart)
    {
        $content = $this->getCartContent($cart);

        $taxAmount = $this->calculateTaxAmount($cart);

        $total = $content->reduce(function ($total, $item) use($taxAmount) {

            return $total + $item->subtotal;

        }, $taxAmount);

        return formatNumber($total);
    }

    /**
     * Calculate the amount of tax.
     *
     * @param  string $cart
     * @param  int $taxRate
     * @return float
     */
    protected function calculateTaxAmount($cart)
    {
        $taxRate = config('cart.tax');

        $taxAmount = $this->calculateCartSubtotal($cart) * $taxRate/100;

        return formatNumber($taxAmount);
    }
}