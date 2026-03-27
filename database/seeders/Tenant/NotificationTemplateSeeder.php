<?php

namespace Database\Seeders\Tenant;

use App\Models\NotificationTemplate;
use Illuminate\Database\Seeder;

class NotificationTemplateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $templates = [
            [
                'name' => 'Enrollment Success',
                'slug' => 'enrollment_success',
                'subject' => 'Welcome to {{ program_name }} at Zainab Center!',
                'body' => '<p>As-salamu alaykum {{ first_name }},</p><p>JazakAllah Khayran for enrolling in <strong>{{ program_name }}</strong>. Your registration was successful and you have been added to the system.</p><p>You can access your portal here: <a href="{{ portal_url }}">Click here</a>.</p><p>Was-salam,<br>Zainab Center Team</p>',
                'variables' => ['first_name', 'program_name', 'portal_url'],
                'is_active' => true,
            ],
            [
                'name' => 'Payment Failed',
                'slug' => 'payment_failed',
                'subject' => 'Action Required: Payment Failed',
                'body' => '<p>As-salamu alaykum {{ first_name }},</p><p>We attempted to process a payment for <strong>{{ amount }}</strong> but the transaction was declined. Your enrollment is currently pending.</p><p>Please update your payment method to avoid any disruption to your classes.</p><p>Was-salam,<br>Zainab Center Team</p>',
                'variables' => ['first_name', 'amount'],
                'is_active' => true,
            ],
            [
                'name' => 'Assignment Graded',
                'slug' => 'assignment_graded',
                'subject' => 'Your Assignment Has Been Graded: {{ assignment_title }}',
                'body' => '<p>As-salamu alaykum {{ first_name }},</p><p>Your teacher has graded your recent submission for <strong>{{ assignment_title }}</strong>.</p><p><strong>Score:</strong> {{ score }} / {{ total_points }}</p><p><strong>Feedback:</strong> {{ feedback }}</p><p>Head to your grades dashboard to review detailed feedback.</p>',
                'variables' => ['first_name', 'assignment_title', 'score', 'total_points', 'feedback'],
                'is_active' => true,
            ],
            [
                'name' => 'Abandoned Enrollment (Follow-up)',
                'slug' => 'abandoned_enrollment',
                'subject' => 'Finish your enrollment for {{ program_name }}',
                'body' => '<p>As-salamu alaykum {{ first_name }},</p><p>We noticed you started an enrollment for <strong>{{ program_name }}</strong> but didn\'t complete the registration process.</p><p>If you meant to finish registering, you can securely resume your application here: <a href="{{ resume_url }}">Resume Application</a>.</p><p>Was-salam,<br>Zainab Center Team</p>',
                'variables' => ['first_name', 'program_name', 'resume_url'],
                'is_active' => true,
            ],
        ];

        foreach ($templates as $template) {
            NotificationTemplate::firstOrCreate(
                ['slug' => $template['slug']],
                $template
            );
        }
    }
}
