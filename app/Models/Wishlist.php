<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'ecommerce_product_id',
    ];

    /**
     * Get the user that owns the wishlist item.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the e-commerce product associated with the wishlist item.
     */
    public function ecommerceProduct()
    {
        return $this->belongsTo(EcommerceProduct::class);
    }

    /**
     * Scope to get wishlist items for a specific user.
     */
    public function scopeForUser($query, $userId)
    {
        return $query->where('user_id', $userId);
    }

    /**
     * Check if a product is already in user's wishlist.
     */
    public static function isInWishlist($userId, $ecommerceProductId)
    {
        return self::where('user_id', $userId)
                   ->where('ecommerce_product_id', $ecommerceProductId)
                   ->exists();
    }
}
