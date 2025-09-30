<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebsiteBanner extends Model
{
    use HasFactory;

    protected $fillable = [
        'banner_title',
        'banner_heading',
        'banner_sub_heading',
        'banner_url',
        'banner_description',
        'button_text',
        'website_banner',
        'status',
        'sort_order'
    ];

    protected $casts = [
        'sort_order' => 'integer',
    ];

    /**
     * Scope to get only active banners
     */
    public function scopeActive($query)
    {
        return $query->where('status', '1');
    }

    /**
     * Scope to get banners ordered by sort_order
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order', 'asc');
    }

    /**
     * Get the banner image URL
     */
    public function getBannerImageUrlAttribute()
    {
        return $this->website_banner ? asset($this->website_banner) : asset('images/default-banner.png');
    }
}
