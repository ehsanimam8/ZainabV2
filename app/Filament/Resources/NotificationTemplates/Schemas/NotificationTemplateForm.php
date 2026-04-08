<?php

namespace App\Filament\Resources\NotificationTemplates\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\TagsInput;

class NotificationTemplateForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                \Filament\Schemas\Components\Section::make('Template Details')
                    ->schema([
                        TextInput::make('name')
                            ->required()
                            ->maxLength(255)
                            ->label('Template Name'),
                        TextInput::make('slug')
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->maxLength(255)
                            ->helperText('Used programmatically (e.g., payment_failed, enrollment_success)'),
                        TextInput::make('subject')
                            ->required()
                            ->maxLength(255)
                            ->label('Email Subject Line')
                            ->columnSpanFull(),
                        \Filament\Forms\Components\RichEditor::make('body')
                            ->required()
                            ->label('Email Body Content')
                            ->columnSpanFull(),
                        TagsInput::make('variables')
                            ->helperText('Available merge tags (e.g. first_name, amount). In the body, use double curly braces: {{ first_name }}.')
                            ->columnSpanFull(),
                        Toggle::make('is_active')
                            ->default(true)
                            ->label('Active Status')
                            ->inline(false),
                    ])->columns(2),
            ]);
    }
}
