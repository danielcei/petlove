<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\Breed;
use App\Models\User;

class BreedPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->checkPermissionTo('view-any Breed');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Breed $breed): bool
    {
        return $user->checkPermissionTo('view Breed');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->checkPermissionTo('create Breed');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Breed $breed): bool
    {
        return $user->checkPermissionTo('update Breed');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Breed $breed): bool
    {
        return $user->checkPermissionTo('delete Breed');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Breed $breed): bool
    {
        return $user->checkPermissionTo('restore Breed');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Breed $breed): bool
    {
        return $user->checkPermissionTo('force-delete Breed');
    }
}
