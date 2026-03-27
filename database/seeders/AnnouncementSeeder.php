<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Announcement;

class AnnouncementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Announcement::create([
            'subject' => 'Ramadan Schedule Update',
            'channels' => ['Email', 'SMS'],
            'audience' => 'All Students',
            'body' => 'Please note that the schedule has been updated for the month of Ramadan.',
            'status' => 'Sent',
            'scheduled_at' => '2026-03-14 10:00:00',
            'delivered_count' => 1042,
            'failed_count' => 12,
        ]);
        Announcement::create([
            'subject' => 'Scholarship Deadline Reminder',
            'channels' => ['Email'],
            'audience' => 'Applicants',
            'body' => 'Friendly reminder that the deadline for the scholarship application is approaching.',
            'status' => 'Sent',
            'scheduled_at' => '2026-03-10 14:30:00',
            'delivered_count' => 840,
            'failed_count' => 8,
        ]);
        Announcement::create([
            'subject' => 'System Maintenance Notice',
            'channels' => ['Email', 'Portal'],
            'audience' => 'All Users',
            'body' => 'The system will be down for maintenance early Sunday morning.',
            'status' => 'Sent',
            'scheduled_at' => '2026-03-01 02:00:00',
            'delivered_count' => 1250,
            'failed_count' => 2,
        ]);
        Announcement::create([
            'subject' => 'Welcome to Fall Semester',
            'channels' => ['Email', 'SMS'],
            'audience' => 'New Enrollments',
            'body' => 'Welcome to the new semester! Please review your timetable.',
            'status' => 'Draft',
            'scheduled_at' => null,
            'delivered_count' => 0,
            'failed_count' => 0,
        ]);
    }
}
