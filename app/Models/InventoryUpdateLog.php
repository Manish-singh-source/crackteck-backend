<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryUpdateLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'ecommerce_order_id',
        'old_quantity',
        'ordered_quantity',
        'new_quantity',
        'order_number',
        'update_type',
        'notes'
    ];

    protected $casts = [
        'old_quantity' => 'integer',
        'ordered_quantity' => 'integer',
        'new_quantity' => 'integer',
    ];

    /**
     * Get the product that this log entry belongs to.
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Get the e-commerce order that triggered this update.
     */
    public function ecommerceOrder()
    {
        return $this->belongsTo(EcommerceOrder::class);
    }

    /**
     * Scope to get logs for a specific product.
     */
    public function scopeForProduct($query, $productId)
    {
        return $query->where('product_id', $productId);
    }

    /**
     * Scope to get logs for a specific order.
     */
    public function scopeForOrder($query, $orderId)
    {
        return $query->where('ecommerce_order_id', $orderId);
    }

    /**
     * Scope to get recent logs.
     */
    public function scopeRecent($query, $days = 30)
    {
        return $query->where('created_at', '>=', now()->subDays($days));
    }
}
