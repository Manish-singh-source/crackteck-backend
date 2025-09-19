<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EcommerceProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'warehouse_product_id',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'meta_product_url_slug',
        'with_installation',
        'company_warranty',
        'ecommerce_short_description',
        'ecommerce_full_description',
        'ecommerce_technical_specification',
        'min_order_qty',
        'max_order_qty',
        'product_weight',
        'product_dimensions',
        'shipping_charges',
        'shipping_class',
        'is_featured',
        'is_best_seller',
        'is_suggested',
        'is_todays_deal',
        'product_tags',
        'ecommerce_status',
        'total_sold'
    ];

    protected $casts = [
        'with_installation' => 'array',
        'product_tags' => 'array',
        'shipping_charges' => 'decimal:2',
        'is_featured' => 'boolean',
        'is_best_seller' => 'boolean',
        'is_suggested' => 'boolean',
        'is_todays_deal' => 'boolean',
        'min_order_qty' => 'integer',
        'max_order_qty' => 'integer',
        'total_sold' => 'integer',
    ];

    /**
     * Get the warehouse product that this e-commerce product is based on.
     */
    public function warehouseProduct()
    {
        return $this->belongsTo(Product::class, 'warehouse_product_id');
    }

    /**
     * Get the brand through warehouse product relationship.
     */
    public function brand()
    {
        return $this->hasOneThrough(Brand::class, Product::class, 'id', 'id', 'warehouse_product_id', 'brand_id');
    }

    /**
     * Get the parent category through warehouse product relationship.
     */
    public function parentCategory()
    {
        return $this->hasOneThrough(ParentCategorie::class, Product::class, 'id', 'id', 'warehouse_product_id', 'parent_category_id');
    }

    /**
     * Get the sub category through warehouse product relationship.
     */
    public function subCategory()
    {
        return $this->hasOneThrough(SubCategorie::class, Product::class, 'id', 'id', 'warehouse_product_id', 'sub_category_id');
    }

    /**
     * Scope for active e-commerce products.
     */
    public function scopeActive($query)
    {
        return $query->where('ecommerce_status', 'active');
    }

    /**
     * Scope for featured products.
     */
    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    /**
     * Scope for best seller products.
     */
    public function scopeBestSeller($query)
    {
        return $query->where('is_best_seller', true);
    }

    /**
     * Scope for today's deal products.
     */
    public function scopeTodaysDeal($query)
    {
        return $query->where('is_todays_deal', true);
    }

    /**
     * Get the product name from warehouse product.
     */
    public function getProductNameAttribute()
    {
        return $this->warehouseProduct->product_name ?? '';
    }

    /**
     * Get the SKU from warehouse product.
     */
    public function getSkuAttribute()
    {
        return $this->warehouseProduct->sku ?? '';
    }

    /**
     * Get the main product image from warehouse product.
     */
    public function getMainProductImageAttribute()
    {
        return $this->warehouseProduct->main_product_image ?? '';
    }

    /**
     * Get the selling price from warehouse product.
     */
    public function getSellingPriceAttribute()
    {
        return $this->warehouseProduct->selling_price ?? 0;
    }

    /**
     * Get the discount price from warehouse product.
     */
    public function getDiscountPriceAttribute()
    {
        return $this->warehouseProduct->discount_price ?? 0;
    }

    /**
     * Get the stock quantity from warehouse product.
     */
    public function getStockQuantityAttribute()
    {
        return $this->warehouseProduct->stock_quantity ?? 0;
    }

    /**
     * Get the stock status from warehouse product.
     */
    public function getStockStatusAttribute()
    {
        return $this->warehouseProduct->stock_status ?? 'Out of Stock';
    }

    /**
     * Generate URL slug from product name.
     */
    public function generateUrlSlug()
    {
        $slug = \Str::slug($this->product_name);
        $originalSlug = $slug;
        $counter = 1;

        while (self::where('meta_product_url_slug', $slug)->where('id', '!=', $this->id)->exists()) {
            $slug = $originalSlug . '-' . $counter;
            $counter++;
        }

        return $slug;
    }

    /**
     * Boot method to handle model events.
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->meta_product_url_slug)) {
                $model->meta_product_url_slug = $model->generateUrlSlug();
            }
        });
    }
}
