<?php

namespace App\Services;

use App\Models\NotificationTemplate;
use App\Models\User;
use App\Mail\DynamicNotificationMail;
use Illuminate\Support\Facades\Mail;

class CommunicationService
{
    /**
     * Send a dynamic template to a user if the template is active.
     */
    public static function sendTemplate(string $slug, User $user, array $variables = [])
    {
        $template = NotificationTemplate::where('slug', $slug)
            ->where('is_active', true)
            ->first();

        // If template doesn't exist or is toggled off, exit gracefully.
        if (!$template) {
            return false;
        }

        $subject = self::parseVariables($template->subject, $variables);
        $body = self::parseVariables($template->body, $variables);

        Mail::to($user->email)->send(new DynamicNotificationMail($subject, $body));

        return true;
    }

    /**
     * Simple string replacer for moustache syntax {{ var }}
     */
    private static function parseVariables(string $content, array $variables): string
    {
        foreach ($variables as $key => $value) {
            // Replace both {{var}} and {{ var }} flexibly
            $content = preg_replace('/\{\{\s*' . preg_quote($key, '/') . '\s*\}\}/', $value ?? '', $content);
        }

        return $content;
    }
}
