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
        'color_options' => 'json',
        'size_options' => 'json',
        'length_options' => 'json',
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

    /**
     * Relationship with ProductSerial
     */
    public function productSerials()
    {
        return $this->hasMany(ProductSerial::class);
    }

    /**
     * Get active product serials
     */
    public function activeSerials()
    {
        return $this->hasMany(ProductSerial::class)->where('status', 'active');
    }

    /**
     * Relationship with ScrapItem
     */
    public function scrapItems()
    {
        return $this->hasMany(ScrapItem::class);
    }

    /**
     * Relationship with EcommerceProduct
     */
    public function ecommerceProduct()
    {
        return $this->hasOne(EcommerceProduct::class, 'warehouse_product_id');
    }

    /**
     * Get formatted color options for display
     */
    public function getFormattedColorOptionsAttribute()
    {
        if (empty($this->color_options) || $this->color_options === '[]') {
            return 'No color options available';
        }

        if (is_string($this->color_options)) {
            $colors = json_decode($this->color_options, true);
        } else {
            $colors = $this->color_options;
        }

        if (empty($colors) || !is_array($colors)) {
            return 'No color options available';
        }

        return implode(', ', array_values($colors));
    }

    /**
     * Get formatted size options for display
     */
    public function getFormattedSizeOptionsAttribute()
    {
        if (empty($this->size_options) || $this->size_options === '[]') {
            return 'No size options available';
        }

        if (is_string($this->size_options)) {
            $sizes = json_decode($this->size_options, true);
        } else {
            $sizes = $this->size_options;
        }

        if (empty($sizes) || !is_array($sizes)) {
            return 'No size options available';
        }

        return implode(', ', array_values($sizes));
    }

    /**
     * Get formatted length options for display
     */
    public function getFormattedLengthOptionsAttribute()
    {
        if (empty($this->length_options) || $this->length_options === '[]') {
            return 'No length options available';
        }

        if (is_string($this->length_options)) {
            $lengths = json_decode($this->length_options, true);
        } else {
            $lengths = $this->length_options;
        }

        if (empty($lengths) || !is_array($lengths)) {
            return 'No length options available';
        }

        return implode(', ', array_values($lengths));
    }
}
