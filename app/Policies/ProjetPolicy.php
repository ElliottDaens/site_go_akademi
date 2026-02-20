<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Projet;
use Illuminate\Auth\Access\Response;

class ProjetPolicy
{
    public function viewAny(User $user): bool
    {
        return false;
    }

    public function view(User $user, Projet $projet): bool
    {
        return false;
    }

    public function create(User $user): bool
    {
        return false;
    }

    public function update(User $user, Projet $projet): bool
    {
        return false;
    }

    public function delete(User $user, Projet $projet): bool
    {
        return false;
    }

    public function restore(User $user, Projet $projet): bool
    {
        return false;
    }

    public function forceDelete(User $user, Projet $projet): bool
    {
        return false;
    }
}
