<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\Expensetype;
use App\Models\User;

class ExpensetypePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view-any Expensetype');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Expensetype $expensetype): bool
    {
        return $user->can('view Expensetype');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create Expensetype');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Expensetype $expensetype): bool
    {
        return $user->can('update Expensetype');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Expensetype $expensetype): bool
    {
        return $user->can('delete Expensetype');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Expensetype $expensetype): bool
    {
        return $user->can('restore Expensetype');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Expensetype $expensetype): bool
    {
        return $user->can('force-delete Expensetype');
    }
}
