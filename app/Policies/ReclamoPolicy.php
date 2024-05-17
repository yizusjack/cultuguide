<?php

namespace App\Policies;

use App\Models\Reclamo;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ReclamoPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasRole('admin');
    }

}
