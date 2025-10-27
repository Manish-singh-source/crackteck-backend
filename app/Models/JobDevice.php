<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobDevice extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'job_devices';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'job_id',
        'product_name',
        'product_type',
        'product_brand',
        'model_no',
        'serial_no',
        'purchase_date',
        'image',
        'issue_type',
        'description',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'purchase_date' => 'date',
    ];

    /**
     * Get the job that owns the device.
     */
    public function job()
    {
        return $this->belongsTo(Job::class, 'job_id');
    }
}
