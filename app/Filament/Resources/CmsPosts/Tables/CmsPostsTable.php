<?php

namespace App\Filament\Resources\CmsPosts\Tables;

use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;

class CmsPostsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')->searchable()->sortable(),
                TextColumn::make('category')->searchable()->sortable(),
                TextColumn::make('author_name')->searchable(),
                TextColumn::make('status')->badge()->searchable()
                    ->colors([
                        'warning' => 'Draft',
                        'success' => 'Published',
                        'secondary' => 'Archived',
                    ]),
                TextColumn::make('scheduled_at')->dateTime()->sortable(),
                TextColumn::make('created_at')->dateTime()->sortable()->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                EditAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
