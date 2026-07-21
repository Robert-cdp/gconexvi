<?php

namespace App\Traits;

use App\Models\Chat\Conversation;
use App\Models\Chat\Message;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\HasMany;

trait HasChat
{
    /*
    |--------------------------------------------------------------------------
    | Relaciones
    |--------------------------------------------------------------------------
    */

    public function conversations(): HasMany
    {
        return $this->hasMany(Conversation::class);
    }

    public function ownedConversations(): HasMany
    {
        return $this->hasMany(Conversation::class, 'owner_id');
    }

    public function messages(): HasMany
    {
        return $this->hasMany(Message::class);
    }

    /*
    |--------------------------------------------------------------------------
    | Conversaciones
    |--------------------------------------------------------------------------
    */

    public function latestConversations(int $limit = 3)
    {
        return Conversation::query()
            ->forUser($this)
            ->withMenuData()
            ->take($limit)
            ->get();
    }

    public function conversationWith(User $user): ?Conversation
    {
        return Conversation::query()
            ->where(function ($query) use ($user) {
                $query
                    ->where('owner_id', $this->id)
                    ->where('user_id', $user->id);
            })
            ->orWhere(function ($query) use ($user) {
                $query
                    ->where('owner_id', $user->id)
                    ->where('user_id', $this->id);
            })
            ->first();
    }

    /*
    |--------------------------------------------------------------------------
    | Mensajes
    |--------------------------------------------------------------------------
    */

    public function unreadMessages()
    {
        return Message::query()
            ->whereHas('conversation', fn($query) => $query->forUser($this))
            ->where('user_id', '!=', $this->id)
            ->whereNull('read_at');
    }

    public function unreadMessagesCount(): int
    {
        return $this->unreadMessages()->count();
    }

    public function hasUnreadMessages(): bool
    {
        return $this->unreadMessages()->exists();
    }

    /**
     * Conversaciones para el menú rápido.
     */
    public function chatMenuConversations(int $limit = 3)
    {
        return $this->latestConversations($limit);
    }


    /**
     * Total de mensajes sin leer limitado para badge.
     */
    public function chatUnreadCount(): int
    {
        return $this->unreadMessagesCount();
    }
}
