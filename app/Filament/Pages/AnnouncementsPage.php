<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use App\Models\Announcement;

class AnnouncementsPage extends Page
{
    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-megaphone';
    protected static string|\UnitEnum|null $navigationGroup = 'Operations';
    protected static ?string $navigationLabel = 'Announcements';
    protected string $view = 'filament.pages.announcements-page';

    public $announcements;

    public function mount()
    {
        $this->announcements = Announcement::orderBy('created_at', 'desc')->get();
    }
}
