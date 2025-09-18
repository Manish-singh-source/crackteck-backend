<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ScrapItem extends Model
{
    protected $fillable = [
        'product_id',
        'product_serial_id',
        'serial_number',
        'product_name',
        'product_sku',
        'reason',
        'quantity_scrapped',
        'scrapped_at',
        'scrapped_by'
    ];

    protected $casts = [
        'scrapped_at' => 'datetime',
        'quantity_scrapped' => 'integer'
    ];

    /**
     * Get the product that was scrapped
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Get the product serial that was scrapped
     */
    public function productSerial(): BelongsTo
    {
        return $this->belongsTo(ProductSerial::class);
    }
}
