<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LeadBranch extends Model
{
    protected $table = 'lead_branches';

    protected $fillable = [
        'lead_id',
        'branch_name',
        'address_line1',
        'address_line2',
        'city',
        'state',
        'country',
        'pincode',
    ];

    /**
     * Get the lead that owns this branch.
     */
    public function lead(): BelongsTo
    {
        return $this->belongsTo(Lead::class, 'lead_id');
    }
}

