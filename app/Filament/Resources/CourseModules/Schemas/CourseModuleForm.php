<?php

namespace App\Filament\Resources\CourseModules\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class CourseModuleForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                \Filament\Schemas\Components\Section::make('Module Info')
                    ->schema([
                        \Filament\Forms\Components\Select::make('course_id')
                            ->relationship('course', 'name')
                            ->required()
                            ->searchable()
                            ->label('Course'),
                        TextInput::make('name')
                            ->required()
                            ->label('Module Name'),
                        TextInput::make('order')
                            ->required()
                            ->numeric()
                            ->default(0)
                            ->label('Sort Order'),
                        \Filament\Forms\Components\Select::make('status')
                            ->options([
                                'Draft' => 'Draft',
                                'Published' => 'Published',
                            ])
                            ->required()
                            ->default('Draft'),
                        \Filament\Forms\Components\RichEditor::make('description')
                            ->columnSpanFull()
                            ->label('Description'),
                    ])->columns(2)
            ]);
    }
}
