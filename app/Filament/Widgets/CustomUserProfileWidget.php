<?php

namespace App\Filament\Widgets;

use Filament\Widgets\Widget;

class CustomUserProfileWidget extends Widget
{
    protected string $view = 'filament.widgets.custom-user-profile-widget';
    protected static ?int $sort = 1;
    protected int | string | array $columnSpan = 'full';
}

