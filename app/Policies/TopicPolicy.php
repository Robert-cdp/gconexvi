<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Forum\Topic;

class TopicPolicy
{
    public function update(User $user, Topic $topic): bool
    {
        return $user->id === $topic->user_id;
    }

    public function delete(User $user, Topic $topic): bool
    {
        return $user->id === $topic->user_id;
    }
}
