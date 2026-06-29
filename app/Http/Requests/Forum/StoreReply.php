<?php

namespace App\Http\Requests\Forum;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreReply extends FormRequest
{
    public function authorize(): bool
    {
        return Auth::check();
    }

    public function rules(): array
    {
        return [
            'content' => ['required', 'string', 'min:5'],
        ];
    }
}
