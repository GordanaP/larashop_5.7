<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class IsUniqueInventory implements Rule
{
    public $product;

    public $color;

    public $size;

    public $method;

    public $inventory;


    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($product, $color, $size, $method, $inventory)
    {
        $this->product = $product;

        $this->color = $color;

        $this->size = $size;

        $this->method = $method;

        $this->inventory = $inventory;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $product = \App\Product::find($this->product);

        $inventory = $product->findInventory($this->product, $this->size, $this->color);

        return optional($inventory)->exists && $this->method == 'PUT';
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The inventory has already been created. ' .$this->inventory->name;
    }
}