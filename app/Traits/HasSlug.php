<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait HasSlug
{
    protected static function bootHasSlug()
    {
        static::creating(function ($model) {

            $field = $model->slugFrom ?? 'name';

            $model->slug = $model->generateUniqueSlug($model->{$field});

        });

        static::updating(function ($model) {

            $field = $model->slugFrom ?? 'name';

            if ($model->isDirty($field)) {

                $model->slug = $model->generateUniqueSlug(
                    $model->{$field},
                    $model->id
                );

            }

        });
    }

    protected function generateUniqueSlug($value, $ignoreId = null)
    {
        $slug = Str::slug($value);

        $originalSlug = $slug;

        $count = 1;

        while (
            static::where('slug', $slug)
                ->when($ignoreId, fn ($q) => $q->where('id', '!=', $ignoreId))
                ->exists()
        ) {

            $slug = "{$originalSlug}-{$count}";

            $count++;

        }

        return $slug;
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function scopeSlug($query, string $slug)
    {
        return $query->where('slug', $slug);
    }
}