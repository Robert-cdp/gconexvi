<?php

namespace App\Models\Forum;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reply extends Model
{
    protected $table = 'forum_replies';

    protected $fillable = [
        'topic_id',
        'user_id',
        'content',
    ];

    public function topic(): BelongsTo
    {
        return $this->belongsTo(Forum::class, 'topic_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}   