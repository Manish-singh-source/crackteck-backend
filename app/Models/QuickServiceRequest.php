<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuickServiceRequest extends Model
{
    //
    protected $fillable = [
        'quick_service_id',
        'customer_id',
        'product_name',
        'model_no',
        'sku',
        'hsn',
        'brand',
        'issue',
        'image',
    ];

    public function quickService()
    {
        return $this->belongsTo(QuickService::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

}
