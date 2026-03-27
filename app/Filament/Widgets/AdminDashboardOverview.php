<?php

namespace App\Filament\Widgets;

use Filament\Widgets\Widget;

class AdminDashboardOverview extends Widget
{
    protected string $view = 'filament.widgets.admin-dashboard-overview';

    protected int | string | array $columnSpan = 'full';
}
