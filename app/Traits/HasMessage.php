<?php

namespace App\Traits;

use App\Models\Chat\Conversation;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Auth;

/**
 * @property-read Conversation $conversation
 * @property-read User|null $user
 */
trait HasMessage
{
    /*
    |--------------------------------------------------------------------------
    | Relaciones
    |--------------------------------------------------------------------------
    */

    public function conversation(): BelongsTo
    {
        return $this->belongsTo(Conversation::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /*
    |--------------------------------------------------------------------------
    | Estado
    |--------------------------------------------------------------------------
    */

    public function isMine(?User $user = null): bool
    {
        $user ??= Auth::user();

        return $this->user_id === $user?->id;
    }

    public function isRead(): bool
    {
        return $this->read_at !== null;
    }

    /*
    |--------------------------------------------------------------------------
    | Remitente
    |--------------------------------------------------------------------------
    */

    public function sender(): ?User
    {
        return $this->user;
    }

    public function senderName(): string
    {
        return $this->user?->name ?? 'Usuario';
    }

    public function senderAvatar(): string
    {
        return $this->user?->avatar_url
            ?? asset('img/default-avatar.webp');
    }

    public function senderInitials(): string
    {
        if (!$this->user) {
            return '??';
        }

        return strtoupper(substr($this->user->name, 0, 2));
    }

    /*
    |--------------------------------------------------------------------------
    | Contenido
    |--------------------------------------------------------------------------
    */

    public function body(): string
    {
        return $this->message;
    }

    public function preview(int $limit = 60): string
    {
        return mb_strimwidth(
            $this->message,
            0,
            $limit,
            '...'
        );
    }

    /*
    |--------------------------------------------------------------------------
    | Fecha
    |--------------------------------------------------------------------------
    */

    public function sentAt(): ?\Illuminate\Support\Carbon
    {
        return $this->created_at;
    }
}
