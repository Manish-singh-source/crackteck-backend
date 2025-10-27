<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class NonAmcProduct extends Model
{
    protected $table = 'non_amc_products';

    protected $fillable = [
        'non_amc_service_id',
        'product_name',
        'product_type',
        'product_brand',
        'model_no',
        'serial_no',
        'purchase_date',
        'product_image',
        'issue_type',
        'issue_description',
        'warranty_status',
    ];

    protected $casts = [
        'purchase_date' => 'date',
    ];

    /**
     * Get the non-AMC service that owns this product.
     */
    public function nonAmcService(): BelongsTo
    {
        return $this->belongsTo(NonAmcService::class, 'non_amc_service_id');
    }
}

