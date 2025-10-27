<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class NonAmcService extends Model
{
    protected $table = 'non_amc_services';

    protected $fillable = [
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
        'priority_level',
        'additional_notes',
        'total_amount',
        'status',
        'created_by',
    ];

    protected $casts = [
        'dob' => 'date',
        'total_amount' => 'decimal:2',
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
}

