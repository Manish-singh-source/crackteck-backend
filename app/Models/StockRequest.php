<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class StockRequest extends Model
{
    protected $fillable = [
        'requested_by',
        'request_date',
        'reason',
        'urgency_level',
        'approval_status',
        'final_status',
    ];

    protected $casts = [
        'request_date' => 'date',
        'urgency_level' => 'string',
    ];

    /**
     * Get the user who requested the stock.
     */
    public function requestedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'requested_by');
    }

    /**
     * Get the stock request items for this request.
     */
    public function stockRequestItems(): HasMany
    {
        return $this->hasMany(StockRequestItem::class);
    }

    /**
     * Get the total quantity of all items in this request.
     */
    public function getTotalQuantityAttribute(): int
    {
        return $this->stockRequestItems->sum('quantity');
    }

    /**
     * Get the count of distinct products in this request.
     */
    public function getItemCountAttribute(): int
    {
        return $this->stockRequestItems->count();
    }

    /**
     * Get urgency level badge class for UI.
     */
    public function getUrgencyBadgeClassAttribute(): string
    {
        return match($this->urgency_level) {
            'Low' => 'bg-success',
            'Medium' => 'bg-warning text-dark',
            'High' => 'bg-danger',
            'Critical' => 'bg-dark',
            default => 'bg-secondary',
        };
    }

    /**
     * Get approval status badge class for UI.
     */
    public function getApprovalBadgeClassAttribute(): string
    {
        return match($this->approval_status) {
            'Approved' => 'bg-success',
            'Rejected' => 'bg-danger',
            'Pending' => 'bg-secondary',
            default => 'bg-light text-dark',
        };
    }

    /**
     * Get final status badge class for UI.
     */
    public function getFinalBadgeClassAttribute(): string
    {
        return match($this->final_status) {
            'Completed' => 'bg-success',
            'Cancelled' => 'bg-danger',
            'Pending' => 'bg-secondary',
            default => 'bg-light text-dark',
        };
    }
}
