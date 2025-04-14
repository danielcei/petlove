<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Artisan::call('permissions:sync');
        Artisan::call('permissions:sync -P');

        $roles = [
            ['id' => 1, 'name' => 'Admin', 'guard_name' => 'web', 'permissions' => [
                'view-any User',
                'view User',
                'create User',
                'update User',
                'delete User',
                'restore User',
                'force-delete User',
                'replicate User',
                'reorder User',

                'view-any Animal',
                'view Animal',
                'create Animal',
                'update Animal',
                'delete Animal',
                'restore Animal',
                'force-delete Animal',
                'replicate Animal',
                'reorder Animal',

                'view-any Appointment',
                'view Appointment',
                'create Appointment',
                'update Appointment',
                'delete Appointment',
                'restore Appointment',
                'force-delete Appointment',
                'replicate Appointment',
                'reorder Appointment',



                'view-any Breed',
                'view Breed',
                'create Breed',
                'update Breed',
                'delete Breed',
                'restore Breed',
                'force-delete Breed',
                'replicate Breed',
                'reorder Breed',

                'view-any Pet',
                'view Pet',
                'create Pet',
                'update Pet',
                'delete Pet',
                'restore Pet',
                'force-delete Pet',
                'replicate Pet',
                'reorder Pet',

                'view-any ScheduleConfig',
                'view ScheduleConfig',
                'create ScheduleConfig',
                'update ScheduleConfig',
                'delete ScheduleConfig',
                'restore ScheduleConfig',
                'force-delete ScheduleConfig',
                'replicate ScheduleConfig',
                'reorder ScheduleConfig',

                'view-any Service',
                'view Service',
                'create Service',
                'update Service',
                'delete Service',
                'restore Service',
                'force-delete Service',
                'replicate Service',
                'reorder Service',

                'view-any UnavailableDate',
                'view UnavailableDate',
                'create UnavailableDate',
                'update UnavailableDate',
                'delete UnavailableDate',
                'restore UnavailableDate',
                'force-delete UnavailableDate',
                'replicate UnavailableDate',
                'reorder UnavailableDate',




            ]],

            ['id' => 2, 'name' => 'Backoffice', 'guard_name' => 'web', 'permissions' => [
                'view-any User',
                'view User',
                'create User',
                'update User',
                'delete User',
                'restore User',
                'force-delete User',
                'replicate User',
                'reorder User',

                'view-any Animal',
                'view Animal',
                'create Animal',
                'update Animal',
                'delete Animal',
                'restore Animal',
                'force-delete Animal',
                'replicate Animal',
                'reorder Animal',

                'view-any Appointment',
                'view Appointment',
                'create Appointment',
                'update Appointment',
                'delete Appointment',
                'restore Appointment',
                'force-delete Appointment',
                'replicate Appointment',
                'reorder Appointment',



                'view-any Breed',
                'view Breed',
                'create Breed',
                'update Breed',
                'delete Breed',
                'restore Breed',
                'force-delete Breed',
                'replicate Breed',
                'reorder Breed',

                'view-any Pet',
                'view Pet',
                'create Pet',
                'update Pet',
                'delete Pet',
                'restore Pet',
                'force-delete Pet',
                'replicate Pet',
                'reorder Pet',

                'view-any ScheduleConfig',
                'view ScheduleConfig',
                'create ScheduleConfig',
                'update ScheduleConfig',
                'delete ScheduleConfig',
                'restore ScheduleConfig',
                'force-delete ScheduleConfig',
                'replicate ScheduleConfig',
                'reorder ScheduleConfig',

                'view-any Service',
                'view Service',
                'create Service',
                'update Service',
                'delete Service',
                'restore Service',
                'force-delete Service',
                'replicate Service',
                'reorder Service',

                'view-any UnavailableDate',
                'view UnavailableDate',
                'create UnavailableDate',
                'update UnavailableDate',
                'delete UnavailableDate',
                'restore UnavailableDate',
                'force-delete UnavailableDate',
                'replicate UnavailableDate',
                'reorder UnavailableDate',
            ]],
            ['id' => 3, 'name' => 'Client', 'guard_name' => 'web', 'permissions' => [

                'view-any Pet',
                'view Pet',
                'create Pet',
                'update Pet',
                'delete Pet',
                'restore Pet',
                'force-delete Pet',
                'replicate Pet',
                'reorder Pet',

                'view-any Appointment',
                'view Appointment',
                'create Appointment',
                'update Appointment',
                'delete Appointment',
                'restore Appointment',
                'force-delete Appointment',
                'replicate Appointment',
                'reorder Appointment',

            ]],

        ];

        foreach ($roles as $role) {
            $roleFind = Role::updateOrCreate(
                ['id' => $role['id']],
                ['name' => $role['name'], 'guard_name' => $role['guard_name']]
            );

            if (isset($role['permissions'])) {
                foreach ($role['permissions'] as $permissionName) {
                    $permission = Permission::updateOrCreate(
                        [
                            'name' => $permissionName,
                            'guard_name' => 'web'

                        ]);

                    $roleFind->givePermissionTo($permission);
                }
            }
        }

        Artisan::call('cache:forget spatie.permission.cache');
    }
}
