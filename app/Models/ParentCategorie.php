<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ParentCategorie extends Model
{
    protected $fillable = [
        'parent_categories',
        'category_image',
        'category_status_ecommerce',
        'url',
        'status',
        'sort_order'
    ];

    protected $casts = [
        'category_status_ecommerce' => 'boolean',
        'sort_order' => 'integer',
    ];

    /**
     * Get all child categories (sub categories) for this parent category
     */
    public function children()
    {
        return $this->hasMany(SubCategorie::class, 'parent_category_id');
    }

    /**
     * Get all products that belong to this parent category
     */
    public function products()
    {
        return $this->hasMany(Product::class, 'parent_category_id');
    }

    /**
     * Scope to get only active parent categories
     */
    public function scopeActive($query)
    {
        return $query->where('status', 'Active');
    }

    /**
     * Scope to get only e-commerce active parent categories
     */
    public function scopeEcommerceActive($query)
    {
        return $query->where('category_status_ecommerce', true);
    }

    /**
     * Scope to get categories ordered by sort_order
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order', 'asc');
    }

    /**
     * Get the category image URL
     */
    public function getCategoryImageUrlAttribute()
    {
        return $this->category_image ? asset($this->category_image) : asset('images/default-category.png');
    }
}
