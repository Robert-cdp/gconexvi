<?php

namespace App\Models\Forum;

use App\Models\Categories\Category;
use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{
    protected $table;

    protected $fillable = [];

    public function categories()
    {
        return $this->morphToMany(Category::class, 'categorizable');
    }
}
