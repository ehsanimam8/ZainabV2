<?php

namespace App\Filament\Resources\Submissions\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class SubmissionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                \Filament\Schemas\Components\Section::make('Submission Info')
                    ->schema([
                        \Filament\Forms\Components\Select::make('assignment_id')
                            ->options(\App\Models\Assignment::pluck('title', 'id'))
                            ->required()
                            ->searchable()
                            ->label('Assignment'),
                        \Filament\Forms\Components\Select::make('user_id')
                            ->options(\App\Models\User::pluck('name', 'id'))
                            ->required()
                            ->searchable()
                            ->label('Student'),
                        Textarea::make('content')
                            ->label('Student Answer / Content')
                            ->disabled()
                            ->columnSpanFull(),
                        DateTimePicker::make('submitted_at')
                            ->required()
                            ->label('Submitted At'),
                        TextInput::make('attempt_number')
                            ->required()
                            ->numeric()
                            ->default(1)
                            ->label('Attempt Number'),
                    ])->columns(2),

                \Filament\Schemas\Components\Section::make('Grading')
                    ->schema([
                        TextInput::make('score')
                            ->numeric()
                            ->label('Score (/ 100)')
                            ->placeholder('0'),
                        \Filament\Forms\Components\Select::make('grade_status')
                            ->options([
                                'Pending' => 'Pending',
                                'Pass' => 'Pass',
                                'Fail' => 'Fail',
                                'Distinction' => 'Distinction',
                                'Incomplete' => 'Incomplete',
                            ])
                            ->required()
                            ->default('Pending')
                            ->label('Grade'),
                        Textarea::make('feedback')
                            ->label('Feedback to Student')
                            ->placeholder('Optional written feedback...')
                            ->rows(3)
                            ->columnSpanFull(),
                        \Filament\Forms\Components\Toggle::make('notify_student')
                            ->label('Notify student of grade')
                            ->default(true)
                            ->dehydrated(false)
                            ->columnSpanFull(),
                    ])->columns(2),
            ]);
    }
}
