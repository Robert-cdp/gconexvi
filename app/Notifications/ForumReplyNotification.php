<?php

namespace App\Notifications;

use App\Models\Forum\Forum;
use App\Models\Forum\Reply;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ForumReplyNotification extends Notification
{
    use Queueable;

    public function __construct(
        public Forum $forum,
        public Reply $reply
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
            'forum_id' => $this->forum->id,
            'reply_id' => $this->reply->id,
            'title' => 'Nueva respuesta en tu tema',
            'message' => $this->reply->content,
            'url' => route(
                'community.show',
                $this->forum->slug
            ),
        ];
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Nueva respuesta en tu tema del foro')
            ->greeting("Hola {$notifiable->name}")
            ->line('Alguien respondió a tu tema:')
            ->line($this->forum->title)
            ->line($this->reply->content)
            ->action(
                'Ver respuesta',
                route(
                    'community.show',
                    $this->forum->slug
                )
            );
    }

    public function toArray(object $notifiable): array
    {
        return [
            'forum_id' => $this->forum->id,
            'reply_id' => $this->reply->id,
        ];
    }
}