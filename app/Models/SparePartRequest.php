<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class SparePartRequest extends Model
{
    protected $fillable = [
        'product_id',
        'requested_by',
        'delivery_man_id',
        'request_date',
        'urgency_level',
        'quantity',
        'reason',
        'approval_status',
        'service_request_id',
    ];

    protected $casts = [
        'request_date' => 'date',
        'quantity' => 'integer',
    ];

    /**
     * Get the product associated with this spare part request.
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    /**
     * Get the engineer who requested the spare part.
     */
    public function engineer(): BelongsTo
    {
        return $this->belongsTo(Engineer::class, 'requested_by');
    }

    /**
     * Get the delivery man assigned to this request.
     */
    public function deliveryMan(): BelongsTo
    {
        return $this->belongsTo(DeliveryMan::class, 'delivery_man_id');
    }

    public function customerServiceRequest(): HasOne
    {
        return $this->hasOne(AmcService::class, 'id', 'service_request_id');
    }
}
