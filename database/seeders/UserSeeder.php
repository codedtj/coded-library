<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRole = Role::query()->where('name', 'admin')->first();
        User::query()->create([
            'name' => 'Test Testov',
            'email' => 'test@test.com',
            'email_verified_at' => now(),
            'password' => Hash::make('1234'), // password
            'remember_token' => Str::random(10),
        ])->roles()->sync($adminRole);
    }
}
