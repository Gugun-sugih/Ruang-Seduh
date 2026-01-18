<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@ruangseduh.test'],
            [
                'name' => 'Admin',
                'password' => Hash::make('admin12345'),
                // 'role' => 'admin', // aktifkan kalau ada kolom role
            ]
        );
    }
}
