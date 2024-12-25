<?php

namespace App\Jobs;

use App\Models\Permission;
use App\Models\Role;
use App\Models\Tenant;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class CreatePermissionTenantJob implements ShouldQueue
{
    use Queueable;

    public function __construct(protected Tenant $tenant) {}

    public function handle(): void
    {
        $this->tenant->run(function () {
            Permission::create(['name' => 'admin']);

            $permission = collect(config('modules.tenant'));

            $permission->each(function ($permission) {
                Permission::create(['name' => 'viewAny__' . $permission]);
                Permission::create(['name' => 'view__' . $permission]);
                Permission::create(['name' => 'create__' . $permission]);
                Permission::create(['name' => 'update__' . $permission]);
                Permission::create(['name' => 'delete__' . $permission]);
                Permission::create(['name' => 'restore__' . $permission]);
                Permission::create(['name' => 'forceDelete__' . $permission]);
            });

            $admin = Role::findByName('admin');
            $manager = Role::findByName('manager');

            $admin->givePermissionTo(Permission::all());

            $manager->givePermissionTo([
                'admin',
                Permission::query()->where('name', 'like', '%users')->get(),
            ]);
        });
    }
}
