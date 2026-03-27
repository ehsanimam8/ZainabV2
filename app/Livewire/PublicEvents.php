<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Layout;
use App\Models\Event;
use Carbon\Carbon;

#[Layout('components.layouts.public')]
class PublicEvents extends Component
{
    public $type = 'all'; // all, free, paid
    public $format = 'all'; // all, online, inperson
    public $month = 'all';

    public function render()
    {
        $query = Event::query()->where('status', 'published');
        
        if ($this->type !== 'all') {
            $query->where('pricing_type', $this->type);
        }
        
        if ($this->format !== 'all') {
            if ($this->format === 'online') {
                $query->where(function ($q) {
                    $q->where('location', 'ilike', '%online%')
                      ->orWhere('location', 'ilike', '%zoom%');
                });
            } else {
                $query->where('location', 'not ilike', '%online%')
                      ->where('location', 'not ilike', '%zoom%');
            }
        }
        
        if ($this->month !== 'all') {
            $monthNum = date('m', strtotime($this->month . ' 1 2026'));
            $query->whereMonth('start_date', $monthNum);
        }

        $events = $query->orderBy('start_date', 'asc')->get();

        return view('livewire.public-events', [
            'events' => $events
        ]);
    }
}
