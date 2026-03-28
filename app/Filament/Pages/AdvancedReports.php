<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use App\Models\Payment;
use App\Models\Enrollment;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AdvancedReports extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-chart-bar-square';

    protected static string $view = 'filament.pages.advanced-reports';

    protected static ?string $navigationGroup = 'Management';

    protected static ?string $title = 'Advanced Reports';

    public $revenueData = [];
    public $enrollmentData = [];

    public function mount()
    {
        $this->loadRevenueData();
        $this->loadEnrollmentData();
    }

    protected function loadRevenueData()
    {
        // Get last 6 months revenue
        $months = collect();
        $totals = collect();

        for ($i = 5; $i >= 0; $i--) {
            $date = now()->subMonths($i);
            $months->push($date->format('M Y'));
            
            $sum = Payment::where('status', 'completed')
                ->whereYear('created_at', $date->year)
                ->whereMonth('created_at', $date->month)
                ->sum('amount');
            
            $totals->push($sum);
        }

        $this->revenueData = [
            'labels' => $months->toArray(),
            'data' => $totals->toArray(),
            'total_all_time' => Payment::where('status', 'completed')->sum('amount'),
        ];
    }

    protected function loadEnrollmentData()
    {
        $this->enrollmentData = [
            'active' => Enrollment::where('status', 'Active')->count(),
            'completed' => Enrollment::where('status', 'Completed')->count(),
            'suspended' => Enrollment::where('status', 'Suspended')->count(),
            'total' => Enrollment::count(),
        ];
    }

    protected function getViewData(): array
    {
        return [
            'revenue' => $this->revenueData,
            'enrollmentCount' => $this->enrollmentData,
        ];
    }
}
