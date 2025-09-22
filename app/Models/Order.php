<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'customer_id',
        'invoice_file',
        'amount',
        'quantity',
        'delivery',
        'delivery_man_id',
        'status'
    ];

    protected $casts = [
        'amount' => 'decimal:2',
        'quantity' => 'integer',
    ];

    /**
     * Get the product that belongs to the order.
     */
    public function product()
    {
        return $this->belongsTo(EcommerceProduct::class, 'product_id');
    }

    /**
     * Get the customer that belongs to the order.
     */
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    /**
     * Get the delivery man that belongs to the order.
     */
    public function deliveryMan()
    {
        return $this->belongsTo(DeliveryMan::class, 'delivery_man_id');
    }
}
