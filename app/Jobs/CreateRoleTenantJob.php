<?php

namespace App\Jobs;

use App\Models\Role;
use App\Models\Tenant;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class CreateRoleTenantJob implements ShouldQueue
{
    use Queueable;

    public function __construct(protected Tenant $tenant) {}

    public function handle(): void
    {
        $this->tenant->run(function () {

            Role::create(['name' => 'admin']);
            Role::create(['name' => 'manager']);
            Role::create(['name' => 'user']);
        });
    }
}
