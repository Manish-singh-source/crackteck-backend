<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobAssignment extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'job_assignments';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'job_id',
        'engineer_id',
        'status',
        'assigned_at',
        'started_at',
        'completed_at',
        'notes',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'assigned_at' => 'datetime',
        'started_at' => 'datetime',
        'completed_at' => 'datetime',
    ];

    /**
     * Get the job that belongs to the assignment.
     */
    public function job()
    {
        return $this->belongsTo(Job::class, 'job_id');
    }

    /**
     * Get the engineer that belongs to the assignment.
     */
    public function engineer()
    {
        return $this->belongsTo(Engineer::class, 'engineer_id');
    }

    /**
     * Get the workflow associated with this assignment.
     */
    public function workflow()
    {
        return $this->hasOne(AssignmentWorkflow::class, 'job_assignment_id');
    }

    /**
     * Get the field issue created from this assignment (if escalated).
     */
    public function fieldIssue()
    {
        return $this->hasOne(FieldIssue::class, 'job_assignment_id');
    }
}

