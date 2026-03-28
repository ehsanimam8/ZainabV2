<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    use \Illuminate\Database\Eloquent\Concerns\HasUuids;

    protected $guarded = [];

    protected $casts = [
        'due_date' => 'datetime',
        'quiz_data' => 'array',
        'is_shuffled' => 'boolean',
    ];

    protected static function booted()
    {
        static::saving(function ($assignment) {
            if ($assignment->type === 'Quiz' && is_array($assignment->quiz_data)) {
                $total = 0;
                foreach ($assignment->quiz_data as $question) {
                    $total += (float) ($question['points'] ?? 0);
                }
                $assignment->total_points = $total;
            }
        });
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }
    
    public function submissions()
    {
        return $this->hasMany(Submission::class);
    }
}
