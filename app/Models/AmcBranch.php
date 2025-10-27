<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AmcBranch extends Model
{
    protected $table = 'amc_branches';

    protected $fillable = [
        'amc_service_id',
        'branch_name',
        'address_line1',
        'address_line2',
        'city',
        'state',
        'country',
        'pincode',
        'contact_person',
        'contact_no',
    ];

    /**
     * Get the AMC service that owns this branch.
     */
    public function amcService(): BelongsTo
    {
        return $this->belongsTo(AmcService::class, 'amc_service_id');
    }

    /**
     * Get the products associated with this branch.
     */
    public function products(): HasMany
    {
        return $this->hasMany(AmcProduct::class, 'amc_branch_id');
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

