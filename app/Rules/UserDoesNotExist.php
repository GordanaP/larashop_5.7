<?php

namespace App\Rules;

use App\User;
use Illuminate\Contracts\Validation\Rule;

class UserDoesNotExist implements Rule
{
    public $latestCustomer;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($latestCustomer)
    {
        $this->latestCustomer = $latestCustomer;
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
        $user = User::whereEmail($this->latestCustomer->email)->first();

        return ! $user;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'You already have an account. Please log in to track your order';
    }
}
