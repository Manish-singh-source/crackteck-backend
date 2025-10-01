<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductVariantAttribute extends Model
{
    /**
     * Get the values for this attribute
     */
    public function values()
    {
        return $this->hasMany(ProductVariantAttributeValue::class, 'attribute_id');
    }
}
