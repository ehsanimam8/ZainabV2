<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use App\Models\NavigationItem;
use App\Models\CmsPage;

class NavigationBuilderPage extends Page
{
    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-bars-3';
    protected static string|\UnitEnum|null $navigationGroup = 'CMS Operations';
    protected static ?string $navigationLabel = 'Navigation Builder';
    protected string $view = 'filament.pages.navigation-builder-page';

    public $customLabel = '';
    public $customUrl = '';

    protected function getViewData(): array
    {
        return [
            'navItems' => NavigationItem::orderBy('position', 'asc')->get(),
            'availablePages' => CmsPage::where('status', 'Published')->get()
        ];
    }

    public function removeItem($id)
    {
        NavigationItem::where('id', $id)->delete();
        \Filament\Notifications\Notification::make()
            ->title('Navigation item removed')
            ->success()
            ->send();
    }

    public function addPage($title, $url)
    {
        $maxPos = NavigationItem::max('position') ?? 0;
        NavigationItem::create([
            'label' => $title,
            'url' => '/' . ltrim($url, '/'),
            'position' => $maxPos + 1
        ]);
        
        \Filament\Notifications\Notification::make()
            ->title('Page added to navigation')
            ->success()
            ->send();
    }

    public function addCustomLink()
    {
        if (empty($this->customLabel) || empty($this->customUrl)) {
            return;
        }

        $maxPos = NavigationItem::max('position') ?? 0;
        NavigationItem::create([
            'label' => $this->customLabel,
            'url' => $this->customUrl,
            'position' => $maxPos + 1
        ]);

        $this->customLabel = '';
        $this->customUrl = '';

        \Filament\Notifications\Notification::make()
            ->title('Custom link added')
            ->success()
            ->send();
    }
}
