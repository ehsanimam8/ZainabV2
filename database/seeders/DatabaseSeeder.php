<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Define Roles
        $adminRole = Role::firstOrCreate(['name' => 'super_admin']);
        Role::firstOrCreate(['name' => 'academic_admin']);
        Role::firstOrCreate(['name' => 'finance_admin']);
        Role::firstOrCreate(['name' => 'enrollment_staff']);
        
        $teacherRole = Role::firstOrCreate(['name' => 'instructor']); // TeacherResource expects 'instructor'
        Role::firstOrCreate(['name' => 'teacher']); // Keeping generic teacher around just in case
        
        $studentRole = Role::firstOrCreate(['name' => 'student']);
        Role::firstOrCreate(['name' => 'parent']);

        // 1. Admin User
        $admin = User::firstOrCreate(
            ['email' => 'admin@example.com'],
            [
                'first_name' => 'System',
                'last_name' => 'Admin',
                'password' => Hash::make('password'),
            ]
        );
        $admin->assignRole($adminRole);

        // 2. Teacher User
        $teacher = User::firstOrCreate(
            ['email' => 'teacher@example.com'],
            [
                'first_name' => 'Jane',
                'last_name' => 'Teacher',
                'password' => Hash::make('password'),
            ]
        );
        $teacher->assignRole($teacherRole);

        // 3. Student User
        $student = User::firstOrCreate(
            ['email' => 'student@example.com'],
            [
                'first_name' => 'John',
                'last_name' => 'Student',
                'password' => Hash::make('password'),
            ]
        );
        $student->assignRole($studentRole);
    }
}
