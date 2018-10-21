<?php

namespace App\Http\Requests;

use App\Customer;
use App\Rules\UserDoesNotExist;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $latestCustomer = Customer::latest()->first();

        return [
            'password' => [
                'required', 'string', 'min:6',
                new UserDoesNotExist($latestCustomer)
            ]
        ];
    }
}
