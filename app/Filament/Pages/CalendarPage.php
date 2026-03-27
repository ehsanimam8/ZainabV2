<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class CalendarPage extends Page
{
    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-calendar';
    protected static string|\UnitEnum|null $navigationGroup = 'LMS';
    protected static ?string $navigationLabel = 'Calendar';
    protected string $view = 'filament.pages.calendar-page';
}
