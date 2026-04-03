<?php

namespace App\Filament\Resources\Announcements;

use App\Models\Announcement;
use Filament\Forms;
use Filament\Schemas\Schema;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class AnnouncementResource extends Resource
{
    protected static ?string $model = Announcement::class;

    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-megaphone';
    protected static string|\UnitEnum|null $navigationGroup = 'Communications';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Forms\Components\Card::make()->schema([
                    Forms\Components\TextInput::make('subject')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\Select::make('audience')
                        ->options([
                            'All Students' => 'All Students',
                            'Specific Program' => 'Specific Program',
                            'Specific Course' => 'Specific Course',
                        ])
                        ->required()
                        ->default('All Students'),
                    Forms\Components\CheckboxList::make('channels')
                        ->options([
                            'Email' => 'Email Drop',
                            'SMS' => 'Text Message',
                            'Portal' => 'Portal Pop-up Widget',
                        ])
                        ->default(['Portal'])
                        ->required(),
                    Forms\Components\RichEditor::make('body')
                        ->required()
                        ->columnSpanFull(),
                    Forms\Components\Select::make('status')
                        ->options([
                            'Draft' => 'Draft',
                            'Scheduled' => 'Scheduled',
                            'Sent' => 'Sent',
                        ])
                        ->default('Draft')
                        ->required(),
                    Forms\Components\DateTimePicker::make('scheduled_at')
                        ->visible(fn ($get) => $get('status') === 'Scheduled'),
                ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('subject')
                    ->searchable(),
                Tables\Columns\BadgeColumn::make('audience'),
                Tables\Columns\BadgeColumn::make('status')
                    ->colors([
                        'warning' => 'Draft',
                        'primary' => 'Scheduled',
                        'success' => 'Sent',
                    ]),
                Tables\Columns\TextColumn::make('delivered_count')
                    ->label('Delivered')
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAnnouncements::route('/'),
            'create' => Pages\CreateAnnouncement::route('/create'),
            'edit' => Pages\EditAnnouncement::route('/{record}/edit'),
        ];
    }
}
