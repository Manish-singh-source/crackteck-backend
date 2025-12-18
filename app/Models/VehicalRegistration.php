<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VehicalRegistration extends Model
{
    //
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'delivery_man_id',
        'brand',
        'model',
        'vehical_no',
        'fuel_type',
        'license_document_front_path',
        'license_document_back_path',
        'created_by',
    ];

    // protected $hidden = [
    //     'delivery_man_id',
    //     'created_by',
    //     'created_at',
    //     'updated_at',
    //     'deleted_at'
    // ];

    public function deliveryMan()
    {
        return $this->belongsTo(DeliveryMan::class, 'delivery_man_id');
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

}
