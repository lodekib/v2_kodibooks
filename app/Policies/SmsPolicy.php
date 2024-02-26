<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\Sms;
use App\Models\User;

class SmsPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view-any Sms');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Sms $sms): bool
    {
        return $user->can('view Sms');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create Sms');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Sms $sms): bool
    {
        return $user->can('update Sms');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Sms $sms): bool
    {
        return $user->can('delete Sms');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Sms $sms): bool
    {
        return $user->can('restore Sms');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Sms $sms): bool
    {
        return $user->can('force-delete Sms');
    }
}
