<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\Partner;
use App\Models\User;

class PartnerPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view-any Partner');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Partner $partner): bool
    {
        return $user->can('view Partner');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create Partner');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Partner $partner): bool
    {
        return $user->can('update Partner');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Partner $partner): bool
    {
        return $user->can('delete Partner');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Partner $partner): bool
    {
        return $user->can('restore Partner');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Partner $partner): bool
    {
        return $user->can('force-delete Partner');
    }
}
