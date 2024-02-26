<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\Refund;
use App\Models\User;

class RefundPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view-any Refund');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Refund $refund): bool
    {
        return $user->can('view Refund');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create Refund');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Refund $refund): bool
    {
        return $user->can('update Refund');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Refund $refund): bool
    {
        return $user->can('delete Refund');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Refund $refund): bool
    {
        return $user->can('restore Refund');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Refund $refund): bool
    {
        return $user->can('force-delete Refund');
    }
}
