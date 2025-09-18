<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VendorPurchaseBill extends Model
{
    protected $fillable = [
        'purchase_bill_no',
        'vendor_name',
        'purchase_date',
        'total_amount',
        'payment_status',
        'notes',
        'attachment'
    ];

    protected $casts = [
        'purchase_date' => 'date',
        'total_amount' => 'decimal:2',
    ];

    /**
     * Get the attachment URL
     */
    public function getAttachmentUrlAttribute()
    {
        if ($this->attachment) {
            return asset($this->attachment);
        }
        return null;
    }

    /**
     * Get formatted total amount
     */
    public function getFormattedTotalAmountAttribute()
    {
        return '₹' . number_format($this->total_amount, 2);
    }

    /**
     * Get payment status badge class
     */
    public function getPaymentStatusBadgeClassAttribute()
    {
        return match($this->payment_status) {
            'Complete' => 'bg-success-subtle text-success',
            'Pending' => 'bg-warning-subtle text-warning',
            'Reject' => 'bg-danger-subtle text-danger',
            'Partially Paid' => 'bg-info-subtle text-info',
            default => 'bg-secondary-subtle text-secondary'
        };
    }
}
