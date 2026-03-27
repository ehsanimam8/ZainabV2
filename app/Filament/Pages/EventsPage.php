<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use App\Models\Event;

class EventsPage extends Page
{
    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-calendar-days';
    protected static string|\UnitEnum|null $navigationGroup = 'Operations';
    protected static ?string $navigationLabel = 'Events';
    protected string $view = 'filament.pages.events-page';

    public $events;

    public function mount()
    {
        $this->events = Event::orderBy('start_date', 'asc')->get();
    }
}
