<?php

namespace App\Http\Controllers\Forum;

use App\Http\Controllers\Controller;
use App\Http\Requests\Forum\StoreReply;
use App\Models\Forum\Forum;

class ReplyController extends Controller
{
    public function store(StoreReply $request, Forum $forum)
    {
        $forum->replies()->create([
            'user_id' => auth()->id(),
            'content' => $request->content,
        ]);

        return redirect()
            ->route('community.show', $forum->slug)
            ->with('success', 'Respuesta publicada correctamente.');
    }

    public function edit() {}

    public function update() {}

    public function destroy() {}
}
