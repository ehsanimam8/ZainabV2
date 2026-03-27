<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CmsPost;

class CmsPostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CmsPost::create([
            'title' => 'Ramadan 2026 Program Schedule',
            'category' => 'Announcement',
            'status' => 'Published',
            'author_name' => 'Admin',
            'created_at' => '2026-03-15 10:00:00',
        ]);
        CmsPost::create([
            'title' => 'New Hifz Track — Enrollment Now Open',
            'category' => 'Program Update',
            'status' => 'Published',
            'author_name' => 'Admin',
            'created_at' => '2026-03-10 10:00:00',
        ]);
        CmsPost::create([
            'title' => 'Understanding the Maqasid al-Shari\'ah',
            'category' => 'Article',
            'status' => 'Draft',
            'author_name' => 'Ustadha K. Nour',
            'created_at' => '2026-03-03 10:00:00',
            'scheduled_at' => '2026-04-01 10:00:00',
        ]);
    }
}
