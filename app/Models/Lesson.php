<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use \Illuminate\Database\Eloquent\Concerns\HasUuids;

    protected $guarded = [];

    protected $casts = [
        'content' => 'array',
    ];

    public function courseModule()
    {
        return $this->belongsTo(CourseModule::class);
    }
}
