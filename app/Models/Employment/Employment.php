<?php

namespace App\Models\Employment;

use App\Traits\HasSlug;
use App\Models\Categories\Category;
use App\Models\Chat\Conversation;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Employment extends Model
{
    use HasSlug;

    protected string $slugFrom = 'title';

    protected $table = "employments";

    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'description',
        'type',
        'salary_min',
        'salary_max',
        'location',
        'deadline',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function categories()
    {
        return $this->morphToMany(Category::class, 'categorizable');
    }

    public function conversations()
    {
        return $this->morphMany(Conversation::class, 'conversationable');
    }
}
