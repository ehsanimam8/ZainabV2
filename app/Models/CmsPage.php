<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CmsPage extends Model
{
    use \Illuminate\Database\Eloquent\Concerns\HasUuids;

    protected $fillable = [
        'title',
        'slug',
        'content',
        'status',
        'public_nav',
        'meta_title',
        'meta_description',
        'published_at',
    ];

    protected $casts = [
        'public_nav' => 'boolean',
        'published_at' => 'datetime',
    ];
}
