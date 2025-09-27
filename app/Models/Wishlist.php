<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Customer;

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
     * Get the customer that owns the wishlist item.
     */
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'user_id');
    }

    /**
     * Get the user that owns the wishlist item.
     * @deprecated Use customer() instead
     */
    public function user()
    {
        return $this->belongsTo(Customer::class, 'user_id');
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
