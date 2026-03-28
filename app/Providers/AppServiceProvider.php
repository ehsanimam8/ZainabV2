<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        \App\Models\Enrollment::created(function (\App\Models\Enrollment $enrollment) {
            if ($enrollment->status !== 'failed') {
                $student = $enrollment->user;
                $program = $enrollment->program;
                
                if ($student) {
                    \App\Services\CommunicationService::sendTemplate('enrollment_success', $student, [
                        'first_name' => $student->first_name ?? $student->name ?? 'Student',
                        'program_name' => $program ? $program->name : 'our program',
                        'portal_url' => url('/portal'),
                    ]);
                }
            }
        });

        \App\Models\Enrollment::updated(function (\App\Models\Enrollment $enrollment) {
            if ($enrollment->isDirty('status')) {
                $statusMap = [
                    'Completed' => 'enrollment_completed',
                    'Suspended' => 'enrollment_suspended',
                ];

                if (array_key_exists($enrollment->status, $statusMap)) {
                    $student = $enrollment->user;
                    $program = $enrollment->program;
                    
                    if ($student) {
                        \App\Services\CommunicationService::sendTemplate($statusMap[$enrollment->status], $student, [
                            'first_name' => $student->first_name ?? $student->name ?? 'Student',
                            'program_name' => $program ? $program->name : 'our program',
                            'portal_url' => url('/portal'),
                        ]);
                    }
                }
            }
        });

        \App\Models\Submission::updated(function (\App\Models\Submission $submission) {
            if ($submission->wasChanged('grade_status') && $submission->grade_status === 'Graded') {
                $student = $submission->user;
                $assignment = $submission->assignment;
                
                if ($student) {
                    \App\Services\CommunicationService::sendTemplate('assignment_graded', $student, [
                        'first_name' => $student->first_name ?? $student->name ?? 'Student',
                        'assignment_title' => $assignment ? $assignment->title : 'Assignment',
                        'score' => $submission->score ?? '0',
                        'total_points' => $assignment ? ($assignment->total_points ?? 100) : 100,
                        'feedback' => $submission->feedback ?? 'Great work!',
                    ]);
                }
            }
        });
    }
}
