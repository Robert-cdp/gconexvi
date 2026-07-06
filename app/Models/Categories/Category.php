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

/**
 * Class Category
 *
 * Modelo principal de categorías.
 * - Estructura jerárquica (parent / children)
 * - Relación polimórfica con múltiples módulos
 * - Control de visibilidad por contexto (category_contexts)
 */
class Category extends Model
{
    use HasSlug;

    protected $table = "categories";

    protected $fillable = [
        'name',
        'slug',
        'parent_id'
    ];

    /**
     * Categoría padre (auto-relación)
     *
     * @return BelongsTo
     */
    public function parent(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    /**
     * Categorías hijas (auto-relación)
     *
     * @return HasMany
     */
    public function children(): HasMany
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    /**
     * Contextos donde se muestra la categoría
     * (community, services, employments, etc.)
     *
     * @return HasMany
     */
    public function contexts(): HasMany
    {
        return $this->hasMany(CategoryContext::class);
    }

    /**
     * Servicios asociados a la categoría (polimorfismo)
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function services()
    {
        return $this->morphedByMany(Service::class, 'categorizable');
    }

    /**
     * Empleos asociados a la categoría (polimorfismo)
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function employments()
    {
        return $this->morphedByMany(Employment::class, 'categorizable');
    }

    /**
     * Productos asociados a la categoría (polimorfismo)
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function products()
    {
        return $this->morphedByMany(Product::class, 'categorizable');
    }

    /**
     * Foros asociados a la categoría (polimorfismo)
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function forums()
    {
        return $this->morphedByMany(Forum::class, 'categorizable');
    }

    /**
     * Scope: filtrar categorías por contexto de visibilidad
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param string $context
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeForContext($query, $context)
    {
        return $query->whereHas('contexts', function ($q) use ($context) {
            $q->where('context', $context);
        });
    }

    /**
     * Scope: obtener el árbol de categorías para un contexto específico.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param string $context
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeTreeForContext($query, string $context)
    {
        return $query
            ->forContext($context)
            ->whereNull('parent_id')
            ->with([
                'children' => fn($query) => $query->forContext($context)
            ]);
    }
}
