<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class AttendancePage extends Page
{
    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-check-circle';
    protected static string|\UnitEnum|null $navigationGroup = 'Academic';
    protected static ?string $navigationLabel = 'Attendance';
    protected string $view = 'filament.pages.attendance-page';
}
