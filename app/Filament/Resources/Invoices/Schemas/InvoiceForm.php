<?php

namespace App\Filament\Resources\Invoices\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Textarea;

class InvoiceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('user_id')->options(\App\Models\User::pluck('email', 'id'))->searchable()->required(),
                Select::make('enrollment_id')->options(\App\Models\Enrollment::with(['user', 'program'])->get()->mapWithKeys(fn($e) => [$e->id => ($e->user->email ?? 'Unknown') . ' - ' . ($e->program->name ?? 'Unknown')]))->searchable(),
                TextInput::make('amount')->numeric()->prefix('$')->required(),
                Select::make('status')
                    ->options([
                        'unpaid' => 'Unpaid',
                        'paid' => 'Paid',
                        'void' => 'Void',
                    ])->default('unpaid')->required(),
                DatePicker::make('due_date'),
                TextInput::make('pdf_url')->url(),
                Textarea::make('notes')->columnSpanFull(),
            ]);
    }
}
