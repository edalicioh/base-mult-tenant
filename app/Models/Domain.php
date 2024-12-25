<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Stancl\Tenancy\Database\Models\Domain as ModelsDomain;

class Domain extends ModelsDomain
{
    use HasFactory,HasUlids;

    protected $fillable = [
        'domain',
        'tenant_id',
    ];
}
