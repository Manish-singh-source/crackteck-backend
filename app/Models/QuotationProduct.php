<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class QuotationProduct extends Model
{
    use HasFactory, HasFactory;

    protected $fillable = [
        'quotation_id',
        'product_name',
        'hsn_code',
        'sku',
        'price',
        'quantity',
        'tax',
        'total',
    ];

    /**
     * Get the quotation that owns the product.
     */
    public function quotation(): BelongsTo
    {
        return $this->belongsTo(Quotation::class, 'quotation_id');
    }
}

