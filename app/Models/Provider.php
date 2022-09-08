<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Provider extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, SoftDeletes;

    protected $guarded = [];

    protected $casts = [
        'location' => 'object',
    ];

    public function getProviderImageAttribute()
    {
        return Str::replaceFirst('http://localhost', url(''), $this->getFirstMediaUrl('PROVIDER_PHOTO'));
    }

    /**
     * Get all of the JobPreferences for the Provider
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function JobPreferences(): HasMany
    {
        return $this->hasMany(JobPreference::class);
    }
}
