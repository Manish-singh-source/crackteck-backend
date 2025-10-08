<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CouponUsage extends Model
{
    use HasFactory;

    protected $table = 'coupon_usage';

    protected $fillable = [
        'coupon_id',
        'user_id',
        'ecommerce_order_id',
        'discount_amount',
        'used_at'
    ];

    protected $casts = [
        'discount_amount' => 'decimal:2',
        'used_at' => 'datetime',
    ];

    /**
     * Get the coupon that this usage record belongs to.
     */
    public function coupon()
    {
        return $this->belongsTo(Coupon::class);
    }

    /**
     * Get the user that used the coupon.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the order that this coupon usage is associated with.
     */
    public function order()
    {
        return $this->belongsTo(EcommerceOrder::class, 'ecommerce_order_id');
    }

    /**
     * Boot method to set used_at timestamp.
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($usage) {
            if (empty($usage->used_at)) {
                $usage->used_at = now();
            }
        });
    }
}
