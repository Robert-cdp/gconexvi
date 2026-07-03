<?php

namespace App\Http\Requests\Employment;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class Update extends FormRequest
{
    public function authorize(): bool
    {
        return Auth::check();
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],

            'type' => ['required', Rule::in(['remote', 'hybrid', 'onsite'])],

            'salary_min' => ['nullable', 'numeric', 'min:0'],
            'salary_max' => ['nullable', 'numeric', 'gte:salary_min'],

            'location' => ['nullable', 'string', 'max:255'],

            'category_id' => ['required'],
            'category_id.*' => ['exists:categories,id'],
        ];
    }
}
