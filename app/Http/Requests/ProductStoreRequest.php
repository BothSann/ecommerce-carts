<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "pruduct_thumbnail" => ["nullable", "image", "mimes:jpg,jpeg,png,gif" ],
            "product_images.*" => ["nullable", "image", "mimes:jpg,jpeg,png,gif"],
            "product_name" => ["required", "string", "max:255"],
            "product_price" => ["required", "numeric", "min:0"],
            "product_colors" => ["nullable", "array"],
            "product_short_description" => ["nullable", "string", "max:255"],
            "product_quantity" => ["required", "integer", "min:0"],
            "product_sku" => ["required", "string", "max:255", "unique:products,sku"],
            "product_description" => ["required", "string"],
        ];
    }
}