<?php

namespace App\Http\Controllers\Forum;

use App\Http\Controllers\Controller;
use App\Http\Requests\Forum\StoreReply;
use App\Models\Forum\Forum;
use App\Notifications\ForumReplyNotification;

class ReplyController extends Controller
{
    public function store(StoreReply $request, Forum $forum)
    {
        $reply = $forum->replies()->create([
            'user_id' => auth()->id(),
            'content' => $request->content,
        ]);

        if ($forum->user_id !== auth()->id()) {
            $forum->user->notify(
                new ForumReplyNotification($forum, $reply)
            );
        }

        return redirect()
            ->route('community.show', $forum->slug)
            ->with('success', 'Respuesta publicada correctamente.');
    }
    public function edit() {}

    public function update() {}

    public function destroy() {}
}
