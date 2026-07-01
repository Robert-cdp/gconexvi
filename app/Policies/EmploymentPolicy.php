<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Employment\Employment;

class EmploymentPolicy
{
    public function update(User $user, Employment $employment): bool
    {
        return $user->id === $employment->user_id;
    }

    public function delete(User $user, Employment $employment): bool
    {
        return $user->id === $employment->user_id;
    }
}