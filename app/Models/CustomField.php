<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomField extends Model
{
    use \Illuminate\Database\Eloquent\Concerns\HasUuids;

    protected $fillable = [
        'name',
        'entity',
        'type',
        'options',
        'visibility',
        'placeholder',
        'show_on_profile',
        'show_on_registration',
    ];

    protected $casts = [
        'show_on_profile' => 'boolean',
        'show_on_registration' => 'boolean',
    ];
}
