<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Carbon\Carbon;

class Coupon extends Model
{
    use HasFactory;

    protected $fillable = [
        'coupon_code',
        'coupon_title',
        'coupon_description',
        'discount_type',
        'discount_value',
        'min_purchase_amount',
        'start_date',
        'end_date',
        'total_usage_limit',
        'usage_limit_per_customer',
        'current_usage_count',
        'status'
    ];

    protected $casts = [
        'discount_value' => 'decimal:2',
        'min_purchase_amount' => 'decimal:2',
        'start_date' => 'datetime',
        'end_date' => 'datetime',
        'total_usage_limit' => 'integer',
        'usage_limit_per_customer' => 'integer',
        'current_usage_count' => 'integer',
    ];

    /**
     * Boot method to generate coupon code if not provided.
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($coupon) {
            if (empty($coupon->coupon_code)) {
                $coupon->coupon_code = self::generateCouponCode();
            }
        });
    }

    /**
     * Generate a unique coupon code.
     */
    public static function generateCouponCode($length = 8)
    {
        do {
            $code = strtoupper(Str::random($length));
        } while (self::where('coupon_code', $code)->exists());

        return $code;
    }

    /**
     * Get the categories that this coupon applies to.
     */
    public function categories()
    {
        return $this->belongsToMany(ParentCategorie::class, 'coupon_categories', 'coupon_id', 'parent_category_id');
    }

    /**
     * Get the products that this coupon applies to.
     */
    public function products()
    {
        return $this->belongsToMany(EcommerceProduct::class, 'coupon_products', 'coupon_id', 'ecommerce_product_id');
    }

    /**
     * Get the usage records for this coupon.
     */
    public function usageRecords()
    {
        return $this->hasMany(CouponUsage::class);
    }

    /**
     * Scope to get only active coupons.
     */
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    /**
     * Scope to get coupons that are currently valid (within date range).
     */
    public function scopeValid($query)
    {
        $now = Carbon::now();
        return $query->where('start_date', '<=', $now)
                    ->where('end_date', '>=', $now);
    }

    /**
     * Check if the coupon is currently valid.
     */
    public function isValid()
    {
        $now = Carbon::now();
        return $this->status === 'active' 
            && $this->start_date <= $now 
            && $this->end_date >= $now;
    }

    /**
     * Check if the coupon has reached its total usage limit.
     */
    public function hasReachedTotalLimit()
    {
        if (!$this->total_usage_limit) {
            return false;
        }
        
        return $this->current_usage_count >= $this->total_usage_limit;
    }

    /**
     * Check if a user has reached their usage limit for this coupon.
     */
    public function hasUserReachedLimit($userId)
    {
        if (!$this->usage_limit_per_customer) {
            return false;
        }
        
        $userUsageCount = $this->usageRecords()->where('user_id', $userId)->count();
        return $userUsageCount >= $this->usage_limit_per_customer;
    }

    /**
     * Check if the coupon applies to a given cart total.
     */
    public function meetsMinimumPurchase($cartTotal)
    {
        if (!$this->min_purchase_amount) {
            return true;
        }
        
        return $cartTotal >= $this->min_purchase_amount;
    }

    /**
     * Calculate discount amount for given cart items.
     */
    public function calculateDiscount($cartItems)
    {
        $applicableTotal = $this->getApplicableTotal($cartItems);
        
        if ($applicableTotal <= 0) {
            return 0;
        }
        
        if ($this->discount_type === 'percentage') {
            return ($applicableTotal * $this->discount_value) / 100;
        } else {
            // Fixed amount - ensure it doesn't exceed applicable total
            return min($this->discount_value, $applicableTotal);
        }
    }

    /**
     * Get the total amount that this coupon applies to from cart items.
     */
    protected function getApplicableTotal($cartItems)
    {
        $applicableTotal = 0;
        
        foreach ($cartItems as $item) {
            if ($this->appliesToProduct($item->ecommerceProduct)) {
                $price = $item->ecommerceProduct->warehouseProduct->selling_price ?? 0;
                $applicableTotal += $price * $item->quantity;
            }
        }
        
        return $applicableTotal;
    }

    /**
     * Check if this coupon applies to a specific product.
     */
    public function appliesToProduct($product)
    {
        // If no specific products or categories are set, applies to all
        if ($this->products->isEmpty() && $this->categories->isEmpty()) {
            return true;
        }
        
        // Check if product is specifically included
        if ($this->products->contains('id', $product->id)) {
            return true;
        }
        
        // Check if product's category is included
        if ($product->warehouseProduct && $product->warehouseProduct->parentCategorie) {
            $productCategoryId = $product->warehouseProduct->parent_category_id;
            if ($this->categories->contains('id', $productCategoryId)) {
                return true;
            }
        }
        
        return false;
    }

    /**
     * Get formatted discount value for display.
     */
    public function getFormattedDiscountAttribute()
    {
        if ($this->discount_type === 'percentage') {
            return $this->discount_value . '%';
        } else {
            return '₹' . number_format($this->discount_value, 2);
        }
    }

    /**
     * Get status badge class for UI.
     */
    public function getStatusBadgeClassAttribute()
    {
        return $this->status === 'active' ? 'bg-success-subtle text-success' : 'bg-danger-subtle text-danger';
    }

    /**
     * Get status text for display.
     */
    public function getStatusTextAttribute()
    {
        return ucfirst($this->status);
    }
}
