<?php

namespace App\Policies;

use App\Models\Reviews\Review;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class ReviewPolicy
{
    public function create(User $user, Model $reviewable): bool
    {
        // No puede calificarse a sí mismo
        if ($reviewable->user_id === $user->id) {
            return false;
        }

        // Solo una review por usuario
        return ! $reviewable->reviews()
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
