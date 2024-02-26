<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\Knowledgebase;
use App\Models\User;

class KnowledgebasePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view-any Knowledgebase');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Knowledgebase $knowledgebase): bool
    {
        return $user->can('view Knowledgebase');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create Knowledgebase');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Knowledgebase $knowledgebase): bool
    {
        return $user->can('update Knowledgebase');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Knowledgebase $knowledgebase): bool
    {
        return $user->can('delete Knowledgebase');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Knowledgebase $knowledgebase): bool
    {
        return $user->can('restore Knowledgebase');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Knowledgebase $knowledgebase): bool
    {
        return $user->can('force-delete Knowledgebase');
    }
}
