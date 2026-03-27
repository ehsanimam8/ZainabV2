<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class CrmPage extends Page
{
    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-users';
    protected static string|\UnitEnum|null $navigationGroup = 'Operations';
    protected static ?string $navigationLabel = 'CRM';
    protected string $view = 'filament.pages.crm-page';
}
