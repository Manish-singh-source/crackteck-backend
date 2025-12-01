<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class NonAmcService extends Model
{
    protected $table = 'non_amc_services';

    protected $fillable = [
        'customer_id',
        'source_type',
        'first_name',
        'last_name',
        'phone',
        'email',
        'dob',
        'gender',
        'customer_type',
        'address_line1',
        'address_line2',
        'city',
        'state',
        'country',
        'pincode',
        'company_name',
        'company_address',
        'gst_no',
        'pan_no',
        'profile_image',
        'customer_image',
        'service_type',
        'problem_type',
        'priority_level',
        'additional_notes',
        'remarks',
        'total_amount',
        'status',
        'assigned_engineer_id',
        'previous_engineer_id',
        'requested_at',
        'created_by',
    ];

    protected $casts = [
        'dob' => 'date',
        'total_amount' => 'decimal:2',
        'requested_at' => 'datetime',
    ];

    /**
     * Get the products associated with this service.
     */
    public function products(): HasMany
    {
        return $this->hasMany(NonAmcProduct::class, 'non_amc_service_id');
    }

    /**
     * Get the user who created this service request.
     */
    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    /**
     * Get the full name of the customer.
     */
    public function getFullNameAttribute(): string
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    /**
     * Get the full address.
     */
    public function getFullAddressAttribute(): string
    {
        $parts = array_filter([
            $this->address_line1,
            $this->address_line2,
            $this->city,
            $this->state,
            $this->country,
            $this->pincode,
        ]);
        
        return implode(', ', $parts);
    }

    /**
     * Get active engineer assignment
     */
    public function activeAssignment()
    {
        return $this->hasOne(NonAmcEngineerAssignment::class, 'non_amc_service_id')
                    ->where('status', 'Active')
                    ->latest();
    }

    /**
     * Get engineer assignments for this non-AMC service
     */
    public function engineerAssignments(): HasMany
    {
        return $this->hasMany(NonAmcEngineerAssignment::class, 'non_amc_service_id');
    }

    /**
     * Get the customer associated with this service.
     */
    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    /**
     * Get the assigned engineer.
     */
    public function assignedEngineer(): BelongsTo
    {
        return $this->belongsTo(Engineer::class, 'assigned_engineer_id');
    }

    /**
     * Get the previous engineer.
     */
    public function previousEngineer(): BelongsTo
    {
        return $this->belongsTo(Engineer::class, 'previous_engineer_id');
    }

    /**
     * Get human-readable source type label.
     */
    public function getSourceTypeLabelAttribute(): string
    {
        return match($this->source_type) {
            'ecommerce_non_amc_page' => 'E-commerce NON AMC',
            'customer_installation_page' => 'Customer Installation',
            'customer_repairing_page' => 'Customer Repairing',
            'admin_panel' => 'Admin Panel',
            default => $this->source_type,
        };
    }

    /**
     * Scope a query to only include active services.
     */
    public function scopeActive($query)
    {
        return $query->whereIn('status', ['In Progress', 'Pending']);
    }

    /**
     * Scope a query to only include inactive services.
     */
    public function scopeInactive($query)
    {
        return $query->whereIn('status', ['Completed', 'Cancelled']);
    }

    /**
     * Scope a query to only include pending services.
     */
    public function scopePending($query)
    {
        return $query->where('status', 'Pending');
    }

    /**
     * Check if engineer can be assigned (status must not be pending).
     */
    public function canAssignEngineer(): bool
    {
        return $this->status !== 'Pending';
    }
}

