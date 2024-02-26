<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\MpesaC2B;
use App\Models\User;

class MpesaC2BPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view-any MpesaC2B');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, MpesaC2B $mpesac2b): bool
    {
        return $user->can('view MpesaC2B');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create MpesaC2B');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, MpesaC2B $mpesac2b): bool
    {
        return $user->can('update MpesaC2B');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, MpesaC2B $mpesac2b): bool
    {
        return $user->can('delete MpesaC2B');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, MpesaC2B $mpesac2b): bool
    {
        return $user->can('restore MpesaC2B');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, MpesaC2B $mpesac2b): bool
    {
        return $user->can('force-delete MpesaC2B');
    }
}
