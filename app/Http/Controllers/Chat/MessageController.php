<?php

namespace App\Http\Controllers\Chat;

use App\Http\Controllers\Controller;
use App\Models\Chat\Conversation;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Chat\StoreMessage;
use App\Notifications\ConversationReplyNotification;

class MessageController extends Controller
{
    public function store(StoreMessage $request, Conversation $conversation)
    {
        $this->authorize('send', $conversation);

        $message = $conversation->messages()->create([
            'user_id' => Auth::id(),
            'message' => $request->validated('message'),
        ]);

        $recipient = $conversation->owner_id === Auth::id()
            ? $conversation->user
            : $conversation->owner;

        $recipient->notify(
            new ConversationReplyNotification($conversation, $message)
        );

        return back();
    }
}
