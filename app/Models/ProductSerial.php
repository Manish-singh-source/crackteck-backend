<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ProductSerial extends Model
{
    protected $fillable = [
        'product_id',
        'auto_generated_serial',
        'manual_serial',
        'final_serial',
        'is_manual',
        'status'
    ];

    protected $casts = [
        'is_manual' => 'boolean',
    ];

    /**
     * Relationship with Product
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Generate a unique auto serial number
     */
    public static function generateAutoSerial($productId)
    {
        $product = Product::find($productId);
        if (!$product) {
            return null;
        }

        // Generate serial based on product SKU + timestamp + random string
        $baseSerial = strtoupper($product->sku . '-' . date('Ymd') . '-' . Str::random(4));

        // Ensure uniqueness
        $counter = 1;
        $serial = $baseSerial;
        while (self::where('auto_generated_serial', $serial)->exists()) {
            $serial = $baseSerial . '-' . str_pad($counter, 2, '0', STR_PAD_LEFT);
            $counter++;
        }

        return $serial;
    }

    /**
     * Boot method to handle model events
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($productSerial) {
            // Set final_serial based on manual or auto-generated
            if ($productSerial->manual_serial) {
                $productSerial->final_serial = $productSerial->manual_serial;
                $productSerial->is_manual = true;
            } else {
                $productSerial->final_serial = $productSerial->auto_generated_serial;
                $productSerial->is_manual = false;
            }
        });

        static::updating(function ($productSerial) {
            // Update final_serial when manual_serial changes
            if ($productSerial->isDirty('manual_serial')) {
                if ($productSerial->manual_serial) {
                    $productSerial->final_serial = $productSerial->manual_serial;
                    $productSerial->is_manual = true;
                } else {
                    $productSerial->final_serial = $productSerial->auto_generated_serial;
                    $productSerial->is_manual = false;
                }
            }
        });
    }
}
