<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use App\Models\Contact;

class CrmPage extends Page
{
    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-users';
    protected static string|\UnitEnum|null $navigationGroup = 'Operations';
    protected static ?string $navigationLabel = 'CRM Sales';
    protected string $view = 'filament.pages.crm-page';

    protected function getViewData(): array
    {
        // Fetch contacts ordered by latest interactions
        $contacts = Contact::orderBy('created_at', 'desc')->get();

        $stats = [
            'total' => $contacts->count(),
            'students' => $contacts->filter(fn($c) => in_array('Student', $c->relationship_flags ?? []))->count(),
            'donors' => $contacts->filter(fn($c) => in_array('Donor', $c->relationship_flags ?? []))->count(),
            'volunteers' => $contacts->filter(fn($c) => in_array('Volunteer', $c->relationship_flags ?? []))->count(),
        ];

        return [
            'contacts' => $contacts,
            'stats' => $stats
        ];
    }
}
