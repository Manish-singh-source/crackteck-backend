<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GiveFeedback extends Model
{
    //
    protected $table = 'give_feedback';

    protected $fillable = [
        'customer_id',
        'service_type',
        'service_id',
        'rating',
        'comments',
    ];

    protected $casts = [
        'rating' => 'float',
    ];

    /**
     * Get the customer who gave this feedback.
     */
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    /**
     * Get the service associated with this feedback.
     */
    public function service()
    {
        switch ($this->service_type) {
            case 'amc':
                return $this->belongsTo(AmcService::class, 'service_id');
            case 'non_amc':
                return $this->belongsTo(NonAmcService::class, 'service_id');
            case 'quick_service':
                return $this->belongsTo(QuickServiceRequest::class, 'service_id');
            default:
                return null;
        }
    }   

}
