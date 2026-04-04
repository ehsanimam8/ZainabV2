<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use App\Models\CmsPage;

class CmsPagesPage extends Page
{
    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-document-text';
    protected static string|\UnitEnum|null $navigationGroup = 'CMS Operations';
    protected static ?string $navigationLabel = 'Web Pages';
    protected string $view = 'filament.pages.cms-pages-page';

    protected function getViewData(): array
    {
        return [
            'cmsPages' => CmsPage::orderBy('created_at', 'desc')->get()
        ];
    }
}
