<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CmsPage;

class CmsPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CmsPage::create([
            'title' => 'Home',
            'slug' => '/',
            'status' => 'Published',
            'public_nav' => true,
            'published_at' => '2026-03-20 12:00:00',
        ]);
        CmsPage::create([
            'title' => 'About Us',
            'slug' => '/about',
            'status' => 'Published',
            'public_nav' => true,
            'published_at' => '2026-03-15 12:00:00',
        ]);
        CmsPage::create([
            'title' => 'Programs',
            'slug' => '/programs',
            'status' => 'Published',
            'public_nav' => true,
            'published_at' => '2026-03-10 12:00:00',
        ]);
        CmsPage::create([
            'title' => 'Scholarships',
            'slug' => '/scholarships',
            'status' => 'Draft',
            'public_nav' => false,
            'published_at' => null,
        ]);
        CmsPage::create([
            'title' => 'Contact Us',
            'slug' => '/contact',
            'status' => 'Published',
            'public_nav' => true,
            'published_at' => '2026-03-05 12:00:00',
        ]);
        CmsPage::create([
            'title' => 'Terms of Service',
            'slug' => '/terms',
            'status' => 'Published',
            'public_nav' => false,
            'published_at' => '2026-01-15 12:00:00',
        ]);
    }
}
