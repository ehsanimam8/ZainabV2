<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\NotificationTemplate;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\DynamicNotificationMail;

class ProcessCommunicationTrigger implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $templateSlug;
    public $userId;
    public $context;

    public function __construct(string $templateSlug, string $userId, array $context = [])
    {
        $this->templateSlug = $templateSlug;
        $this->userId = $userId;
        $this->context = $context;
    }

    public function handle(): void
    {
        $template = NotificationTemplate::where('slug', $this->templateSlug)->where('is_active', true)->first();
        if (!$template) return; // Template Disabled or Missing

        $user = User::find($this->userId);
        if (!$user) return; // Invalid User

        // Find and replace context variables inside subject and body
        $subject = $template->subject;
        $body = $template->body;

        // Auto-inject generic variables
        $this->context['student_name'] = $user->first_name . ' ' . $user->last_name;
        $this->context['student_email'] = $user->email;

        foreach ($this->context as $key => $value) {
            $subject = str_replace("{{" . $key . "}}", $value, $subject);
            $body = str_replace("{{" . $key . "}}", $value, $body);
        }

        Mail::to($user->email)->send(new DynamicNotificationMail($subject, $body));
    }
}
