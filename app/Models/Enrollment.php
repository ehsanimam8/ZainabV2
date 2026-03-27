<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Enrollment extends Model
{
    use HasUuids, LogsActivity;

    protected $fillable = [
        'user_id', 'program_id', 'status', 'enrollment_date',
        'payment_plan', 'reactivation_count'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function program(): BelongsTo
    {
        return $this->belongsTo(Program::class);
    }

    protected static function booted()
    {
        static::updating(function (Enrollment $enrollment) {
            if ($enrollment->isDirty('status') && $enrollment->getOriginal('status') === 'Suspended' && $enrollment->status === 'Active') {
                $enrollment->reactivation_count += 1;
            }
        });
    }

    public function scopeHasLmsAccess($query)
    {
        return $query->whereIn('status', ['Active', 'Completed']);
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logAll();
    }
}
