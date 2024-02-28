<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\Tenant;
use App\Models\User;

class TenantPolicy
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
    public function view(User $user, Tenant $tenant): bool
    {
        return $user->hasRole('Manager');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasRole('Manager');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Tenant $tenant): bool
    {
        return $user->hasRole('Manager');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Tenant $tenant): bool
    {
        return $user->hasRole('Manager');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Tenant $tenant): bool
    {
        return $user->can('restore Tenant');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Tenant $tenant): bool
    {
        return $user->hasRole('Manager');
    }
}
