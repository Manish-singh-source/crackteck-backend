<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DmAadharDetails extends Model
{
    //
    use SoftDeletes;
    protected $table = 'dm_aadhar_details';

    protected $dates = ['deleted_at'];
    
    protected $fillable = [
        'delivery_man_id',
        'aadhar_number',
        'aadhar_front_path',
        'aadhar_back_path',
        'created_by',
        'updated_by',
    ];
}
