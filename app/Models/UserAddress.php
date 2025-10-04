<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAddress extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'address_type',
        'first_name',
        'last_name',
        'country',
        'state',
        'city',
        'zipcode',
        'address_line_1',
        'address_line_2',
        'phone',
        'is_default',
        'label'
    ];

    protected $casts = [
        'is_default' => 'boolean',
    ];

    /**
     * Get the user that owns the address.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Scope to get addresses for a specific user.
     */
    public function scopeForUser($query, $userId)
    {
        return $query->where('user_id', $userId);
    }

    /**
     * Scope to get default addresses.
     */
    public function scopeDefault($query)
    {
        return $query->where('is_default', true);
    }

    /**
     * Scope to get addresses by type.
     */
    public function scopeByType($query, $type)
    {
        return $query->where('address_type', $type);
    }

    /**
     * Get full name.
     */
    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    /**
     * Get formatted address.
     */
    public function getFormattedAddressAttribute()
    {
        $address = $this->address_line_1;
        if ($this->address_line_2) {
            $address .= ', ' . $this->address_line_2;
        }
        $address .= ', ' . $this->city . ', ' . $this->state . ' ' . $this->zipcode . ', ' . $this->country;
        
        return $address;
    }

    /**
     * Set default address for user.
     */
    public function setAsDefault()
    {
        // Remove default from other addresses of the same user and type
        self::where('user_id', $this->user_id)
            ->where('address_type', $this->address_type)
            ->where('id', '!=', $this->id)
            ->update(['is_default' => false]);

        // Set this address as default
        $this->update(['is_default' => true]);
    }

    /**
     * Get user's default address by type.
     */
    public static function getDefaultAddress($userId, $type = 'both')
    {
        return self::where('user_id', $userId)
            ->where('address_type', $type)
            ->where('is_default', true)
            ->first();
    }

    /**
     * Get all addresses for a user.
     */
    public static function getUserAddresses($userId)
    {
        return self::where('user_id', $userId)
            ->orderBy('is_default', 'desc')
            ->orderBy('created_at', 'desc')
            ->get();
    }
}
