<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class QuickServiceEngineerAssignment extends Model
{
    protected $table = 'quick_service_engineer_assignments';

    protected $fillable = [
        'quick_service_request_id',
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
     * Get the quick service request
     */
    public function quickServiceRequest(): BelongsTo
    {
        return $this->belongsTo(QuickServiceRequest::class, 'quick_service_request_id');
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
        return $this->belongsToMany(Engineer::class, 'quick_service_group_engineers', 'assignment_id', 'engineer_id')
                    ->withPivot('is_supervisor')
                    ->withTimestamps();
    }

    /**
     * Get all group engineer records
     */
    public function groupMembers(): HasMany
    {
        return $this->hasMany(QuickServiceGroupEngineer::class, 'assignment_id');
    }
}

