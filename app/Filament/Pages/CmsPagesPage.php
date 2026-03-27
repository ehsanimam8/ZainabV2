<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use App\Models\CmsPage;

class CmsPagesPage extends Page
{
    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-document-text';
    protected static string|\UnitEnum|null $navigationGroup = 'Content';
    protected static ?string $navigationLabel = 'Pages';
    protected string $view = 'filament.pages.cms-pages-page';

    public $cmsPages;

    public function mount()
    {
        $this->cmsPages = CmsPage::orderBy('created_at', 'asc')->get();
    }
}
