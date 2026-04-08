<?php

namespace App\Filament\Resources\Enrollments\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;

class EnrollmentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('user_id')
                    ->options(\App\Models\User::pluck('email', 'id'))
                    ->required()
                    ->searchable(),
                Select::make('program_id')
                    ->options(\App\Models\Program::pluck('name', 'id'))
                    ->required()
                    ->searchable(),
                Select::make('status')
                    ->options([
                        'Pending' => 'Pending',
                        'Active' => 'Active',
                        'Failed' => 'Failed',
                        'Suspended' => 'Suspended',
                        'Expired' => 'Expired',
                        'Withdrawn' => 'Withdrawn',
                        'Completed' => 'Completed',
                        'Abandoned' => 'Abandoned',
                    ])
                    ->required()
                    ->default('Pending'),
                DatePicker::make('enrollment_date')
                    ->default(now()),
                Select::make('payment_plan')
                    ->options([
                        'monthly' => 'Monthly',
                        'full' => 'Full Upfront',
                        'none' => 'None (Scholarship/Free)',
                    ]),
                TextInput::make('reactivation_count')
                    ->numeric()
                    ->disabled()
                    ->default(0),
            ]);
    }
}
