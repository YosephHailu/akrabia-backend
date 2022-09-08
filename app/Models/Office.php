<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Database\Eloquent\Builder;

class Office extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'responsible_person', 'description', 'website', 'avg_rating', 'phone', 'establishment_year', 'office_type_id', 'parent_office_id' ];

    public function scopeSearch(Builder $query, String $search)
    {
        return $query->where('name', 'like', "%$search%");
    }

    public function complaints()
    {
        return $this->morphMany(Complaint::class, 'complaintable');
    }

    function getComplaintCountByType($type) {
        return $this->complaints()->where('complaint_type', $type)->count();
    }

    function getClassTypeAttribute() {
        return 'office';
    }

    /**
     * Get the officeType that owns the Office
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function officeType(): BelongsTo
    {
        return $this->belongsTo(OfficeType::class);
    }
}
