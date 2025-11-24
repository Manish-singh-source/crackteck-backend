<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Lead extends Model
{
    use LogsActivity;

    protected $fillable = [
        'user_id',
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

    /**
     * Get all branches for this lead.
     */
    public function branches(): HasMany
    {
        return $this->hasMany(LeadBranch::class, 'lead_id');
    }

    /**
     * Configure activity logging options.
     */
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['first_name', 'last_name', 'email', 'phone', 'company_name', 'status'])
            ->logOnlyDirty()
            ->dontSubmitEmptyLogs()
            ->setDescriptionForEvent(fn(string $eventName) => "Lead {$eventName}");
    }
}
