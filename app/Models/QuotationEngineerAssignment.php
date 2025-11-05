<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class QuotationEngineerAssignment extends Model
{
    protected $table = 'quotation_engineer_assignments';

    protected $fillable = [
        'quotation_id',
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
     * Get the quotation
     */
    public function quotation(): BelongsTo
    {
        return $this->belongsTo(Quotation::class, 'quotation_id');
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
        return $this->belongsToMany(Engineer::class, 'quotation_group_engineers', 'assignment_id', 'engineer_id')
                    ->withPivot('is_supervisor')
                    ->withTimestamps();
    }
}

