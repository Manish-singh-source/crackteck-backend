<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DmDrivingLicenseDetails extends Model
{
    //
    use SoftDeletes;
    protected $table = 'dm_driving_license_details';

    protected $fillable = [
        'delivery_man_id',
        'license_number',
        'issue_date',
        'expiry_date',
        'license_front_path',
        'license_back_path',
        'created_by',
        'updated_by',
    ];
    
}
