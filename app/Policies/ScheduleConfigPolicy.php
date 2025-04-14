<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\ScheduleConfig;
use App\Models\User;

class ScheduleConfigPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->checkPermissionTo('view-any ScheduleConfig');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, ScheduleConfig $scheduleconfig): bool
    {
        return $user->checkPermissionTo('view ScheduleConfig');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->checkPermissionTo('create ScheduleConfig');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, ScheduleConfig $scheduleconfig): bool
    {
        return $user->checkPermissionTo('update ScheduleConfig');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, ScheduleConfig $scheduleconfig): bool
    {
        return $user->checkPermissionTo('delete ScheduleConfig');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, ScheduleConfig $scheduleconfig): bool
    {
        return $user->checkPermissionTo('restore ScheduleConfig');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, ScheduleConfig $scheduleconfig): bool
    {
        return $user->checkPermissionTo('force-delete ScheduleConfig');
    }
}
