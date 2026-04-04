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
    public $attendances = []; // $attendances[$userId][$dateString] = status
    public $datesToDisplay = [];

    public function mount()
    {
        $firstCourse = $this->getCourses()->first();
        if ($firstCourse) {
            $this->selectedCourseId = $firstCourse->id;
            $this->loadDates();
            $this->loadAttendances();
        }
    }

    public function updatedSelectedCourseId()
    {
        $this->loadDates();
        $this->loadAttendances();
    }

    public function getCourses()
    {
        return Course::orderBy('name')->get();
    }

    public function loadDates()
    {
        // Load the last 7 days for the visual grid
        $this->datesToDisplay = collect();
        for ($i = 6; $i >= 0; $i--) {
            $this->datesToDisplay->push(now()->subDays($i)->format('Y-m-d'));
        }
    }

    public function loadAttendances()
    {
        if (!$this->selectedCourseId) return;

        $this->attendances = [];

        $course = Course::with(['program.enrollments.user'])->find($this->selectedCourseId);
        if (!$course || !$course->program) return;

        $records = Attendance::where('course_id', $this->selectedCourseId)
            ->whereIn('date', $this->datesToDisplay)
            ->get();

        foreach ($course->program->enrollments as $enrollment) {
            $userId = $enrollment->user_id;
            foreach ($this->datesToDisplay as $dateStr) {
                $rec = $records->where('user_id', $userId)->where('date', $dateStr)->first();
                $this->attendances[$userId][$dateStr] = $rec ? $rec->status : null;
            }
        }
    }

    public function saveAttendances()
    {
        if (!$this->selectedCourseId) return;

        DB::beginTransaction();
        try {
            foreach ($this->attendances as $userId => $dates) {
                foreach ($dates as $dateStr => $status) {
                    if ($status) {
                        Attendance::updateOrCreate(
                            [
                                'user_id' => $userId,
                                'course_id' => $this->selectedCourseId,
                                'date' => $dateStr,
                            ],
                            [
                                'status' => $status,
                            ]
                        );
                    }
                }
            }
            DB::commit();

            Notification::make()->title('Attendance Saved')->success()->send();
            $this->loadAttendances();
        } catch (\Exception $e) {
            DB::rollBack();
            Notification::make()->title('Error saving attendance')->danger()->send();
        }
    }

    public function toggleAttendance($userId, $date)
    {
        $current = $this->attendances[$userId][$date] ?? null;
        $states = ['Present', 'Absent', 'Late', 'Excused', null];
        
        $currentIndex = array_search($current, $states, true);
        if ($currentIndex === false) {
            $currentIndex = 4;
        }
        
        $nextIndex = ($currentIndex + 1) % count($states);
        $nextState = $states[$nextIndex];
        $this->attendances[$userId][$date] = $nextState;

        if ($nextState) {
            Attendance::updateOrCreate(
                [
                    'user_id' => $userId,
                    'course_id' => $this->selectedCourseId,
                    'date' => $date,
                ],
                [
                    'status' => $nextState,
                ]
            );
        } else {
            Attendance::where([
                'user_id' => $userId,
                'course_id' => $this->selectedCourseId,
                'date' => $date,
            ])->delete();
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
            'dates' => $this->datesToDisplay,
        ];
    }
}
