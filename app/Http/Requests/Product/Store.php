<?php

namespace App\Http\Requests\Product;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class Store extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => [
                'required',
                'string',
                'min:5',
                'max:150',
            ],

            'description' => [
                'required',
                'string',
                'min:20',
                'max:5000',
            ],

            'price' => [
                'nullable',
                'numeric',
                'min:0',
            ],

            'type' => [
                'required',
                Rule::in([
                    'sale',
                    'exchange',
                    'wanted',
                ]),
            ],

            'status' => [
                'sometimes',
                Rule::in([
                    'active',
                    'inactive',
                    'sold',
                ]),
            ],

            'location' => [
                'nullable',
                'string',
                'max:255',
            ],

            'category_id' => [
                'nullable',
                'exists:categories,id',
            ],

            'image' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:5120',
            ],
        ];
    }

    public function attributes(): array
    {
        return [
            'title' => 'título',
            'description' => 'descripción',
            'price' => 'precio',
            'type' => 'tipo de publicación',
            'status' => 'estado',
            'location' => 'ubicación',
            'category_id' => 'categoría',
            'image' => 'imagen',
        ];
    }
}
