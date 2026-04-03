<?php

namespace App\Filament\Resources\CourseSections\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;

class CourseSectionsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('course.name')->sortable()->searchable(),
                TextColumn::make('name')->searchable()->sortable(),
                TextColumn::make('leadTeacher.name')->sortable()->searchable(),
                TextColumn::make('max_capacity')->numeric()->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                EditAction::make()->slideOver(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
