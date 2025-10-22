<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductDealItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_deal_id',
        'ecommerce_product_id',
        'original_price',
        'discount_type',
        'discount_value',
        'offer_price',
    ];

    protected $casts = [
        'original_price' => 'decimal:2',
        'discount_value' => 'decimal:2',
        'offer_price' => 'decimal:2',
    ];

    /**
     * Get the product deal that this item belongs to.
     */
    public function productDeal()
    {
        return $this->belongsTo(ProductDeal::class);
    }

    /**
     * Get the e-commerce product that this deal item is for.
     */
    public function ecommerceProduct()
    {
        return $this->belongsTo(EcommerceProduct::class);
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

    /**
     * Get savings percentage.
     */
    public function getSavingsPercentageAttribute()
    {
        if ($this->original_price <= 0) {
            return 0;
        }
        return round((($this->original_price - $this->offer_price) / $this->original_price) * 100, 1);
    }

    /**
     * Calculate offer price based on discount type and value.
     */
    public function calculateOfferPrice($originalPrice, $discountType, $discountValue)
    {
        if ($discountType === 'percentage') {
            return $originalPrice - ($originalPrice * $discountValue / 100);
        } else {
            return $originalPrice - $discountValue;
        }
    }

    /**
     * Validate discount value based on type.
     */
    public function validateDiscount($originalPrice, $discountType, $discountValue)
    {
        if ($discountType === 'percentage') {
            return $discountValue > 0 && $discountValue <= 100;
        } else {
            return $discountValue > 0 && $discountValue < $originalPrice;
        }
    }
}
