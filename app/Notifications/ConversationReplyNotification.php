<?php

namespace App\Notifications;

use App\Models\Chat\Conversation;
use App\Models\Chat\Message;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ConversationReplyNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public function __construct(
        public Conversation $conversation,
        public Message $message
    ) {}

    public function via(object $notifiable): array
    {
        return [
            'database',
            'mail',
        ];
    }

    public function toDatabase(object $notifiable): array
    {
        return [
            'conversation_id' => $this->conversation->id,
            'message_id' => $this->message->id,
            'title' => 'Nueva respuesta',
            'message' => $this->message->message,
            'url' => route(
                'chat.conversations.show',
                $this->conversation
            ),
        ];
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Nueva respuesta en la conversación')
            ->greeting("Hola {$notifiable->name}")
            ->line('Has recibido una nueva respuesta.')
            ->line($this->message->message)
            ->action(
                'Ver conversación',
                route(
                    'chat.conversations.show',
                    $this->conversation
                )
            );
    }

    public function toArray(object $notifiable): array
    {
        return [
            'conversation_id' => $this->conversation->id,
            'message_id' => $this->message->id,
        ];
    }
}