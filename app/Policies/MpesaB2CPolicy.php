<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\MpesaB2C;
use App\Models\User;

class MpesaB2CPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view-any MpesaB2C');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, MpesaB2C $mpesab2c): bool
    {
        return $user->can('view MpesaB2C');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create MpesaB2C');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, MpesaB2C $mpesab2c): bool
    {
        return $user->can('update MpesaB2C');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, MpesaB2C $mpesab2c): bool
    {
        return $user->can('delete MpesaB2C');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, MpesaB2C $mpesab2c): bool
    {
        return $user->can('restore MpesaB2C');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, MpesaB2C $mpesab2c): bool
    {
        return $user->can('force-delete MpesaB2C');
    }
}
