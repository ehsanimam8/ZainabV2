<?php

namespace App\Filament\Resources\CmsPages\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DateTimePicker;
use Filament\Schemas\Components\Section;

class CmsPageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Page Content')
                    ->schema([
                        TextInput::make('title')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('slug')
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->maxLength(255),
                        \Filament\Forms\Components\RichEditor::make('content')
                            ->columnSpanFull(),
                    ])->columns(2),
                
                Section::make('Settings & Visibility')
                    ->schema([
                        Select::make('status')
                            ->options([
                                'Draft' => 'Draft',
                                'Published' => 'Published',
                                'Archived' => 'Archived',
                            ])->default('Draft')->required(),
                        DateTimePicker::make('published_at'),
                        Toggle::make('public_nav')
                            ->label('Add to Public Navigation')
                            ->default(false),
                    ])->columns(2),
                
                Section::make('SEO Data')
                    ->schema([
                        TextInput::make('meta_title')->maxLength(255),
                        Textarea::make('meta_description')->columnSpanFull(),
                    ])->columns(2),
            ]);
    }
}
