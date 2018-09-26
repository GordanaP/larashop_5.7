<?php

namespace App\Http\Requests;

use App\Rules\AlphaNumSpace;
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
            'first_name' => [
                'required', 'string', 'max:50',
                new AlphaNumSpace()
            ],
            'last_name' => [
                'required', 'string', 'max:50',
                new AlphaNumSpace()
            ],
            'address' => 'required|max:100',
            'postcode' => 'required|string|alpha_num|max:10',
            'city' => [
                'required', 'string', 'max:50',
                new AlphaNumSpace()
            ],
            'phone' => 'required',
            'email' => 'required|email|max:100',
        ];
    }
}
