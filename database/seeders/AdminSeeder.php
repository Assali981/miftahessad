<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Purpose: Create default admin user for initial access
     */
    public function run(): void
    {
        Admin::create([
            'name' => 'مدير مؤسسة مفتاح السعد',
            'email' => 'admin@miftahessaad.org',
            'password' => Hash::make('MiftahAdmin2025!'),
            'role' => 'super_admin',
            'is_active' => true,
            'permissions' => [
                'manage_projects',
                'manage_news',
                'manage_media',
                'manage_settings',
                'manage_users',
            ],
        ]);

        // Create a secondary admin for testing
        Admin::create([
            'name' => 'Foundation Editor',
            'email' => 'editor@miftahessaad.org',
            'password' => Hash::make('EditorPass2025!'),
            'role' => 'admin',
            'is_active' => true,
            'permissions' => [
                'manage_projects',
                'manage_news',
                'manage_media',
            ],
        ]);
    }
}
