<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class CreatePropertyRequest extends FormRequest
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
            'name' => 'required|string',
            'slug' => 'required|string',
            'property_type_id' => 'required|exists:property_types,id',
            'description' => 'nullable|string',
            'tenure' => 'string|nullable',
            'council_tax_band' => 'numeric|nullable',
            'currency' => 'string|nullable',
            'price' => 'required|numeric',
            'bedrooms' => 'required|integer|min:0',
            'bathrooms' => 'required|integer|min:0',
            'size' => 'required|numeric',
            'address_line_1' => 'required|string',
            'address_line_2' => 'nullable|string',
            'city' => 'required|string',
            'county' => 'nullable|string',
            'postcode' => 'string|required',
            'images' => 'required|array|max:10|min:1',
            'images.*' => 'mimes:jpeg,png,jpg'
        ];
    }
}

