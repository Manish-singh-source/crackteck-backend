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
        'followup_date',
        'followup_time',
        'status',
        'remarks',
    ];
    
    public function leadDetails()
    {
        return $this->belongsTo(Lead::class, 'lead_id');
    }

    public function lead(){
        return $this->belongsTo(Lead::class, 'lead_id');
    }
}
