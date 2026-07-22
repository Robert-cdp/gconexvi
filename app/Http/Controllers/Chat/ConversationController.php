<?php

namespace App\Http\Controllers\Chat;

use App\Http\Controllers\Controller;
use App\Http\Requests\Chat\StoreConversation;
use App\Models\Chat\Conversation;
use App\Models\Chat\Message;
use App\Models\Employment\Employment;
use App\Models\Products\Product;
use App\Models\Services\Service;
use App\Notifications\ConversationCreatedNotification;
use Illuminate\Support\Facades\Auth;

class ConversationController extends Controller
{
    protected array $types = [
        'service' => Service::class,
        'employment' => Employment::class,
        'product' => Product::class,
    ];


    public function index()
    {
        $conversations = Conversation::query()
            ->forUser(Auth::user())
            ->withMenuData()
            ->paginate(15);

        return view('chat.index', compact('conversations'));
    }

    public function store(StoreConversation $request)
    {
        $conversationable = $this->resolveConversationable(
            $request->validated('type'),
            $request->validated('id'),
        );

        $this->authorize('create', [Conversation::class, $conversationable]);

        $conversation = Conversation::firstOrCreate(
            [
                'conversationable_type' => $conversationable::class,
                'conversationable_id'   => $conversationable->id,
                'user_id'               => Auth::id(),
            ],
            [
                'owner_id' => $conversationable->user_id,
            ]
        );

        if ($conversation->wasRecentlyCreated) {
            $conversation->owner->notify(new ConversationCreatedNotification($conversation, Auth::user()));
        }

        return redirect()->route('chat.conversations.show', $conversation);
    }

    public function show(Conversation $conversation)
    {
        $this->authorize('view', $conversation);

        $conversation
            ->loadForChat()
            ->markAsRead(auth()->user());

        return view('chat.show', compact('conversation'));
    }
    private function resolveConversationable(string $type, int $id)
    {
        $model = $this->types[$type];

        return $model::findOrFail($id);
    }
}
