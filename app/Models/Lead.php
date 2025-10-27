<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Lead extends Model
{
    use LogsActivity;

    /**
     * Configure activity logging options.
     */
    
    protected $fillable = [
        'first_name',
        'last_name',
        'phone',
        'email',
        'dob',
        'gender',
        'company_name',
        'designation',
        'industry_type',
        'source',
        'requirement_type',
        'budget_range',
        'urgency',
        'status',
    ];

    
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['first_name', 'last_name', 'email', 'phone', 'company_name', 'status'])
            ->logOnlyDirty()
            ->dontSubmitEmptyLogs()
            ->setDescriptionForEvent(fn(string $eventName) => "Lead {$eventName}");
    }
}
