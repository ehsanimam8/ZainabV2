<?php

namespace App\Filament\Resources\CmsPosts;

use App\Filament\Resources\CmsPosts\Pages\CreateCmsPost;
use App\Filament\Resources\CmsPosts\Pages\EditCmsPost;
use App\Filament\Resources\CmsPosts\Pages\ListCmsPosts;
use App\Filament\Resources\CmsPosts\Schemas\CmsPostForm;
use App\Filament\Resources\CmsPosts\Tables\CmsPostsTable;
use App\Models\CmsPost;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class CmsPostResource extends Resource
{
    protected static ?string $model = CmsPost::class;

    protected static \BackedEnum|string|null $navigationIcon = 'heroicon-o-newspaper';

    protected static string | \UnitEnum | null $navigationGroup = 'Content';
    protected static ?int $navigationSort = 2;
    protected static ?string $navigationLabel = 'Posts & Blog';
    
    protected static ?string $modelLabel = 'Blog Post';

    public static function form(Schema $schema): Schema
    {
        return CmsPostForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CmsPostsTable::configure($table);
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
            'index' => ListCmsPosts::route('/'),
            'create' => CreateCmsPost::route('/create'),
            'edit' => EditCmsPost::route('/{record}/edit'),
        ];
    }
}
