<?php

namespace App\Models\Products;

use App\Models\Categories\Category;
use App\Models\Chat\Conversation;
use App\Models\User;
use App\Traits\HasSlug;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Product extends Model
{
    use HasSlug;

    protected string $slugFrom = 'title';

    protected $table = 'products';

    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'description',
        'price',
        'type',
        'image',
        'status',
        'location',
    ];

    protected $casts = [
        'price' => 'decimal:2',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function categories(): MorphToMany
    {
        return $this->morphToMany(Category::class, 'categorizable');
    }

    public function getCategoryAttribute(): ?Category
    {
        return $this->categories->first();
    }

    public function conversations(): MorphMany
    {
        return $this->morphMany(Conversation::class, 'conversationable');
    }
}
