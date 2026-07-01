<?php

namespace App\Policies;

use App\Models\Reviews\Review;
use App\Models\Services\Service;
use App\Models\User;

class ReviewPolicy
{
    public function create(User $user, Service $service): bool
    {
        // No puede calificarse a sí mismo
        if ($service->user_id === $user->id) {
            return false;
        }

        // Solo una review por usuario
        return ! $service->reviews()
            ->where('user_id', $user->id)
            ->exists();
    }

    public function update(User $user, Review $review): bool
    {
        return $review->user_id === $user->id;
    }

    public function delete(User $user, Review $review): bool
    {
        return $review->user_id === $user->id;
    }
}
