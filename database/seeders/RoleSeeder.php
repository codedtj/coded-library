<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
class RoleSeeder extends Seeder
{
    public function run(): void
    {
        collect([
            'reader',
            'editor',
            'moderator',
            'admin'
        ])->each(function ($name) {
            Role::query()->create(['name' => $name]);
        });
    }
}
