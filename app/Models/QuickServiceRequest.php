<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuickServiceRequest extends Model
{
    //
    protected $fillable = [
        'quick_service_id',
        'customer_id',
        'product_name',
        'model_no',
        'sku',
        'hsn',
        'brand',
        'issue',
        'image',
        'status',
    ];

    protected $casts = [
        'status' => 'string',
    ];

    /**
     * Get the quick service
     */
    public function quickService()
    {
        return $this->belongsTo(QuickService::class);
    }

    /**
     * Get the customer
     */
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    /**
     * Get active engineer assignment
     */
    public function activeAssignment()
    {
        return $this->hasOne(QuickServiceEngineerAssignment::class, 'quick_service_request_id')
                    ->where('status', 'Active')
                    ->latest();
    }

    /**
     * Get all engineer assignments
     */
    public function engineerAssignments()
    {
        return $this->hasMany(QuickServiceEngineerAssignment::class, 'quick_service_request_id');
    }

    /**
     * Scope a query to only include pending requests
     */
    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    /**
     * Scope a query to only include processing requests
     */
    public function scopeProcessing($query)
    {
        return $query->where('status', 'processing');
    }

    /**
     * Scope a query to only include active requests
     */
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    /**
     * Scope a query to only include processing or active requests
     */
    public function scopeProcessingOrActive($query)
    {
        return $query->whereIn('status', ['processing', 'active']);
    }

}
