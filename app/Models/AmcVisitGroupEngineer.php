<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AmcVisitGroupEngineer extends Model
{
    protected $table = 'amc_visit_group_engineers';

    protected $fillable = [
        'assignment_id',
        'engineer_id',
        'is_supervisor',
    ];

    protected $casts = [
        'is_supervisor' => 'boolean',
    ];

    /**
     * Get the assignment
     */
    public function assignment(): BelongsTo
    {
        return $this->belongsTo(AmcVisitEngineerAssignment::class, 'assignment_id');
    }

    /**
     * Get the engineer
     */
    public function engineer(): BelongsTo
    {
        return $this->belongsTo(Engineer::class, 'engineer_id');
    }
}

