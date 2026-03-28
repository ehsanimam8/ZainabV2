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
                Select::make('user_id')
                    ->label('Bill To (Parent/Student)')
                    ->relationship('user', 'email')
                    ->getOptionLabelFromRecordUsing(fn (\App\Models\User $record) => "{$record->first_name} {$record->last_name} (" . ($record->household ? $record->household->name : $record->email) . ")")
                    ->searchable()
                    ->preload()
                    ->required(),
                Select::make('enrollment_id')
                    ->label('Related Enrollment (Optional)')
                    ->relationship('enrollment', 'id')
                    ->getOptionLabelFromRecordUsing(fn (\App\Models\Enrollment $record) => ($record->user->first_name ?? 'Unknown') . ' - ' . ($record->program->name ?? 'Unknown'))
                    ->searchable()
                    ->preload(),
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
