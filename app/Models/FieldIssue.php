<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FieldIssue extends Model
{
    protected $table = 'field_issues';

    protected $fillable = [
        'job_assignment_id',
        'job_id',
        'engineer_id',
        'customer_name',
        'customer_phone',
        'customer_email',
        'location',
        'issue_type',
        'issue_description',
        'priority',
        'reason_for_escalation',
        'escalation_notes',
        'status',
        'escalated_at',
        'completed_at',
    ];

    protected $casts = [
        'escalated_at' => 'datetime',
        'completed_at' => 'datetime',
    ];

    /**
     * Get the job assignment that this field issue belongs to.
     */
    public function jobAssignment()
    {
        return $this->belongsTo(JobAssignment::class, 'job_assignment_id');
    }

    /**
     * Get the job that this field issue belongs to.
     */
    public function job()
    {
        return $this->belongsTo(Job::class, 'job_id');
    }

    /**
     * Get the engineer assigned to this field issue.
     */
    public function engineer()
    {
        return $this->belongsTo(Engineer::class, 'engineer_id');
    }
}
