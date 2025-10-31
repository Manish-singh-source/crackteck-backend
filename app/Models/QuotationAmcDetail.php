<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class QuotationAmcDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'quotation_id',
        'amc_plan_id',
        'plan_duration',
        'total_amount',
        'plan_start_date',
        'plan_end_date',
        'priority_level',
        'additional_notes',
    ];

    /**
     * Get the quotation that owns the AMC detail.
     */
    public function quotation(): BelongsTo
    {
        return $this->belongsTo(Quotation::class, 'quotation_id');
    }

    /**
     * Get the AMC plan associated with this detail.
     */
    public function amcPlan(): BelongsTo
    {
        return $this->belongsTo(AMC::class, 'amc_plan_id');
    }
}

