<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use App\Models\CmsPost;

class CmsPostsPage extends Page
{
    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-document-text';
    protected static string|\UnitEnum|null $navigationGroup = 'CMS Operations';
    protected static ?string $navigationLabel = 'Blog & News';
    protected string $view = 'filament.pages.cms-posts-page';

    protected function getViewData(): array
    {
        return [
            'cmsPosts' => CmsPost::orderBy('created_at', 'desc')->get()
        ];
    }
}
