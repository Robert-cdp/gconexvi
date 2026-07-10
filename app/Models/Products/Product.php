<?php

namespace App\Models\Products;

use App\Models\Categories\Category;
use App\Models\Chat\Conversation;
use App\Models\Reviews\Review;
use App\Models\User;
use App\Traits\HasSlug;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Support\Facades\Storage;

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

    public function reviews()
    {
        return $this->morphMany(Review::class, 'reviewable')
            ->latest();
    }

    public function getUrlAttribute(): string
    {
        return route('marketplace.show', $this);
    }

    public function getTypeLabelAttribute(): string
    {
        return match ($this->type) {
            'sale' => 'Venta',
            'exchange' => 'Intercambio',
            'wanted' => 'Busco',
            default => 'Desconocido',
        };
    }

    public function getTypeBadgeAttribute(): string
    {
        return match ($this->type) {
            'sale' => 'bg-emerald-500',
            'exchange' => 'bg-amber-500',
            'wanted' => 'bg-sky-500',
            default => 'bg-slate-500',
        };
    }

    public function getActionLabelAttribute(): string
    {
        return match ($this->type) {
            'sale' => 'Ver producto',
            'exchange' => 'Ver intercambio',
            'wanted' => 'Ver solicitud',
            default => 'Ver publicación',
        };
    }

    public function getFormattedPriceAttribute(): ?string
    {
        return $this->price
            ? '$' . number_format($this->price, 2)
            : null;
    }

    public function getImageUrlAttribute(): string
    {
        return $this->image
            ? Storage::url($this->image)
            : asset('images/product-placeholder.webp');
    }
}
