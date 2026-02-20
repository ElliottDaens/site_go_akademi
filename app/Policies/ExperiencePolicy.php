<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Experience;
use Illuminate\Auth\Access\Response;

class ExperiencePolicy
{
    public function viewAny(User $user): bool
    {
        return false;
    }

    public function view(User $user, Experience $experience): bool
    {
        return false;
    }

    public function create(User $user): bool
    {
        return false;
    }

    public function update(User $user, Experience $experience): bool
    {
        return false;
    }

    public function delete(User $user, Experience $experience): bool
    {
        return false;
    }

    public function restore(User $user, Experience $experience): bool
    {
        return false;
    }

    public function forceDelete(User $user, Experience $experience): bool
    {
        return false;
    }
}
