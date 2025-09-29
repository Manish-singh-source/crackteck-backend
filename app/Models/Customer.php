<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //
    protected $guarded = [];

    public function address()
    {
        return $this->hasOne(CustomerAddressDetails::class, 'customer_id');
    }

    public function branches()
    {
        return $this->hasMany(CustomerAddressDetails::class, 'customer_id');
    }
}
