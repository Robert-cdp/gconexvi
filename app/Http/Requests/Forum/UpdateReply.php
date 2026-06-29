<?php

namespace App\Http\Requests\Forum;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class UpdateReply extends FormRequest
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
