<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AMC extends Model
{
    protected $table = 'a_m_c_s';

    protected $fillable = [
        'plan_name',
        'plan_code',
        'plan_type',
        'description',
        'duration',
        'start_date',
        'end_date',
        'total_visits',
        'plan_cost',
        'tax',
        'total_cost',
        'pay_terms',
        'support_type',
        'replacement_policy',
        'items',
        'brochure',
        'tandc',
        'status'
    ];

    protected $casts = [
        'items' => 'array'
    ];
}
