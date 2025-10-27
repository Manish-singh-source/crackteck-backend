<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Meet extends Model
{
    use LogsActivity;

    /**
     * Configure activity logging options.
     */

    protected $fillable = [
        'user_id',
        'lead_id',
        'meet_title',
        'client_name',
        'meeting_type',
        'date',
        'time',
        'location',
        'attachment',
        'meetAgenda',
        'followUp',
        'status',
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['meet_title', 'client_name', 'meeting_type', 'date', 'status'])
            ->logOnlyDirty()
            ->dontSubmitEmptyLogs()
            ->setDescriptionForEvent(fn(string $eventName) => "Meeting {$eventName}");
    }
}
