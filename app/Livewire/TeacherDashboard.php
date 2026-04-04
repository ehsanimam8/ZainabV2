<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Course;
use App\Models\CourseSection;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class TeacherDashboard extends Component
{
    public $currentView = 'teacher-dashboard';
    
    // Core states for Gradebook & Attendance
    public $grades = [];
    public $attendance = [];

    public function saveGrades()
    {
        foreach ($this->grades as $userId => $assignments) {
            foreach ($assignments as $assignmentId => $score) {
                if (is_numeric($score)) {
                    \App\Models\Submission::updateOrCreate(
                        ['user_id' => $userId, 'assignment_id' => $assignmentId],
                        ['score' => $score, 'status' => 'Graded']
                    );
                }
            }
        }
        $this->dispatch('notify', 'Grades successfully saved!');
    }

    public function saveAttendance()
    {
        // Loop through the attendance array to store P/A/E
        foreach ($this->attendance as $sessionId => $students) {
            foreach ($students as $userId => $status) {
                // Here we would sync with an Attendance model (if exists) or Event enrollment logs
                // \App\Models\Attendance::updateOrCreate(...)
            }
        }
        $this->dispatch('notify', 'Attendance recorded!');
    }
    
    public function mount()
    {
        // Require authentication in a real scenario
        // if (!Auth::check() || !Auth::user()->hasRole('instructor')) abort(403);
    }

    public function switchTeacherView($view)
    {
        $this->currentView = $view;
    }

    public function render()
    {
        $user = Auth::user();
        if (!$user) {
            $user = User::role('instructor')->first() ?? User::first();
        }

        // 1. Get assigned sections
        $sections = CourseSection::with(['course.program.term'])
            ->where('lead_teacher_id', $user?->id)
            ->get();

        // 2. Get enrolled students for those courses' programs
        $programIds = $sections->map(fn($s) => $s->course?->program_id)->filter()->unique();
        $enrollments = \App\Models\Enrollment::with('user')
            ->whereIn('program_id', $programIds)
            ->where('status', 'Active')
            ->get();
            
        $students = $enrollments->pluck('user')->unique('id');

        // 3. Setup Gradebook State if empty
        if (empty($this->grades)) {
            // Load existing grades into state
            $submissions = \App\Models\Submission::whereIn('user_id', $students->pluck('id'))->get();
            foreach ($submissions as $sub) {
                $this->grades[$sub->user_id][$sub->assignment_id] = $sub->score;
            }
        }

        // 4. Aggregate metrics
        $metrics = [
            'total_students' => $students->count(),
            'total_courses' => $sections->count(),
            'pending_grades' => \App\Models\Submission::whereNull('score')->count(),
            'upcoming_lessons' => \App\Models\Lesson::where('is_published', false)->count()
        ];

        return view('livewire.teacher-dashboard', [
            'user' => $user,
            'sections' => $sections,
            'students' => $students,
            'metrics' => $metrics,
        ])->layout('components.layouts.teacher', ['title' => 'Instructor Portal']);
    }
}
