<?php

namespace App\Models\Products;

use App\Models\Categories\Category;
use App\Traits\HasSlug;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasSlug;

    protected $table = "products";

    protected $fillable = [];

    public function categories()
    {
        return $this->morphToMany(Category::class, 'categorizable');
    }
}
