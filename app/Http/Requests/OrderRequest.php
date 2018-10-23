<?php

namespace App\Http\Requests;

use App\Rules\AlphaNumSpace;
use App\Services\Utilities\Customer\Country;
use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
        return [
            'email' => 'sometimes|required|email|max:100',
            'first_name' => [
                'sometimes', 'required', 'string', 'max:50',
                new AlphaNumSpace()
            ],
            'last_name' => [
                'sometimes', 'required', 'string', 'max:50',
                new AlphaNumSpace()
            ],
            'country' => 'sometimes|required|in:'.implode(',', array_values(Country::all())),
            'address' => 'sometimes|required|max:100',
            'postal_code' => 'sometimes|required|string|alpha_num|max:10',
            'city' => [
                'sometimes', 'required', 'string', 'max:50',
                new AlphaNumSpace()
            ],
            'phone' => 'sometimes|required',
        ];
    }
}
