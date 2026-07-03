<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $permissions = [
            'admin.dashboard',

            'users.view',
            'users.create',
            'users.update',
            'users.delete',

            'roles.view',
            'roles.create',
            'roles.update',
            'roles.delete',

            'categories.view',
            'categories.create',
            'categories.update',
            'categories.delete',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate([
                'name' => $permission,
                'guard_name' => 'web',
            ]);
        }

        $adminRole = Role::firstOrCreate([
            'name' => 'Administrador',
            'guard_name' => 'web',
        ]);

        $adminRole->syncPermissions($permissions);

        $user = User::updateOrCreate(
            [
                'email' => 'robertocaleldepaz@gmail.com',
            ],
            [
                'name' => 'Roberto Calel de Paz',
                'slug' => 'roberto-calel-de-paz',
                'password' => Hash::make('1234'),
            ]
        );

        $user->assignRole($adminRole);
    }
}
