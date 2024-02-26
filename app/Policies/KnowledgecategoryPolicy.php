<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\Knowledgecategory;
use App\Models\User;

class KnowledgecategoryPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view-any Knowledgecategory');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Knowledgecategory $knowledgecategory): bool
    {
        return $user->can('view Knowledgecategory');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create Knowledgecategory');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Knowledgecategory $knowledgecategory): bool
    {
        return $user->can('update Knowledgecategory');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Knowledgecategory $knowledgecategory): bool
    {
        return $user->can('delete Knowledgecategory');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Knowledgecategory $knowledgecategory): bool
    {
        return $user->can('restore Knowledgecategory');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Knowledgecategory $knowledgecategory): bool
    {
        return $user->can('force-delete Knowledgecategory');
    }
}
