<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\Allocation;
use App\Models\User;

class AllocationPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view-any Allocation');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Allocation $allocation): bool
    {
        return $user->can('view Allocation');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create Allocation');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Allocation $allocation): bool
    {
        return $user->can('update Allocation');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Allocation $allocation): bool
    {
        return $user->can('delete Allocation');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Allocation $allocation): bool
    {
        return $user->can('restore Allocation');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Allocation $allocation): bool
    {
        return $user->can('force-delete Allocation');
    }
}
