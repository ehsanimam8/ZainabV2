<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use Spatie\Permission\Traits\HasRoles;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;

#[Fillable(['name', 'first_name', 'last_name', 'phone', 'gender', 'metadata', 'email', 'password', 'household_id', 'independent_login'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable implements FilamentUser
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable, HasUuids, HasRoles, LogsActivity;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'independent_login' => 'boolean',
            'metadata' => 'array',
        ];
    }

    protected static function booted(): void
    {
        static::saving(function (User $user) {
            if ($user->first_name || $user->last_name) {
                $user->name = trim($user->first_name . ' ' . $user->last_name);
            }
        });
    }

    public function canAccessPanel(Panel $panel): bool
    {
        // Allow access if the user has a super_admin role, or just loosely check their email domain if needed.
        return $this->hasRole('super_admin') || str_ends_with($this->email, '@example.com');
    }

    public function household()
    {
        return $this->belongsTo(Household::class);
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logAll();
    }
}
