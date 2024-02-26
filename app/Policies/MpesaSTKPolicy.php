<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\MpesaSTK;
use App\Models\User;

class MpesaSTKPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view-any MpesaSTK');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, MpesaSTK $mpesastk): bool
    {
        return $user->can('view MpesaSTK');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create MpesaSTK');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, MpesaSTK $mpesastk): bool
    {
        return $user->can('update MpesaSTK');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, MpesaSTK $mpesastk): bool
    {
        return $user->can('delete MpesaSTK');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, MpesaSTK $mpesastk): bool
    {
        return $user->can('restore MpesaSTK');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, MpesaSTK $mpesastk): bool
    {
        return $user->can('force-delete MpesaSTK');
    }
}
