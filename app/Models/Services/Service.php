<?php

namespace App\Models\Services;

use App\Models\Categories\Category;
use App\Models\Chat\Conversation;
use App\Models\Reviews\Review;
use App\Models\User;
use App\Traits\HasSlug;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Service extends Model
{
    use HasSlug;

    protected string $slugFrom = 'title';

    protected $table = "services";

    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'description',
        'price',
        'price_type',
        'delivery_time',
        'revisions',
        'status',
        'featured',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function categories()
    {
        return $this->morphToMany(Category::class, 'categorizable');
    }

    public function getCategoryAttribute(): ?Category
    {
        return $this->categories->first();
    }

    public function images(): HasMany
    {
        return $this->hasMany(ServiceImage::class)
            ->orderBy('order');
    }

    public function cover(): HasOne
    {
        return $this->hasOne(ServiceImage::class)
            ->where('is_primary', true);
    }

    public function reviews()
    {
        return $this->morphMany(Review::class, 'reviewable')
            ->latest();
    }

    public function conversations()
    {
        return $this->morphMany(Conversation::class, 'conversationable');
    }
}
