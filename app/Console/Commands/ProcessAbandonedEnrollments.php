<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Enrollment;
use App\Services\CommunicationService;
use Carbon\Carbon;

class ProcessAbandonedEnrollments extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ce:abandoned-enrollments';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Scans for pending enrollments older than 24 hours and sends a follow-up email.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $thePast = Carbon::now()->subHours(24);
        
        // Find Pending Enrollments older than 24 hours
        // In a real system you'd want a flag on the Enrollment to mark when an abandoned email was sent, 
        // to prevent spamming them every day. We will use a soft check assumption here if model permits.
        $abandoned = Enrollment::where('status', 'pending')
                    ->where('created_at', '<=', $thePast)
                    // Assumption: We need to filter out ones already notified. 
                    // To keep it simple, we will do a strict window between 24 and 48 hours.
                    ->where('created_at', '>=', Carbon::now()->subHours(48))
                    ->with(['user', 'program'])
                    ->get();

        $count = 0;
        foreach ($abandoned as $enrollment) {
            $student = $enrollment->user;
            if ($student) {
                CommunicationService::sendTemplate('abandoned_enrollment', $student, [
                    'first_name' => $student->first_name ?? $student->name ?? 'Student',
                    'program_name' => $enrollment->program ? $enrollment->program->name : 'your program',
                    'resume_url' => url('/enroll'),
                ]);
                $count++;
            }
        }

        $this->info("Processed {$count} abandoned enrollments.");
    }
}
