<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'vendor_name', 'po_number', 'invoice_number', 'invoice_pdf', 'invoice_image',
        'purchase_date', 'bill_due_date', 'bill_amount', 'product_name', 'hsn_code',
        'sku', 'brand_id', 'model_no', 'serial_no', 'parent_category_id', 'sub_category_id',
        'short_description', 'full_description', 'technical_specification', 'brand_warranty',
        'cost_price', 'selling_price', 'discount_price', 'tax', 'final_price',
        'stock_quantity', 'stock_status', 'warehouse_id', 'warehouse_rack_id',
        'rack_zone_area', 'rack_no', 'level_no', 'position_no', 'expiry_date', 'rack_status',
        'main_product_image', 'additional_product_images', 'datasheet_manual',
        'color_options', 'size_options', 'length_options', 'status'
    ];

    protected $casts = [
        'additional_product_images' => 'array',
        'purchase_date' => 'date',
        'bill_due_date' => 'date',
        'expiry_date' => 'date',
        'bill_amount' => 'decimal:2',
        'cost_price' => 'decimal:2',
        'selling_price' => 'decimal:2',
        'discount_price' => 'decimal:2',
        'tax' => 'decimal:2',
        'final_price' => 'decimal:2',
    ];

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function parentCategorie()
    {
        return $this->belongsTo(ParentCategorie::class, 'parent_category_id');
    }

    public function subCategorie()
    {
        return $this->belongsTo(SubCategorie::class, 'sub_category_id');
    }

    public function warehouse()
    {
        return $this->belongsTo(Warehouse::class);
    }

    public function warehouseRack()
    {
        return $this->belongsTo(WarehouseRack::class, 'warehouse_rack_id');
    }

    // Helper method to get color options from variations
    public function getColorOptionsAttribute()
    {
        return \App\Models\ProductVariantAttributeValue::whereHas('attribute', function($query) {
            $query->where('attribute_name', 'Color');
        })->pluck('attribute_value', 'id');
    }

    // Helper method to get size options from variations
    public function getSizeOptionsAttribute()
    {
        return \App\Models\ProductVariantAttributeValue::whereHas('attribute', function($query) {
            $query->where('attribute_name', 'Size');
        })->pluck('attribute_value', 'id');
    }

    // Helper method to get length options from variations
    public function getLengthOptionsAttribute()
    {
        return \App\Models\ProductVariantAttributeValue::whereHas('attribute', function($query) {
            $query->where('attribute_name', 'Length');
        })->pluck('attribute_value', 'id');
    }
}
