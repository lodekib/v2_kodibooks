<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\Vendorindustry;
use App\Models\User;

class VendorindustryPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view-any Vendorindustry');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Vendorindustry $vendorindustry): bool
    {
        return $user->can('view Vendorindustry');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create Vendorindustry');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Vendorindustry $vendorindustry): bool
    {
        return $user->can('update Vendorindustry');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Vendorindustry $vendorindustry): bool
    {
        return $user->can('delete Vendorindustry');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Vendorindustry $vendorindustry): bool
    {
        return $user->can('restore Vendorindustry');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Vendorindustry $vendorindustry): bool
    {
        return $user->can('force-delete Vendorindustry');
    }
}
