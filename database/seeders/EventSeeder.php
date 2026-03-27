<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Event;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Event::create([
            'title' => 'Ramadan Fundraising Dinner',
            'description' => 'Annual fundraiser + lecture',
            'start_date' => '2026-03-28 18:30:00',
            'end_date' => '2026-03-28 22:00:00',
            'pricing_type' => 'Paid',
            'ticket_price' => 50.00,
            'mock_registrants' => 148,
            'status' => 'Registration Open',
        ]);
        Event::create([
            'title' => 'Arabic Language Open Day',
            'description' => 'Free intro session + Q&A',
            'start_date' => '2026-04-05 14:00:00',
            'end_date' => '2026-04-05 16:00:00',
            'pricing_type' => 'Free',
            'ticket_price' => 0.00,
            'mock_registrants' => 87,
            'status' => 'Registration Open',
        ]);
        Event::create([
            'title' => 'Fiqh Workshop \u2014 Spring 2026',
            'description' => '2-day intensive with Sheikh Ahmad',
            'start_date' => '2026-04-19 09:00:00',
            'end_date' => '2026-04-20 17:00:00',
            'pricing_type' => 'Paid',
            'ticket_price' => 120.00,
            'mock_registrants' => 45,
            'status' => 'Registration Open',
        ]);
        Event::create([
            'title' => 'Annual Graduation Ceremony',
            'description' => 'Graduating class of 2025\u20132026',
            'start_date' => '2026-06-14 16:00:00',
            'end_date' => '2026-06-14 20:00:00',
            'pricing_type' => 'Free',
            'ticket_price' => 0.00,
            'mock_registrants' => 32,
            'status' => 'Coming Soon',
        ]);
    }
}
