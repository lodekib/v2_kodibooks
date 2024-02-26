<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\Manager;
use App\Models\User;

class ManagerPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view-any Manager');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Manager $manager): bool
    {
        return $user->can('view Manager');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create Manager');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Manager $manager): bool
    {
        return $user->can('update Manager');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Manager $manager): bool
    {
        return $user->can('delete Manager');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Manager $manager): bool
    {
        return $user->can('restore Manager');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Manager $manager): bool
    {
        return $user->can('force-delete Manager');
    }
}
