<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FollowUp extends Model
{
    use HasFactory;
    
    protected $fillable = [	
        'user_id',
        'lead_id',
        'client_name',
        'contact',
        'email',
        'followup_date',
        'followup_time',
        'status',
        'remarks',
    ];
    
    public function lead()
    {
        return $this->belongsTo(Lead::class, 'lead_id');
    }
}
