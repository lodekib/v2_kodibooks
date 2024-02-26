<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\ManagerInvoice;
use App\Models\User;

class ManagerInvoicePolicy
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
    public function view(User $user, ManagerInvoice $managerinvoice): bool
    {
        return $user->can('view ManagerInvoice');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create ManagerInvoice');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, ManagerInvoice $managerinvoice): bool
    {
        return $user->can('update ManagerInvoice');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, ManagerInvoice $managerinvoice): bool
    {
        return $user->can('delete ManagerInvoice');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, ManagerInvoice $managerinvoice): bool
    {
        return $user->can('restore ManagerInvoice');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, ManagerInvoice $managerinvoice): bool
    {
        return $user->can('force-delete ManagerInvoice');
    }
}
