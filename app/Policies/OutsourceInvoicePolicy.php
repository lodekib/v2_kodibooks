<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\OutsourceInvoice;
use App\Models\User;

class OutsourceInvoicePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view-any OutsourceInvoice');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, OutsourceInvoice $outsourceinvoice): bool
    {
        return $user->can('view OutsourceInvoice');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create OutsourceInvoice');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, OutsourceInvoice $outsourceinvoice): bool
    {
        return $user->can('update OutsourceInvoice');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, OutsourceInvoice $outsourceinvoice): bool
    {
        return $user->can('delete OutsourceInvoice');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, OutsourceInvoice $outsourceinvoice): bool
    {
        return $user->can('restore OutsourceInvoice');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, OutsourceInvoice $outsourceinvoice): bool
    {
        return $user->can('force-delete OutsourceInvoice');
    }
}
