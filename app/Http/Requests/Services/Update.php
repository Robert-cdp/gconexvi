<?php

namespace App\Http\Requests\Services;

use Illuminate\Foundation\Http\FormRequest;

class Update extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [

            'category_id' => [
                'required',
                'exists:categories,id',
            ],

            'title' => [
                'required',
                'string',
                'max:255',
            ],

            'description' => [
                'required',
                'string',
                'min:50',
            ],

            'price' => [
                'nullable',
                'numeric',
                'min:0',
            ],

            'price_type' => [
                'required',
                'in:fixed,hourly,quote',
            ],

            'delivery_time' => [
                'required',
                'in:24h,2d,5d,1w,more,custom',
            ],

            'revisions' => [
                'required',
                'in:0,1,2,3,unlimited',
            ],

            'status' => [
                'required',
                'in:draft,pending',
            ],

            'images' => [
                'nullable',
                'array',
                'min:1',
                'max:5',
            ],

            'images.*' => [
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:4096',
            ],

        ];
    }
}
