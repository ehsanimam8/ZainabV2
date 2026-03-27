<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    use \Illuminate\Database\Eloquent\Concerns\HasUuids;

    protected $fillable = [
        'subject',
        'channels',
        'audience',
        'body',
        'status',
        'scheduled_at',
        'delivered_count',
        'failed_count',
    ];

    protected $casts = [
        'channels' => 'array',
        'scheduled_at' => 'datetime',
    ];
}
