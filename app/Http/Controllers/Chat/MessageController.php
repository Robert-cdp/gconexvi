<?php

namespace App\Http\Controllers\Chat;

use App\Http\Controllers\Controller;
use App\Models\Chat\Conversation;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Chat\StoreMessage;

class MessageController extends Controller
{
    public function store(StoreMessage $request, Conversation $conversation)
    {
        $this->authorize('send', $conversation);

        $conversation->messages()->create([
            'user_id' => Auth::user()->id,
            'message' => $request->validated('message'),
        ]);

        return back();
    }
}
