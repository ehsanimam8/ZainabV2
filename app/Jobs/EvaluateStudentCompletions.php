<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Enrollment;
use App\Models\Submission;
use App\Models\Assignment;

class EvaluateStudentCompletions implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $enrollmentId;

    public function __construct(string $enrollmentId)
    {
        $this->enrollmentId = $enrollmentId;
    }

    public function handle(): void
    {
        $enrollment = Enrollment::with('program.courses')->find($this->enrollmentId);
        if (!$enrollment) return;

        // Get all course IDs mapping to this academic program
        $courseIds = $enrollment->program->courses->pluck('id')->toArray();
        if (empty($courseIds)) return;

        $totalAssignments = Assignment::whereIn('course_id', $courseIds)->count();
        if ($totalAssignments === 0) return; // Cannot graduate an empty program mathematically

        // Tally all compliant passing submissions
        $passingSubmissions = Submission::where('user_id', $enrollment->user_id)
            ->whereHas('assignment', function($q) use ($courseIds) {
                $q->whereIn('course_id', $courseIds);
            })
            ->where('score', '>=', 60) // Passing Threshold Variable
            ->count();

        // Standard: 100% of assignments passed
        if ($passingSubmissions >= $totalAssignments && $enrollment->status !== 'Completed') {
            $enrollment->update([
                'status' => 'Completed'
            ]);
            
            // Dispatch a general notification that certificate earned via Mailgun!
            dispatch(new ProcessCommunicationTrigger('certificate-earned', $enrollment->user_id, [
                'program_name' => $enrollment->program->name
            ]));
        }
    }
}
