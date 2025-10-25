<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Engineer extends Authenticatable implements JWTSubject
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'engineers';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'phone',
        'email',
        'dob',
        'gender',
        'address',
        'address2',
        'city',
        'state',
        'country',
        'pincode',
        'bank_acc_holder_name',
        'bank_acc_number',
        'bank_name',
        'ifsc_code',
        'police_verification',
        'police_verification_status',
        'police_certificate',
        'designation',
        'department',
        'join_date',
        'primary_skills',
        'pic',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'dob' => 'date',
        'join_date' => 'date',
    ];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims(): array
    {
        return [];
    }

    /**
     * Get the job assignments for the engineer.
     */
    public function jobAssignments()
    {
        return $this->hasMany(JobAssignment::class, 'engineer_id');
    }
}
