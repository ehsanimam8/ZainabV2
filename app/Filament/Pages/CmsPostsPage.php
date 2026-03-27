<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use App\Models\CmsPost;

class CmsPostsPage extends Page
{
    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-newspaper';
    protected static string|\UnitEnum|null $navigationGroup = 'Content';
    protected static ?string $navigationLabel = 'Posts & Blog';
    protected string $view = 'filament.pages.cms-posts-page';

    public $cmsPosts;

    public function mount()
    {
        $this->cmsPosts = CmsPost::orderBy('created_at', 'desc')->get();
    }
}
