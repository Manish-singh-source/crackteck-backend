<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class DeliveryMan extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = [
        'first_name',
        'last_name',
        'phone',
        'email',
        'dob',
        'gender',
        'current_address',
        'city',
        'state',
        'country',
        'pincode',
        'employment_type',
        'joining_date',
        'assigned_area',
        'vehicle_type',
        'vehical_no',
        'driving_license_no',
        'driving_license',
        'police_verification',
        'police_verification_status',
        'police_certificate',
        'govid',
        'idno',
        'adhar_pic',
        'bank_acc_no',
        'bank_name',
        'ifsc_code',
        'passbook_pic',
        'status'
    ];

    protected $casts = [
        'dob' => 'date',
        'joining_date' => 'date',
    ];

    /**
     * Get the orders assigned to this delivery man.
     */
    public function orders()
    {
        return $this->hasMany(Order::class, 'delivery_man_id');
    }

    /**
     * Get the full name of the delivery man.
     */
    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    /**
     * Configure activity logging options.
     */
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['first_name', 'last_name', 'email', 'phone', 'assigned_area', 'status'])
            ->logOnlyDirty()
            ->dontSubmitEmptyLogs()
            ->setDescriptionForEvent(fn(string $eventName) => "Delivery Man {$eventName}");
    }
}
