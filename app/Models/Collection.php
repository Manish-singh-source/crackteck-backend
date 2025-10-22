<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Collection extends Model
{
    protected $fillable = [
        'title',
        'description',
        'image',
        'status'
    ];

    protected $casts = [
        'status' => 'boolean',
    ];

    /**
     * Get all categories associated with this collection
     */
    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(ParentCategorie::class, 'collection_category', 'collection_id', 'category_id')
                    ->withTimestamps();
    }

    /**
     * Get all products that belong to categories in this collection
     */
    public function products()
    {
        $categoryIds = $this->categories()->pluck('parent_categories.id');
        return Product::whereIn('parent_category_id', $categoryIds);
    }

    /**
     * Scope to get only active collections
     */
    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    /**
     * Get the collection image URL
     */
    public function getImageUrlAttribute()
    {
        return $this->image ? asset($this->image) : asset('images/default-collection.png');
    }

    /**
     * Get the collection image path for storage
     */
    public function getImagePathAttribute()
    {
        return 'public/images/collections/';
    }

    /**
     * Get the count of categories in this collection
     */
    public function getCategoriesCountAttribute()
    {
        return $this->categories()->count();
    }

    /**
     * Get the count of products in this collection
     */
    public function getProductsCountAttribute()
    {
        $categoryIds = $this->categories()->pluck('parent_categories.id');
        return Product::whereIn('parent_category_id', $categoryIds)->count();
    }
}
