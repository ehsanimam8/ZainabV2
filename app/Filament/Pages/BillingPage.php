<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class BillingPage extends Page
{
    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-credit-card';
    protected static string|\UnitEnum|null $navigationGroup = 'Operations';
    protected string $view = 'filament.pages.billing-page';
}
