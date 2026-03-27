<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Layout;
use App\Models\Program;

#[Layout('components.layouts.public')]
class PublicPrograms extends Component
{
    public $category = 'all';
    public $level = 'all';

    public function render()
    {
        $query = Program::active();

        if ($this->category !== 'all') {
            $query->where('category', $this->category);
        }

        // We don't have level/format natively on Program, so for now we'll mock or omit them
        // In a real app we'd filter by relationship tags or additional metadata

        $programs = $query->latest()->get();

        return view('livewire.public-programs', [
            'programs' => $programs
        ]);
    }
}
