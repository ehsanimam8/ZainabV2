<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\NavigationItem;

class NavigationItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            ['label' => 'Home', 'url' => '/', 'position' => 1],
            ['label' => 'Programs', 'url' => '/programs', 'position' => 2],
            ['label' => 'Events', 'url' => '/events', 'position' => 3],
            ['label' => 'About', 'url' => '/about', 'position' => 4],
            ['label' => 'Contact', 'url' => '/contact', 'position' => 5],
        ];

        foreach ($items as $item) {
            NavigationItem::create($item);
        }
    }
}
