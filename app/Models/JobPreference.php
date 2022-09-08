<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Support\Str;

class JobPreference extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, SoftDeletes;

    protected $guarded = [];


    public function getIconImageAttribute()
    {
        return Str::replaceFirst('http://localhost', url(''), $this->getFirstMediaUrl('JOB_CATEGORY_ICON'));
    }


    /**
     * Get the provider that owns the Provider
     *
     * @return \Illuminate\Provider\Eloquent\Relations\BelongsTo
     */
    public function provider(): BelongsTo
    {
        return $this->belongsTo(Provider::class);
    }

    /**
     * Get the jobCategory that owns the JobPreference
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function jobCategory(): BelongsTo
    {
        return $this->belongsTo(JobCategory::class);
    }
}
