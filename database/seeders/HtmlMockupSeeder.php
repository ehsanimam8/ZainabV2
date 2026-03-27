<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Household;
use App\Models\Program;
use App\Models\Course;
use App\Models\CourseModule;
use App\Models\Lesson;
use App\Models\Assignment;
use App\Models\Submission;
use App\Models\Enrollment;
use Illuminate\Database\Seeder;

class HtmlMockupSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Teachers
        $teacher1 = User::firstOrCreate(
            ['email' => 'y.qadhi@zainabcenter.org'],
            ['first_name' => 'Dr. Yasir', 'last_name' => 'Qadhi', 'password' => bcrypt('password')]
        );
        $teacher1->assignRole('instructor');

        $teacher2 = User::firstOrCreate(
            ['email' => 'o.suleiman@zainabcenter.org'],
            ['first_name' => 'Sh. Omar', 'last_name' => 'Suleiman', 'password' => bcrypt('password')]
        );
        $teacher2->assignRole('instructor');

        $teacher3 = User::firstOrCreate(
            ['email' => 'maryam@zainabcenter.org'],
            ['first_name' => 'Ustadha', 'last_name' => 'Maryam', 'password' => bcrypt('password')]
        );
        $teacher3->assignRole('instructor');

        // 2. Parents & Households
        $ahmedHousehold = Household::firstOrCreate(
            ['name' => 'Ahmed Family']
        );
        
        $khanHousehold = Household::firstOrCreate(
            ['name' => 'Khan Household']
        );

        $parent1 = User::firstOrCreate(
            ['email' => 'ali.ahmed@example.com'],
            ['first_name' => 'Ali', 'last_name' => 'Ahmed', 'password' => bcrypt('password'), 'household_id' => $ahmedHousehold->id]
        );
        $parent1->assignRole('parent');

        $parent2 = User::firstOrCreate(
            ['email' => 'fatima.khan@example.com'],
            ['first_name' => 'Fatima', 'last_name' => 'Khan', 'password' => bcrypt('password'), 'household_id' => $khanHousehold->id]
        );
        $parent2->assignRole('parent');

        // 3. Students
        $student1 = User::firstOrCreate(
            ['email' => 'omar@example.com'],
            ['first_name' => 'Omar', 'last_name' => 'Ahmed', 'password' => bcrypt('password'), 'household_id' => $ahmedHousehold->id]
        );
        $student1->assignRole('student');

        $student2 = User::firstOrCreate(
            ['email' => 'aisha@example.com'],
            ['first_name' => 'Aisha', 'last_name' => 'Khan', 'password' => bcrypt('password'), 'household_id' => $khanHousehold->id]
        );
        $student2->assignRole('student');

        // 4. Programs
        $prog1 = Program::firstOrCreate(
            ['name' => 'Foundations of Faith'],
            ['description' => 'Core Islamic sciences including Aqeedah, Fiqh, and Seerah', 'status' => 'Active', 'full_fee' => 1500]
        );
        
        $prog2 = Program::firstOrCreate(
            ['name' => 'Arabic Grammar - Level 1'],
            ['description' => 'Comprehensive introduction to modern standard Arabic', 'status' => 'Active', 'full_fee' => 500]
        );
        
        $prog3 = Program::firstOrCreate(
            ['name' => 'Youth Tarbiyah'],
            ['description' => 'Character building and leadership for high school students', 'status' => 'Active', 'full_fee' => 300]
        );

        // 5. Courses
        $course1 = Course::firstOrCreate(
            ['name' => 'Aqeedah 101'],
            ['program_id' => $prog1->id]
        );
        
        $course2 = Course::firstOrCreate(
            ['name' => 'Seerah of the Prophet'],
            ['program_id' => $prog1->id]
        );

        // 6. Enrollments
        Enrollment::firstOrCreate(
            ['user_id' => $student1->id, 'program_id' => $prog1->id],
            ['status' => 'Active', 'payment_plan' => 'Full (one-time)', 'enrollment_date' => now()]
        );
        Enrollment::firstOrCreate(
            ['user_id' => $student2->id, 'program_id' => $prog2->id],
            ['status' => 'Active', 'payment_plan' => 'Monthly Installments', 'enrollment_date' => now()]
        );

        // 7. CourseModules & Lessons
        $module1 = CourseModule::firstOrCreate(
            ['name' => 'Week 1: Foundations'],
            ['course_id' => $course1->id, 'order' => 1]
        );

        $lesson1 = Lesson::firstOrCreate(
            ['title' => 'The Pillars of Salah — Part 3'],
            ['course_module_id' => $module1->id, 'duration_minutes' => 45, 'is_published' => true, 'order' => 1]
        );
        
        $lesson2 = Lesson::firstOrCreate(
            ['title' => 'Intro to Uloom Al-Quran'],
            ['course_module_id' => $module1->id, 'duration_minutes' => 60, 'is_published' => true, 'order' => 2]
        );

        // 8. Assignments & Submissions
        $assignment1 = Assignment::firstOrCreate(
            ['title' => 'Essay on Taharah'],
            ['course_id' => $course1->id, 'lesson_id' => $lesson1->id, 'total_points' => 100, 'type' => 'Text / Written', 'due_date' => now()->addDays(7), 'status' => 'Published']
        );

        $assignment2 = Assignment::firstOrCreate(
            ['title' => 'Review Questions: Unit 1'],
            ['course_id' => $course1->id, 'lesson_id' => $lesson2->id, 'total_points' => 100, 'type' => 'Quiz', 'due_date' => now()->addDays(14), 'status' => 'Published']
        );

        Submission::firstOrCreate(
            ['assignment_id' => $assignment1->id, 'user_id' => $student1->id],
            ['score' => 92, 'grade_status' => 'Pass', 'feedback' => 'Excellent work on understanding the nuanced prerequisites of Taharah.', 'content' => 'This is the submitted essay...', 'submitted_at' => now()]
        );
        
        Submission::firstOrCreate(
            ['assignment_id' => $assignment1->id, 'user_id' => $student2->id],
            ['score' => null, 'grade_status' => 'Pending', 'feedback' => null, 'content' => 'My submission...', 'submitted_at' => now()]
        );
    }
}
