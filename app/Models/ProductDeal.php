<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class ProductDeal extends Model
{
    use HasFactory;

    protected $fillable = [
        'ecommerce_product_id',
        'deal_title',
        'original_price',
        'discount_type',
        'discount_value',
        'offer_price',
        'start_date',
        'end_date',
        'status',
    ];

    protected $casts = [
        'original_price' => 'decimal:2',
        'discount_value' => 'decimal:2',
        'offer_price' => 'decimal:2',
        'start_date' => 'date',
        'end_date' => 'date',
    ];

    /**
     * Get the e-commerce product that this deal belongs to.
     */
    public function ecommerceProduct()
    {
        return $this->belongsTo(EcommerceProduct::class);
    }

    /**
     * Scope for active deals.
     */
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    /**
     * Scope for current deals (within date range).
     */
    public function scopeCurrent($query)
    {
        $now = Carbon::now();
        return $query->where('start_date', '<=', $now)
                    ->where('end_date', '>=', $now);
    }

    /**
     * Check if the deal is currently active and within date range.
     */
    public function isCurrentlyActive()
    {
        $now = Carbon::now();
        return $this->status === 'active' 
            && $this->start_date <= $now 
            && $this->end_date >= $now;
    }

    /**
     * Get time left for the deal.
     */
    public function getTimeLeftAttribute()
    {
        if ($this->end_date < Carbon::now()) {
            return 'Expired';
        }

        $diff = Carbon::now()->diff($this->end_date);
        
        if ($diff->days > 0) {
            return $diff->days . ' days left';
        } elseif ($diff->h > 0) {
            return sprintf('%02d:%02d:%02d', $diff->h, $diff->i, $diff->s);
        } else {
            return sprintf('%02d:%02d', $diff->i, $diff->s);
        }
    }

    /**
     * Get formatted offer period.
     */
    public function getOfferPeriodAttribute()
    {
        return $this->start_date->format('M d') . ' - ' . $this->end_date->format('M d');
    }

    /**
     * Get discount display text.
     */
    public function getDiscountDisplayAttribute()
    {
        if ($this->discount_type === 'percentage') {
            return $this->discount_value . '%';
        } else {
            return '₹' . number_format($this->discount_value, 0);
        }
    }

    /**
     * Calculate savings amount.
     */
    public function getSavingsAmountAttribute()
    {
        return $this->original_price - $this->offer_price;
    }
}
