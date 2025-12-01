<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class NonAmcEngineerAssignment extends Model
{
    protected $table = 'non_amc_engineer_assignments';

    protected $fillable = [
        'non_amc_service_id',
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
     * Get the non-AMC service
     */
    public function nonAmcService(): BelongsTo
    {
        return $this->belongsTo(NonAmcService::class, 'non_amc_service_id');
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
        return $this->belongsToMany(Engineer::class, 'non_amc_group_engineers', 'assignment_id', 'engineer_id')
                    ->withPivot('is_supervisor')
                    ->withTimestamps();
    }

    /**
     * Get all group engineer records
     */
    public function groupMembers(): HasMany
    {
        return $this->hasMany(NonAmcGroupEngineer::class, 'assignment_id');
    }

    /**
     * Get the new assignment this was transferred to
     */
    public function transferredToAssignment(): BelongsTo
    {
        return $this->belongsTo(NonAmcEngineerAssignment::class, 'transferred_to');
    }
}
