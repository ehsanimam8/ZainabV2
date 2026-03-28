<?php

namespace App\Filament\Resources\Assignments\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Grid;
use Filament\Forms\Get;
use Filament\Schemas\Schema;

class AssignmentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Grid::make(3)
                    ->schema([
                        Grid::make(1)
                            ->columnSpan(2)
                            ->schema([
                                Section::make('Assignment / Quiz Settings')
                                    ->schema([
                                        TextInput::make('title')
                                            ->required()
                                            ->label('Title *')
                                            ->placeholder('e.g. Essay on Taharah')
                                            ->columnSpanFull(),
                                        Select::make('type')
                                            ->options([
                                                'Text / Written' => 'Text / Written',
                                                'File Upload' => 'File Upload',
                                                'Text + File' => 'Text + File',
                                                'Quiz' => 'Quiz',
                                            ])
                                            ->required()
                                            ->default('Text / Written')
                                            ->label('Submission Type')
                                            ->reactive(),
                                        Select::make('course_id')
                                            ->relationship('course', 'name')
                                            ->required()
                                            ->searchable()
                                            ->label('Course *'),
                                        Select::make('lesson_id')
                                            ->relationship('lesson', 'title')
                                            ->searchable()
                                            ->label('Linked Lesson (Optional)'),
                                        TextInput::make('time_limit_minutes')
                                            ->numeric()
                                            ->label('Time Limit (minutes)')
                                            ->placeholder('0 = no limit'),
                                        TextInput::make('max_attempts')
                                            ->required()
                                            ->numeric()
                                            ->default(1)
                                            ->label('Max Attempts'),
                                        TextInput::make('passing_score_percent')
                                            ->numeric()
                                            ->label('Passing Score (%)'),
                                        Select::make('show_results')
                                            ->options([
                                                'Immediately after submission' => 'Immediately after submission',
                                                'After due date' => 'After due date',
                                                'Manually release' => 'Manually release',
                                            ])
                                            ->default('Immediately after submission')
                                            ->visible(fn (Get $get) => $get('type') === 'Quiz'),
                                        Toggle::make('is_shuffled')
                                            ->label('Shuffle question order')
                                            ->visible(fn (Get $get) => $get('type') === 'Quiz')
                                            ->columnSpanFull(),
                                        Textarea::make('description')
                                            ->label('Instructions')
                                            ->placeholder('Describe the assignment in detail...')
                                            ->rows(4)
                                            ->columnSpanFull()
                                            ->visible(fn (Get $get) => $get('type') !== 'Quiz'),
                                    ])->columns(2),

                                // QUIZ BUILDER SECTION
                                Section::make('Quiz Questions')
                                    ->visible(fn (Get $get) => $get('type') === 'Quiz')
                                    ->schema([
                                        Repeater::make('quiz_data')
                                            ->label('')
                                            ->schema([
                                                Grid::make(3)
                                                ->schema([
                                                    Select::make('question_type')
                                                        ->options([
                                                            'mcq' => 'Multiple Choice',
                                                            'tf' => 'True / False',
                                                            'sa' => 'Short Answer',
                                                        ])
                                                        ->required()
                                                        ->default('mcq')
                                                        ->reactive()
                                                        ->columnSpan(2),
                                                    TextInput::make('points')
                                                        ->numeric()
                                                        ->required()
                                                        ->default(1)
                                                        ->columnSpan(1),
                                                ]),
                                                Textarea::make('question_text')
                                                    ->required()
                                                    ->label('Question Text')
                                                    ->rows(3),
                                                
                                                // Dynamic fields based on question_type
                                                Repeater::make('options')
                                                    ->label('Answer Options')
                                                    ->visible(fn (Get $get) => $get('question_type') === 'mcq')
                                                    ->schema([
                                                        TextInput::make('option_text')->required()->label('Option'),
                                                        Toggle::make('is_correct')->label('Correct Answer'),
                                                    ])->columns(2)->defaultItems(4),

                                                Select::make('tf_correct_answer')
                                                    ->label('Correct Answer')
                                                    ->options([
                                                        'true' => 'True',
                                                        'false' => 'False',
                                                    ])
                                                    ->visible(fn (Get $get) => $get('question_type') === 'tf')
                                                    ->required(fn (Get $get) => $get('question_type') === 'tf'),

                                                Placeholder::make('sa_info')
                                                    ->label('')
                                                    ->content('Students will see a text input. Grading is manual for short-answer questions.')
                                                    ->visible(fn (Get $get) => $get('question_type') === 'sa'),
                                            ])
                                            ->itemLabel(fn (array $state): ?string => $state['question_text'] ?? null)
                                            ->collapsible()
                                            ->defaultItems(0)
                                            ->addActionLabel('+ Add Question'),
                                    ]),
                            ]),

                        Grid::make(1)
                            ->columnSpan(1)
                            ->schema([
                                Section::make('Status & Deadlines')
                                    ->schema([
                                        Select::make('status')
                                            ->options([
                                                'Draft' => 'Draft',
                                                'Published' => 'Published',
                                                'Closed' => 'Closed',
                                            ])
                                            ->required()
                                            ->default('Draft'),
                                        DateTimePicker::make('due_date')
                                            ->label('Due Date *')
                                            ->required(),
                                        TextInput::make('total_points')
                                            ->required()
                                            ->numeric()
                                            ->default(100)
                                            ->label('Total Points')
                                            ->helperText('For quizzes, you can manually sum the points here or leave as 100 to calculate percentage.'),
                                        Toggle::make('notify_students')
                                            ->label('Notify students when published')
                                            ->default(true)
                                            ->dehydrated(false),
                                    ]),
                            ]),
                    ]),
            ]);
    }
}
