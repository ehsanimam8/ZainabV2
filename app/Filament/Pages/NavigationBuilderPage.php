<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use App\Models\NavigationItem;

class NavigationBuilderPage extends Page
{
    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-bars-3';
    protected static string|\UnitEnum|null $navigationGroup = 'Content';
    protected static ?string $navigationLabel = 'Navigation Builder';
    protected string $view = 'filament.pages.navigation-builder-page';

    public $navItems;

    public function mount()
    {
        $this->navItems = NavigationItem::orderBy('position', 'asc')->get();
    }
}
