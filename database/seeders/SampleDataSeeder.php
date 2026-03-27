<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SampleDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Create Admins
        $admin1 = \App\Models\User::firstOrCreate(['email' => 'sarah@zainabcenter.org'], ['first_name' => 'Sarah', 'last_name' => 'Khan', 'password' => bcrypt('password')]);
        $admin1->assignRole('super_admin');
        $admin2 = \App\Models\User::firstOrCreate(['email' => 'omar@zainabcenter.org'], ['first_name' => 'Omar', 'last_name' => 'Farooq', 'password' => bcrypt('password')]);
        $admin2->assignRole('academic_admin');
        
        // 2. Create Teachers
        $teacher1 = \App\Models\User::firstOrCreate(['email' => 'abdullah@zainabcenter.org'], ['first_name' => 'Sh. Abdullah', 'last_name' => 'Hakim', 'password' => bcrypt('password')]);
        $teacher1->assignRole('instructor');
        $teacher2 = \App\Models\User::firstOrCreate(['email' => 'zainab.ali@zainabcenter.org'], ['first_name' => 'Ustadha Zainab', 'last_name' => 'Ali', 'password' => bcrypt('password')]);
        $teacher2->assignRole('instructor');
        $teacher3 = \App\Models\User::firstOrCreate(['email' => 'hassan@zainabcenter.org'], ['first_name' => 'Imam Hassan', 'last_name' => 'Raza', 'password' => bcrypt('password')]);
        $teacher3->assignRole('instructor');

        // 3. Create Terms
        $fall = \App\Models\Term::firstOrCreate(['name' => 'Fall 2024'], ['start_date' => '2024-08-20', 'end_date' => '2024-12-15']);
        $spring = \App\Models\Term::firstOrCreate(['name' => 'Spring 2025'], ['start_date' => '2025-01-10', 'end_date' => '2025-05-25']);

        // 4. Create Programs
        $prog1 = \App\Models\Program::firstOrCreate(['name' => 'Foundations of Faith (Adults)'], ['term_id' => $fall->id, 'description' => 'Core tenets of Islamic belief.', 'category' => 'Core', 'status' => 'Active', 'full_fee' => 250]);
        $prog2 = \App\Models\Program::firstOrCreate(['name' => 'Youth Leadership & Tarbiyah'], ['term_id' => $fall->id, 'description' => 'Guiding the next generation.', 'category' => 'Youth', 'status' => 'Active', 'full_fee' => 150]);
        $prog3 = \App\Models\Program::firstOrCreate(['name' => 'Intensive Arabic Grammar I'], ['term_id' => $fall->id, 'description' => 'Beginner Arabic.', 'category' => 'Language', 'status' => 'Active', 'full_fee' => 300]);
        
        // 5. Create Courses
        $course1 = \App\Models\Course::firstOrCreate(['name' => 'AQD-101: Introduction to Aqeeda'], ['program_id' => $prog1->id]);
        $course2 = \App\Models\Course::firstOrCreate(['name' => 'ARB-101: Arabic Level 1'], ['program_id' => $prog3->id]);

        // 6. Create Course Sections
        $section1 = \App\Models\CourseSection::firstOrCreate(['name' => 'Fall Sunday Morning'], ['course_id' => $course1->id, 'lead_teacher_id' => $teacher3->id, 'max_capacity' => 30]);
        $section2 = \App\Models\CourseSection::firstOrCreate(['name' => 'Fall Mon/Wed Evening'], ['course_id' => $course2->id, 'lead_teacher_id' => $teacher2->id, 'max_capacity' => 25]);

        // 7. Create Parents & Students
        $parent1 = \App\Models\User::firstOrCreate(['email' => 'tariq.parent@example.com'], ['first_name' => 'Tariq', 'last_name' => 'Mahmoud', 'password' => bcrypt('password')]);
        $parent1->assignRole('parent');
        $household1 = \App\Models\Household::firstOrCreate(['name' => 'Mahmoud Household']);
        $parent1->update(['household_id' => $household1->id]);

        $student1 = \App\Models\User::firstOrCreate(['email' => 'tariq.student@example.com'], ['first_name' => 'Tariq', 'last_name' => 'Mahmoud (Jr)', 'password' => bcrypt('password')]);
        $student1->assignRole('student');
        $student1->update(['household_id' => $household1->id]);

        $student2 = \App\Models\User::firstOrCreate(['email' => 'aisha.siddiqi@example.com'], ['first_name' => 'Aisha', 'last_name' => 'Siddiqi', 'password' => bcrypt('password')]);
        $student2->assignRole('student');
        
        $student3 = \App\Models\User::firstOrCreate(['email' => 'omar.khan@example.com'], ['first_name' => 'Omar', 'last_name' => 'Khan', 'password' => bcrypt('password')]);
        $student3->assignRole('student');

        // 8. Create Enrollments
        \App\Models\Enrollment::firstOrCreate(['user_id' => $student1->id, 'program_id' => $prog1->id], ['status' => 'Active', 'payment_plan' => 'Full (one-time)', 'enrollment_date' => now()]);
        \App\Models\Enrollment::firstOrCreate(['user_id' => $student2->id, 'program_id' => $prog3->id], ['status' => 'Active', 'payment_plan' => 'Full (one-time)', 'enrollment_date' => now()]);
        \App\Models\Enrollment::firstOrCreate(['user_id' => $student3->id, 'program_id' => $prog2->id], ['status' => 'Pending', 'payment_plan' => 'Monthly Installments', 'enrollment_date' => now()]);
    }
}
