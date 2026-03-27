<?php

namespace App\Filament\Resources\Assignments\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class AssignmentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                \Filament\Schemas\Components\Section::make('Assignment Details')
                    ->schema([
                        TextInput::make('title')
                            ->required()
                            ->label('Title *')
                            ->placeholder('e.g. Essay on Taharah')
                            ->columnSpanFull(),
                        \Filament\Forms\Components\Select::make('course_id')
                            ->relationship('course', 'name')
                            ->required()
                            ->searchable()
                            ->label('Course *'),
                        DateTimePicker::make('due_date')
                            ->label('Due Date *')
                            ->required(),
                        TextInput::make('total_points')
                            ->required()
                            ->numeric()
                            ->default(100)
                            ->label('Total Points'),
                        \Filament\Forms\Components\Select::make('type')
                            ->options([
                                'Text / Written' => 'Text / Written',
                                'File Upload' => 'File Upload',
                                'Text + File' => 'Text + File',
                                'Quiz' => 'Quiz',
                            ])
                            ->required()
                            ->default('Text / Written')
                            ->label('Submission Type'),
                        Textarea::make('description')
                            ->label('Instructions')
                            ->placeholder('Describe the assignment in detail...')
                            ->rows(4)
                            ->columnSpanFull(),
                        \Filament\Forms\Components\Toggle::make('notify_students')
                            ->label('Notify students when published')
                            ->default(true)
                            ->dehydrated(false)
                            ->columnSpanFull(),
                    ])->columns(2),

                \Filament\Schemas\Components\Section::make('Grading & Limits (Advanced)')
                    ->schema([
                        TextInput::make('time_limit_minutes')
                            ->numeric()
                            ->label('Time Limit (minutes)'),
                        TextInput::make('max_attempts')
                            ->required()
                            ->numeric()
                            ->default(1)
                            ->label('Max Attempts'),
                        TextInput::make('passing_score_percent')
                            ->numeric()
                            ->label('Passing Score (%)'),
                        \Filament\Forms\Components\Select::make('status')
                            ->options([
                                'Draft' => 'Draft',
                                'Published' => 'Published',
                                'Closed' => 'Closed',
                            ])
                            ->required()
                            ->default('Draft'),
                        \Filament\Forms\Components\Select::make('lesson_id')
                            ->relationship('lesson', 'title')
                            ->searchable()
                            ->label('Link to Lesson (Optional)')
                            ->columnSpanFull(),
                    ])->columns(2)->collapsed(),
            ]);
    }
}
