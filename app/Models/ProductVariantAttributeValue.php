<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductVariantAttributeValue extends Model
{
    //
    public function attribute()
    {
        return $this->belongsTo(ProductVariantAttribute::class);
    }
}
