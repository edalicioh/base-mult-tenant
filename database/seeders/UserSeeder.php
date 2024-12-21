<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{

    public function run(): void
    {
        User::factory()->create([
            'name' => 'Super',
            'email' => 'super@admin.com',
            'password'=> bcrypt('12345678'),
        ])->assignRole('admin');
    }
}
