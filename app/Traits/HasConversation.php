<?php

namespace App\Traits;

use App\Models\Chat\Message;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Support\Collection;
use RuntimeException;

/**
 * @property-read User $owner
 * @property-read User $user
 * @property-read Message|null $lastMessage
 * @property-read mixed $conversationable
 */
trait HasConversation
{
    /*
    |--------------------------------------------------------------------------
    | Relaciones
    |--------------------------------------------------------------------------
    */

    public function owner(): BelongsTo
    {
        return $this->belongsTo(
            User::class,
            'owner_id'
        );
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(
            User::class,
            'user_id'
        );
    }

    public function messages(): HasMany
    {
        return $this->hasMany(
            Message::class,
            'conversation_id'
        );
    }

    public function lastMessage(): HasOne
    {
        return $this
            ->hasOne(
                Message::class,
                'conversation_id'
            )
            ->latestOfMany();
    }

    public function conversationable(): MorphTo
    {
        return $this->morphTo();
    }

    /*
    |--------------------------------------------------------------------------
    | Scopes
    |--------------------------------------------------------------------------
    */

    public function scopeForUser(
        Builder $query,
        User $user
    ): Builder {

        return $query->where(function (Builder $query) use ($user) {

            $query
                ->where('owner_id', $user->id)
                ->orWhere('user_id', $user->id);

        });
    }

    public function scopeWithMenuData(
        Builder $query
    ): Builder {

        return $query
            ->with([
                'owner',
                'user',
                'lastMessage.user',
                'conversationable',
            ])
            ->withMax(
                'messages',
                'created_at'
            )
            ->orderByDesc(
                'messages_max_created_at'
            );
    }

    /*
    |--------------------------------------------------------------------------
    | Participantes
    |--------------------------------------------------------------------------
    */

    /**
     * Obtiene el participante contrario.
     */
    public function participantFor(
        User $user
    ): User {

        $participant = $this->owner_id === $user->id
            ? $this->user
            : $this->owner;


        if (!$participant instanceof User) {

            throw new RuntimeException(
                "La conversación {$this->id} no tiene un usuario participante válido."
            );

        }


        return $participant;
    }

    /**
     * Nombre del participante.
     */
    public function participantNameFor(
        User $user
    ): string {

        return $this
            ->participantFor($user)
            ->name;
    }

    /**
     * Avatar del participante.
     */
    public function participantAvatarFor(
        User $user
    ): string {

        return $this
            ->participantFor($user)
            ->avatar_url;
    }

    /**
     * Todos los participantes.
     */
    public function participants(): Collection
    {
        return collect([
            $this->owner,
            $this->user,
        ])
        ->filter()
        ->values();
    }

    /*
    |--------------------------------------------------------------------------
    | Mensajes
    |--------------------------------------------------------------------------
    */

    public function unreadCountFor(
        User $user
    ): int {

        return $this
            ->messages()
            ->where(
                'user_id',
                '!=',
                $user->id
            )
            ->whereNull('read_at')
            ->count();
    }

    public function hasUnreadFor(
        User $user
    ): bool {

        return $this
            ->messages()
            ->where(
                'user_id',
                '!=',
                $user->id
            )
            ->whereNull('read_at')
            ->exists();
    }

    public function markAsRead(
        User $user
    ): void {

        $this
            ->messages()
            ->where(
                'user_id',
                '!=',
                $user->id
            )
            ->whereNull('read_at')
            ->update([
                'read_at' => now(),
            ]);
    }

    public function lastMessagePreview(
        int $limit = 50
    ): ?string {

        $message = $this->lastMessage?->message;


        if (!$message) {
            return null;
        }


        return mb_strimwidth(
            $message,
            0,
            $limit,
            '...'
        );
    }


    public function lastMessageSender(): ?User
    {
        return $this->lastMessage?->user;
    }

    public function lastMessageIsMine(
        User $user
    ): bool {

        return $this->lastMessage?->user_id === $user->id;
    }

    /*
    |--------------------------------------------------------------------------
    | Contexto
    |--------------------------------------------------------------------------
    */

    public function contextTitle(): ?string
    {
        return $this
            ->conversationable
            ?->title;
    }

    public function contextType(): ?string
    {
        return $this
            ->conversationable
            ? class_basename($this->conversationable)
            : null;
    }
}