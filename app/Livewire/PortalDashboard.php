<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use App\Models\Enrollment;
use App\Models\Lesson;
use App\Models\Assignment;
use App\Models\Submission;
use App\Models\User;
use App\Models\Invoice;
use App\Models\Payment;

#[Layout('components.layouts.portal')]
class PortalDashboard extends Component
{
    public $student;
    public $activeCourses = [];
    public $feedItems = [];
    public $upcomingDeadlines = [];
    
    // Notifications Profile
    public $notifications = [];
    public $unreadNotificationsCount = 0;
    
    // Transcripts
    public $transcriptEnrollments = [];
    
    // Financials
    public $invoices = [];
    public $totalPaid = 0;
    public $upcomingDue = 0;
    public $nextInvoice = null;
    public $totalDonations = 0;
    
    // Quiz State
    public $quizActive = false;
    public $quizTimeRemaining = 600; // 10 minutes
    public $quizAnswers = [];
    public $quizSubmitted = false;

    // Parent Mode State
    public $isParent = false;
    public $children = [];

    // Real LMS Data
    public $assignments = [];
    public $grades = [];

    public function mount()
    {
        $user = Auth::user() ?? User::role('student')->first() ?? User::first();
        
        $this->isParent = $user->hasRole('parent') || $user->hasRole('super_admin'); 
        
        if ($this->isParent) {
            $childrenSource = $user->hasRole('super_admin') ? User::role('student')->limit(3)->get() : collect($user->children);
            $this->children = collect($childrenSource)->map(function ($child) {
                return [
                    'id' => $child->id, 
                    'name' => $child->first_name . ' ' . $child->last_name, 
                    'initials' => substr($child->first_name, 0, 1) . substr($child->last_name, 0, 1), 
                    'grade' => 'Student'
                ];
            })->toArray();

            $this->student = collect($childrenSource)->first() ?? clone $user; 
        } else {
            $this->student = $user;
        }

        $this->loadDashboardData();
    }

    public function switchChild($childId)
    {
        if ($this->isParent) {
            $this->student = User::find($childId);
            $this->loadDashboardData();
        }

        $this->loadDashboardData();
    }

    protected function loadDashboardData()
    {
        if (!$this->student) return;

        // 1. Get Enrollments
        $enrollments = Enrollment::with(['courseSection.course'])
            ->where('user_id', $this->student->id)
            ->where('status', 'active')
            ->get();

        $this->activeCourses = $enrollments->map(function ($enrollment) {
            return [
                'id' => $enrollment->courseSection->course->id ?? null,
                'name' => $enrollment->courseSection->course->name ?? 'Unknown Course',
                'section' => $enrollment->courseSection->name ?? 'Unknown Section',
                'progress' => rand(10, 90), 
                'next_class' => 'Sunday @ 9:00 PM' 
            ];
        });

        // 2. Reverse Activity Feed Algorithm
        // Gather recent lessons, grades, and announcements
        $feed = collect();

        // Let's add mock feed items to ensure UI isn't empty if DB has 0 items
        $feed->push([
            'type' => 'lesson',
            'title' => 'New Lesson: The Pillars of Salah (Part 2)',
            'time' => 'Just now',
            'description' => 'Teacher Amina published a new video lesson in Hanafi Fiqh.',
            'action_label' => 'Watch Video',
            'action_route' => 'courses',
            'timestamp' => now()->timestamp
        ]);

        $feed->push([
            'type' => 'grade',
            'title' => 'Quiz Graded: Quiz 2 — Verb Conjugation',
            'time' => '2 hours ago',
            'description' => 'Score: 80%. "Good work — keep practicing your verb patterns!"',
            'action_label' => 'View Feedback',
            'action_route' => 'grades',
            'timestamp' => now()->subHours(2)->timestamp
        ]);

        $this->feedItems = $feed->sortByDesc('timestamp')->values()->toArray();

        // 3. Upcoming Deadlines & Dynamic Assignments
        $courseIds = $enrollments->pluck('courseSection.course_id')->filter();
        
        $this->assignments = Assignment::whereIn('course_id', $courseIds)
            ->with(['course', 'lesson'])
            ->latest()
            ->get();

        $this->upcomingDeadlines = $this->assignments->map(function($assignment) {
            return [
                'date' => \Carbon\Carbon::parse($assignment->created_at)->format('d'),
                'month' => \Carbon\Carbon::parse($assignment->created_at)->format('M'),
                'title' => $assignment->title,
                'due_in' => $assignment->time_limit_minutes ? 'Time Limit: ' . $assignment->time_limit_minutes . ' mins' : 'No strict deadline',
                'color' => '#ca8a04'
            ];
        })->take(3)->toArray();

        // 4. Grades Tracking
        $this->grades = Submission::where('user_id', $this->student->id)
            ->with('assignment')
            ->latest()
            ->get();

        // 5. Billing & Invoices Tracking
        $this->invoices = Invoice::where('user_id', $this->student->id)
            ->with('enrollment.program')
            ->orderBy('due_date', 'asc')
            ->get();
            
        $this->totalPaid = $this->invoices->where('status', 'paid')->sum('amount');
        $this->upcomingDue = $this->invoices->where('status', 'unpaid')->sum('amount');
        $this->nextInvoice = $this->invoices->where('status', 'unpaid')->first();
        
        // Sum any payments natively tagged (for donations placeholder logic later)
        $this->totalDonations = Payment::where('user_id', $this->student->id)->whereNull('enrollment_id')->sum('amount');
        
        // 6. Native Notifications Map
        $this->notifications = $this->student->notifications()->latest()->limit(20)->get();
        $this->unreadNotificationsCount = $this->student->unreadNotifications()->count();
        
        // 7. Dynamic Transcripts Binding
        $this->transcriptEnrollments = Enrollment::where('user_id', $this->student->id)
            ->whereIn('status', ['Completed', 'Active'])
            ->with(['program.courses.assignments' => function($q) {
                // Ensure assignments load their underlying submissions targeted exclusively to this user
                $q->with(['submissions' => function($sq) {
                    $sq->where('user_id', $this->student->id);
                }]);
            }])->get();
    }

    public function markAllNotificationsAsRead()
    {
        $this->student->unreadNotifications->markAsRead();
        $this->notifications = $this->student->notifications()->latest()->limit(20)->get();
        $this->unreadNotificationsCount = 0;
        $this->dispatch('notifications-cleared');
    }

    public function startQuiz()
    {
        $this->quizActive = true;
        $this->quizSubmitted = false;
        $this->quizAnswers = [];
    }

    public function submitQuiz()
    {
        // Evaluate answers (mock processing)
        $this->quizSubmitted = true;
        $this->quizActive = false;
        
        // Notify frontend to show toast & return to dashboard
        $this->dispatch('quiz-submitted');
    }

    public function render()
    {
        return view('livewire.portal-dashboard');
    }
}
