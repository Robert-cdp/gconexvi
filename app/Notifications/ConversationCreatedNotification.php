<?php

namespace App\Notifications;

use App\Models\Chat\Conversation;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ConversationCreatedNotification extends Notification
{
    use Queueable;

    public function __construct(
        public Conversation $conversation,
        public User $sender,
    ) {}

    public function via(object $notifiable): array
    {
        return ['database', 'mail'];
    }

    public function toDatabase(object $notifiable): array
    {
        return [
            'conversation_id' => $this->conversation->id,
            'title' => 'Nueva conversación',
            'message' => $this->sender->name.' inició una conversación contigo.',
            'url' => route('chat.conversations.show', $this->conversation),
        ];
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Nueva conversación')
            ->greeting("Hola {$notifiable->name}")
            ->line($this->sender->name.' inició una conversación contigo.')
            ->action(
                'Ver conversación',
                route('chat.conversations.show', $this->conversation)
            );
    }
}