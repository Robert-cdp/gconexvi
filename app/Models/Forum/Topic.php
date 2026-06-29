<?php

namespace App\Models\Forum;

use App\Models\User;
use App\Traits\HasSlug;
use App\Models\Categories\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Topic extends Model
{
    use HasSlug;

    protected string $slugFrom = 'title';

    protected $table = "forum_topics";

    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'content',
        'status',
        'views'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function categories(): MorphToMany
    {
        return $this->morphToMany(Category::class, 'categorizable');
    }

    public function replies(): HasMany
    {
        return $this->hasMany(Reply::class, 'topic_id')->oldest();
    }
}
