<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Quotation extends Model
{
    use LogsActivity, HasFactory;

    protected $fillable = [
        'user_id',
        'lead_id',
        'quote_id',
        'quote_date',
        'expiry_date',
    ];

    public function lead(): BelongsTo
    {
        return $this->belongsTo(Lead::class, 'lead_id', 'id');
    }

    /**
     * Get the products for the quotation.
     */
    public function products(): HasMany
    {
        return $this->hasMany(QuotationProduct::class, 'quotation_id');
    }

    /**
     * Get the AMC details for the quotation.
     */
    public function amcDetail(): HasOne
    {
        return $this->hasOne(QuotationAmcDetail::class, 'quotation_id');
    }

    /**
     * Get all engineer assignments for the quotation.
     */
    public function engineerAssignments(): HasMany
    {
        return $this->hasMany(QuotationEngineerAssignment::class, 'quotation_id');
    }

    /**
     * Get the active engineer assignment for the quotation.
     */
    public function activeAssignment(): HasOne
    {
        return $this->hasOne(QuotationEngineerAssignment::class, 'quotation_id')
                    ->where('status', 'Active')
                    ->with(['engineer', 'supervisor', 'groupEngineers']);
    }

    /**
     * Configure activity logging options.
     */
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['user_id', 'lead_id', 'quote_id', 'quote_date', 'expiry_date'])
            ->logOnlyDirty()
            ->dontSubmitEmptyLogs()
            ->setDescriptionForEvent(fn(string $eventName) => "Quotation {$eventName}");
    }
}
