<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Program extends Model
{
    use HasUuids, LogsActivity;

    protected $fillable = [
        'term_id', 'name', 'description', 'category', 'start_date', 'end_date',
        'max_enrollment', 'status', 'registration_fee', 'monthly_fee', 'full_fee', 'is_coaching'
    ];

    protected function casts(): array
    {
        return [
            'is_coaching' => 'boolean',
        ];
    }

    public function term(): BelongsTo
    {
        return $this->belongsTo(Term::class);
    }

    public function courses(): HasMany
    {
        return $this->hasMany(Course::class);
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logAll();
    }

    public function scopeActive($query)
    {
        return $query->where('status', 'Active');
    }
}
