<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ExistsInProductSizes implements Rule
{
    /**
     * \App\Product
     *
     * @var array
     */
    protected $product;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($product)
    {
        $this->product = $product;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  integer  $value
     * @return boolean
     */
    public function passes($attribute, $value)
    {
        $sizes = $this->product->collectInventoryAttrValues('size_id');

        return $sizes->contains($value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The value is invalid.';
    }
}
