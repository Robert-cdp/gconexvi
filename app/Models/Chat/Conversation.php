<?php

namespace App\Models\Chat;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
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

    public function conversationable()
    {
        return $this->morphTo();
    }

    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function lastMessage()
    {
        return $this->hasOne(Message::class)->latestOfMany();
    }

    public function getParticipantAttribute(): User
    {
        return $this->owner_id === Auth::user()->id
            ? $this->user
            : $this->owner;
    }

    public function getRouteKeyName(): string
    {
        return 'uuid';
    }
}
