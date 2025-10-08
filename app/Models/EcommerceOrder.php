<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class EcommerceOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'order_number',
        'order_source',
        'email',
        'shipping_first_name',
        'shipping_last_name',
        'shipping_country',
        'shipping_state',
        'shipping_city',
        'shipping_zipcode',
        'shipping_address_line_1',
        'shipping_address_line_2',
        'shipping_phone',
        'billing_same_as_shipping',
        'billing_first_name',
        'billing_last_name',
        'billing_country',
        'billing_state',
        'billing_city',
        'billing_zipcode',
        'billing_address_line_1',
        'billing_address_line_2',
        'billing_phone',
        'payment_method',
        'card_name',
        'card_last_four',
        'card_expiry',
        'subtotal',
        'shipping_charges',
        'discount_amount',
        'coupon_code',
        'coupon_id',
        'total_amount',
        'status',
        'notes',
        'confirmed_at',
        'shipped_at',
        'delivered_at'
    ];

    protected $casts = [
        'billing_same_as_shipping' => 'boolean',
        'subtotal' => 'decimal:2',
        'shipping_charges' => 'decimal:2',
        'discount_amount' => 'decimal:2',
        'total_amount' => 'decimal:2',
        'confirmed_at' => 'datetime',
        'shipped_at' => 'datetime',
        'delivered_at' => 'datetime',
    ];

    /**
     * Boot method to generate order number.
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($order) {
            if (empty($order->order_number)) {
                $order->order_number = self::generateOrderNumber();
            }
        });
    }

    /**
     * Get the user that owns the order.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the order items for this order.
     */
    public function orderItems()
    {
        return $this->hasMany(EcommerceOrderItem::class);
    }

    /**
     * Get the coupon that was applied to this order.
     */
    public function coupon()
    {
        return $this->belongsTo(Coupon::class);
    }

    /**
     * Get the coupon usage record for this order.
     */
    public function couponUsage()
    {
        return $this->hasOne(CouponUsage::class, 'ecommerce_order_id');
    }

    /**
     * Scope to get orders for a specific user.
     */
    public function scopeForUser($query, $userId)
    {
        return $query->where('user_id', $userId);
    }

    /**
     * Scope to get orders by status.
     */
    public function scopeByStatus($query, $status)
    {
        return $query->where('status', $status);
    }

    /**
     * Get shipping full name.
     */
    public function getShippingFullNameAttribute()
    {
        return $this->shipping_first_name . ' ' . $this->shipping_last_name;
    }

    /**
     * Get billing full name.
     */
    public function getBillingFullNameAttribute()
    {
        if ($this->billing_same_as_shipping) {
            return $this->shipping_full_name;
        }
        return $this->billing_first_name . ' ' . $this->billing_last_name;
    }

    /**
     * Get formatted shipping address.
     */
    public function getShippingAddressAttribute()
    {
        $address = $this->shipping_address_line_1;
        if ($this->shipping_address_line_2) {
            $address .= ', ' . $this->shipping_address_line_2;
        }
        $address .= ', ' . $this->shipping_city . ', ' . $this->shipping_state . ' ' . $this->shipping_zipcode . ', ' . $this->shipping_country;
        
        return $address;
    }

    /**
     * Get formatted billing address.
     */
    public function getBillingAddressAttribute()
    {
        if ($this->billing_same_as_shipping) {
            return $this->shipping_address;
        }

        $address = $this->billing_address_line_1;
        if ($this->billing_address_line_2) {
            $address .= ', ' . $this->billing_address_line_2;
        }
        $address .= ', ' . $this->billing_city . ', ' . $this->billing_state . ' ' . $this->billing_zipcode . ', ' . $this->billing_country;
        
        return $address;
    }

    /**
     * Generate unique order number.
     */
    public static function generateOrderNumber()
    {
        do {
            $orderNumber = 'ORD-' . date('Y') . '-' . strtoupper(Str::random(8));
        } while (self::where('order_number', $orderNumber)->exists());

        return $orderNumber;
    }

    /**
     * Calculate order totals.
     */
    public function calculateTotals()
    {
        $subtotal = $this->orderItems->sum('total_price');
        $shippingCharges = $this->orderItems->sum('shipping_charges');
        
        $this->update([
            'subtotal' => $subtotal,
            'shipping_charges' => $shippingCharges,
            'total_amount' => $subtotal + $shippingCharges - $this->discount_amount
        ]);
    }

    /**
     * Get total items count.
     */
    public function getTotalItemsAttribute()
    {
        return $this->orderItems->sum('quantity');
    }

    /**
     * Check if order can be cancelled.
     */
    public function canBeCancelled()
    {
        return in_array($this->status, ['pending', 'confirmed']);
    }

    /**
     * Update order status.
     */
    public function updateStatus($status)
    {
        $this->status = $status;
        
        switch ($status) {
            case 'confirmed':
                $this->confirmed_at = now();
                break;
            case 'shipped':
                $this->shipped_at = now();
                break;
            case 'delivered':
                $this->delivered_at = now();
                break;
        }
        
        $this->save();
    }
}
