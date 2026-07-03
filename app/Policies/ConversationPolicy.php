<?php

namespace App\Policies;

use App\Models\Chat\Conversation;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;


class ConversationPolicy
{
    /**
     * Crear una conversación.
     */
    public function create(User $user, Model $conversationable): bool
    {
        // Debe existir un propietario.
        if (! isset($conversationable->user_id)) {
            return false;
        }

        // No puede iniciar un chat consigo mismo.
        return $conversationable->user_id !== $user->id;
    }

    /**
     * Ver una conversación.
     */
    public function view(User $user, Conversation $conversation): bool
    {
        return $conversation->owner_id === $user->id
            || $conversation->user_id === $user->id;
    }

    /**
     * Enviar mensajes.
     */
    public function send(User $user, Conversation $conversation): bool
    {
        return $conversation->owner_id === $user->id
            || $conversation->user_id === $user->id;
    }

    /**
     * Eliminar una conversación.
     */
    public function delete(User $user, Conversation $conversation): bool
    {
        return $conversation->owner_id === $user->id
            || $conversation->user_id === $user->id;
    }
}
