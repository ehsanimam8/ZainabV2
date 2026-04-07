<?php

namespace App\Filament\Widgets;

use Filament\Widgets\Widget;

class AdminDashboardOverview extends Widget
{
    protected string $view = 'filament.widgets.admin-dashboard-overview';

    protected int | string | array $columnSpan = 'full';

    protected function getViewData(): array
    {
        return [
            'students' => \App\Models\User::role('student')->count(),
            'teachers' => \App\Models\User::role('teacher')->count(),
            'courses' => \App\Models\Course::count(),
            'pending_apps' => \App\Models\Enrollment::where('status', 'Pending')->count(),
        ];
    }
}
