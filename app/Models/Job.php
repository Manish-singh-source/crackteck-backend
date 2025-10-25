<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'c_jobs';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'customer_type',
        'first_name',
        'last_name',
        'phone',
        'email',
        'dob',
        'address',
        'address2',
        'country',
        'state',
        'city',
        'pin_code',
        'company_name',
        'company_address',
        'gst_no',
        'pan_no',
        'profile_img',
        'image',
        'priority_level',
        'product_name',
        'product_type',
        'product_brand',
        'model_no',
        'serial_no',
        'purchase_date',
        'image2',
        'issue_type',
        'description',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'dob' => 'date',
        'purchase_date' => 'date',
    ];

    /**
     * Get the job assignment for the job.
     */
    public function assignment()
    {
        return $this->hasOne(JobAssignment::class, 'job_id');
    }

    /**
     * Get all job assignments for the job.
     */
    public function assignments()
    {
        return $this->hasMany(JobAssignment::class, 'job_id');
    }

    /**
     * Get all devices for the job.
     */
    public function devices()
    {
        return $this->hasMany(JobDevice::class, 'job_id');
    }
}