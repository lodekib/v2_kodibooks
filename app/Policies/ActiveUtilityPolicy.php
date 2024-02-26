<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\ActiveUtility;
use App\Models\User;

class ActiveUtilityPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view-any ActiveUtility');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, ActiveUtility $activeutility): bool
    {
        return $user->can('view ActiveUtility');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create ActiveUtility');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, ActiveUtility $activeutility): bool
    {
        return $user->can('update ActiveUtility');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, ActiveUtility $activeutility): bool
    {
        return $user->can('delete ActiveUtility');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, ActiveUtility $activeutility): bool
    {
        return $user->can('restore ActiveUtility');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, ActiveUtility $activeutility): bool
    {
        return $user->can('force-delete ActiveUtility');
    }
}
