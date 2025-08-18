<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomerAddressDetails extends Model
{
    //
    protected $guarded = [];

    public function personal()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }
}
