<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\Outsourcewater;
use App\Models\User;

class OutsourcewaterPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view-any Outsourcewater');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Outsourcewater $outsourcewater): bool
    {
        return $user->can('view Outsourcewater');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create Outsourcewater');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Outsourcewater $outsourcewater): bool
    {
        return $user->can('update Outsourcewater');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Outsourcewater $outsourcewater): bool
    {
        return $user->can('delete Outsourcewater');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Outsourcewater $outsourcewater): bool
    {
        return $user->can('restore Outsourcewater');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Outsourcewater $outsourcewater): bool
    {
        return $user->can('force-delete Outsourcewater');
    }
}
