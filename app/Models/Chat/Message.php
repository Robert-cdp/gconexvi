<?php

namespace App\Models\Chat;

use App\Models\User;
use App\Traits\HasMessage;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasMessage;

    protected $table = "messages";

    protected $fillable = [
        'conversation_id',
        'user_id',
        'message',
        'read_at',
    ];

    protected function casts(): array
    {
        return [
            'read_at' => 'datetime',
        ];
    }
}
