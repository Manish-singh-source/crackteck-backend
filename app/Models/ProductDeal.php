<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class ProductDeal extends Model
{
    use HasFactory;

    protected $fillable = [
        'deal_title',
        'offer_start_date',
        'offer_end_date',
        'status',
    ];

    protected $casts = [
        'offer_start_date' => 'datetime',
        'offer_end_date' => 'datetime',
    ];

    /**
     * Get the deal items (products) that belong to this deal.
     */
    public function dealItems()
    {
        return $this->hasMany(ProductDealItem::class);
    }

    /**
     * Get the e-commerce products through deal items.
     */
    public function ecommerceProducts()
    {
        return $this->belongsToMany(EcommerceProduct::class, 'product_deal_items')
                    ->withPivot('original_price', 'discount_type', 'discount_value', 'offer_price')
                    ->withTimestamps();
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
        return $query->where('offer_start_date', '<=', $now)
                    ->where('offer_end_date', '>=', $now);
    }

    /**
     * Check if the deal is currently active and within date range.
     */
    public function isCurrentlyActive()
    {
        $now = Carbon::now();
        return $this->status === 'active'
            && $this->offer_start_date <= $now
            && $this->offer_end_date >= $now;
    }

    /**
     * Get time left for the deal.
     */
    public function getTimeLeftAttribute()
    {
        if ($this->offer_end_date < Carbon::now()) {
            return 'Expired';
        }

        $diff = Carbon::now()->diff($this->offer_end_date);

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
        return $this->offer_start_date->format('M d, Y H:i') . ' - ' . $this->offer_end_date->format('M d, Y H:i');
    }

    /**
     * Get time left in seconds for JavaScript countdown.
     */
    public function getTimeLeftSecondsAttribute()
    {
        if ($this->offer_end_date < Carbon::now()) {
            return 0;
        }

        return Carbon::now()->diffInSeconds($this->offer_end_date);
    }

    /**
     * Get total number of products in this deal.
     */
    public function getTotalProductsAttribute()
    {
        return $this->dealItems()->count();
    }

    /**
     * Get the minimum offer price from all deal items.
     */
    public function getMinOfferPriceAttribute()
    {
        return $this->dealItems()->min('offer_price') ?? 0;
    }

    /**
     * Get the maximum offer price from all deal items.
     */
    public function getMaxOfferPriceAttribute()
    {
        return $this->dealItems()->max('offer_price') ?? 0;
    }

    /**
     * Get the average discount percentage across all items.
     */
    public function getAverageDiscountAttribute()
    {
        $items = $this->dealItems;
        if ($items->isEmpty()) {
            return 0;
        }

        $totalSavings = 0;
        $totalOriginal = 0;

        foreach ($items as $item) {
            $totalSavings += ($item->original_price - $item->offer_price);
            $totalOriginal += $item->original_price;
        }

        if ($totalOriginal <= 0) {
            return 0;
        }

        return round(($totalSavings / $totalOriginal) * 100, 1);
    }

    /**
     * Check if deal has expired.
     */
    public function hasExpired()
    {
        return $this->offer_end_date < Carbon::now();
    }

    /**
     * Check if deal has started.
     */
    public function hasStarted()
    {
        return $this->offer_start_date <= Carbon::now();
    }
}
