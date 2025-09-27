<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customer extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'dob' => 'date',
        ];
    }

    /**
     * Get the customer's primary address.
     */
    public function address()
    {
        return $this->hasOne(CustomerAddressDetails::class, 'customer_id');
    }

    /**
     * Get all branches for the customer.
     */
    public function branches()
    {
        return $this->hasMany(CustomerAddressDetails::class, 'customer_id');
    }

    /**
     * Get the customer's orders.
     */
    public function orders()
    {
        return $this->hasMany(Order::class, 'customer_id');
    }

    /**
     * Get the customer's wishlist items.
     */
    public function wishlists()
    {
        return $this->hasMany(Wishlist::class, 'user_id');
    }

    /**
     * Get the customer's wishlist products.
     */
    public function wishlistProducts()
    {
        return $this->belongsToMany(EcommerceProduct::class, 'wishlists', 'user_id', 'ecommerce_product_id')
                    ->withTimestamps();
    }

    /**
     * Get the customer's full name.
     */
    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }
}
