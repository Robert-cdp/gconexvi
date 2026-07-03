<?php

namespace App\Http\Requests\Chat;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class StoreConversation extends FormRequest
{

    public function authorize(): bool
    {
        return Auth::check();
    }

    public function rules(): array
    {
        return [
            'type' => [
                'required',
                Rule::in([
                    'service',
                    'employment',
                    'product',
                ]),
            ],

            'id' => [
                'required',
                'integer',
                'min:1',
            ],
        ];
    }
}
