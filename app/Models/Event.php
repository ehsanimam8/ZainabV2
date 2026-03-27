<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use \Illuminate\Database\Eloquent\Concerns\HasUuids;

    protected $fillable = [
        'title',
        'description',
        'type',
        'location',
        'start_date',
        'end_date',
        'registration_opens_at',
        'registration_closes_at',
        'pricing_type',
        'ticket_price',
        'mock_registrants',
        'status',
    ];

    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
        'registration_opens_at' => 'datetime',
        'registration_closes_at' => 'datetime',
        'ticket_price' => 'decimal:2',
    ];
}
