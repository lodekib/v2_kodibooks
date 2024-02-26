<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\Waterbill;
use App\Models\User;

class WaterbillPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view-any Waterbill');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Waterbill $waterbill): bool
    {
        return $user->can('view Waterbill');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create Waterbill');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Waterbill $waterbill): bool
    {
        return $user->can('update Waterbill');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Waterbill $waterbill): bool
    {
        return $user->can('delete Waterbill');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Waterbill $waterbill): bool
    {
        return $user->can('restore Waterbill');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Waterbill $waterbill): bool
    {
        return $user->can('force-delete Waterbill');
    }
}
