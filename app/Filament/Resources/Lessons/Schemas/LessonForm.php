<?php

namespace App\Filament\Resources\Lessons\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class LessonForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                \Filament\Schemas\Components\Section::make('Lesson Details')
                    ->schema([
                        TextInput::make('title')
                            ->required()
                            ->label('Lesson Title *')
                            ->placeholder('e.g. The Pillars of Salah — Part 3')
                            ->columnSpanFull(),
                        \Filament\Forms\Components\Select::make('course_module_id')
                            ->options(\App\Models\CourseModule::with('course')->get()->mapWithKeys(fn($m) => [$m->id => ($m->course->name ?? 'Course') . ' - ' . $m->name]))
                            ->searchable()
                            ->required()
                            ->label('Module / Week'),
                        \Filament\Forms\Components\Select::make('lesson_type')
                            ->options([
                                'video' => '📹 Video Lesson',
                                'pdf' => '📄 PDF / Reading',
                                'live' => '🔴 Live Session',
                                'quiz' => '📝 Quiz / Assessment',
                            ])
                            ->default('video')
                            ->label('Lesson Type')
                            ->dehydrated(false),
                        Textarea::make('content')
                            ->label('Description / Learning Objectives')
                            ->placeholder('What will students learn in this lesson?')
                            ->columnSpanFull(),
                    ])->columns(2),

                \Filament\Schemas\Components\Section::make('Content & Settings')
                    ->schema([
                        TextInput::make('video_url')
                            ->url()
                            ->label('Video URL / Media Link')
                            ->placeholder('Paste video URL (YouTube, Vimeo, Zoom recording...)')
                            ->columnSpanFull(),
                        TextInput::make('duration_minutes')
                            ->numeric()
                            ->label('Estimated Duration (minutes)')
                            ->placeholder('e.g. 45'),
                        TextInput::make('order')
                            ->required()
                            ->numeric()
                            ->default(0)
                            ->label('Display Order'),
                        Toggle::make('is_published')
                            ->label('Publish immediately')
                            ->default(true),
                        Toggle::make('notify_students')
                            ->label('Notify enrolled students when published')
                            ->default(true)
                            ->dehydrated(false),
                    ])->columns(2),
            ]);
    }
}
