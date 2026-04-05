<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Models\Program;
use App\Models\Course;
use App\Models\CourseSection;
use App\Models\CourseModule;
use App\Models\Lesson;
use App\Models\Assignment;
use App\Models\Enrollment;
use App\Models\Event;
use Illuminate\Support\Str;

class SeedE2EData extends Command
{
    protected $signature = 'e2e:seed';
    protected $description = 'Injects explicit QA testing relationships safely preventing browser latency timeouts';

    public function handle()
    {
        $this->info('Starting E2E Injection...');
        
        $teacher = User::where('email', 'teacher@example.com')->first();
        $student = User::where('email', 'student@example.com')->first();
        
        if(!$teacher || !$student) {
            $this->error('Baseline users missing! Run db:seed first.');
            return;
        }

        // Create Programs
        $program1 = Program::firstOrCreate(['id' => Str::uuid()], [
            'name' => 'Advanced Fiqh E2E Diploma',
            'description' => 'A programmatic QA deployment mapping test events.',
            'category' => 'Fiqh',
            'base_price' => 1000.00,
            'is_published' => true,
        ]);
        
        $program2 = Program::firstOrCreate(['id' => Str::uuid()], [
            'name' => 'QA Evening Seminars',
            'description' => 'Secondary payload test structure.',
            'category' => 'Foundational',
            'base_price' => 500.00,
            'is_published' => true,
        ]);

        $this->info('Programs built.');

        // Courses
        for ($i=1; $i<=5; $i++) {
            $course = Course::create([
                'id' => Str::uuid(),
                'program_id' => $i <= 3 ? $program1->id : $program2->id,
                'name' => "E2E Class Evaluation {$i}",
                'course_code' => "E2E-10{$i}",
                'description' => "Test description for course {$i}",
                'instructor_id' => $teacher->id,
            ]);

            $section = CourseSection::create([
                'id' => Str::uuid(),
                'course_id' => $course->id,
                'name' => 'Spring 2026 E2E',
                'start_date' => now(),
                'end_date' => now()->addMonths(3),
                'max_capacity' => 50,
            ]);

            $module = CourseModule::create([
                'id' => Str::uuid(),
                'course_id' => $course->id,
                'name' => 'Initial Module Evaluator',
                'description' => 'Test Module Flow',
                'order' => 1,
            ]);

            Lesson::create([
                'id' => Str::uuid(),
                'course_module_id' => $module->id,
                'title' => 'QA Intro Setup',
                'content' => 'Please watch the orientation.',
                'order' => 1,
                'is_published' => true,
            ]);

            // Add Quiz Assignment
            Assignment::create([
                'id' => Str::uuid(),
                'course_id' => $course->id,
                'title' => 'Evaluation E2E Quiz',
                'description' => 'Dynamic algorithmic tester',
                'type' => 'Quiz',
                'status' => 'Published',
                'time_limit_minutes' => 5,
                'total_points' => 20,
                'due_date' => now()->addDays(7),
                'quiz_data' => json_encode([
                    [
                        "question_type" => "mcq",
                        "points" => 10,
                        "question_text" => "What is the capital of France?",
                        "options" => [
                            ["option_text" => "Paris", "is_correct" => true],
                            ["option_text" => "London", "is_correct" => false]
                        ]
                    ],
                    [
                        "question_type" => "sa",
                        "points" => 10,
                        "question_text" => "Explain the core mechanics of Laravel."
                    ]
                ])
            ]);
            
            // Enroll student directly into program
            Enrollment::firstOrCreate([
                'user_id' => $student->id,
                'program_id' => $course->program_id,
            ], [
                'id' => Str::uuid(),
                'status' => 'Active',
                'enrollment_date' => now(),
            ]);
        }

        // Public Event
        Event::firstOrCreate([
            'title' => 'Annual E2E Gathering'
        ], [
            'id' => Str::uuid(),
            'start_date' => now()->addDays(2),
            'end_date' => now()->addDays(3),
            'type' => 'Conference',
            'status' => 'Published',
            'description' => 'Public facing verification layout tester.',
            'location' => 'Main Center',
            'is_paid' => false,
            'fee_amount' => 0.00
        ]);

        $this->info('E2E Data structures safely deployed across all logical arrays!');
    }
}
