<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Formation;
use Illuminate\Auth\Access\Response;

class FormationPolicy
{
    public function viewAny(User $user): bool
    {
        return false;
    }

    public function view(User $user, Formation $formation): bool
    {
        return false;
    }

    public function create(User $user): bool
    {
        return false;
    }

    public function update(User $user, Formation $formation): bool
    {
        return false;
    }

    public function delete(User $user, Formation $formation): bool
    {
        return false;
    }

    public function restore(User $user, Formation $formation): bool
    {
        return false;
    }

    public function forceDelete(User $user, Formation $formation): bool
    {
        return false;
    }
}
