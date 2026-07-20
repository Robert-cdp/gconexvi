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
            ->where(function ($query) {
                $query->where('owner_id', Auth::user()->id)
                    ->orWhere('user_id', Auth::user()->id);
            })
            ->with([
                'conversationable',
                'lastMessage.user',
            ])
            ->withMax('messages', 'created_at')
            ->orderByDesc('messages_max_created_at')
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

        $conversation->load([
            'conversationable',
            'owner',
            'user',
            'lastMessage.user',
            'messages' => fn($query) => $query
                ->with('user')
                ->oldest(),
        ]);

        $conversation->messages()
            ->whereNull('read_at')
            ->where('user_id', '!=', Auth::user()->id)
            ->update([
                'read_at' => now(),
            ]);

        return view('chat.show', compact('conversation'));
    }

    private function resolveConversationable(string $type, int $id)
    {
        $model = $this->types[$type];

        return $model::findOrFail($id);
    }
}
