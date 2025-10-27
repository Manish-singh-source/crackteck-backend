<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AmcEngineerAssignment extends Model
{
    protected $table = 'amc_engineer_assignments';

    protected $fillable = [
        'amc_service_id',
        'assignment_type',
        'engineer_id',
        'group_name',
        'supervisor_id',
        'status',
        'assigned_at',
        'notes',
    ];

    protected $casts = [
        'assigned_at' => 'datetime',
    ];

    /**
     * Get the AMC service
     */
    public function amcService(): BelongsTo
    {
        return $this->belongsTo(AmcService::class, 'amc_service_id');
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
        return $this->belongsToMany(Engineer::class, 'amc_group_engineers', 'assignment_id', 'engineer_id')
                    ->withPivot('is_supervisor')
                    ->withTimestamps();
    }

    /**
     * Get all group engineer records
     */
    public function groupMembers(): HasMany
    {
        return $this->hasMany(AmcGroupEngineer::class, 'assignment_id');
    }
}

