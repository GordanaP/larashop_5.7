<?php

namespace App\Http\Requests;

use App\Rules\BelongsToProductSize;
use App\Rules\ExistsInProductSizes;
use Illuminate\Foundation\Http\FormRequest;

class CartRequest extends FormRequest
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
            'size_id' => [
                'sometimes',
                'required',
                new ExistsInProductSizes($this->product)
            ],
            'color_id' => [
                'sometimes',
                'required',
                new BelongsToProductSize($this->product, $this->size_id)
            ],
            'qty' => 'required|integer|min:1|max:5'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
                'qty.required' => 'Required value',
                'qty.max' => 'Max 5 items',
                'qty.min' => 'Min 1 item',
            ];
    }
}
