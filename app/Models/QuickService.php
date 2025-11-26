<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class QuickService extends Model
{
    use HasFactory, LogsActivity;

    protected $table = 'quick_services';

    protected $fillable = [
        'service_image',
        'name',
        'service_price',
        'service_description',
        'status',
    ];

    protected $casts = [
        'service_price' => 'decimal:2',
        'status' => 'boolean',
    ];

    /**
     * Get the options for logging activity.
     */
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['service_image', 'name', 'service_price', 'service_description', 'status'])
            ->logOnlyDirty()
            ->dontSubmitEmptyLogs();
    }

    /**
     * Scope a query to only include active services.
     */
    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    /**
     * Scope a query to only include inactive services.
     */
    public function scopeInactive($query)
    {
        return $query->where('status', 0);
    }
}

