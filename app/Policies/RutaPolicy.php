<?php

namespace App\Policies;

use App\Models\Ruta;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class RutaPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasRole('admin');
    }

}
