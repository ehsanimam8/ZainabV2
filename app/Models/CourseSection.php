<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CourseSection extends Model
{
    use HasUuids, LogsActivity;

    protected $fillable = [
        'course_id', 'lead_teacher_id', 'name', 'days_of_week', 'start_time',
        'end_time', 'room_location', 'max_capacity', 'start_date', 'end_date', 'notes'
    ];

    protected function casts(): array
    {
        return [
            'days_of_week' => 'array',
        ];
    }

    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }

    public function leadTeacher(): BelongsTo
    {
        return $this->belongsTo(User::class, 'lead_teacher_id');
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logAll();
    }
}
