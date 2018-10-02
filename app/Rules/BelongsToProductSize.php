<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class BelongsToProductSize implements Rule
{
    /**
     * \App\Product
     *
     * @var array
     */
    protected $product;

    /**
     * The product's inventory size
     *
     * @var integer
     */
    protected $size_id;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($product, $size_id)
    {
        $this->product = $product;

        $this->size_id = $size_id;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute [color_id]
     * @param  integer  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        // $buyable = $this->product->findBuyable($this->product->id, $this->size_id, $value);
        $inventory = $this->product->findInventory($this->product->id, $this->size_id, $value);

        return optional($inventory)->exists;
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
