<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use App\Models\Course;
use App\Models\Submission;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\DB;

class Gradebook extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';

    protected static string $view = 'filament.pages.gradebook';

    protected static ?string $navigationGroup = 'LMS';

    protected static ?string $title = 'Gradebook';

    public $selectedCourseId;
    public $grades = [];
    public $comments = [];

    public function mount()
    {
        $firstCourse = $this->getCourses()->first();
        if ($firstCourse) {
            $this->selectedCourseId = $firstCourse->id;
            $this->loadGrades();
        }
    }

    public function updatedSelectedCourseId()
    {
        $this->loadGrades();
    }

    public function getCourses()
    {
        return Course::orderBy('name')->get();
    }

    public function loadGrades()
    {
        if (!$this->selectedCourseId) return;

        $this->grades = [];
        $this->comments = [];

        $course = Course::with(['assignments', 'program.enrollments.user'])->find($this->selectedCourseId);
        
        if (!$course || !$course->program) return;

        $assignmentIds = $course->assignments->pluck('id');
        $submissions = Submission::whereIn('assignment_id', $assignmentIds)->get();

        foreach ($course->program->enrollments as $enrollment) {
            $userId = $enrollment->user_id;

            foreach ($course->assignments as $assignment) {
                $sub = $submissions->where('user_id', $userId)->where('assignment_id', $assignment->id)->first();
                $this->grades[$userId][$assignment->id] = $sub ? $sub->earned_points : null;
                $this->comments[$userId][$assignment->id] = $sub ? $sub->feedback_comment : null;
            }
        }
    }

    public function saveGrades()
    {
        if (!$this->selectedCourseId) return;

        DB::beginTransaction();
        try {
            foreach ($this->grades as $userId => $assignments) {
                foreach ($assignments as $assignmentId => $score) {
                    // Only save if there is a score, or maybe allow null to clear?
                    if ($score !== null && $score !== '') {
                        Submission::updateOrCreate(
                            [
                                'user_id' => $userId,
                                'assignment_id' => $assignmentId,
                            ],
                            [
                                'earned_points' => $score,
                                'status' => 'Graded',
                                'graded_at' => now(),
                                'graded_by' => auth()->id(),
                                'feedback_comment' => $this->comments[$userId][$assignmentId] ?? null,
                            ]
                        );
                    }
                }
            }
            DB::commit();

            Notification::make()
                ->title('Grades Saved Successfully')
                ->success()
                ->send();

            $this->loadGrades(); // Reload to reflect fresh UI

        } catch (\Exception $e) {
            DB::rollBack();
            Notification::make()
                ->title('Error saving grades')
                ->body($e->getMessage())
                ->danger()
                ->send();
        }
    }

    protected function getViewData(): array
    {
        $course = Course::with(['assignments', 'program.enrollments.user'])->find($this->selectedCourseId);
        
        $students = collect();
        if ($course && $course->program) {
            foreach ($course->program->enrollments as $enrollment) {
                if (!$enrollment->user) continue;
                
                $totalPossible = 0;
                $earned = 0;

                foreach ($course->assignments as $assignment) {
                    $score = $this->grades[$enrollment->user_id][$assignment->id] ?? null;
                    if ($score !== null && $score !== '') {
                        $earned += (float) $score;
                        $totalPossible += $assignment->total_points;
                    }
                }

                $overallPercent = $totalPossible > 0 ? round(($earned / $totalPossible) * 100) : 0;

                $students->push([
                    'user_id' => $enrollment->user->id,
                    'name' => $enrollment->user->first_name . ' ' . $enrollment->user->last_name,
                    'overall_percent' => $overallPercent,
                ]);
            }
        }

        return [
            'courses' => $this->getCourses(),
            'assignments' => $course ? $course->assignments : collect(),
            'students' => $students,
        ];
    }
}
