<?php

namespace App\Models\Categories;

use App\Traits\HasSlug;
use App\Models\Forum\Forum;
use App\Models\Products\Product;
use App\Models\Services\Service;
use App\Models\Employment\Employment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasSlug;

    protected $table = "categories";

    protected $fillable = [
        'name',
        'slug',
        'parent_id'
    ];

    public function parent(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function children(): HasMany
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function services()
    {
        return $this->morphedByMany(Service::class, 'categorizable');
    }

    public function employments()
    {
        return $this->morphedByMany(Employment::class, 'categorizable');
    }

    public function products()
    {
        return $this->morphedByMany(Product::class, 'categorizable');
    }

    public function forums()
    {
        return $this->morphedByMany(Forum::class, 'categorizable');
    }
}
