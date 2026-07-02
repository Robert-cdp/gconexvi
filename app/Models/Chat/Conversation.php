<?php

namespace App\Models\Chat;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    protected $table = "conversations";

    protected $fillable = [
        'conversationable_type',
        'conversationable_id',
        'owner_id',
        'user_id',
    ];

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
}
