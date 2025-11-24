<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    //
    protected $fillable = [
        'staff_role',
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
        'pan_no',
        'pan_card',
        'aadhar_no',
        'aadhar_card',
        'bank_acc_no',
        'bank_name',
        'ifsc_code',
        'passbook_pic',
        'status', 
        'otp',
        'otp_expiry',
    ];
}
