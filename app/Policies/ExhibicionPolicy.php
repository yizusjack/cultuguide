<?php

namespace App\Policies;

use App\Models\Exhibicion;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ExhibicionPolicy
{

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasRole('admin');
    }
}
