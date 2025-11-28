<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class AmcServiceVisit extends Model
{
    protected $table = 'amc_service_visits';

    protected $fillable = [
        'amc_service_id',
        'visit_number',
        'scheduled_date',
        'engineer_id',
        'issue_type',
        'report',
        'status',
    ];

    protected $casts = [
        'scheduled_date' => 'datetime',
    ];

    /**
     * Get the AMC service
     */
    public function amcService(): BelongsTo
    {
        return $this->belongsTo(AmcService::class, 'amc_service_id');
    }

    /**
     * Get the assigned engineer
     */
    public function engineer(): BelongsTo
    {
        return $this->belongsTo(Engineer::class, 'engineer_id');
    }

    /**
     * Scope for pending visits
     */
    public function scopePending($query)
    {
        return $query->where('status', 'Pending');
    }

    /**
     * Scope for upcoming visits
     */
    public function scopeUpcoming($query)
    {
        return $query->where('status', 'Upcoming');
    }

    /**
     * Scope for completed visits
     */
    public function scopeCompleted($query)
    {
        return $query->where('status', 'Completed');
    }

    /**
     * Get all engineer assignments for this visit
     */
    public function engineerAssignments(): HasMany
    {
        return $this->hasMany(AmcVisitEngineerAssignment::class, 'visit_id');
    }

    /**
     * Get active engineer assignment
     */
    public function activeAssignment(): HasOne
    {
        return $this->hasOne(AmcVisitEngineerAssignment::class, 'visit_id')
                    ->where('status', 'Active')
                    ->latest();
    }
}

