<?php

namespace App\Policies;

use App\Models\Lugar;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class LugarPolicy
{

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasRole('admin');
    }


    public function viewRecs(User $user)
    {
        return $user->email_verified_at != null and $user->datos_id != null;
    }

    public function buy(User $user)
    {
        return $user->email_verified_at != null;
    }
}
