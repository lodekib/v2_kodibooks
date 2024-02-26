<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\Extraexpense;
use App\Models\User;

class ExtraexpensePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view-any Extraexpense');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Extraexpense $extraexpense): bool
    {
        return $user->can('view Extraexpense');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create Extraexpense');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Extraexpense $extraexpense): bool
    {
        return $user->can('update Extraexpense');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Extraexpense $extraexpense): bool
    {
        return $user->can('delete Extraexpense');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Extraexpense $extraexpense): bool
    {
        return $user->can('restore Extraexpense');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Extraexpense $extraexpense): bool
    {
        return $user->can('force-delete Extraexpense');
    }
}
