<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::updateOrCreate(
            [
                'email' => 'admin@danielvs.com'],
            [
                'name' => 'Daniel Admin',
                'password' => Hash::make('123456'),
                'cpf' => '00016688112',
                'telephone' => '(61) 3218-1400',
                'status' => 'active',
                'street' => 'QNN',
                'number' => '09',
                'zipcode' => '72220067',
                'city' => 'Brasília',
                'district' => 'Ceilândia',
                'state' => 'Distrito Federal',
            ]);

        $user->roles()->sync([1]);


        $user = User::updateOrCreate(
            [
                'email' => 'backoffice@danielvs.com'],
            [
                'name' => 'Daniel Backoffice',
                'password' => Hash::make('123456'),
                'cpf' => '00016688112',
                'telephone' => '(61) 3218-1400',
                'status' => 'active',
                'street' => 'QNN',
                'number' => '09',
                'zipcode' => '72220067',
                'city' => 'Brasília',
                'district' => 'Ceilândia',
                'state' => 'Distrito Federal',
            ]);

        $user->roles()->sync([2]);

        $user = User::updateOrCreate(
            [
                'email' => 'cliente@danielvs.com'],
            [
                'name' => 'Daniel Cliente',
                'password' => Hash::make('123456'),
                'cpf' => '00016688112',
                'telephone' => '(61) 3218-1400',
                'status' => 'active',
                'street' => 'QNN',
                'number' => '09',
                'zipcode' => '72220067',
                'city' => 'Brasília',
                'district' => 'Ceilândia',
                'state' => 'Distrito Federal',
            ]);

        $user->roles()->sync([3]);
    }
}
