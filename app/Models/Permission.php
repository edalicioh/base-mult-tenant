<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Models\Permission as PermissionModel ;

class Permission extends PermissionModel
{
    use HasFactory, HasUlids;
    protected $primaryKey = 'uuid';
}
