<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use App\Models\Invoice;
use App\Models\Payment;

class BillingPage extends Page
{
    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-credit-card';
    protected static string|\UnitEnum|null $navigationGroup = 'Operations';
    protected string $view = 'filament.pages.billing-page';

    protected function getViewData(): array
    {
        // Metric 1: Outstanding Balance
        $outstandingBalance = Invoice::whereIn('status', ['Pending', 'Overdue'])->sum('amount');
        $outstandingStudents = Invoice::whereIn('status', ['Pending', 'Overdue'])->distinct('user_id')->count('user_id');

        // Metric 2: Collected This Month
        $collectedThisMonth = Payment::where('status', 'Successful')
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->sum('amount');

        // Metric 3: Failed Payments
        $failedPayments = Payment::where('status', 'Failed')->count();

        // Metric 4: Upcoming Autocharges (Next 7 Days)
        $autoCharges = Invoice::where('status', 'Pending')
            ->whereBetween('due_date', [now(), now()->addDays(7)])
            ->sum('amount');
        $autoChargesCount = Invoice::where('status', 'Pending')
            ->whereBetween('due_date', [now(), now()->addDays(7)])
            ->count();

        // Data Table: Recent Invoices
        $invoices = Invoice::with(['user', 'enrollment.program'])->latest()->take(15)->get();

        return [
            'metrics' => [
                'outstandingBalance' => $outstandingBalance,
                'outstandingStudents' => $outstandingStudents,
                'collectedThisMonth' => $collectedThisMonth,
                'failedPayments' => $failedPayments,
                'autoCharges' => $autoCharges,
                'autoChargesCount' => $autoChargesCount,
            ],
            'invoices' => $invoices,
        ];
    }
}
