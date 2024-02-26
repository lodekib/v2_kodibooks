<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\Caretaker;
use App\Models\User;

class CaretakerPolicy
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
    public function view(User $user, Caretaker $caretaker): bool
    {
        return $user->can('view Caretaker');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create Caretaker');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Caretaker $caretaker): bool
    {
        return $user->can('update Caretaker');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Caretaker $caretaker): bool
    {
        return $user->can('delete Caretaker');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Caretaker $caretaker): bool
    {
        return $user->can('restore Caretaker');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Caretaker $caretaker): bool
    {
        return $user->can('force-delete Caretaker');
    }
}
