<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AssignmentWorkflow extends Model
{
    protected $table = 'assignment_workflows';

    protected $fillable = [
        'job_assignment_id',
        'client_connected_via',
        'client_confirmation',
        'remote_tool_used',
        'start_job_completed_at',
        'diagnosis_types',
        'diagnosis_notes',
        'diagnosis_completed_at',
        'fix_description',
        'before_screenshot',
        'after_screenshot',
        'logs_file',
        'action_taken_completed_at',
        'time_spent',
        'result',
        'client_feedback',
        'job_completed_at',
    ];

    protected $casts = [
        'diagnosis_types' => 'array',
        'start_job_completed_at' => 'datetime',
        'diagnosis_completed_at' => 'datetime',
        'action_taken_completed_at' => 'datetime',
        'job_completed_at' => 'datetime',
    ];

    /**
     * Get the job assignment that this workflow belongs to.
     */
    public function jobAssignment()
    {
        return $this->belongsTo(JobAssignment::class, 'job_assignment_id');
    }
}
