<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NonAmcEngineerAssignment extends Model
{
    //
    protected $table = 'non_amc_engineer_assignments';

    protected $fillable = [
        'non_amc_service_id',
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
     * Get the non-AMC service
     */
    public function nonAmcService()
    {
        return $this->belongsTo(NonAmcService::class, 'non_amc_service_id');
    }

    /**
     * Get the individual engineer
     */
    public function engineer()
    {
        return $this->belongsTo(Engineer::class, 'engineer_id');
    }

    /**
     * Get the supervisor
     */
    public function supervisor()
    {
        return $this->belongsTo(Engineer::class, 'supervisor_id');
    }

    /**
     * Get group engineers (for group assignments)
     */
    public function groupEngineers()
    {
        return $this->belongsToMany(Engineer::class, 'non_amc_group_engineers', 'assignment_id', 'engineer_id')
                    ->withPivot('is_supervisor')
                    ->withTimestamps();
    }   
}
