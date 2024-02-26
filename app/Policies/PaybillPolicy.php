<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\Paybill;
use App\Models\User;

class PaybillPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasRole('Manager');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Paybill $paybill): bool
    {
        return $user->can('view Paybill');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create Paybill');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Paybill $paybill): bool
    {
        return $user->can('update Paybill');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Paybill $paybill): bool
    {
        return $user->can('delete Paybill');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Paybill $paybill): bool
    {
        return $user->can('restore Paybill');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Paybill $paybill): bool
    {
        return $user->can('force-delete Paybill');
    }
}
