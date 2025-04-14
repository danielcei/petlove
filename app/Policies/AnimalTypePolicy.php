<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\AnimalType;
use App\Models\User;

class AnimalTypePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->checkPermissionTo('view-any AnimalType');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, AnimalType $animaltype): bool
    {
        return $user->checkPermissionTo('view AnimalType');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->checkPermissionTo('create AnimalType');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, AnimalType $animaltype): bool
    {
        return $user->checkPermissionTo('update AnimalType');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, AnimalType $animaltype): bool
    {
        return $user->checkPermissionTo('delete AnimalType');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, AnimalType $animaltype): bool
    {
        return $user->checkPermissionTo('restore AnimalType');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, AnimalType $animaltype): bool
    {
        return $user->checkPermissionTo('force-delete AnimalType');
    }
}
