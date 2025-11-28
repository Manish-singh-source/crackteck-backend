<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AmcService extends Model
{
    protected $table = 'amc_services';

    protected $fillable = [
        'service_id',
        'first_name',
        'last_name',
        'phone',
        'email',
        'dob',
        'gender',
        'customer_type',
        'company_name',
        'company_address',
        'gst_no',
        'pan_no',
        'profile_image',
        'customer_image',
        'amc_plan_id',
        'plan_duration',
        'plan_start_date',
        'plan_end_date',
        'priority_level',
        'additional_notes',
        'total_amount',
        'status',
        'created_by',
    ];

    protected $casts = [
        'dob' => 'date',
        'plan_start_date' => 'date',
        'plan_end_date' => 'date',
        'total_amount' => 'decimal:2',
    ];

    /**
     * Get the AMC plan associated with this service.
     */
    public function amcPlan(): BelongsTo
    {
        return $this->belongsTo(AMC::class, 'amc_plan_id');
    }

    /**
     * Get the branches for this AMC service.
     */
    public function branches(): HasMany
    {
        return $this->hasMany(AmcBranch::class, 'amc_service_id');
    }

    /**
     * Get the products for this AMC service.
     */
    public function products(): HasMany
    {
        return $this->hasMany(AmcProduct::class, 'amc_service_id');
    }

    /**
     * Get the user who created this AMC service.
     */
    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    /**
     * Get engineer assignments for this AMC service
     */
    public function engineerAssignments(): HasMany
    {
        return $this->hasMany(AmcEngineerAssignment::class, 'amc_service_id');
    }

    /**
     * Get active engineer assignment
     */
    public function activeAssignment()
    {
        return $this->hasOne(AmcEngineerAssignment::class, 'amc_service_id')
                    ->where('status', 'Active')
                    ->latest();
    }

    /**
     * Get the full name of the customer.
     */
    public function getFullNameAttribute(): string
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    /**
     * Scope a query to only include active AMC services.
     */
    public function scopeActive($query)
    {
        return $query->where('status', 'Active');
    }

    /**
     * Scope a query to only include pending AMC services.
     */
    public function scopePending($query)
    {
        return $query->where('status', 'Pending');
    }
}

