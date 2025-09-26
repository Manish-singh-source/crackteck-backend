<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubCategorie extends Model
{
    protected $fillable = [
        'parent_category_id',
        'sub_categorie',
        'feature_image',
        'icon_image'
    ];

    /**
     * Get the parent category that owns this sub category
     */
    public function parent()
    {
        return $this->belongsTo(ParentCategorie::class, 'parent_category_id');
    }

    /**
     * Get all products that belong to this sub category
     */
    public function products()
    {
        return $this->hasMany(Product::class, 'sub_category_id');
    }

    /**
     * Get the feature image URL
     */
    public function getFeatureImageUrlAttribute()
    {
        return $this->feature_image ? asset($this->feature_image) : asset('images/default-category.png');
    }

    /**
     * Get the icon image URL
     */
    public function getIconImageUrlAttribute()
    {
        return $this->icon_image ? asset($this->icon_image) : asset('images/default-icon.png');
    }
}
