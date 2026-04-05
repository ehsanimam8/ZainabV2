<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use App\Models\Course;
use App\Models\Attendance;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AttendanceTracker extends Page
{
    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-calendar-days';

    protected string $view = 'filament.pages.attendance-tracker';

    protected static string|\UnitEnum|null $navigationGroup = 'LMS';

    protected static ?string $title = 'Attendance Tracker';

    public $selectedCourseId;
    public $selectedDate;
    public $attendances = []; // $attendances[$userId] = status

    public function mount()
    {
        $this->selectedDate = now()->format('Y-m-d');
        $firstCourse = $this->getCourses()->first();
        if ($firstCourse) {
            $this->selectedCourseId = $firstCourse->id;
            $this->loadAttendances();
        }
    }

    public function updatedSelectedCourseId()
    {
        $this->loadAttendances();
    }
    
    public function updatedSelectedDate()
    {
        $this->loadAttendances();
    }

    public function getCourses()
    {
        return Course::orderBy('name')->get();
    }

    public function loadAttendances()
    {
        if (!$this->selectedCourseId || !$this->selectedDate) return;

        $this->attendances = [];

        $course = Course::with(['program.enrollments.user'])->find($this->selectedCourseId);
        if (!$course || !$course->program) return;

        $records = Attendance::where('course_id', $this->selectedCourseId)
            ->where('date', $this->selectedDate)
            ->get()
            ->keyBy('user_id');

        foreach ($course->program->enrollments as $enrollment) {
            $userId = $enrollment->user_id;
            $this->attendances[$userId] = isset($records[$userId]) ? $records[$userId]->status : null;
        }
    }

    public function toggleAttendance($userId, $status)
    {
        if (!$this->selectedCourseId || !$this->selectedDate) return;

        $currentStatus = $this->attendances[$userId] ?? null;

        // If clicking the same status, untoggle it (set to null)
        if ($currentStatus === $status) {
            $this->attendances[$userId] = null;
            Attendance::where([
                'user_id' => $userId,
                'course_id' => $this->selectedCourseId,
                'date' => $this->selectedDate,
            ])->delete();
        } else {
            // Set the new status directly
            $this->attendances[$userId] = $status;
            Attendance::updateOrCreate(
                [
                    'user_id' => $userId,
                    'course_id' => $this->selectedCourseId,
                    'date' => $this->selectedDate,
                ],
                [
                    'status' => $status,
                ]
            );
        }
    }

    public function markAll($status)
    {
        if (!$this->selectedCourseId || !$this->selectedDate) return;

        $course = Course::with(['program.enrollments.user'])->find($this->selectedCourseId);
        if (!$course || !$course->program) return;

        DB::beginTransaction();
        try {
            foreach ($course->program->enrollments as $enrollment) {
                $userId = $enrollment->user_id;
                $this->attendances[$userId] = $status;
                
                Attendance::updateOrCreate(
                    [
                        'user_id' => $userId,
                        'course_id' => $this->selectedCourseId,
                        'date' => $this->selectedDate,
                    ],
                    [
                        'status' => $status,
                    ]
                );
            }
            DB::commit();
            Notification::make()->title("All students marked as {$status}")->success()->send();
        } catch (\Exception $e) {
            DB::rollBack();
            Notification::make()->title('Error updating records')->danger()->send();
        }
    }

    protected function getViewData(): array
    {
        $course = Course::with(['program.enrollments.user'])->find($this->selectedCourseId);
        
        $students = collect();
        if ($course && $course->program) {
            foreach ($course->program->enrollments as $enrollment) {
                if (!$enrollment->user) continue;
                $students->push([
                    'user_id' => $enrollment->user->id,
                    'name' => $enrollment->user->first_name . ' ' . $enrollment->user->last_name,
                ]);
            }
        }

        return [
            'courses' => $this->getCourses(),
            'students' => $students,
        ];
    }
}
