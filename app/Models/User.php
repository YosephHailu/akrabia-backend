<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Support\Str;

class User extends Authenticatable implements HasMedia
{
    use HasApiTokens, HasFactory, Notifiable, InteractsWithMedia;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'current_location',
        'password',
        'badge_id',
        'description',
        'status',
        'verified'
    ];

    public function getUserImageAttribute()
    {
        return Str::replaceFirst('http://localhost', url(''), $this->getFirstMediaUrl('USER_IMAGE'));
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'current_location' => 'object',
    ];

    public function hasRole($role)
    {
        return $this->role == $role;
    }

    public function hasAnyRole($expression)
    {
        foreach (explode('|', $expression) as $value) {
            if ($this->hasRole($value)) {
                return true;
            }
        }
        return false;
    }

    /**
     * Get all of the jobPreferences for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function jobPreferences(): HasMany
    {
        return $this->hasMany(JobPreference::class);
    }
}
