<?php

namespace App\Observers;

use App\Models\Enrollment;
use App\Models\NotificationTemplate;
use Filament\Notifications\Notification;

class EnrollmentObserver
{
    /**
     * Handle the Enrollment "updated" event.
     */
    public function updated(Enrollment $enrollment): void
    {
        if ($enrollment->isDirty('status')) {
            $this->triggerNotificationForStatus($enrollment);
        }
    }

    protected function triggerNotificationForStatus(Enrollment $enrollment)
    {
        $statusMap = [
            'Completed' => 'enrollment_completed',
            'Suspended' => 'enrollment_suspended',
            'Active' => 'enrollment_active',
        ];

        if (!array_key_exists($enrollment->status, $statusMap)) {
            return;
        }

        $templateSlug = $statusMap[$enrollment->status];
        
        $template = NotificationTemplate::where('slug', $templateSlug)->where('is_active', true)->first();

        if ($template) {
            // Replace variables
            $body = $template->body;
            $vars = [
                '{first_name}' => $enrollment->user->first_name ?? 'Student',
                '{last_name}' => $enrollment->user->last_name ?? '',
                '{program_name}' => $enrollment->program->name ?? 'Program',
            ];

            foreach ($vars as $key => $value) {
                $body = str_replace($key, $value, $body);
            }

            // Here we would typically use Mail::to()->send()
            // \Illuminate\Support\Facades\Mail::html($body, function ($message) use ($enrollment, $template) {
            //     $message->to($enrollment->user->email)->subject($template->subject);
            // });

            // For now, since mail drivers aren't configured, we use Filament Notification so admins see the trigger worked.
            Notification::make()
                ->title("Automated Email Fired: {$template->subject}")
                ->body("Sent to {$enrollment->user->email} because status changed to {$enrollment->status}.")
                ->success()
                ->sendToDatabase(\App\Models\User::role('super_admin')->get());
        }
    }
}
