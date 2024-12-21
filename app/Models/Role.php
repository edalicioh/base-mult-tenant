<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Models\Role as RoleModel ;

class Role extends RoleModel
{
    use HasFactory, HasUlids;
    protected $primaryKey = 'uuid';
}
