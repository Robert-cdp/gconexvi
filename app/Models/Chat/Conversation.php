<?php

namespace App\Models\Chat;

use App\Traits\HasConversation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Conversation extends Model
{
    use HasConversation;

    protected $table = 'conversations';

    protected $fillable = [
        'uuid',
        'conversationable_type',
        'conversationable_id',
        'owner_id',
        'user_id',
    ];

    protected static function booted(): void
    {
        static::creating(function (Conversation $conversation) {
            $conversation->uuid ??= (string) Str::ulid();
        });
    }

    public function getRouteKeyName(): string
    {
        return 'uuid';
    }
}