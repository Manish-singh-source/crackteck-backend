<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AmcProduct extends Model
{
    protected $table = 'amc_products';

    protected $fillable = [
        'amc_service_id',
        'amc_branch_id',
        'product_name',
        'product_type',
        'product_brand',
        'model_no',
        'serial_no',
        'purchase_date',
        'product_image',
        'warranty_status',
    ];

    protected $casts = [
        'purchase_date' => 'date',
    ];

    /**
     * Get the AMC service that owns this product.
     */
    public function amcService(): BelongsTo
    {
        return $this->belongsTo(AmcService::class, 'amc_service_id');
    }

    /**
     * Get the branch associated with this product.
     */
    public function branch(): BelongsTo
    {
        return $this->belongsTo(AmcBranch::class, 'amc_branch_id');
    }
}

