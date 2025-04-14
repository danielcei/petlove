<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\UnavailableDate;
use App\Models\User;

class UnavailableDatePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->checkPermissionTo('view-any UnavailableDate');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, UnavailableDate $unavailabledate): bool
    {
        return $user->checkPermissionTo('view UnavailableDate');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->checkPermissionTo('create UnavailableDate');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, UnavailableDate $unavailabledate): bool
    {
        return $user->checkPermissionTo('update UnavailableDate');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, UnavailableDate $unavailabledate): bool
    {
        return $user->checkPermissionTo('delete UnavailableDate');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, UnavailableDate $unavailabledate): bool
    {
        return $user->checkPermissionTo('restore UnavailableDate');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, UnavailableDate $unavailabledate): bool
    {
        return $user->checkPermissionTo('force-delete UnavailableDate');
    }
}
