<?php

namespace App\Policies;

use App\Models\Lugar;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class LugarPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Lugar $lugar): bool
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasRole('admin');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Lugar $lugar): bool
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Lugar $lugar): bool
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Lugar $lugar): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Lugar $lugar): bool
    {
        //
    }

    public function viewRecs(User $user)
    {
        return $user->email_verified_at != null and $user->datos_id != null;
    }
}
