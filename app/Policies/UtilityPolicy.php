<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\Utility;
use App\Models\User;

class UtilityPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view-any Utility');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Utility $utility): bool
    {
        return $user->can('view Utility');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create Utility');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Utility $utility): bool
    {
        return $user->can('update Utility');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Utility $utility): bool
    {
        return $user->can('delete Utility');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Utility $utility): bool
    {
        return $user->can('restore Utility');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Utility $utility): bool
    {
        return $user->can('force-delete Utility');
    }
}
