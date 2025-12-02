<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Customer extends Authenticatable implements JWTSubject
{
    // use SoftDeletes, LogsActivity;
    protected $table = 'customers';

    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'phone',    
        'email',
        'dob',
        'gender',
        'customer_type',
        'company_name',
        'company_addr',
        'gst_no',
        'pan_no',
        'pic',
        'status',
    ];

    protected $dates = ['deleted_at'];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims(): array
    {
        return [];
    }

    /**
     * Get the user associated with this customer (for e-commerce customers).
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the primary address for this customer.
     */
    public function address()
    {
        return $this->hasOne(CustomerAddressDetails::class, 'customer_id');
    }

    /**
     * Get all addresses/branches for this customer.
     */
    public function branches()
    {
        return $this->hasMany(CustomerAddressDetails::class, 'customer_id');
    }

    /**
     * Get CRM orders for this customer (from orders table).
     */
    public function crmOrders()
    {
        return $this->hasMany(Order::class, 'customer_id');
    }

    /**
     * Get e-commerce orders for this customer (through user relationship).
     */
    public function ecommerceOrders()
    {
        return $this->hasMany(EcommerceOrder::class, 'customer_id', 'id');
    }

    /**
     * Get all e-commerce orders for this customer (by customer_id).
     */
    public function allEcommerceOrders()
    {
        return $this->hasMany(EcommerceOrder::class, 'customer_id');
    }

    /**
     * Get AMC services for this customer.
     */
    public function amcServices()
    {
        return $this->hasMany(AmcService::class, 'customer_id');
    }

    /**
     * Get Non-AMC services for this customer.
     */
    public function nonAmcServices()
    {
        return $this->hasMany(NonAmcService::class, 'customer_id');
    }

    /**
     * Get Quick service requests for this customer.
     */
    public function quickServiceRequests()
    {
        return $this->hasMany(QuickServiceRequest::class, 'customer_id');
    }

    /**
     * Get total order count for this customer.
     */
    public function getTotalOrdersCountAttribute()
    {
        if ($this->customer_type === 'E-commerce Customer') {
            return $this->ecommerceOrders()->count();
        } else {
            return $this->crmOrders()->count();
        }
    }

    /**
     * Get full name attribute.
     */
    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    /**
     * Get or generate username for display.
     */
    public function getDisplayUsernameAttribute()
    {
        if ($this->username) {
            return $this->username;
        }

        // Generate username if not set
        return 'customer_' . $this->id;
    }

    /**
     * Generate and save username if not exists.
     */
    public function generateUsername()
    {
        if (!$this->username) {
            $this->username = 'customer_' . $this->id;
            $this->save();
        }
        return $this->username;
    }

    /**
     * Scope to filter by customer type.
     */
    public function scopeByType($query, $type)
    {
        return $query->where('customer_type', $type);
    }

    /**
     * Scope to get e-commerce customers.
     */
    public function scopeEcommerce($query)
    {
        return $query->where('customer_type', 'E-commerce Customer');
    }

    /**
     * Scope to get AMC customers.
     */
    public function scopeAmc($query)
    {
        return $query->where('customer_type', 'AMC Customer');
    }

    /**
     * Scope to get CRM customers (Retail, Wholesale, Corporate, AMC).
     */
    public function scopeCrm($query)
    {
        return $query->whereIn('customer_type', ['Retail', 'Wholesale', 'Corporate', 'AMC Customer']);
    }

    /**
     * Configure activity logging options.
     */
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['first_name', 'last_name', 'email', 'phone', 'customer_type', 'status'])
            ->logOnlyDirty()
            ->dontSubmitEmptyLogs()
            ->setDescriptionForEvent(fn(string $eventName) => "Customer {$eventName}");
    }
}
