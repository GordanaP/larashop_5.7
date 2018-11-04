<?php

namespace App\Http\Requests;

use App\Services\Utilities\Product\Rating;
use Illuminate\Foundation\Http\FormRequest;

class ReviewRequest extends FormRequest
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
            'stars' => 'required|in:'.implode(',', array_keys(Rating::all())),
            'title' => 'nullable|required_with:body|string|max:100',
            'body' => 'nullable|string|max:500'
        ];
    }
}