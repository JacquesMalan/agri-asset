<?php

namespace Database\Seeders;

use App\Enums\UserRole;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DemoGuestUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::query()->firstOrCreate(
            ['email' => config('demo.guest_email')],
            [
                'name' => 'Demo Guest',
                'email_verified_at' => now(),
                'password' => Hash::make(''),
                'role' => UserRole::AssetManager,
            ],
        );
    }
}
