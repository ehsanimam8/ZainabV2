<?php

namespace App\Filament\Resources\Students\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\DatePicker;
use Filament\Schemas\Components\Section;

class StudentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Personal Information')
                    ->schema([
                        TextInput::make('first_name')->required()->label('First Name *')
                            ->placeholder('e.g. Fatima'),
                        TextInput::make('last_name')->required()->label('Last Name *')
                            ->placeholder('e.g. Al-Hassan'),
                        TextInput::make('email')->email()->required()->label('Email Address *')
                            ->placeholder('student@email.com'),
                        TextInput::make('phone')->tel()->label('Phone Number')
                            ->placeholder('+1 (555) 000-0000'),
                        DatePicker::make('metadata.dob')->label('Date of Birth')
                            ->native(false)
                            ->displayFormat('d/m/Y'),
                        Select::make('gender')->label('Gender')
                            ->options([
                                'Male' => 'Male',
                                'Female' => 'Female',
                                'Unspecified' => 'Unspecified'
                            ]),
                    ])->columns(2),

                Section::make('Enrollment')
                    ->schema([
                        Select::make('metadata.target_program_id')->label('Program *')
                            ->options(\App\Models\Program::pluck('name', 'id'))
                            ->placeholder('Select program...'),
                        Select::make('metadata.target_status')->label('Enrollment Status')
                            ->options([
                                'Pending' => 'Pending',
                                'Active' => 'Active',
                                'Enrolled' => 'Enrolled',
                            ])->default('Pending'),
                        Select::make('metadata.payment_plan')->label('Payment Plan')
                            ->options([
                                'Full (one-time)' => 'Full (one-time)',
                                'Monthly Installments' => 'Monthly Installments',
                                'Scholarship / Waived' => 'Scholarship / Waived',
                            ]),
                        DatePicker::make('metadata.enrollment_start_date')->label('Enrollment Start Date')
                            ->native(false)
                            ->displayFormat('d/m/Y'),
                    ])->columns(2),

                Section::make('Parent / Guardian (If enrolling a child)')
                    ->schema([
                        TextInput::make('metadata.guardian_name')->label('Guardian Name')
                            ->placeholder('Parent or guardian full name'),
                        TextInput::make('metadata.guardian_email')->label('Guardian Email')
                            ->email()
                            ->placeholder('parent@email.com'),
                        Textarea::make('metadata.student_notes')->label('Notes')
                            ->placeholder('Any additional notes about this student...')
                            ->rows(4)
                            ->columnSpanFull(),
                    ])->columns(2),
            ]);
    }
}
