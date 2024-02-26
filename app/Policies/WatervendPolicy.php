<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\Watervend;
use App\Models\User;

class WatervendPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view-any Watervend');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Watervend $watervend): bool
    {
        return $user->can('view Watervend');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create Watervend');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Watervend $watervend): bool
    {
        return $user->can('update Watervend');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Watervend $watervend): bool
    {
        return $user->can('delete Watervend');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Watervend $watervend): bool
    {
        return $user->can('restore Watervend');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Watervend $watervend): bool
    {
        return $user->can('force-delete Watervend');
    }
}
