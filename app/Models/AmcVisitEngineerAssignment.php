<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AmcVisitEngineerAssignment extends Model
{
    protected $table = 'amc_visit_engineer_assignments';

    protected $fillable = [
        'visit_id',
        'assignment_type',
        'engineer_id',
        'group_name',
        'supervisor_id',
        'status',
        'assigned_at',
        'transferred_to',
        'transferred_at',
        'notes',
    ];

    protected $casts = [
        'assigned_at' => 'datetime',
        'transferred_at' => 'datetime',
    ];

    /**
     * Get the visit
     */
    public function visit(): BelongsTo
    {
        return $this->belongsTo(AmcServiceVisit::class, 'visit_id');
    }

    /**
     * Get the individual engineer
     */
    public function engineer(): BelongsTo
    {
        return $this->belongsTo(Engineer::class, 'engineer_id');
    }

    /**
     * Get the supervisor
     */
    public function supervisor(): BelongsTo
    {
        return $this->belongsTo(Engineer::class, 'supervisor_id');
    }

    /**
     * Get group engineers (for group assignments)
     */
    public function groupEngineers(): BelongsToMany
    {
        return $this->belongsToMany(Engineer::class, 'amc_visit_group_engineers', 'assignment_id', 'engineer_id')
                    ->withPivot('is_supervisor')
                    ->withTimestamps();
    }

    /**
     * Get all group engineer records
     */
    public function groupMembers(): HasMany
    {
        return $this->hasMany(AmcVisitGroupEngineer::class, 'assignment_id');
    }

    /**
     * Get the new assignment this was transferred to
     */
    public function transferredToAssignment(): BelongsTo
    {
        return $this->belongsTo(AmcVisitEngineerAssignment::class, 'transferred_to');
    }

    /**
     * Get assignments that were transferred from this assignment
     */
    public function transferredFromAssignments(): HasMany
    {
        return $this->hasMany(AmcVisitEngineerAssignment::class, 'transferred_to');
    }
}

