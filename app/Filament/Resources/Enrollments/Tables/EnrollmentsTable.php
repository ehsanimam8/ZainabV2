<?php

namespace App\Filament\Resources\Enrollments\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;

class EnrollmentsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user.email')->sortable()->searchable(),
                TextColumn::make('program.name')->sortable()->searchable(),
                TextColumn::make('status')
                    ->badge()
                    ->searchable()
                    ->colors([
                        'warning' => 'Pending',
                        'success' => fn ($state) => in_array($state, ['Active', 'Completed']),
                        'danger' => fn ($state) => in_array($state, ['Failed', 'Expired', 'Withdrawn', 'Abandoned']),
                        'secondary' => 'Suspended',
                    ]),
                TextColumn::make('enrollment_date')->date()->sortable(),
                TextColumn::make('payment_plan')->searchable(),
                TextColumn::make('reactivation_count')->numeric()->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                \Filament\Tables\Actions\Action::make('evaluate')
                    ->label('Evaluate Status')
                    ->icon('heroicon-o-calculator')
                    ->color('warning')
                    ->visible(fn ($record) => $record->status !== 'Completed')
                    ->action(function ($record) {
                        dispatch(new \App\Jobs\EvaluateStudentCompletions($record->id));
                        \Filament\Notifications\Notification::make()
                            ->title('Evaluation Queued')
                            ->success()
                            ->send();
                    }),
                \Filament\Tables\Actions\Action::make('download_certificate')
                    ->label('Certificate')
                    ->icon('heroicon-o-academic-cap')
                    ->color('success')
                    ->visible(fn ($record) => $record->status === 'Completed')
                    ->url(fn ($record) => route('certificates.download', $record->id))
                    ->openUrlInNewTab(),
                EditAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
