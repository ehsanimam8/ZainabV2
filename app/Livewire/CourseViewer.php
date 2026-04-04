<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\CourseSection;
use App\Models\Lesson;
use Illuminate\Support\Facades\Auth;

class CourseViewer extends Component
{
    public $section;
    public $currentLesson;

    public function mount($sectionId, $lessonId = null)
    {
        $this->section = CourseSection::with(['course.modules.lessons'])->findOrFail($sectionId);
        
        // Ensure user is enrolled
        $user = Auth::user();
        if ($user) {
            $isEnrolled = \App\Models\Enrollment::where('user_id', $user->id)
                ->whereHas('courseSection.course', function($q) {
                    $q->where('id', $this->section->course_id);
                })->exists();
            
            if (!$user->hasRole('admin') && !$user->hasRole('instructor') && !$isEnrolled) {
                abort(403, 'You are not enrolled in this course.');
            }
        }

        if ($lessonId) {
            $this->currentLesson = Lesson::findOrFail($lessonId);
        } else {
            $this->currentLesson = $this->section->course->modules->first()->lessons->first() ?? null;
        }
    }

    public function loadLesson($lessonId)
    {
        $this->currentLesson = Lesson::findOrFail($lessonId);
    }

    public function render()
    {
        return view('livewire.course-viewer')->layout('components.layouts.portal', ['title' => 'Course Viewer']);
    }
}
