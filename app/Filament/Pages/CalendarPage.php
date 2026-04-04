<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use App\Models\Event;
use Carbon\Carbon;
use Livewire\Attributes\Url;

class CalendarPage extends Page
{
    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-calendar';
    protected static string|\UnitEnum|null $navigationGroup = 'LMS';
    protected static ?string $navigationLabel = 'Calendar';
    protected string $view = 'filament.pages.calendar-page';

    #[Url]
    public $currentMonthMonth;
    
    #[Url]
    public $currentMonthYear;

    public function mount()
    {
        if (!$this->currentMonthMonth) {
            $this->currentMonthMonth = now()->month;
            $this->currentMonthYear = now()->year;
        }
    }

    public function previousMonth()
    {
        $date = Carbon::create($this->currentMonthYear, $this->currentMonthMonth, 1)->subMonth();
        $this->currentMonthMonth = $date->month;
        $this->currentMonthYear = $date->year;
    }

    public function nextMonth()
    {
        $date = Carbon::create($this->currentMonthYear, $this->currentMonthMonth, 1)->addMonth();
        $this->currentMonthMonth = $date->month;
        $this->currentMonthYear = $date->year;
    }

    public function today()
    {
        $this->currentMonthMonth = now()->month;
        $this->currentMonthYear = now()->year;
    }

    protected function getViewData(): array
    {
        $currentDate = Carbon::create($this->currentMonthYear, $this->currentMonthMonth, 1);
        $monthName = $currentDate->format('F Y');

        $startOfCalendar = $currentDate->copy()->startOfMonth()->startOfWeek(Carbon::SUNDAY);
        $endOfCalendar = $currentDate->copy()->endOfMonth()->endOfWeek(Carbon::SATURDAY);

        // Fetch actual events mapped to this calendar grid
        $events = Event::whereBetween('start_date', [
            $startOfCalendar->format('Y-m-d H:i:s'), 
            $endOfCalendar->format('Y-m-d H:i:s')
        ])->get();

        $calendarGrid = [];
        $iterator = $startOfCalendar->copy();

        while ($iterator <= $endOfCalendar) {
            $dateString = $iterator->format('Y-m-d');
            
            // Map any active events falling onto this day
            $dayEvents = collect($events)->filter(function($event) use ($iterator) {
                return Carbon::parse($event->start_date)->isSameDay($iterator);
            })->map(function($ev) {
                return [
                    'id' => $ev->id,
                    'title' => $ev->title,
                    'time' => Carbon::parse($ev->start_date)->format('g:ia'),
                    'type' => $ev->type ?? 'System',
                ];
            })->values()->toArray();

            $calendarGrid[] = [
                'day' => $iterator->format('j'),
                'date' => $dateString,
                'isCurrentMonth' => $iterator->month === $currentDate->month,
                'isToday' => $iterator->isToday(),
                'events' => $dayEvents,
            ];

            $iterator->addDay();
        }

        return [
            'monthName' => $monthName,
            'calendarGrid' => $calendarGrid,
            'upcomingEvents' => Event::where('start_date', '>=', now())->orderBy('start_date')->take(4)->get()
        ];
    }
}
