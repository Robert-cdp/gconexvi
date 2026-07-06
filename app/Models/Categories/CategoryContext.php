<?php

namespace App\Models\Categories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class CategoryContext
 *
 * Define en qué módulos se puede mostrar una categoría.
 * Ejemplo: community, services, employments.
 */
class CategoryContext extends Model
{
    protected $fillable = [
        'category_id',
        'context',
    ];

    public $timestamps = false;

    /**
     * Categoría asociada al contexto
     *
     * @return BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}