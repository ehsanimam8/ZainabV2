<?php

namespace App\Filament\Resources\CmsPosts\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DateTimePicker;
use Filament\Schemas\Components\Section;

class CmsPostForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Post Details')
                    ->schema([
                        TextInput::make('title')
                            ->required()
                            ->maxLength(255)
                            ->columnSpanFull(),
                        Select::make('category')
                            ->options([
                                'Announcement' => 'Announcement',
                                'News' => 'News',
                                'Fundraising' => 'Fundraising',
                                'Event Update' => 'Event Update',
                            ])
                            ->required(),
                        TextInput::make('author_name')
                            ->label('Author')
                            ->maxLength(255)
                            ->default(fn () => auth()->user()->name ?? ''),
                        \Filament\Forms\Components\RichEditor::make('content')
                            ->required()
                            ->columnSpanFull(),
                    ])->columns(2),
                
                Section::make('Publishing')
                    ->schema([
                        Select::make('status')
                            ->options([
                                'Draft' => 'Draft',
                                'Published' => 'Published',
                                'Archived' => 'Archived',
                            ])->default('Draft')->required(),
                        DateTimePicker::make('scheduled_at')
                            ->label('Scheduled Publish Date'),
                    ])->columns(2),
            ]);
    }
}
