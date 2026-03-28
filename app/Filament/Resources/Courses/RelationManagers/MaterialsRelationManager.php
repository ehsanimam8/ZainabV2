<?php

namespace App\Filament\Resources\Courses\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;

class MaterialsRelationManager extends RelationManager
{
    protected static string $relationship = 'materials';
    protected static ?string $recordTitleAttribute = 'title';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('type')
                    ->options([
                        'document' => 'Document/PDF',
                        'link' => 'External Link',
                        'video' => 'Video',
                    ])
                    ->required()
                    ->default('document'),
                Forms\Components\FileUpload::make('file_url')
                    ->label('Upload File')
                    ->directory('course-materials')
                    ->columnSpanFull()
                    ->visible(fn ($get) => $get('type') === 'document' || $get('type') === 'video'),
                Forms\Components\TextInput::make('file_url')
                    ->label('Link URL')
                    ->url()
                    ->columnSpanFull()
                    ->visible(fn ($get) => $get('type') === 'link'),
                Forms\Components\Textarea::make('description')
                    ->columnSpanFull()
                    ->maxLength(65535),
                Forms\Components\Toggle::make('is_visible_to_students')
                    ->label('Visible to Students')
                    ->default(true),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')->searchable(),
                Tables\Columns\BadgeColumn::make('type')->colors([
                    'primary' => 'document',
                    'success' => 'link',
                    'warning' => 'video',
                ]),
                Tables\Columns\IconColumn::make('is_visible_to_students')->boolean(),
                Tables\Columns\TextColumn::make('created_at')->dateTime('M d, Y')->sortable(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
