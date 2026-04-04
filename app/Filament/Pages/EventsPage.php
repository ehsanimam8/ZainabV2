<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use App\Models\Event;
use Illuminate\Support\Facades\DB;

class EventsPage extends Page
{
    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-ticket';
    protected static string|\UnitEnum|null $navigationGroup = 'CRM';
    protected static ?string $navigationLabel = 'Events';
    protected string $view = 'filament.pages.events-page';

    protected function getViewData(): array
    {
        // 1. Fetch live events, ordering by nearest upcoming
        $events = Event::orderBy('start_date', 'asc')->get();

        // 2. Compute dynamic banner statistics across the entire Event scope
        $upcomingCount = Event::where('start_date', '>=', now())->count();
        $totalRegistrants = Event::sum('mock_registrants'); 
        
        $paidRevenue = Event::where('pricing_type', 'Paid')->sum(\DB::raw('ticket_price * mock_registrants')) ?? 0;
        $pendingCount = 7; // Placeholder for pending offline payments

        return [
            'events' => $events,
            'stats' => [
                'upcoming' => $upcomingCount,
                'registrants' => $totalRegistrants,
                'revenue' => $paidRevenue,
                'pending' => $pendingCount
            ]
        ];
    }
}
