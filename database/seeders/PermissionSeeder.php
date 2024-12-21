<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    public function run(): void
    {
        Permission::create(['name' => 'admin']);

        $permission = collect([
            "users",
            'roles',
            'permissions'
        ]);

        $permission->each(function ($permission) {
            Permission::create(['name' => 'viewAny__' .$permission]);
            Permission::create(['name' => 'view__' .$permission]);
            Permission::create(['name' => 'create__' .$permission]);
            Permission::create(['name' => 'update__' .$permission]);
            Permission::create(['name' => 'delete__' .$permission]);
            Permission::create(['name' => 'restore__' .$permission]);
            Permission::create(['name' => 'forceDelete__' .$permission]);
        });

        $admin = Role::findByName('admin');
        $manager = Role::findByName('manager');

        $admin->givePermissionTo(Permission::all());

        $manager->givePermissionTo([
            'admin',
            Permission::query()->where('name', 'like' ,'%users')->get(),
        ]);

    }
}
