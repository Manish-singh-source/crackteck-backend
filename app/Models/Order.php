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
        'amount'
    ];

    protected $casts = [
        'amount' => 'decimal:2',
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
}
