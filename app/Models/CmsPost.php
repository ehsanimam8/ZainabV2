<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CmsPost extends Model
{
    use \Illuminate\Database\Eloquent\Concerns\HasUuids;

    protected $fillable = [
        'title',
        'category',
        'content',
        'author_name',
        'status',
        'scheduled_at',
    ];

    protected $casts = [
        'scheduled_at' => 'datetime',
    ];
}
