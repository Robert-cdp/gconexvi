<?php

namespace App\Models\Services;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ServiceImage extends Model
{
    protected $fillable = [
        'service_id',
        'path',
        'order',
        'is_primary',
    ];

    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }
}
